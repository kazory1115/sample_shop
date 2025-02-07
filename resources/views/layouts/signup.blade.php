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
                        <h1 class="display-5 fw-bolder text-white mb-2">註冊</h1>
                    
                    </div>
                </div>
           
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<section class="py-2">
    <div class="container px-5 my-5" style="">
        <div class="d-flex justify-content-center align-items-center" style="margin-top: 5%">
            <div style="width: 100%; max-width: 500px; margin: 0 auto;">
                <form action="{{ route('SignUp') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">姓名</label>
                        

                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="請輸入姓名" required>
                       
                        </div>

                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="email" class="form-label">電子郵件</label>
                      
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"  placeholder="請輸入電子郵件" required>
                        </div>
                        
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="password" class="form-label">密碼</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control"  placeholder="請輸入密碼" required>
                        </div>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3"> 
                        <label for="password_confirmation" class="form-label">確認密碼</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  placeholder="請再次輸入密碼" required>
                        </div>
                        
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">註冊</button>
                    </div>
                    
                </form>
                
                <!-- 表單結束 -->
            </div>
            
        </div>
        
      
    </div>
</section>
@endsection
