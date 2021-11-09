@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">payment {{ $payment->paymentID }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/payment') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/payment/' . $payment->paymentID . '/edit') }}" title="Edit payment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/payment' . '/' . $payment->paymentID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete payment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        
                                    </tr>
                                    <tr><th> รหัสจ่ายเงิน </th><td> {{ $payment->paymentID }} </td></tr><tr><th> รหัสการอัดรูป </th><td> {{  $payment->printphotoID }} </td></tr>
                                    <tr><th> รูปใบเสร็จ </th><td> <img src="{{ url('/') }}/images/{{ $payment->imagebill }}" width= '300px' height='300px'></td></tr>
                                    <tr><th> ค้างชำระ </th><td> {{ $payment->comment }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
