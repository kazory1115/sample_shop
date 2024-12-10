<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Addcart extends Component
{
    public $product;
   
    public $count = 0;
    public $test ;

    //初始化資料(自動執行)
    public function mount($product)
    {
        $this->product = $product;

        // 可以預設無資料 = 0
        // $this->count = Session::get('cart_count' . $product['id'], 0);

        //先讀出資料在判斷
        $CartCount = Session::get('cart_count', []);

        //判斷段無值 預設給0 
        $this->count = $CartCount[$product['id']] ?? 0;
     
         $this->test = 'test';
    }

    public function add()
    {
        $this->count++;

        //直接更新的
        // Session::put('product_count_' . $this->product['id'], $this->count);

        // 讀出 product_count
        $productCounts = Session::get('cart_count', []);

        // 更新
        $productCounts[ $this->product['id']] = $this->count;

        // 存回 Session
        Session::put('cart_count', $productCounts);

       
       
    }


    public function reduce()
    {
        if($this->count > 0){
            $this->count --;
        }else{
            $this->count = 0;
        }
        
        $productCounts = Session::get('cart_count', []);

        $productCounts[ $this->product['id']] = $this->count;

        Session::put('cart_count', $productCounts);

        
    }

    

    public function render()
    {
        return view('livewire.addcart');
    }
}
