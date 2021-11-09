@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Booking {{ $booking->bookingID }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/booking') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/booking/' . $booking->bookingID . '/edit') }}" title="Edit Booking"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไขสถานะ</button></a>

                        <form method="POST" action="{{ url('admin/booking' . '/' . $booking->bookingID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Booking" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                      
                                    </tr>
                                    <tr><th> รหัสการจอง </th><td> {{ $booking->bookingID }} </td></tr>
                                    <tr><th> รหัสผู้ใช้งาน </th><td> {{ $booking->userID }} </td></tr>
                                    <tr><th> วันที่จอง </th><td> {{ $booking->date }} </td></tr>
                                    <tr><th> คิว </th><td> {{ $booking->queues }}</td></tr>
                                    <tr><tr><th> เวลา </th><td> {{ $booking->duration }} </td></tr>
                                    <tr><th> รูปแบบ </th><td> {{ $booking->formatname }} </td></tr>
                                    

                                    <tr><th> สถานะการทำงาน </th><td> <?php
                                          if($booking->status == 0){
                                            echo "ชำระค่ามัดจำ";
                                        }elseif($booking->status == 1){
                                            echo "ตรวจสอบใบเสร็จ";
                                        }elseif($booking->status == 2){
                                            echo "รอดำเนินการ";
                                        }elseif($booking->status == 3){
                                            echo "ถ่ายสำเร็จ";
                                        }elseif($booking->status == 4){
                                            echo "ชำระเงินไม่สำเร็จ";
                                        }else{
                                            echo "ไม่ทราบสถานะ";
                                        }
                                        ?> </td></tr>
                                    <tr><th> สถานะการชำระเงิน </th><td><?php
                                          if($booking->statuspayment == 0){
                                            echo "ชำระหลังการถ่าย";
                                        }elseif($booking->statuspayment == 1){
                                            echo "ชำระเงินครบแล้ว";
                                        }else{
                                            echo "ไม่ทราบสถานะ";
                                        }
                            
                                        ?> </td></tr>
                                        
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
