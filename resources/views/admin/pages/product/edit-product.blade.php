@extends('admin.layoutad.master')
@section('content')
<div class="content-wrapper">
<section class="content-header">
	<div class="container-fluid">
          		<form role="form" action="" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
	            	<div class="modal-header">
	              		<h4 class="modal-title">Sửa Sản Phẩm</h4>
	              		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                		<span aria-hidden="true">&times;</span>
	              		</button>
	            	</div>
	            	@foreach($sanpham as $sanpham)
		            <div class="modal-body">
		              	<div class="form-group">
      						<label>Tên sản phẩm</label>
      						<input type="text" class="form-control" placeholder="" name="sanpham" value="{{$sanpham->name_product}}">
    					</div>  
    					<div class="row">
    						<div class="col-md-4">
    							<div class="form-group">
				                    <label for="exampleInputFile">Hình ảnh</label>
				                    <div class="input-group">
				                      	<div class="custom-file">
				                        	<input type="file" name="file" class="form-control" aria-invalid="false">
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
					                  	<input type="text" class="form-control" name="gia" value="{{$sanpham->price}}">
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
					                  	<input type="text" class="form-control" name="dt" value="{{$sanpham->dientich}}">
				                	</div>
            					</div>  
    						</div>
    					</div>
    					<div class="row">
    						<div class="col-md-4"></div>
    						<div class="col-md-4">
    							<img src="{{$sanpham->image}}" alt="">
    							<!-- <video width="400" controls>
									  <source src="{{$sanpham->image}}" type="video/mp4">
									  <source src="mov_bbb.ogg" type="video/ogg">
									  Your browser does not support HTML5 video.
									</video> -->
    						</div>
    						<div class="col-md-4">
    							<div class="form-group">
    								<label>Tiện ích</label>
				                  		@foreach( $tienich1 as $tienich1)
										<div class="form-check" >
											<input 
										    {{ $getAllutilitiesproduct->contains( $tienich1['id'] ) ? 'checked' : '' }}
										  type="checkbox" 
										  class="form-check-input" name="tienich1[]" value="{!! $tienich1['id']; !!}" >
											 <label class="form-check-label" >{!! $tienich1['name_uitilie']; !!}</label>
										</div>
										@endforeach

				                  </div>
    						</div>
    					</div>
    					<br>            			
           				<div class="row">
           					<div class="col-md-2">
           						<div class="form-group">
				                  	<label>Thành phố</label>
				                  	<select class="form-control " style="width: 100%;" name="tp">
				                  		<option selected="selected" value="{{$sanpham->id_tp}}">Đà Nẵng</option>
				                    	<option value="43">Đà Nẵng</option>
				                  	</select>
				                </div>
           					</div>
           					<div class="col-md-2">
           						<div class="form-group">
				                  	<label>Quận huyện</label>
				                  	<select class="form-control " style="width: 100%;" name="qh">
				                  		@if($sanpham->id_h == 8)
				                    	<option selected="selected" value="{{$sanpham->id_h}}">Huyện Hoàng Sa</option>
				                    	@elseif($sanpham->id_h == 1)
				                    	<option selected="selected" value="{{$sanpham->id_h}}">Huyện Hoà Vang</option>
					                    @elseif($sanpham->id_h == 2)
					                    <option selected="selected" value="{{$sanpham->id_h}}">
					                    Quận Thanh Khê</option>
					                    @elseif($sanpham->id_h == 3)
					                    <option selected="selected" value="{{$sanpham->id_h}}">
					                    Quận Sơn Trà</option>
					                    @elseif($sanpham->id_h == 4)
					                    <option selected="selected" value="{{$sanpham->id_h}}">
					                    Quận Ngũ Hành Sơn</option>
					                    @elseif($sanpham->id_h == 5)
					                    <option selected="selected" value="{{$sanpham->id_h}}">
					                    Quận Liên Chiểu</option>
					                    @elseif($sanpham->id_h == 6)
					                    <option selected="selected" value="{{$sanpham->id_h}}">
					                    Quận Hải Châu</option>
					                    @elseif($sanpham->id_h == 7)
					                     <option selected="selected" value="{{$sanpham->id_h}}">
					                    Quận Cẩm Lệ</option>
				                    	@endif
				                    	<option value="8">Huyện Hoàng Sa</option>
				                    	<option value="1">Huyện Hoà Vang</option>
					                    <option value="2">
					                    Quận Thanh Khê</option>
					                    <option value="3">
					                    Quận Sơn Trà</option>
					                    <option value="4">
					                    Quận Ngũ Hành Sơn</option>
					                    <option value="5">
					                    Quận Liên Chiểu</option>
					                    <option value="6">
					                    Quận Hải Châu</option>
					                    <option value="7">
					                    Quận Cẩm Lệ</option>
				                  	</select>
				                </div>
           					</div>
           					<div class="col-md-2">
           						<div class="form-group">
				                  	<label>Trạng thái</label>
				                  	<select class="form-control " style="width: 100%;" name="tt">
				                  		@if($sanpham->action == 0)
				                  		<option selected="selected" value="{{$sanpham->action}}">chờ kiểm duyệt</option>
				                  		@elseif($sanpham->action == 1)
				                  		<option selected="selected" value="{{$sanpham->action}}">đã duyệt</option>
				                  		@endif
				                    	<option  value="0">chờ kiểm duyệt</option>
				                    	<option value="1">đã duyệt</option>
				                  	</select>
				                </div>
           					</div>
           					<div class="col-md-2">
           						<div class="form-group">
				                  	<label>Loại Sản Phẩm</label>
				                  	<select class="form-control " style="width: 100%;" name="typesp">
				                    	<option selected="selected" value="{{$sanpham->id_type}}">
				                    	{{$sanpham->name_type}}
				                    	</option>
				                    	@foreach($loaisp1 as $loaisp1)
				                    	<option  value="{!! $loaisp1['id']; !!}">
				                    	{!! $loaisp1['name_type']; !!}
				                    	</option>
				                    	@endforeach
				                  </select>
				                </div>
           					</div>
           		
           				</div>
			            <div class="form-group">
      						<label>Nội dung</label>
      						<textarea class="textarea" placeholder="Place some text here"
          style="width: 100%;height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="noidung">{{$sanpham->content}}</textarea>
    			              					</div>
    					<div class="form-group">
        					<label>Tóm tắt</label>
        					<textarea class="form-control" rows="3" placeholder="Enter ..." name="tomtat">{{$sanpham->summary}}</textarea>
      					</div>
		            </div>
	            	<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	              		<button type="submit" class="btn btn-primary">Insert</button>
	            	</div>
	            	@endforeach
            	</form>
    </div>
    </section>      
</div>
@endsection