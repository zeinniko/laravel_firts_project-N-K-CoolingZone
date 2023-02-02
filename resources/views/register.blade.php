@extends('main')
@section('title')
    Register
@endsection
@section('content')
<div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card mt-3">
                <div class="card-header">
                    Form <strong>Register</strong>
                </div>
                <div class="card-body">
                    @if(Session::has('msg'))
                    <div class="alert alert-success">
                        {{Session::get('msg')}}
                    </div>
                    @endif
                    <form action="{{url('register')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input value="{{old('name')}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type full name ...">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">E-mail</label>
                            <input value="{{old('email')}}" type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Type email ...">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Type password ...">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Type confirm password ...">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-box-arrow-in-right"></i> Register
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

