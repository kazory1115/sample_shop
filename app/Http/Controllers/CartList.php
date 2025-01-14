<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Products;


class CartList extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $CartCount = Session::get('cart_count', []);
            // $products = Products::all();
            $allResults = [];//所有資料
            $status = 0;
            $total = 0;

            if($CartCount){              
                foreach ($CartCount as $key => $count) {
                    if($count > 0){
                        $results = Products::find($key); 
                        for($i=1; $i<= $count; $i++ ){
                            $allResults[] = $results;
                            $total += $results['price'];
                        }
                        
                        $status = 1;
                    }
                }
          
            }

            return view('layouts.cart', [               
                'cartlist' => $allResults,
                'total' => $total,
                'status' =>  $status,
              
            ]);
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function del(Request $request)
    {
        $productId = $request->input('product');     
        $productCounts = Session::get('cart_count', []);

        foreach($productCounts as $key => &$v){
            if($productId == $key){
                $v--;

            }
        }
        Session::put('cart_count', $productCounts);
        
        $cartArray = Session::get('cartArray', []);
        // 找到第一個 $productId的key
        $key = array_search($productId, $cartArray);

        if ($key !== false) {
            // 找到移除
            unset($cartArray[$key]);
        }

        //array_values重置array的索引(重排列的概念)存回 Session
        Session::put('cartArray', array_values($cartArray));
       

        return redirect(route('cart')); 

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
    public function show(string $id)
    {
        //
    }

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
}
