@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Formatprint</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/formatprint/create') }}" class="btn btn-success btn-sm" title="Add New formatprint">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/formatprint') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                       <th>รหัสขอบรูป</th><th>ขอบรูป</th><th>รูปตัวอย่างขอบรูป</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($formatprint as $item)
                                    <tr>
                                        
                                        <td>{{ $item->formatprintID }}</td><td>{{ $item->formatprint }}</td>
                                        <td><img src="{{ url('/') }}/images/{{ $item->imageFileName }}" width='100px' height='100px' class="img-thumbnail"></td>
                                        <td>
                                            <a href="{{ url('/admin/formatprint/' . $item->formatprintID) }}" title="View formatprint"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/formatprint/' . $item->formatprintID . '/edit') }}" title="Edit formatprint"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/formatprint' . '/' . $item->formatprintID) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete formatprint" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $formatprint->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
