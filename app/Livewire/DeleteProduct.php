<?php

namespace App\Livewire;

use Livewire\Component;

class DeleteProduct extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.delete-product');
    }
}
