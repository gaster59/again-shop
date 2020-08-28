@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Blog</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Blog</h1>

        <a href="{{ route('admin.blog.add') }}" type="button" class="btn btn-primary">Add</a>

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
            @foreach($blogs as $blog)
            <tr>
                <td>
                    @if($blog->avatar != '')
                    <img data-toggle="modal" data-target="#myModal" class="img-thumbnail avatar" src="{{ $blog->avatar }}" />
                    @endif
                </td>
                <td>{{ $blog->name }}</td>
                <td>{{ $blog->slug }}</td>
                <td>{{ $blog->description }}</td>
                <td>
                    <a href="{{ route('admin.blog.edit',['id' => $blog->id]) }}" type="button" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.blog.delete',['id' => $blog->id]) }}" type="button" class="btn btn-primary">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-center">
                    {!! $blogs->links() !!}
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