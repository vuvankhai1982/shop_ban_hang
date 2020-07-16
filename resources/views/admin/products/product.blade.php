@extends('admin.layout.admin_layout')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách sản phẩm</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{asset('admin/products/create')}}" class="btn btn-primary">Thêm sản phẩm</a>
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th width="30%">Tên Sản phẩm</th>
                                        <th>Giá sản phẩm</th>
                                        <th width="20%">Ảnh sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{number_format($product->unit_price,0,',', '.')}} VND</td>
                                        <td>
                                            <img width="200px" src="{{asset('images/'.$product->image)}}" class="thumbnail">
                                        </td>
                                        <td>{{$product->category_id}}</td>
                                        <td>
                                            <a href="{{asset('admin/products/'.$product->id)}}" class="btn btn-warning"><span  class="glyphicon glyphicon-edit"></span> Sửa</a>
{{--                                            <a href="{{route('products.destroy', $product->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>--}}
                                            <form style="float: right" action="{{ route('products.destroy', $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="btn btn-danger"><span  class="glyphicon glyphicon-trash"></span>Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{ $products->links() }}
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->

@endsection
