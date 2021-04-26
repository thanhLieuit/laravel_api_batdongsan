@extends('admin.layoutad.master')
@section('content')
<div class="content-wrapper">
<section class="content-header">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="card-body">
	          	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
	            	Thêm Sản Phẩm
	          	</button>
	          	<div class="modal fade" id="modal-xl">
			        <div class="modal-dialog modal-xl">
			          	<div class="modal-content">
			          		<form role="form" action="{{route('admin.product-add')}}" enctype="multipart/form-data" method="POST">
			                <input type="hidden" name="_token" value="{{csrf_token()}}">
				            	<div class="modal-header">
				              		<h4 class="modal-title">Thêm Sản Phẩm</h4>
				              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                		<span aria-hidden="true">&times;</span>
				              		</button>
				            	</div>
					            <div class="modal-body">
					              	<div class="form-group">
                  						<label>Tên sản phẩm</label>
                  						<input type="text" class="form-control" placeholder="" name="sanpham">
                					</div>  
                					<div class="row">
                						<div class="col-md-4">
                							<div class="form-group">
							                    <label for="exampleInputFile">Hình ảnh</label>
							                    <div class="input-group">
							                      	<div class="custom-file">
							                        	<input type="file" class="custom-file-input" id="exampleInputFile" name="image">
							                        	<label class="custom-file-label" for="exampleInputFile"></label>
							                      	</div>
							                    </div>
								            </div>
                						</div>
                						<div class="col-md-4">
                							<div class="form-group">
                								<label>Giá</label>
                								<div class="input-group">
								                  	<div class="input-group-prepend">
								                    	<span class="input-group-text">$</span>
								                  	</div>
								                  	<input type="text" class="form-control" name="gia">
							                	</div>
							            	</div>
                						</div>
                						<div class="col-md-4">
                							<div class="form-group">
		                  						<label>Diện tích</label>
		                  						<div class="input-group">
								                  	<div class="input-group-prepend">
								                    	<span class="input-group-text">m2</span>
								                  	</div>
								                  	<input type="text" class="form-control" name="dt">
							                	</div>
		                					</div>  
                						</div>
                					</div>               			
	                   				<div class="row">
	                   					<div class="col-md-2">
	                   						<div class="form-group">
							                  	<label>Thành phố</label>
							                  	<select class="form-control " style="width: 100%;" name="tp">
							                    	<option selected="selected" value="43">Đà Nẵng</option>
							                  	</select>
							                </div>
	                   					</div>
	                   					<div class="col-md-2">
	                   						<div class="form-group">
							                  	<label>Quận huyện</label>
							                  	<select class="form-control " style="width: 100%;" name="qh">
							                    	<option selected="selected" value="8">Huyện Hoàng Sa</option>
							                    	<option value="1">Huyện Hoà Vang</option>
								                    <option value="2">Quận Thanh Khê</option>
								                    <option value="3">Quận Sơn Trà</option>
								                    <option value="4">Quận Ngũ Hành Sơn</option>
								                    <option value="5">Quận Liên Chiểu</option>
								                    <option value="6">Quận Hải Châu</option>
								                    <option value="7">Quận Cẩm Lệ</option>
							                  	</select>
							                </div>
	                   					</div>
	                   					<div class="col-md-2">
	                   						<div class="form-group">
							                  	<label>Trạng thái</label>
							                  	<select class="form-control " style="width: 100%;" name="tt">
							                    	<option selected="selected" value="0">chờ kiểm duyệt</option>
							                    	<option value="1">đã duyệt</option>
							                  	</select>
							                </div>
	                   					</div>
	                   					<div class="col-md-2">
	                   						<div class="form-group">
							                  	<label>Loại Sản Phẩm</label>
							                  	<select class="form-control " style="width: 100%;" name="typesp">
							                    	<option selected="selected"></option>
							                    	@foreach($loaisp as $loaisp)
							                    	<option value="{{$loaisp->id}}">{{$loaisp->name_type}}</option>
							                    	@endforeach
							                  </select>
							                </div>
	                   					</div>
	                   					<div class="col-md-4">
	                   						<div class="form-group">
							                  	<label>Tiện ích</label>
							                  	<div class="select2-purple">
							                    	<select class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="tienich[]">
							                    	@foreach($tienich as $tienich)
														<option value="{{$tienich->id}}">{{$tienich->name_uitilie}}</option>
							                      	@endforeach
							                    	</select>
							                  </div>
							                </div>
	                   					</div>
	                   				</div>
						            <div class="form-group">
                  						<label>Nội dung</label>
                  						<textarea class="textarea" placeholder="Place some text here"
                      style="width: 100%;height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="noidung"></textarea>
                					</div>
                					<div class="form-group">
                    					<label>Tóm tắt</label>
                    					<textarea class="form-control" rows="3" placeholder="Enter ..." name="tomtat"></textarea>
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
	                    <th>Sản phẩm</th>
	                    <th>Giá</th>
	                    <th>Diện Tích</th>
	                    <th>Lượt Thích</th>
	                    <th>Trạng Thái</th>
	                    <th>Loại Sản Phẩm</th>
	                    <th>Tác Vụ</th>
	                </tr>
	            </thead>
	            <tfoot>
	                <tr>
	                   	<th>ID</th>
	                    <th>Sản phẩm</th>
	                    <th>Giá</th>
	                    <th>Diện Tích</th>
	                    <th>Lượt Thích</th>
	                    <th>Trạng Thái</th>
	                    <th>Loại Sản Phẩm</th>
	                    <th>Tác Vụ</th>
	                </tr>
	            </tfoot>
	            <tbody>
	            	 
	                @foreach($sanpham as $sanpham)
		                <tr>
		                    <td>{{$sanpham->id}}</td>
		                    <td>{{$sanpham->name_product}}</td>
		                   	<td>{{$sanpham->price}} VND</td>
		                   	<td>{{$sanpham->dientich}} m2</td>
		                   	<td>{{$sanpham->like}}</td>
		                   	@if($sanpham->action == 0)
		                   	<td>đang chờ duyệt</td>
		                   	@elseif($sanpham->action == 1)
		                   	<td>đã duyệt</td>
		                   	@endif
		                   	<td>{{$sanpham->name_type}}</td>
		                    <td>
		                      	<div class="row">
		                        	<div class="col-md-4">
		                        		<a href="{{route('admin.product-edit',['id'=>$sanpham->id])}}" class="btn btn-block btn-primary">Sửa</a>
		                        	</div>
		                        	<div class="col-md-4">
		                         		<a href="{{route('admin.product-delete',['id'=>$sanpham->id])}}" class="btn btn-block btn-warning">xóa</a>
		                        	</div>
		                        	<div class="col-md-4">
		                        		@if($sanpham->action == 0)
		                        			
		                        			<a href="{{route('admin.product-on',['id'=>$sanpham->id])}}" class="btn btn-block btn-danger">Bật hiển thị</a>
		                        		@elseif($sanpham->action == 1)
		                        			<a href="{{route('admin.product-off',['id'=>$sanpham->id])}}" class="btn btn-block btn-primary">Tắt hiển thị</a>
		                        		@endif
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