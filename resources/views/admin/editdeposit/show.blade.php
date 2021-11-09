@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">editdeposit {{ $editdeposit->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/editdeposit') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/editdeposit/' . $editdeposit->id . '/edit') }}" title="Edit editdeposit"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/editdeposit' . '/' . $editdeposit->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete editdeposit" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $editdeposit->id }}</td>
                                    </tr>
                                    <tr><th> EditdepositID </th><td> {{ $editdeposit->editdepositID }} </td></tr><tr><th> Imagedeposit </th><td> {{ $editdeposit->imagedeposit }} </td></tr><tr><th> BookingID </th><td> {{ $editdeposit->bookingID }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
