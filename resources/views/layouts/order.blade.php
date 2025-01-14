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
    <div class="container px-3 my-5 "    style=" border: 1px solid; border-radius: 15px;">
        
        <div class="col-lg-8 col-xl-6" style="width: 100%">
            <div style="background: yellow; padding-top:10px">
                訂單編號:
                {{-- 大表 --}}
                <div>
                {{-- 小表 --}}
                  
                    <div style="display: grid; grid-template-columns:1fr 3fr ; margin: 20px  0px  20px 0px;padding-top: 10px;padding-bottom: 10px;">         
                        <div  style="width:90%;" >
                            <img style="width: 90%;border: 1px solid #ccc; border-radius: 10px;" src="https://images.deliveryhero.io/image/fd-tw/Products/66210642.jpg"  />  
                        </div>  
                                        

                        <div  style="width: 90%;">
                            <div style="font-size:clamp(16px, 2vw, 32px); margin-bottom: 10px;">
                                {{-- {{$product['name']}} --}}
                                名稱
                            </div>
                            <div style="font-size:clamp(9px, 1.5vw, 22px); margin-bottom: 10px;">
                                {{-- {{$product['description']}} --}}
                                數量
                            </div>
                            
                            <div style="font-size:clamp(9px, 1.5vw, 22px); margin-bottom: 10px;">
                                {{-- {{$product['description']}} --}}
                                小計
                            </div>
                            {{-- style="font-size:clamp(15px, 2vw, 20px); " --}}
                        </div>
                        
                    </div>
                </div>
             

            </div>

            <div style="font-size:clamp(9px, 1.5vw, 22px); ">
                {{-- {{$product['description']}} --}}
               總計
            </div>


        </div>
       
      
    </div>
</section>
@endsection
