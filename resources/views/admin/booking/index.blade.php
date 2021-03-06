@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Booking</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/booking/create') }}" class="btn btn-success btn-sm" title="Add New Booking">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/booking') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>รหัสการจอง</th> <th>รหัสผู้ใช้งาน</th><th>วันที่ทำการจอง</th><th>วันที่จอง</th><th>คิว</th><th>สถานะการทำงาน</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($booking as $item)
                                    <tr>
                                        
                                        <td>{{ $item->bookingID }}</td>
                                        <td>{{ $item->userID }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->queues }}</td>
                                      

                                        <!--<td>{{ $item->status }}</td>-->
                                        <td><?php 
                                        if($item->status == 0){
                                            echo "ชำระค่ามัดจำ";
                                        }elseif($item->status == 1){
                                            echo "ตรวจสอบใบเสร็จ";
                                        }elseif($item->status == 2){
                                            echo "รอดำเนินการ";
                                        }elseif($item->status == 3){
                                            echo "ถ่ายสำเร็จ";
                                        }elseif($item->status == 4){
                                            echo "ชำระเงินไม่สำเร็จ";
                                        }else{
                                            echo "ไม่ทราบสถานะ";

                                        }
                                        ?></td>






                                        <td>
                                            <a href="{{ url('/admin/booking/' . $item->bookingID) }}" title="View Booking"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/booking/' . $item->bookingID . '/edit') }}" title="Edit Booking"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไขสถานะ</button></a>

                                            <form method="POST" action="{{ url('/admin/booking' . '/' . $item->bookingID) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Booking" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $booking->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
