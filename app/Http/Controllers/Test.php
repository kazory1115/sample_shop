<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Http;


class Test extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Products::all();


            return view('list', [
                'products' => $products
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // 設定 Session
    public function setSession(Request $request)
    {
        // 將用戶名稱存儲到 Session
        // $request->session()->put('user_name', 'eeee Doe');
        $request->session()->put('user_name', ['a' => array(), 'b']);
        return "Session 已設定！";
    }

    // 刪除 Session
    public function delSession(Request $request)
    {
        // $request->session()->forget('key_name'); // 删除指定键的会话数据
        // return "Session 刪除";


        $request->session()->flush(); // 清空所有会话数据

        return "所有 Session 已刪除";
    }

    // 獲取 Session
    public function getSession(Request $request)
    {
        // 從 Session 獲取用戶名稱
        $userName = $request->session()->get('user_name', '未找到用戶名稱');
        // $request->session()->flush();
        // 重定向到名為 'home' 的路由（需要在 routes/web.php 定義）
        return redirect()->route('list')->with('user_name', $userName);
    }
    public function stock(Request $request)
    {
        $data = $request->input('stocks');
        $stocks = $request->query('stocks', $data); // 預設股票
        // $stocks = urldecode($stocks); // 確保 `|` 沒有被轉義

        $list = [
            'z'     => '當前盤中成交價',
            'tv'    => '當前盤中盤成交量',
            'v'     => '累積成交量',
            'b'     => '揭示買價(從高到低，以_分隔資料)',
            'g'     => '揭示買量(配合b，以_分隔資料)',
            'a'     => '揭示賣價(從低到高，以_分隔資料)',
            'f'     => '揭示賣量(配合a，以_分隔資料)',
            'o'     => '開盤價格',
            'h'     => '最高價格',
            'l'     => '最低價格',
            'y'     => '昨日收盤價格',
            'u'     => '漲停價',
            'w'     => '跌停價',
            'tlong' => '資料更新時間（單位：毫秒）',
            'd'     => '最近交易日期（YYYYMMDD）',
            't'     => '最近成交時刻（HH:MI:SS）',
            'c'     => '股票代號',
            'n'     => '公司簡稱',
            'nf'    => '公司全名',
            'extent' => '漲幅'

        ];

        $listKeys = array_keys($list);




        $stockApi = Http::get('https://mis.twse.com.tw/stock/api/getStockInfo.jsp', [
            'ex_ch' => $data,
        ])->json();

        foreach ($stockApi['msgArray'] as &$item) {
            $item['extent'] = round(($item['z'] - $item['y']) / $item['y'] * 100, 2) . '%'; // round(..., 2)：將結果四捨五入到小數點後兩位

            // 分割買價（b）和對應的買量（g）
            $b_prices = explode('_', rtrim($item['b'], '_'));
            $g_volumes = explode('_', rtrim($item['g'], '_'));

            $item['bg'] = [];
            foreach ($b_prices as $index => $price) {
                $item['bg'][$price] = $g_volumes[$index] ?? null; // 避免 $g_volumes 沒有對應的索引
            }

            // 分割賣價（a）和對應的賣量（f）
            $a_prices = explode('_', rtrim($item['a'], '_'));
            $f_volumes = explode('_', rtrim($item['f'], '_'));

            $item['af'] = [];
            foreach ($a_prices as $index => $price) {
                $item['af'][$price] = $f_volumes[$index] ?? null; // 避免 $f_volumes 沒有對應的索引
            }


            $filtered[$item['c']] = array_intersect_key($item, array_flip($listKeys));
            // 2. array_flip($listKeys)：將 $listKeys 陣列的鍵和值對調，使其值成為 key，方便比對
            // 3. array_intersect_key($item, array_flip($listKeys))：
            //    - 從 $item 陣列中，篩選出鍵名存在於 $listKeys 陣列的資料
            //    - 這樣可以確保只保留我們關心的欄位，其他不必要的資料會被過濾掉
            $filtered[$item['c']] = array_intersect_key($item, array_flip($listKeys));
        }

        return response()->json([
            'response' => $filtered,
        ]);
    }
}
