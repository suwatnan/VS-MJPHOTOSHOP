
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">user</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/users/' . $user->userID . '/edit') }}" title="Edit users"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/users' . '/' . $user->userID) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                            
                                    <tr><th> รหัสผู้ใช้ </th><td> {{ $user->userID }} </td></tr>
                                    <tr><th> Username </th><td> {{ $user->username }} </td></tr>
                                    <tr><th> ชื่อ </th><td> {{ $user->firstname }} </td></tr>
                                    <tr><th> นามสกุล</th><td> {{ $user->lastname }} </td></tr>
                                    <tr><th> ที่อยู่ </th><td> {{ $user->address }} </td></tr>
                                    <tr><th> เบอร์โทรศัพท์ </th><td> {{ $user->phone }} </td></tr>
                                    <tr><th> email </th><td> {{ $user->email }} </td></tr>
                                    <tr><th> type</th><td> {{ $user->user_type }} </td></tr>
                            
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
