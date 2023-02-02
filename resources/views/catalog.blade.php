@extends('main')
@section('title')
    Catalog
@endsection
@section('content')
    <div class="container mt-3">
        <h4>Catalog</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Catalog</li>
            </ol>
        </nav>
        <div class="mt-3 mb-3">
            <form action="{{url('catalog')}}">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Type a name product ...">
                    <button class="btn btn-danger" id="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach($data as $item)
            <div class="col-md-2 mb-3">
                <div class="card">
                    <img src="{{url('images')}}/{{$item->photo}}" alt="" class="img-fluid">
                    <div class="p-2">
                        <h5>{{$item->name}}</h5>
                        <h6>Rp{{number_format($item->price)}}</h6>
                        <div>
                            <small class="text-secondary">
                                {{$item->seller->name}}
                            </small>
                        </div>
                        <a href="https://api.whatsapp.com/send?phone=6289681676100&text={{urlencode("Hallo saya mau beli $item->name")}}" class="btn btn-success w-100">
                            <i class="bi bi-whatsapp"></i> BUY
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection