@extends('layouts.app')
    @section('content')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
<h1>Registration Page</h1>
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




<form method="POST" action="/store">
    <div>
<label  >Name </label>
    <input type="text/" class="form-control" name="name" value="{{old('name')}}"><br>
<label >Email</label>
    <input type="text/email" class="form-control" name="email" value="{{old('email')}}"><br>
<label >Password</label>
    <input type="password" class="form-control" name="password"><br>
<label >Confirm password</label>
    <input type="text" class="form-control" name="password_confirmation"><br>
<input class="btn btn-success" type="submit" value="Register"><br>
        <a href="/login">Already Registered Customers Login here</a>
    </div>
@csrf
</form>
        </div>
@endsection
