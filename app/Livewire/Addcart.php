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
     

    }

    private function updateCart($type)
    {

        // 讀出
        $productCounts = Session::get('cart_count', []);
        
        $productCounts[$this->product['id']] =  $this->count;
        
        // 存回
        Session::put('cart_count', $productCounts);

        //紀錄購物車數量的
        if($type == 'add'){
            $cartArray = Session::get('cartArray', []);
            $cartArray[] = $this->product['id'];
            Session::put('cartArray', $cartArray);
        }else{
            $cartArray = Session::get('cartArray', []);

            // 找到第一個 $this->product['id'] 的key
            $key = array_search($this->product['id'], $cartArray);

            if ($key !== false) {
                // 找到移除
                unset($cartArray[$key]);
            }

            //array_values重置array的索引(重排列的概念)存回 Session
            Session::put('cartArray', array_values($cartArray));
           

        }
      


        $this->dispatch('cartUpdated');
    }


    //加入
    public function add()
    {
        $this->count++;    
        $this->updateCart('add');       
    }

    //刪除
    public function reduce()
    {
        if($this->count > 0){
            $this->count --;
        }else{
            $this->count = 0;
           
        }
        
        $this->updateCart('reduce');        
    }

    

    public function render()
    {
        return view('livewire.addcart');
    }
}
