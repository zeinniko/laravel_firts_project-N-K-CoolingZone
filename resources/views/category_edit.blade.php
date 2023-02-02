@extends('main')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="container mt-2">
        <h4>Edit Category</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('/category')}}">Category</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <strong>Edit</strong> Form
                </div>
                <div class="card-body">
                        @if(Session::has('msg'))
                            <div class="card alert alert-success">
                                {{Session::get('msg')}}
                            </div>
                        @endif

                        <form action="{{url('category-edit')}}/{{$data->id}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input value="{{old('name',$data->name)}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type category name ...">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Process
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
