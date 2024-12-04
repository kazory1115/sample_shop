

<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>測試頁面</title>
    <!-- 引入 CSS  -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    @vite('resources/css/app.css')  <!-- 加载 app.css -->
</head>
<body>
    <div class="container" style="margin-top: 40px;">
        <h1>Laravel 測試畫面</h1>
        <p>這是一個 Blade 模板範例。</p>


    @extends('layouts.main')

    <!-- 引入 JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
