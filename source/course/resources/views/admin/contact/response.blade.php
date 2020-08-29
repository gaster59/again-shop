@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('admin.contact.index') }}">Contact</a></li>
        <li class="active">Response</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contact - Response</h1>
        
        <form method="post" enctype="multipart/form-data" action="{{ route('admin.contact.response.message', ['id' => $contact->id]) }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" disabled class="form-control" id="name" placeholder="Name" value="{{ $contact->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" disabled id="message" name="message">{{ $contact->message }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Response</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="response" name="response">{{ $contact->response }}</textarea>
                    @if($errors->has('response'))
                        <div class="error text-danger">{{ $errors->first('response') }}</div>
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
</script>
@endsection