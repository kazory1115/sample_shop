<!DOCTYPE html>
<html lang="tw">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>SAMPLE 餐館</title>
        
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons -->
        <!-- Bootstrap core JS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Font Awesome  -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
          
        <!-- 引入 Vite -->
        @vite('resources/css/list.css')


    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <!-- 選單 -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 20px;">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('list') }}">SAMPLE 餐館</a>

                    <div  style="display: grid; grid-template-columns: 1fr  1fr; grid-gap: 15px;">
                        <button class="navbar-toggler" aria-expanded="false" >
                            <a class="nav-link" href="{{ route('cart') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <!--  補別的顯現數量  -->
                            </a>
                        </button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                    </div>
                    
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- 正常標題 -->
                            {{-- <li class="nav-item"><a class="nav-link" href="{{ route('list') }}"> <i class="fa-solid fa-house"></i> 首頁</a></li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart') }}">
                                    <i class="fa-solid fa-cart-shopping"></i> 購物車
                                    <!--  補別的顯現數量  -->
                                </a>
                            </li>
                            {{-- 是否登入 --}}
                            @if (auth()->check())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('order') }}"> 
                                        <i class="fa-solid fa-receipt"></i>  訂單
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href=""> 
                                        <i class="fa fa-user"></i> {{ auth()->user()->name }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('signout') }}"> 
                                        <i class="fa fa-sign-out "></i> 登出
                                    </a>
                                </li>

                            {{-- {{auth()->logout()}} --}}
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"> 
                                        <i class="fa fa-user"></i> 登入
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('signup') }}"> 
                                        <i class="fa fa-user-plus"></i> 註冊
                                    </a>
                                </li>
                            @endif

                            

                            <!-- 下拉 -->
                            {{--
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                                    <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                                </ul>
                            </li>
                           --}}
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!-- Header-->
            <div class="header">
                @yield('header')
            </div>
            <!-- 大圖 -->
            {{-- 
            <header class="bg-dark py-5">
                <img src="https://tb-static.uber.com/prod/image-proc/process…6fb63eefe3b/fb86662148be855d931b37d6c1e5fcbe.jpeg">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">A Bootstrap 5 template for modern businesses</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                    </div>
                </div>
            </header>
             --}}
            <!-- Features section-->
         
           
            <!-- Blog preview section-->
            <!-- Content -->
            <div class="container">
                @yield('content')
            </div>
        </main>



        <!-- Footer -->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto">
                        <div class="small m-0 text-white">Copyright &copy; SAMPLE 餐館 2024</div>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
