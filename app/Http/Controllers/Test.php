<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

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
}
