<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject as JWTSubject;
use Auth;
use App\User;
use App\Token;
use JWTAuthException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon;

class LoginController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
 
    }
   
    public function register(Request $request){
        $user = $this->user->create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),

        ]);
        // if ($this->loginAfterSignUp) {
        //     return $this->login($request);
        // }
        return response()->json([
            'status'=> 200,
            'message'=> 'User created successfully',
            'data'=>$user,

        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::select('id')->where('email',$credentials)->first();
              $token = null;
            try {
               if (!$token = JWTAuth::attempt($credentials , ['exp' => Carbon\Carbon::now()->addDays(7)->timestamp])) {
                return response()->json(['invalid_email_or_password'], 422);
               }
            } catch (JWTAuthException $e) {
                return response()->json(['failed_to_create_token'], 500);
            }
            $token2 = Token::select('id')->where('id_user',$user->id)->first();
            if(!$token2){
               
                $token1 = Token::create([
                    'token' =>$token,
                    'id_user' => $user->id,
                ]);
            }else{
                 $token1 = Token::where('id',$token2)->update([
                    'token' =>$token,
                    'id_user' => $user->id,
                ]);
            }
            

            return response()->json([
                'status' => 200,
                'token' => $token,
                'user' =>$user,
            
            ],200);

            
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        // $this->validate($request, [
        //     'token' => 'required'
        // ]);

        try {          
            JWTAuth::invalidate($request->token);
           $user = User::select('id')->where('id',auth()->user()->id)->first();
           $token2 = Token::select('token')->where('id_user',$user->id)->first();
           $token1 =  Token::select('id')->where('token',$token2->token)->delete();
           

            return response()->json([
                'status' => true,
                'message' => 'User logged out successfully',
                'user' => $user,
                ]);             
        } catch (JWTException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }
  

    public function user(Request $request)
    {
        // $token = $request->input('token');

        // $token1 = Token::select('id')->where('token',$token)->first();
        // $token2 = Token::select('id_user')->where('token',$token)->first();
        // if($token1)
        // {
        //     $user = User::join('tokens','tokens.id_user','=','users.id')
        //     ->where('users.id',$token2->id_user)->first();

        // }else{}
         $user = JWTAuth::authenticate($request->token);
         return response()->json([
            'user' => $user,
        ]);
    }   
    

}
