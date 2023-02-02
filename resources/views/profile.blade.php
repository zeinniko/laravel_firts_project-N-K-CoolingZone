@extends('main')
@section('title')
    Profile
@endsection
@section('content')
    <div class="container-fluid">
        <h4 class="mb-0">Profile</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>  
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card mt-3">
                <div class="card-header">
                    Form <strong>Profile</strong>
                </div>
                <div class="card-body">

                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    <form action="{{url('profile')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input value="{{old('name',Auth::user()->name)}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type full name ...">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">E-mail</label>
                            <input value="{{old('email',Auth::user()->email)}}" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Type email ...">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <hr>
                        <h6>
                            <i class="bi bi-lock"></i> Change Password
                        </h6>
                        <div class="mb-3">
                            <label for="old_password">Old Password</label>
                            <input type="password" name="old_password" id="old_password" class="form-control @error('password') is-invalid @enderror" placeholder="Type old password ...">
                            @error('old_password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Type password ...">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">New Password Confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Type confirmation password ...">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Process
                        </button>
                        <button type="reset" class="btn btn-light">
                            Reset
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection