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
        
 <button class="btn btn-success" data-toggle="modal" data-target="#add" >Thêm mới Category
          </button>
<!--modal add category-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" >Thêm mới Category<span class="title"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin: 5px">
                    <div class="col-lg-12">
                        <form role="form" action="{{route('admin.category-add')}}" enctype="multipart/form-data" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <fieldset class="form-group">
                                <label>Name</label>
                                <input class="form-control"  name="name" placeholder="Nhập tên category">    
                                    <div class="error" style="font-size: 1rem; color: red;"></div>
                            </fieldset>
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
<!--end modal add category-->



<!--end modal delete category-->

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
                      <th>slug</th>
                      <th>Status</th>
                      <th>Chỉnh sửa</th>
                  </tr>
              </thead>
              <tbody>
                 @foreach($category as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name_categorys}}</td>
                    <td>{{$category->slug}}</td>
                    @if($category->status == 1)
                      <td>hiển thị</td>
                     @elseif($category->status == 0)
                      <td>Không hiển thị</td>
                    @endif
                    <td><a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#edit{{$category->id}}" type="button">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm delete btn_delete" data-id="{{$category->id}}" href="#" data-toggle="modal" data-target="#delete">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                        </td>
                  </tr>
                  <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <form action="{{route('admin.category-edit',['id'=>$category->id])}}" role="form" method="POST">
                                          @csrf
                                          <fieldset class="form-group">
                                              <label>Name</label>
                                              <input class="form-control" id="name" name="name" value="{{$category->name_categorys}}">    
                                          </fieldset>
                                          <div class="error" style="font-size: 1rem; color: red;"></div>
                                          <div class="form-group">
                                            <label>Status</label>
                                              <select class="form-control" name="status">
                                                @if($category->status == 1)
                                                  <option value="1">Hiển Thị</option>
                                                @elseif($category->status == 0)
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
                <a href="{{route('admin.category-delete',['id'=>$category->id])}}" class="btn btn-success del">Có</a>
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