@extends('main')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="container mt-2">
        <h4>Edit Product</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('/product')}}">Product</a></li>
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

                        <form action="{{url('product-edit')}}/{{$data->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="category">Choose Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Choose</option>
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}" @if($item->id == $data->category_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input value="{{old('name',$data->name)}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Type product name ...">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price">Price</label>
                                <input value="{{old('price',$data->price)}}" type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Type product price ...">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="mt-3 mb-3">
                                    <img src="{{url('images')}}/{{$data->photo}}" alt="" class="img-fluid w-50">
                                </div>
                                <label for="photo">Photo</label>
                                <input value="{{old('price')}}" type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
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
