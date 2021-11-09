@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">printphoto {{ $printphoto->printphotoID }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/printphoto') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/printphoto/' . $printphoto->printphotoID . '/edit') }}" title="Edit printphoto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/printphoto' . '/' . $printphoto->printphotoID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete printphoto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        
                                    </tr>
                                    <tr><th> รหัสการอัดรูป </th><td> {{ $printphoto->printphotoID }} </td></tr>
                                    <tr><th> สถานะ </th><td> <?php 
                                        if($printphoto->status == 0){
                                            echo "รอการชำระเงิน";
                                        }elseif($printphoto->status == 1){
                                            echo "ตรวจสอบใบเสร็จ";
                                        }elseif($printphoto->status == 2){
                                            echo "กำลังจัดส่ง";
                                        }elseif($printphoto->status == 3){
                                            echo "สินค้าถึงแล้ว";
                                        }elseif($printphoto->status == 4){
                                            echo "รับสินค้า";
                                        }elseif($printphoto->status == 5){
                                            echo "ชำระเงินไม่สำเร็จ";
                                        }else{
                                            echo "ไม่ทราบสถานะ";
                                        }
                                        ?> </td></tr>
                                    <tr><th> รหัสลูกค้า </th><td> {{ $printphoto->userID }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
