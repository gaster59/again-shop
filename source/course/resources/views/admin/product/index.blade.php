@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Product</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Product</h1>

        <div class="col-12" style="margin-bottom: 10px;">
            <form method="get" class="form-inline" action="{{ route('admin.product.index') }}">                
                <input type="text" name="q" class="form-control" value="{{ $q }}" />
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('admin.product.add') }}" type="button" class="btn btn-primary">Add</a>
            </form>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->avatar != '')
                        <img data-toggle="modal" data-target="#myModal" class="img-thumbnail avatar" src="{{ $product->avatar }}" />
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('admin.product.add.image',['id' => $product->id]) }}" type="button" class="btn btn-primary">Add image</a>
                        <a href="{{ route('admin.product.edit',['id' => $product->id]) }}" type="button" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.product.delete',['id' => $product->id]) }}" type="button" class="btn btn-primary">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-center">
                        {!! $products->links() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div><!--/.row-->

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img id="avatar-dialog" src="//placehold.it/1000x600" class="img-responsive">
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $(function() {
        $('.avatar').click(function(e){
            $('#avatar-dialog').attr('src', $(this).attr('src'));
        });
    });
</script>
@endsection