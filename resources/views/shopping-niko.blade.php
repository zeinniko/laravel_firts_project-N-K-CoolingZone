@extends('main')
@section('title')
    Shopping Form
@endsection
@section('content')
<div class="container-fluid">
    <h4>Shopping Form</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shopping Form</li>
            </ol>
        </nav>
        <div class="col-md-8 offset-md-2">
            <div class="card mt-3">
                <div class="card-header">
                    <strong>BUYER</strong> DETAIL
                </div>
                <div class="card-body">
                <form action="{{url('shopping-niko')}}" method="post">
                @csrf
                @if(Session::has('msg'))
                    <div class="alert alert-success">
                        {{Session::get('msg')}}
                    </div>
                @endif
                @if(Session::has('msgerror'))
                    <div class="alert alert-danger">
                        {{Session::get('msgerror')}}
                    </div>
                @endif
                @if($errors->any())
                <div class="alert alert-info">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input value="{{old('name')}}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Input your name ...">
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp">Whatsapp</label>
                        <input value="{{old('whatsapp')}}" type="text" name="whatsapp" id="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" placeholder="Input your whatsapp number ...">
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <textarea value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="15" rows="10" placeholder="Input your address ..."></textarea>
                    </div>
                </div>
                <div class="card-header">
                    <strong>ITEM</strong> DETAIL
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="product">Choose Product</label>
                        <select name="product" id="product" class="form-control">
                            <option value="">Choose</option>
                            @foreach ($product as $item)
                                <option value="{{$item->id}}">{{$item->name}} -  {{$item->price}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="qty">QTY</label>
                        <input value="{{old('qty')}}" type="text" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="Input qty ...">
                    </div>
                    <div class="mb-3">
                        <label for="note">Note</label>
                        <textarea value="{{old('note')}}" class="form-control @error('note') is-invalid @enderror" name="note" id="address" cols="15" rows="10" placeholder="Input your note *) If Needed"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">
                        <i class="bi bi-bag"></i> BUY
                    </button>    
                </div> 
                </form>
            </div>
        </div>
    </div>
@endsection
