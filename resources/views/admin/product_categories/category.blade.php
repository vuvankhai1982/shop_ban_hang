@extends('admin.layout.admin_layout')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Thêm danh mục
                    </div>
                    <div class="panel-body">
                        <form action="{{asset('admin/product-categories')}}" method="post">
                        <div class="form-group">
                            <label>Tên danh mục:</label>
                            <input type="text" name="name" class="form-control" placeholder="Tên danh mục...">
                        </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-7 col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách danh mục</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="bg-primary">
                                    <th>Tên danh mục</th>
                                    <th style="width:30%">Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <div>
                                        <a href="{{asset('admin/product-categories/'.$category->id)}}" class="btn btn-warning"><span  class="glyphicon glyphicon-edit"></span> Sửa</a>
{{--                                        <a href="{{ route('product-categories.destroy', $category->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>--}}
                                            <form style="float: right" action="{{ route('product-categories.destroy', $category->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="btn btn-danger"><span  class="glyphicon glyphicon-trash"></span>Xóa</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
@endsection
