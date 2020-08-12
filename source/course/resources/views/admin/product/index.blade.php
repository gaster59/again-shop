@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Icons</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product</h1>
        
        <a href="{{ route('admin.product.add') }}" type="button" class="btn btn-primary">Add</a>
        
        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->avatar }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('admin.product.edit',['id' => $product->id]) }}" type="button" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.product.delete',['id' => $product->id]) }}" type="button" class="btn btn-primary">Delete</a>
                    <form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div><!--/.row-->


@endsection