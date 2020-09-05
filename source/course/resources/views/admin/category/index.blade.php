@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Category</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category</h1>
        
        <div class="col-12" style="margin-bottom: 10px;">
            <a href="{{ route('admin.category.add') }}" type="button" class="btn btn-primary">Add</a>
        </div>
        
        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('admin.category.edit',['id' => $category->id]) }}" type="button" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.category.delete',['id' => $category->id]) }}" type="button" class="btn btn-primary">Delete</a>
                    <form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div><!--/.row-->

@endsection