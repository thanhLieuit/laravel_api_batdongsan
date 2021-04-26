@extends('admin.layoutad.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>categry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        
 <button class="btn btn-success" data-toggle="modal" data-target="#add" >Thêm mới loại sản phẩm
          </button>
<!--modal add category-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Thêm mới loại sản phẩm<span class="title"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <form role="form" action="{{route('admin.type-product-add')}}" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <fieldset class="form-group">
                                <label>Name</label>
                                <input class="form-control"  name="name" placeholder="Nhập loại sản phẩm">    
                                    <div class="error" style="font-size: 1rem; color: red;"></div>
                            </fieldset>
                            <div class="form-group">
                                <label>Catalogy</label>
                                <select class="form-control" name="id_catalogy">
                                	@foreach($category as $category)
                                    <option value="{{$category->id}}">{{$category->name_categorys}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Không Hiển Thị</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success add">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Tên</th>
                      <th>Trạng Thái</th>
                      <th>Danh Mục</th>
                      <th>Chỉnh sửa</th>
                  </tr>
              </thead>
              <tbody>
                 @foreach($type_product as $type_product)
                 	<tr>
                 		<td>{{$type_product->id}}</td>
                 		<td>{{$type_product->name_type}}</td>
                 		@if($type_product->status == 0)
                 		<td>Không hiển thị</td>
                 		@elseif($type_product->status == 1)
                 		<td>hiển thị</td>
                 		@endif
                 		<td>{{$type_product->name_categorys}}</td>
                 		<td><a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#edit{{$type_product->id}}" type="button">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm delete btn_delete" data-id="{{$type_product->id}}" href="#" data-toggle="modal" data-target="#delete">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                 	</tr>
                 	<div class="modal fade" id="edit{{$type_product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	                   <div class="modal-dialog" role="document">
	                      <div class="modal-content">
	                          <div class="modal-header">
	                             <h5 class="modal-title" id="exampleModalLabel" > Chỉnh sửa<span class="title"></span></h5>
	                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	                                  <span aria-hidden="true"></span>
	                              </button>
	                          </div>
	                          <div class="modal-body">
	                              <div class="row" style="margin: 5px">
	                                  <div class="col-lg-12">
	                                      <form action="{{route('admin.type-product-edit',['id'=>$type_product->id])}}" role="form" method="POST">
	                                          @csrf
	                                          <fieldset class="form-group">
	                                              <label>Name</label>
	                                              <input class="form-control" name="name" value="{{$type_product->name_type}}">    
	                                          </fieldset>
	                                           <div class="form-group">
					                                <label>Catalogy</label>
					                                <select class="form-control" name="id_catalogy">
					                                	<option value="{!!$type_product['id_category'] !!}">{!! $type_product['name_categorys'] !!}</option>
                                   						@foreach($category1 as $category2)
                                    					<option value="{!! $category2['id'] !!}">{!! $category2['name_categorys'] !!}</option>
                                   						@endforeach
					                                </select>
					                            </div>
	                                          <div class="form-group">
	                                            <label>Status</label>
	                                              <select class="form-control" name="status">
	                                                @if($type_product->status == 1)
	                                                  <option value="1">Hiển Thị</option>
	                                                @elseif($type_product->status == 0)
	                                                  <option value="0">Không Hiển Thị</option>
	                                                @endif
	                                                  <option value="1">Hiển Thị</option>
	                                                  <option value="0">Không Hiển Thị</option>
	                                              </select>
	                                          </div>
	                                          <button type="submit" class="btn btn-success">edit</button>
	                                      </form>
	                                  </div>
	                              </div>
	                          </div>
	                      </div>
	                  </div>
	              </div>
	              <!-- modal delete category-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body" id="edit" style="margin-left: 183px;">
                <a href="{{route('admin.type-product-delete',['id'=>$type_product->id])}}" class="btn btn-success del">Có</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                <div>
                </div>
            </div>
        </div>
    </div>
</div>
                 @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

@endsection