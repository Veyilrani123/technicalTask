@extends('layouts.header')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login-form">
                <div class="card-body login-section">
                    <h2>Login</h2>
                    <form class="pt-3" method="POST" action="{{ route('loginPost') }}">
                        @csrf
                        <div class="form-group pb-3">
                            <label>User Name</label>
                            <input required type="text" name="user_name" class="inputField form-control" id="exampleInputEmail1" placeholder="Enter your username">
                        </div>
                        <div class="form-group pb-3">
                            <label>Password</label>
                            <input required type="password" name="password" class="inputField form-control" id="exampleInputPassword" placeholder="Enter your password">
                        </div>
                        <div class="form-group pb-3 col-lg-12">
                            <button class="form-control form-control-lg btn btn-primary" type="submit">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
