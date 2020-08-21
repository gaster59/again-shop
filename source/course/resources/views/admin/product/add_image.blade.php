@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('admin.product.index') }}">Product</a></li>
        <li class="active">Add</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product - Add image</h1>
        
        <form method="post" enctype="multipart/form-data" action="">
            @csrf
            <div id="group-image">
                <div class="form-group row area-image" data-index="0">
                    <label for="name" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-2">
                        <input type="file" data-index="0" name="productImage[]['file']" class="form-control-file" accept="image/*" onchange="previewImage(this);" />
                        <img class="imgPreview" id="previewImg0" src="" />
                        <input type="hidden" name="productImage[]['path']" id="path0" value="" />
                    </div>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="5" id="description_image0" name="productImage[]['description_image']"></textarea>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary delete-area" data-index="0">Delete</button>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="button" id="add-more" class="btn btn-primary">Add more image</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </form>

    </div>
</div><!--/.row-->

<div class="draft">
    <div class="form-group row area-image" data-index="xxx">
        <label for="name" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-2">
            <input type="file" data-index="xxx" name="productImage[]['file']" class="form-control-file" accept="image/*" onchange="previewImage(this);" />
            <img class="imgPreview" id="previewImgxxx" src="" />
            <input type="hidden" name="productImage[]['path']" id="pathxxx" value="" />
        </div>
        <div class="col-sm-6">
            <textarea class="form-control" rows="5" id="description_imagexxx" name="productImage[]['description_image']"></textarea>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary delete-area" data-index="xxx">Delete</button>
        </div>
    </div>
</div>

@endsection

@section("js")
<script type="text/javascript" src="{{ asset('admin/js/addimage.js') }}"></script>
@endsection