@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">product {{ $product->productID }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/product/' . $product->productID . '/edit') }}" title="Edit product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/product' . '/' . $product->productID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                
                                    <tr><th> รหัสสินค้า </th><td> {{ $product->productID }} </td></tr>
                                    <tr><th> รูปสินค้า </th><td> <img src="{{ url('/') }}/images/{{ $product->imageFileName }}" width= '300px' height='300px'></td></t>
                                    <tr><th> ชื่อสินค้า </th><td> {{ $product->productname }} </td></tr>
                                    <tr><th> ขนาดสินค้า </th><td> {{ $product->size }} </td></tr>
                                    <tr><th> ราคา </th><td> {{ $product->price }} </td></tr>
                                    <tr><th> จำนวน </th><td> {{ $product->quantity }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
