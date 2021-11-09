@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">printphotodetail {{ $printphotodetail->printphotodetailID }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/printphotodetail') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <!--
                        <a href="{{ url('/admin/printphotodetail/' . $printphotodetail->printphotodetailID . '/edit') }}" title="Edit printphotodetail"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        -->
                        <a href="{{ url('/admin/printphoto/' . $printphotodetail->printphotoID . '/edit') }}" title="Edit printphoto"><button class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไขสถานะ</button></a>

                        <form method="POST" action="{{ url('admin/printphotodetail' . '/' . $printphotodetail->printphotodetailID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete printphotodetail" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                
                                    <tr><th> รหัสรายละเอียดการอัดรูป </th><td> {{ $printphotodetail->printphotodetailID }} </td></tr>
                                    <tr><th> ชื่อ </th><td> {{ $printphotodetail->firstname }} </td></tr>
                                    <tr><th> นามสกุล </th><td> {{ $printphotodetail->lastname }} </td></tr>
                                    <tr><th> รูปภาพ </th><td> <img src="{{ url('/') }}/images/{{ $printphotodetail->imageFileName }}" width= '300px' height='300px'></td></tr>
                                    <tr><th> ขนาดรูป </th><td> {{ $printphotodetail->size }} </td></tr>
                                    <tr><th> ขอบรูป </th><td> {{ $printphotodetail->formatprint }} </td></tr>
                                    <tr><th> ชื่อสินค้า </th><td> {{ $printphotodetail->productname }} </td></tr>
                                    <tr><th> หมายเหตุ </th><td> {{ $printphotodetail->note }} </td></tr>
                                    <tr><th> ชนิดกระดาษ </th><td> {{ $printphotodetail->papername }} </td></tr>
                                    <tr><th> รหัสการอัดรูป </th><td> {{ $printphotodetail->printphotoID }} </td></tr>
                                    <tr><th> ราคารวม </th><td> {{ $printphotodetail->totalprice }} </td></tr>
                                    <tr><th> ใบเสร็จ </th><td> <img src="{{ url('/') }}/images/{{ $printphotodetail->imagebill }}" width= '300px' height='300px'></td></tr>
                                    <tr><th> สถานะ </th><td> <?php 
                                        if($printphotodetail->status == 0){
                                            echo "รอการชำระเงิน";
                                        }elseif($printphotodetail->status == 1){
                                            echo "ตรวจสอบใบเสร็จ";
                                        }elseif($printphotodetail->status == 2){
                                            echo "กำลังจัดส่ง";
                                        }elseif($printphotodetail->status == 3){
                                            echo "สินค้าถึงแล้ว";
                                        }elseif($printphotodetail->status == 4){
                                            echo "รับสินค้า";
                                        }elseif($printphotodetail->status == 5){
                                            echo "ชำระเงินไม่สำเร็จ";
                                        }else{
                                            echo "ไม่ทราบสถานะ";
                                        }
                                        ?> </td></tr>
                                    <tr><th> ยอดค้างชำระ </th><td> {{ $printphotodetail->comment }} </td></tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
