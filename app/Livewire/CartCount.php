<?php

namespace App\Livewire;

use Livewire\Component;

class CartCount extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->count = count(session()->get('cartArray', []));
    }

    protected $listeners = ['cartUpdated' => 'updateCartCount'];


    public function updateCartCount()
    {
        $this->count = count(session()->get('cartArray', []));
    }

    public function render()
    {
        

        return view('livewire.cart-count');
    }
}
