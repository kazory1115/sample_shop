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
                        <h1 class="display-5 fw-bolder text-white mb-2">登入</h1>

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
    <div class="container px-5 my-5" style="">

        <div class="d-flex justify-content-center align-items-center" style="margin-top: 5%">
            <div class="" style="width: 100%; max-width: 600px;">

                <form id="loginForm">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">帳號</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                            <input type="text" id="email" name="email" class="form-control" placeholder="請輸入電子郵件" required>
                        </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold">密碼</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" id="password" name="password" class="form-control" placeholder="請輸入密碼" required>
                        </div>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-block">登入</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>
@endsection

<script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function() {

            $.ajax({
                url: "{{ route('login') }}",
                type: "POST",
                data: {
                    _token: $('input[name="_token"]').val(),
                    email: $('#email').val(),
                    password: $('#password').val()
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = "{{ route('home') }}"; // 登入成功後重定向
                    } else {
                        alert('登入失敗：' + response.message);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) { // 驗證錯誤
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = '';
                        $.each(errors, function(key, value) {
                            errorMessage += value[0] + '\n';
                        });
                        alert(errorMessage);
                    } else {
                        alert('發生錯誤，請稍後再試');
                    }
                }
            });
        });

    });
</script>