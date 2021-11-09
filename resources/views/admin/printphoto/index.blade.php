@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Printphoto</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/printphoto/create') }}" class="btn btn-success btn-sm" title="Add New printphoto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/printphoto') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>รหัสการอัดรูป</th><th>สถานะ</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($printphoto as $item)
                                    <tr>
                                    <td>{{ $item->printphotoID }}</td>
                                        
                                        <!--<td>{{ $item->status }}</td>-->
                                        <td><?php 
                                        if($item->status == 0){
                                            echo "รอการชำระเงิน";
                                        }elseif($item->status == 1){
                                            echo "ตรวจสอบใบเสร็จ";
                                        }elseif($item->status == 2){
                                            echo "กำลังจัดส่ง";
                                        }elseif($item->status == 3){
                                            echo "สินค้าถึงแล้ว";
                                        }elseif($item->status == 4){
                                            echo "รับสินค้า";
                                        }elseif($item->status == 5){
                                            echo "ชำระเงินไม่สำเร็จ";
                                        }else{
                                            echo "ไม่ทราบสถานะ";
                                        }
                                        ?></td>

                                        <td>
                                            <a href="{{ url('/admin/printphoto/' . $item->printphotoID) }}" title="View printphoto"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/printphoto/' . $item->printphotoID . '/edit') }}" title="Edit printphoto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/printphoto' . '/' . $item->printphotoID) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete printphoto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $printphoto->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
