@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Contact</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Contact</h1>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr class="{{ $contact->status == 1 ? 'bg-response text-white' : '' }}">
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td>
                    <a href="{{ route('admin.contact.response',['id' => $contact->id]) }}" type="button" class="btn btn-primary">Response</a>
                    <a href="{{ route('admin.contact.delete',['id' => $contact->id]) }}" type="button" class="btn btn-primary">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-center">
                    {!! $contacts->links() !!}
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