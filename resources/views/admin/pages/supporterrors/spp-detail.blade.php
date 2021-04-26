@extends('admin.layoutad.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
      		<div class="col-md-12">
      			<div class="card-body">
	                <form role="form" action="" enctype="multipart/form-data" method="POST">
	                	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                		@foreach($support as $support)   
	                      	<div class="form-group">
	                       		<label>Content</label>
	                        	<textarea class="form-control" rows="3" placeholder="Desription ..." name="desrip">{{$support->content_spp}}</textarea>
	                      	</div>
	                      	<div class="form-group">
	                       		<label>Image</label>
	                        	<img src="" alt="">
	                      	</div>
	                      	@endforeach
	                      	<!-- <div class="card-footer">
              					<button type="submit" class="btn btn-primary">Submit</button>
            				</div> -->
	                </form>
              	</div>
      		</div>		
      	</div>
    </section>
</div>
@endsection