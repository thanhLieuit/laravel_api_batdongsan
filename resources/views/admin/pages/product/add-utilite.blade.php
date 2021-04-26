@extends('admin.layoutad.master')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    	<div class="container-fluid">
    		<div class="col-md-12">
    			<div class="card-body">
          	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            	Thêm tiện ích
          	</button>
          	<div class="modal fade" id="modal-default">
			        <div class="modal-dialog">
			          	<div class="modal-content">
			          		<form role="form" action="{{route('admin.product-utilitie')}}" enctype="multipart/form-data" method="POST">
			                <input type="hidden" name="_token" value="{{csrf_token()}}">
				            	<div class="modal-header">
				              		<h4 class="modal-title">Thêm tiện ích</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
					            <div class="modal-body">
					              	<div class="form-group">
                  					<label>Tên tiện ích</label>
                  					<input type="text" class="form-control" placeholder="" name="tienich">
                					</div>                 			
                   				<div class="form-group">
					                    <label for="exampleInputFile">Hình ảnh</label>
					                    <div class="input-group">
					                      <div class="custom-file">
					                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
					                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
					                      </div>
					                      
					                    </div>
					                </div>
					            </div>
				            	<div class="modal-footer justify-content-between">
				              		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				              		<button type="submit" class="btn btn-primary">Insert</button>
				            	</div>
			            	</form>
			          	</div>
			        </div>
			      </div>
        	</div>
    		</div>
    		<div class="col-md-12">
    			<table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiện Ích</th>
                    <th>Hiển thị</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tiện Ích</th>
                    <th>Hiển thị</th>
                    <th>Thao tác</th>
                </tr>
            </tfoot>
            <tbody>
            	 
                 @foreach($tienich as $tienich)
                 <tr>
                    <td>{{$tienich->id}}</td>
                    <td>{{$tienich->name_uitilie}}</td>
                    @if($tienich->note == 1)
                    <td>Đang hiển thị</td>
                    @elseif($tienich->note == 0)
                    <td>Đang tắt</td>
                    @endif
                    <td>
                      <div class="row">
                        <div class="col-md-6">
                          @if($tienich->note == 1)
                          <a href="{{route('admin.product-off-utilitie',['id'=>$tienich->id])}}" class="btn btn-block btn-danger">Tắt hiển thị</a>
                          @elseif($tienich->note == 0)
                          <a href="{{route('admin.product-on-utilitie',['id'=>$tienich->id])}}" class="btn btn-block btn-primary">Bật hiển thị</a>
                          @endif
                        </div>
                        <div class="col-md-6">
                          <a href="{{route('admin.product-delete-utilitie',['id'=>$tienich->id])}}" class="btn btn-block btn-warning">Xóa</a>
                        </div>
                      </div>
                      
                     
                    </td>
                  </tr>
                 @endforeach
               
            </tbody>
          </table>
    		</div>
    	</div>
   </section>
</div>     
@endsection