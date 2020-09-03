@extends('layout.admin')

@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('admin.order.index') }}">Order</a></li>
        <li class="active">Order detail</li>
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
        <h1 class="page-header">Order detail</h1>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Order id</th>
                <th scope="col">Product name</th>
                <th scope="col">price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails as $orderDetail)
            <tr>
                <td>
                    {{ $orderDetail->order_id }}
                </td>
                <td>{{ $orderDetail->product_name }}</td>
                <td>{{ number_format($orderDetail->price) }}</td>
                <td>{{ $orderDetail->quantity }}</td>
                <td>{{ number_format($orderDetail->total) }}</td>
            </tr>
            @endforeach
        </tbody>
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