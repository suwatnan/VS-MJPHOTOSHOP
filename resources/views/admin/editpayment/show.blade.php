@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">editpayment {{ $editpayment->editpaymentID }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/editpayment') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/editpayment/' . $editpayment->editpaymentID . '/edit') }}" title="Edit editpayment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/editpayment' . '/' . $editpayment->editpaymentID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete editpayment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        
                                    </tr>
                                    <tr><th> รหัสค้างชำระ </th><td> {{ $editpayment->editpaymentID }} </td></tr>
                                   
                                    <tr><th> รูปใบเสร็จค้างชำระ </th><td> <img src="{{ url('/') }}/images/{{ $editpayment->imagebill2 }}" width= '300px' height='300px'></td></tr>
                                    <tr><th> รหัสการอัดรูป </th><td> {{ $editpayment->printphotoID }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
