<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Orders;
use App\Models\Order_Items;

use App\Models\Products;

class OrderList extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {           
            $Orders = Orders:: where( 'user_id' , auth()->user()->id ) -> get();

            $detail = array(); 
            $OrderTotal = 0;
            foreach($Orders as $o){
                $Order_Items = Order_Items::  where( 'order_id' , $o['id']) -> get();
                $OrderTotal += $o['total_price'];
                // 獲取所有需要的 product_id
                $productIds = $Order_Items->pluck('product_id');

                // 一次性查詢所有相關的 Products
                $products = Products::whereIn('id', $productIds)->pluck('image_url', 'id');
                $productsName = Products::whereIn('id', $productIds)->pluck('name', 'id');

                // 為每個 Order_Item 添加 url
                foreach ($Order_Items as $key => $item) {
                    $Order_Items[$key]['image_url'] = $products[$item['product_id']] ?? null;
                    $Order_Items[$key]['name'] = $productsName[$item['product_id']] ?? null;
                }

              

                $detail[$o['id']] = [
                    'order' => $o,
                    'items' => $Order_Items,
                    
                ];
            }
            
            // return response()->json($detail);
            
            return view('layouts.order', [
                'Order' => $detail,
                'OrderTotal' => $OrderTotal,
            ]);
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request)
    {
        //
        try {
            $cartArray = Session::get('cart_count', []);
            $resultsarray = [];
            $request->input('total'); 

            $orderListDate = [         
                'order_id' => '',
                'product_id',
                'quantity' ,
                'price' ,
                'total' ,   
            ];
          
            $orderData = [
                'user_id'=> auth()->user()->id,
                'total_price'=>$request->input('total'),
                'status'=>'1',
            ];


                  
           
            
            $OrdersStatus = Orders:: create($orderData);
           


            foreach($cartArray as $key => $v){
                if($v > 0){
                    $results = Products::where('id', $key)->select('name', 'price','id')->first();
                   
                    $orderListData = [         
                        'order_id' => $OrdersStatus['id'],
                        'product_id' =>$key ,
                        'quantity' => $v,
                        'price' => $results['price'],
                        'total' => $results['price'] * $v ,   
                    ];
                    $orderListStatus = Order_Items:: create($orderListData);

                   
                }

                Session::forget(['cart_count', 'cartArray']);//清除Session

                
            }


            return redirect()->route('list')->with('success', '訂單建立成功，購物車已清空！');

           
            return response()->json(
                $OrdersStatus);
            
        

            return response()->json(
                $resultsarray);
            
            return view('layouts.order', [               
                'products' => '',
            ]);
        
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
