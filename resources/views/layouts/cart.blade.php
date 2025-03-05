@extends('layouts.main')

@section('header')
<!-- 大圖 -->
<header class="bg-dark " style=" background-image: url('https://images.deliveryhero.io/image/fd-tw/LH/tbyu-listing.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100px;          
    max-height: 400px;                
    ">
    <div style="backdrop-filter:blur(2px) brightness(0.5);-webkit-backdrop-filter:blur(2px) brightness(0.5);">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">我的購物車</h1>

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
    <div class="container px-3 my-5" style="border: 1px solid #ccc; border-radius: 10px; padding: 20px">
        <div class="justify-content-center" style="margin: 24px">

            @if ($status == 1)
            @foreach($cartlist as $product)
            <div style="display: grid; grid-template-columns:1.5fr 1.5fr 1fr; margin: 20px  0px  20px 0px;">
                <div style="width: 90%;">
                    <img style="width: 90%;border: 1px solid #ccc; border-radius: 10px;" src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}" />
                </div>
                <div style="width: 90%; padding-top:5%">
                    <div style="font-size:clamp(16px, 2vw, 32px); ">
                        {{$product['name']}}
                    </div>
                    <div style="font-size:clamp(9px, 1.5vw, 22px); ">
                        {{$product['description']}}
                    </div>

                    {{-- style="font-size:clamp(15px, 2vw, 20px); " --}}
                </div>

                <div style="display: grid; grid-template-rows:1fr  1fr;">

                    <div style=" display: flex; justify-content: flex-end;">
                        {{-- <a class="nav-link" href="{{ route('cartdel', ['product' => $product->id]) }}">
                        <i class="fa-solid fa-trash-can"></i>
                        </a> --}}

                        <form action="{{ route('cartdel', ['product' => $product->id]) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link p-0 b" style="color: gray;font-size:clamp(16px, 2vw, 32px);">
                                <i class="fa-solid fa-trash-can "></i>
                            </button>
                        </form>

                    </div>
                    <div style="display: flex; justify-content: flex-end;align-items: flex-end;">
                        <span style="font-size:clamp(16px, 2vw, 32px);"> ${{$product['price']}} </span>
                    </div>
                </div>
            </div>




            <hr>
            @endforeach
            <br>

            <div style="display: flex;align-content: flex-end;justify-content: flex-end;align-items: flex-end;">
                <h3>
                    訂單總額：${{$total}}
                </h3>

            </div>
            <div style="display: flex;align-content: flex-end;justify-content: flex-end;align-items: flex-end;">
                @if (auth()->check())
                <form action="{{ route('createorder',['total' => $total]) }}" method="POST" style="display: inline;">
                    @csrf
                    {{-- @method('DELETE') --}}

                    <button type="submit" class="btn btn-outline-success" style="margin-top: 30px ;">確定結帳</button>
                </form>
                @else
                <button type="submit" class="btn btn-outline-success" style="margin-top: 24px ;">前往登入</button>
                @endif




            </div>

            @else
            <div style="color:#888">
                <h3>目前購物車無餐點</h3>
                <h5><a class="" href="{{ route('list') }}">前往選購</a></h5>
            </div>

            @endif




        </div>

    </div>
</section>
@endsection