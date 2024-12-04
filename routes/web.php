<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Http\Controllers\ProductsList;
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

Route::get('/list11', function () {
    return view('test');
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


Route::get('/test', function () {
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
                'name' => '草莓奶油蛋糕',
                'description' => '新鮮草莓與柔滑奶油結合，蛋糕綿密柔軟，口感清新自然，為草莓愛好者量身打造。',
                'image_url' => 'https://example.com/cake2.jpg',
                'price' => 120,
            ],
            [
                'name' => '芒果慕斯蛋糕',
                'description' => '以熱帶芒果製作的慕斯蛋糕，口感清爽酸甜，適合夏日享用。',
                'image_url' => 'https://example.com/cake3.jpg',
                'price' => 130,
            ],
            [
                'name' => '抹茶紅豆蛋糕',
                'description' => '抹茶與紅豆的絕妙搭配，細膩的蛋糕體帶有淡淡茶香，層層綿密。',
                'image_url' => 'https://example.com/cake4.jpg',
                'price' => 140,
            ],
            [
                'name' => '藍莓芝士蛋糕',
                'description' => '濃郁芝士搭配新鮮藍莓醬，入口即化，甜而不膩，適合芝士控。',
                'image_url' => 'https://example.com/cake5.jpg',
                'price' => 150,
            ],
            [
                'name' => '檸檬蛋糕卷',
                'description' => '酸甜檸檬內餡包裹在綿密蛋糕中，清新的滋味讓人耳目一新。',
                'image_url' => 'https://example.com/cake6.jpg',
                'price' => 90,
            ],
            [
                'name' => '黑森林蛋糕',
                'description' => '德國經典甜品，結合巧克力蛋糕、鮮奶油和櫻桃餡，層次豐富。',
                'image_url' => 'https://example.com/cake7.jpg',
                'price' => 160,
            ],
            [
                'name' => '提拉米蘇蛋糕',
                'description' => '經典義大利甜點，口感柔滑細膩，咖啡香氣濃郁，帶來滿滿幸福感。',
                'image_url' => 'https://example.com/cake8.jpg',
                'price' => 170,
            ],
            [
                'name' => '南瓜派蛋糕',
                'description' => '以香甜南瓜餡製作，搭配酥脆的餅皮，濃郁溫暖的口感讓人回味無窮。',
                'image_url' => 'https://example.com/cake9.jpg',
                'price' => 110,
            ],
            [
                'name' => '榛果巧克力塔',
                'description' => '榛果與巧克力的完美結合，搭配酥脆塔皮，滿足你的甜點渴望。',
                'image_url' => 'https://example.com/cake10.jpg',
                'price' => 180,
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


