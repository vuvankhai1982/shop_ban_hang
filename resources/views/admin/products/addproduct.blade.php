@extends('admin.layout.admin_layout')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm sản phẩm</div>
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="form-group" >
                                        <label>Tên sản phẩm</label>
                                        <input required type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Giá sản phẩm</label>
                                        <input required type="number" name="unit_price" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Ảnh sản phẩm</label>
                                        <input required id="img" type="file" name="image" class="form-control hidden" onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="300px" src="admin/img/new_seo-10-512.png">
                                    </div>
{{--                                    <div class="form-group" >--}}
{{--                                        <label>Phụ kiện</label>--}}
{{--                                        <input required type="text" name="accessories" class="form-control">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group" >--}}
{{--                                        <label>Bảo hành</label>--}}
{{--                                        <input required type="text" name="warranty" class="form-control">--}}
{{--                                    </div>--}}
                                    <div class="form-group" >
                                        <label>Khuyến mãi</label>
                                        <input required type="text" name="promotion_price" class="form-control">
                                    </div>
{{--                                    <div class="form-group" >--}}
{{--                                        <label>Tình trạng</label>--}}
{{--                                        <input required type="text" name="condition" class="form-control">--}}
{{--                                    </div>--}}
                                    <div class="form-group" >
                                        <label>Trạng thái</label>
                                        <select required name="status" class="form-control">
                                            <option value="1">cong bo</option>
                                            <option value="0">nhap</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Miêu tả ngan</label>
                                        <textarea required name="description"  ></textarea>
                                    </div>
                                    <div class="form-group" >
                                        <label>Miêu tả</label>
                                        <textarea required name="content"  class="ckeditor" ></textarea>
                                        <script type="text/javascript">
                                            var editor = CKEDITOR.replace('description',{
                                                language:'vi',
                                                filebrowserImageBrowseUrl: '../../admin/ckfinder/ckfinder.html?Type=Images',
                                                filebrowserFlashBrowseUrl: '../../admin/ckfinder/ckfinder.html?Type=Flash',
                                                filebrowserImageUploadUrl: '../../admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                filebrowserFlashUploadUrl: '../../admin/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            });
                                        </script>

                                    </div>
                                    <div class="form-group" >
                                        <label>Danh mục</label>
                                        <select required name="category_id" class="form-control">
                                            @foreach($categories as $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
{{--                                    <div class="form-group" >--}}
{{--                                        <label>Sản phẩm nổi bật</label><br>--}}
{{--                                        Có: <input type="radio" name="featured" value="1">--}}
{{--                                        Không: <input type="radio" checked name="featured" value="0">--}}
{{--                                    </div>--}}
                                    <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                    <a href="#" class="btn btn-danger">Hủy bỏ</a>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
@endsection
