@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('admin.product.index') }}">Product</a></li>
        <li class="active">Add image</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product - Add image</h1>
        
        @php
        $productImages = [];
        if(count($images) > 0) {
            $productImages = $images;
        }
        if(!empty(old('productImage'))) {
            $productImages = old('productImage');
        }
        @endphp

        <form method="post" enctype="multipart/form-data" action="{{ route('admin.product.add.doimage', ['id' => $product->id]) }}">
            @csrf
            <div id="group-image">
                @if(empty($productImages))
                <div class="form-group row area-image" id="area-image0">
                    <label for="name" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-2">
                        <input type="file" data-index="0" name="productImage[0][file]" class="form-control-file" accept="image/*" onchange="previewImage(this);" />
                        <img class="imgPreview" id="previewImg0" src="" />
                        <input type="hidden" name="productImage[0][path]" id="path0" value="" />
                        @if($errors->has('productImage.*.path'))
                            <div class="error text-danger">{{ $errors->first('productImage.*.path') }}</div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="5" id="description_image0" name="productImage[0][description_image]" max-length="100"></textarea>
                        @if($errors->has('productImage.*.description_image'))
                            <div class="error text-danger">{{ $errors->first('productImage.*.description_image') }}</div>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary delete-area" data-index="0" onClick="deleteAreaImage(this);">Delete</button>
                    </div>
                    <input type="hidden" name="productImage[0][id]" id="imageId0" value="" />
                </div>
                @else

                @foreach ($productImages as $key => $item)
                <div class="form-group row area-image" id="area-image{{ $key }}">
                    <label for="name" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-2">
                        <input type="file" data-index="{{ $key }}" name="productImage[{{ $key }}][file]" class="form-control-file" accept="image/*" onchange="previewImage(this);" />
                        <img class="imgPreview" id="previewImg{{ $key }}" src="{{ $item['path'] ?? '' }}" />
                        <input type="hidden" name="productImage[{{ $key }}][path]" id="path{{ $key }}" value="{{ $item['path'] ?? '' }}" />
                        @if($errors->has("productImage.$key.path"))
                            <div class="error text-danger">{{ $errors->first("productImage.$key.path") }}</div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="5" id="description_image0" 
                            name="productImage[{{ $key }}][description_image]" max-length="100">{{ $item['description_image'] ?? '' }}</textarea>
                        @if($errors->has("productImage.$key.description_image"))
                            <div class="error text-danger">{{ $errors->first("productImage.$key.description_image") }}</div>
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" data-index="{{ $key }}" onClick="deleteAreaImage(this);">Delete</button>
                    </div>
                    <input type="hidden" name="productImage[{{ $key }}][id]" id="imageId{{ $key }}" value="{{ $item['id'] ?? '' }}" />
                </div>
                @endforeach

                @endif
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
    <div class="form-group row area-image" id="area-imagexxx">
        <label for="name" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-2">
            <input type="file" data-index="xxx" name="productImage[xxx][file]" class="form-control-file" accept="image/*" onchange="previewImage(this);" />
            <img class="imgPreview" id="previewImgxxx" src="" />
            <input type="hidden" name="productImage[xxx][path]" id="pathxxx" value="" />
        </div>
        <div class="col-sm-6">
            <textarea class="form-control" rows="5" id="description_imagexxx" name="productImage[xxx][description_image]" max-length="100"></textarea>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" data-index="xxx" onClick="deleteAreaImage(this);">Delete</button>
        </div>
        <input type="hidden" name="productImage[xxx][id]" id="imageIdxxx" value="" />
    </div>
</div>

@endsection

@section("js")
<script type="text/javascript">
    var urlDeleteImage = "{{ route('admin.product.add.deleteimage') }}";
</script>
<script type="text/javascript" src="{{ asset('admin/js/addimage.js') }}"></script>
@endsection