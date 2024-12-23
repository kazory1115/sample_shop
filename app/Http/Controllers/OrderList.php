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
            // $products = Products::all();
            $Orders = Orders:: where( 'user_id' , auth()->user()->id ) -> get();

            $a = array();
            $b = array(); 
            // $a[] = $Orders;
            // $a[]=$Order_Items;
           
            foreach($Orders as $a){
                $Order_Items = Order_Items::  where( 'order_id' , $a['id']) -> get();
                $b[$a['id']] = array( $Orders,);
                

            }
            
            return response()->json(
                array(
                    'dd' => $b
                ));


           

            return response()->json(
                array(
                    // 'Orders' => $Orders,
                    
                    // 'Order_Items' => $Order_Items ,
                    'dd' => $b
                ));
            
            return view('layouts.order', [               
                'products' => $results,
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
