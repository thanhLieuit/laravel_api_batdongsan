@extends('admin.layoutad.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      	<div class="container-fluid">
      		<div class="col-md-12">
      			<table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Process</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Process</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	@foreach($support as $support)  	
                    		<tr>
	                    		<td>{{$support->id}}</td>
	                    		<td><a type="button"  data-toggle="modal" data-target="#modal-lg-{{$support->id}}" style="color: red">

                  				{{$support->desription}}
                				</a></td>
	                    		<td>{{$support->created_at	}}</td>
	                    		<td>{{$support->note}}</td>
	                    		<td>@if($support->note == 'Đang xử Lý')
	                    			<a href="{{route('admin.support-done',['id'=>$support->id])}}" class="btn btn-primary toastrDefaultSuccess">Xử Lý Xong</a>
	                    			@elseif($support->note == 'Xử Lý Xong')
	                    			<i class="fas fa-check"></i>
	                    			@endif
	                    		</td>
                    		</tr>
                    	<div class="modal fade" id="modal-lg-{{$support->id}}">
						    <div class="modal-dialog modal-lg-{{$support->id}}">
						      	<div class="modal-content">
						        	<div class="modal-header">
						          		<h4 class="modal-title">Chi tiết lỗi</h4>
						          		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						            		<span aria-hidden="true">&times;</span>
						          		</button>
						        	</div>
						        	<form role="form" action="{{route('admin.support-processing',['id'=>$support->id])}}" enctype="multipart/form-data" method="POST">
			                		<input type="hidden" name="_token" value="{{csrf_token()}}">
			                      		<div class="modal-body">
							              	<div class="card-body">
						                      	<div class="form-group">
						                       		<label>Content</label>
						                        	<textarea class="form-control" rows="3" placeholder="Desription ..." name="desrip">{{$support->content_spp}}</textarea>
						                      	</div>
						                      	<div class="form-group">
						                       		<label>Image</label>
						                        	<img src="{{$support->image}}" alt="" style="width: 100%">
						                      	</div>
						              		</div>
						            	</div>
			                      	<div class="card-footer">
	                  					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                  					@if($support->note == 'Chờ Xử Lý')
							            <button type="submit" class="btn btn-primary">Xử Lý</button>
							            @endif
	                				</div>
			                		</form>
						      	</div>
						    </div>
						</div>	       	
                    	@endforeach
                    </tbody>
                </table>
      		</div>	
		</div>
    </section>
</div>

@endsection