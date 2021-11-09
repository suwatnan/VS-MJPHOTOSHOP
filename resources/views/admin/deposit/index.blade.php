@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Deposit</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/deposit/create') }}" class="btn btn-success btn-sm" title="Add New deposit">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/deposit') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                       </th><th>รหัสการจอง</th><th>ค่ามัดจำ</th><th>ใบเสร็จค่ามัดจำ</th><th>ค้างชำระ</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($deposit as $item)
                                    <tr>   
                                    <td>{{ $item->bookingID }}</td>
                                    <td>{{ $item->price }}</td>
                                        <td><img src="{{ url('/') }}/images/{{ $item->imagedeposit }}" width='100px' height='100px' class="img-thumbnail"></td>
                                        <td>{{ $item->comment }}</td>
                                        <td>
                    
                                            <a href="{{ url('/admin/deposit/' . $item->depositID) }}" title="View deposit"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/deposit/' . $item->depositID . '/edit') }}" title="Edit deposit"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/deposit' . '/' . $item->depositID) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete deposit" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $deposit->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
