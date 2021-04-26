@extends('admin.layoutad.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
			<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<div class="card card-warning">
		              	<div class="card-header">
		                	<h3 class="card-title">Inser Errors</h3>
		              	</div>
		              
		              	<div class="card-body">
			                <form role="form" action="" enctype="multipart/form-data" method="POST">
			                	<input type="hidden" name="_token" value="{{csrf_token()}}">
			                      	<div class="form-group">
			                        	<label>Name Err</label>
			                        	<input type="text" class="form-control" placeholder="Error ..." name="errors">
			                      	</div>     
			                      	<div class="form-group">
			                       		<label>Desription</label>
			                        	<textarea class="form-control" rows="3" placeholder="Desription ..." name="desrip"></textarea>
			                      	</div>
			                      	<div class="card-footer">
	                  					<button type="submit" class="btn btn-primary">Submit</button>
	                				</div>
			                </form>
		              	</div>
		            </div>
				</div>
				<div class="col-md-6">
					<table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>Name Err</th>
	                            <th>desription</th>
	                            <th>Thao tác</th>
	                        </tr>
	                    </thead>
	                    <tfoot>
	                        <tr>
	                            <th>ID</th>
	                            <th>Name Err</th>
	                            <th>desription</th>
	                            <th>Thao tác</th>
	                        </tr>
	                    </tfoot>
	                    <tbody>
	                    	@foreach($error as $error)
	                    	<tr>
	                    		<td>{{$error->id}}</td>
	                    		<td>{{$error->name_err}}</td>
	                    		<td>{{$error->desription}}</td>
	                    		<td><a href="{{url('admin/delete-error',['id'=>$error->id])}}"><i class="fas fa-trash-alt"></i></a></td>
	                    	</tr>	
	                    	@endforeach
	                    </tbody>
	                </table>
				</div>
			</div>
			</div>
      	</div>
    </section>
</div>
@endsection