@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('admin.quiz.index') }}">Quiz</a></li>
        <li class="active">Add</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quiz - Add</h1>
        
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.quiz.doAdd') }}">
            @csrf
            
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name', '') }}" onchange="createSlug(this)" />
                    @if($errors->has('name'))
                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Slug</label>
                <div class="col-sm-10">
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{ old('slug', '') }}">
                    @if($errors->has('slug'))
                        <div class="error text-danger">{{ $errors->first('slug') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description">{{ old('description', '') }}</textarea>
                    @if($errors->has('description'))
                        <div class="error text-danger">{{ $errors->first('description') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="summary" class="col-sm-2 col-form-label">Summary</label>
                <div class="col-sm-10">
                    <textarea class="form-control ckeditor" id="summary" name="summary">{{ old('summary', '') }}</textarea>
                    @if($errors->has('summary'))
                        <div class="error text-danger">{{ $errors->first('summary') }}</div>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Start</label>
                <div class="col-sm-10">
                    <input type="text" name="startsAt" class="form-control" id="startsAt" value="{{ old('startsAt', '') }}">
                    @if($errors->has('startsAt'))
                        <div class="error text-danger">{{ $errors->first('startsAt') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="price_down" class="col-sm-2 col-form-label">End</label>
                <div class="col-sm-10">
                    <input type="text" name="endsAt" class="form-control" id="endsAt" value="{{ old('endsAt', '') }}">
                    @if($errors->has('endsAt'))
                        <div class="error text-danger">{{ $errors->first('endsAt') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="meta_tags" class="col-sm-2 col-form-label">Meta tags</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="meta_tags" name="meta_tags">{{ old('meta_tags', '') }}</textarea>
                    @if($errors->has('meta_tags'))
                        <div class="error text-danger">{{ $errors->first('meta_tags') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="meta_description" class="col-sm-2 col-form-label">Meta description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="meta_description" name="meta_description">{{ old('meta_description', '') }}</textarea>
                    @if($errors->has('meta_description'))
                        <div class="error text-danger">{{ $errors->first('meta_description') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </form>

    </div>
</div><!--/.row-->

@endsection

@section("js")
<script src="{{ URL::asset('admin/js/slugify.js') }}"></script>
<script src="{{ URL::asset('admin/js/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.config.filebrowserImageUploadUrl = '{!! route('admin.uploader.saveImage').'?_token='.csrf_token() !!}';
    CKEDITOR.config.filebrowserUploadMethod = 'form';
    var urlSaveImage = "{{ route('admin.uploader.saveImage') }}";
    $(function(){
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImg').attr('src', e.target.result);
                    $('#hdnAvatar').val(e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#avatar").change(function() {
            readURL(this);
        });
    });

    function createSlug(self) {
        var text = $(self).val();
        var slug = string_to_slug(text);
        $('#slug').val(slug);
    }
</script>
@endsection