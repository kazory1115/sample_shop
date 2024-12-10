<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Http\Controllers\ProductsList;
use App\Http\Controllers\OrderList;
use App\Http\Controllers\CartList;

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
    return view('welcome');
});

// Route::get('/list', function () {
//     return view('list');
// });

Route::get('/list', [ProductsList::class, 'index'])->name('list');

Route::get('/order',[OrderList::class, 'index'])->name('order');


Route::get('/cart',[CartList::class, 'index'])->name('cart');

Route::get('/test', function () {
    return view('test');
});

 

Route::get('/all', function (Request $request) {
    return response()->json($request->session()->all());
});


Route::get('/set', [Test::class, 'setSession']) -> name('1');

Route::get('/del', [Test::class, 'delSession']) -> name('1');

Route::get('/get-session', [Test::class, 'getSession']) -> name('2');



Route::get('/testdata', function () {
    try {
        // $name = $request->input('name');
        // $phone = $request->input('phone');
        


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
        
    
        foreach( $data as $d){
            $results = Products:: create([
                'name' => $d['name'],
                'description' =>$d['description'] ,
                // 'category_id' => $d['category_id'],
                'image_url' => $d['image_url'] , 
                'price' => $d['price'] ,           
            ]);
        }
        return response()->json(
            ['results' => $results]);
    
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});


Route::get('/time', function () {
    return response()->json([
        'timeWithoutFormat' => Carbon::now(),
        'current_time' => Carbon::now()->format('Y-m-d H:i:s'),
        'now' => date('Y-m-d H:i:s'),
        'timestamp' => strtotime('now'),
        'timestampToFormat' => date('Y-m-d H:i:s',strtotime('now'))
    ]);
});