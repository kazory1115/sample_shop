@extends('stock.main')

@section('content')
<!-- index.html -->
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue 3 簡單介面</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        input {
            padding: 8px;
            margin: 10px;
        }

        button {
            padding: 10px;
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: darkblue;
        }
    </style>
</head>

<body>

    <div id="app">
        <h1>Vue 3 渲染介面</h1>
        <input type="text" v-model="userInput" placeholder="輸入一些文字...">
        <button @click="showText">顯示輸入內容</button>
        <p v-if="displayText">你輸入的內容是： <strong>@{{ displayText }}</strong></p>
    </div>

    <script>
        Vue.createApp({
            data() {
                return {
                    userInput: '',
                    displayText: ''
                };
            },
            methods: {
                showText() {
                    this.displayText = this.userInput;
                }
            }
        }).mount("#app");
    </script>

</body>

</html>

@endsection