@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 shadow p-2 mb-0 ">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body   mx-auto">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>You are logged in!</h1>
                    <div class="mx-auto ">
                        <img src="{{asset('images/linux1.png')}}", alt="image-linux " width="250" height="300">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
