@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Login Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>


<form method="POST" action="/authenticate">
    <label >Email</label>
        <input type="email" class="form-control" name="email" value="{{old('email')}}"><br>
    <label >Password</label>
        <input type="password" class="form-control" name="password"><br>
    <div class="forgot">
        <a href="{{route('forgot.password.get')}}">Forgot password</a>
    </div>
    <input class="btn btn-success" type="submit" value="Login">
    @csrf
</form>
    </div>
@endsection

