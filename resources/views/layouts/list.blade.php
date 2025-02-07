@extends('layouts.main')
<!-- 大圖 -->
@section('header')

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
                        <h1 class="display-5 fw-bolder text-white mb-2">歡迎選購</h1>
                        <p class="lead fw-normal text-white mb-5">我們精選的美味餐點。</p>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                   
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')

<section class="py-2">
    <div class="container px-3 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder">產品列表</h2>
                    <p class="lead fw-normal text-muted mb-5">我們精選的美味餐點。</p>
                </div>
            </div>
        </div>
        <div class="row gx-5">
            <script>
                // Swal.fire('系統訊息!', '商品已加入購物車！', 'success');
            </script>

            @foreach($products as $product)
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img style="" class="card-img-top" src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}" />
                        <div class="card-body p-4">

                            <div style="display: flex; align-items: center;">
                                <!-- 左側區塊 -->
                                <div style="padding: 10px; flex: 4;">
                                    <h5 class="card-title mb-3">{{ $product['name'] }}</h5>
                                    <p class="card-text mb-0">${{ $product['price'] }}</p>
                                </div>
                                <!-- 右側區塊 -->
                                <div style="">
                                    <div>
                                        <h5>已加入: </h5>
                                        <button wire:click="add" class="btn btn-primary">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                        <button wire:click="reduce" class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                            </div>
                                                     
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
