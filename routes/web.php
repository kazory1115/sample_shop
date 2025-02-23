<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Http\Controllers\ProductsList;
use App\Http\Controllers\OrderList;
use App\Http\Controllers\CartList;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\Test;

use Illuminate\Support\Facades\DB;
use App\Models\Products;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('list');
});

//產品列表
Route::get('/list', [ProductsList::class, 'index'])->name('list');

//訂單
Route::get('/order', [OrderList::class, 'index'])->name('order');
Route::post('/order', [OrderList::class, 'create'])->name('createorder');

//購物車
Route::get('/cart', [CartList::class, 'index'])->name('cart');

//購物車刪除
Route::delete('/cartdel', [CartList::class, 'del'])->name('cartdel');

//登入(畫面) 
Route::get('/login', function () {
    return view('layouts.login');
})->name('login');

//註冊
Route::get('/signup', function () {
    return view('layouts.signup');
})->name('signup');

Route::post('/signup', [UsersController::class, 'register'])->name('SignUp');
Route::get('/signout', [UsersController::class, 'singout'])->name('signout');
Route::post('/sigin', [UsersController::class, 'singin'])->name('sigin');

//暫時測試用
Route::get('/test', function () {
    return view('layouts.login');
});

//session 測試
Route::get('/all', function (Request $request) {
    return response()->json($request->session()->all());
})->name('1');
Route::get('/set', [Test::class, 'setSession']);
Route::get('/del', [Test::class, 'delSession']);
Route::get('/get-session', [Test::class, 'getSession']);


Route::get('/api/stock', [Test::class, 'stock'])->name('apistock');

Route::get('/stock', function () {
    return view('test1');
})->name('stock');

Route::get('/stockold', function () {
    return view('layouts.stockold');
});


//塞假資料用
Route::get('/testdata', function () {
    try {
        $name = '經典巧克力蛋糕';
        $description = '這款經典巧克力蛋糕以高品質可可粉製作，濃郁香滑，搭配細膩的奶油霜，口感豐富，適合任何慶祝場合。';
        // $category_id ; 
        $image_url = 'https://shoplineimg.com/5e7abbaf65b7fe003c2e1b4d/646ca05a06fa8e001a4e7554/800x.webp?source_format=jpg';
        $price = 100;

        $data = [

            [
                'name' => '椰香綠咖哩海鮮總匯',
                'description' => '小辣 | 含蝦子，淡菜，魷魚及蛤蜊主食擇一  | 小辣 | 含蝦子，淡菜，魷魚及蛤蜊',
                'image_url' => 'https://images.deliveryhero.io/image/fd-tw/Products/66210649.jpg',
                'price' => 240,
            ],
            [
                'name' => '松露嫩雞燉飯',
                'description' => '肉品原產地：台灣豬肉、丹麥豬肉、加拿大豬肉、澳洲牛肉、台灣雞肉',
                'image_url' => 'https://images.deliveryhero.io/image/fd-tw/Products/66210642.jpg',
                'price' => 210,
            ],
            [
                'name' => '田園南瓜鮮蔬烤餅',
                'description' => '可做蛋奶素',
                'image_url' => 'https://images.deliveryhero.io/image/fd-tw/Products/66210641.jpg',
                'price' => 190,
            ],
            [
                'name' => '德式香腸烤餅',
                'description' => '可做蛋奶素',
                'image_url' => 'https://images.deliveryhero.io/image/fd-tw/Products/66210652.jpg',
                'price' => 190,
            ],

        ];

        foreach ($data as $d) {
            $results = Products::create([
                'name' => $d['name'],
                'description' => $d['description'],
                // 'category_id' => $d['category_id'],
                'image_url' => $d['image_url'],
                'price' => $d['price'],
            ]);
        }
        return response()->json(
            ['results' => $results]
        );
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});


/**
 * 後台程式用
 * 1、新增產品
 * 2、管理產品(編輯)
 * 3、原物料管理
 *
 */




/* 無效路由自動導向 */
// Route::fallback(function () {
//     //不能用route name
//     // return redirect('list');
//     //可以用name
//     return redirect()->route('list');
// });
