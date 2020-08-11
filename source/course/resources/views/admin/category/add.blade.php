@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li>Category</li>
        <li class="active">Add</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category - Add</h1>
        
        <form method="post" action="{{ route('admin.category.doAdd') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name', '') }}">
                    @if($errors->has('name'))
                        <div class="error text-danger">{{ $errors->first('name') }}</div>
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
                <button type="cancel" class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </form>

    </div>
</div><!--/.row-->


@endsection