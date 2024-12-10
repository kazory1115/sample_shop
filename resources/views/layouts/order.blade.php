@extends('layouts.main')

@section('header')
<!-- 大圖 -->
<header class="bg-dark "style=" background-image: url('https://images.deliveryhero.io/image/fd-tw/LH/tbyu-listing.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100px;          
    max-height: 400px;                
    ">
    <div style="backdrop-filter:blur(2px) brightness(0.5);-webkit-backdrop-filter:blur(2px) brightness(0.5);">
        <div class="container px-5" >
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">我的訂單紀錄</h1>
                    
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                    {{-- <img class="img-fluid rounded-3 my-5" src="https://images.deliveryhero.io/image/fd-tw/LH/tbyu-listing.jpg" alt="..." /> --}}
                
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<section class="py-2">
    <div class="container px-3 my-5 " style="background: yellow">
        <div class="row gx-5 justify-content-center" style="background: yellow">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder">產品列表</h2>
                    <p class="lead fw-normal text-muted mb-5">我們精選的美味餐點。</p>
                </div>
            </div>
        </div>
        <div class="row gx-5"  style="background: rgb(23, 141, 111)">
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">
                    {{-- <img style="" class="card-img-top" src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}" /> --}}
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
