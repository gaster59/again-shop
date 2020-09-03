@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Order</li>
    </ol>
</div><!--/.row-->

@php
$arrStatus = [
    0 => 'New',
    1 => 'Processing',
    2 => 'Done',
]
@endphp

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Order</h1>

        <div class="col-12" style="margin-bottom: 10px;">
            <form method="get" class="form-inline" action="{{ route('admin.order.index') }}">
                <input type="text" name="q" class="form-control" value="" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Memo</th>
                <th scope="col">Total</th>
                <th scope="col">Customer first name</th>
                <th scope="col">Customer last name</th>
                <th scope="col">Address</th>
                <th scope="col">Ship Address</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>
                    {{ $order->memo }}
                </td>
                <td>{{ number_format($order->total) }}</td>
                <td>{{ $order->customer_first_name }}</td>
                <td>{{ $order->customer_last_name }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->ship_address }}</td>
                <td>
                    {{ $arrStatus[$order->status] }}
                </td>
                <td>                    
                    <a href="{{ route('admin.order.detail',['id' => $order->id]) }}" type="button" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.order.delete',['id' => $order->id]) }}" type="button" class="btn btn-primary">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8" class="text-center">
                    {!! $orders->links() !!}
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