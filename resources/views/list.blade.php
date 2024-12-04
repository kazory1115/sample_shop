@extends('layouts.main')

@section('content')
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder">產品列表</h2>
                    <p class="lead fw-normal text-muted mb-5">我們精選的美味甜點。</p>
                </div>
            </div>
        </div>
        <div class="row gx-5">
            @foreach($products as $product)
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img style="height:270px;" class="card-img-top" src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}" />
                        <div class="card-body p-4">
                            <h5 class="card-title mb-3">{{ $product['name'] }}</h5>
                            <p class="card-text mb-0">${{ $product['price'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
