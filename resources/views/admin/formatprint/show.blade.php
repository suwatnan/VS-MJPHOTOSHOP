@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">formatprint {{ $formatprint->formatprintID }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/formatprint') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/formatprint/' . $formatprint->formatprintID . '/edit') }}" title="Edit formatprint"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/formatprint' . '/' . $formatprint->formatprintID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete formatprint" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                    </tr>
                                    <tr><th> รหัสขอบรูป </th><td> {{ $formatprint->formatprintID }} </td></tr>
                                    <tr><th> ขอบรูป </th><td> {{ $formatprint->formatprint }} </td></tr>
                                    <tr><th> รูปตัวอย่างขอบรูป </th><td> <img src="{{ url('/') }}/images/{{ $formatprint->imageFileName }}" width= '300px' height='300px'></td></tr>
                                   
                                   
                                   
                                   
                                  
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
