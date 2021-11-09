@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
@include('admin.sidebar')
    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    You are logged in! as admin
                    ยินดีต้อนรับเข้าสู่หน้าต่างการทำงาน 
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection


