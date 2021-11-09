@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('admin.sidebar')
        
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">MJ  Photo Shop</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome MJ  Photo Shop!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
