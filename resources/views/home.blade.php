@extends('main')
@section('title')
    Home
@endsection
@section('content')
    <div class="container-fluid">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://images.vans.com/is/image/VansBrand/HO22_MTE_30OFF_DesktopLeaderboard_1420x290?wid=1420" style="height: 275px;" class="d-block w-100" alt="...">
                
              </div>
              <div class="carousel-item">
                <img src="https://silbermann-fashion.de/wp-content/uploads/2021/08/Garderobenservice_Slibermann_Dresden.jpg" style="height: 275px;" class="d-block w-100" alt="...">
                
              </div>
              <div class="carousel-item">
                <img src="https://3.bp.blogspot.com/-ScfZ_MsDAWo/Wz19tk3VGYI/AAAAAAAAIn4/nY8vvne8pRcyuMkBeeewYUT9H5uTuRUsgCLcBGAs/s1600/Bikin%2BCustom%2BJacket%2BHoodie%2BSatuan%2Bdan%2BLusinan%2B%25281%2529.png" style="height: 275px;" class="d-block w-100" alt="...">
                
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="container mt-3">
            <div class="mt-3 mb-3">
                <h4>
                    <i class="bi bi-box"></i> Our <strong> Product</strong>
                </h4>
            </div>
            <div class="row">
                @foreach($data as $item)
                <div class="col-md-3 mb-3">
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
    </div>
@endsection