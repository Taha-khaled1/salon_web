<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Department;

class ShowLatestProducts extends Component
{
    public $selected_products;
     public $categories;

    public function mount()
    {
        $categories=Department::where('categories','active')->get();
        $selected_category=$categories->first();
        $id=$selected_category->id;
        $selected_products=Department::find($id)->articles->where('articles_rate','active')->toArray();
        $categories=Department::where('categories','active')->get()->toArray();

        $this->categories=$categories;
        $this->selected_products=$selected_products;
    }
    public function render()
    {
        return view('livewire.show-latest-products');
    }

    public function change($id)
    {
             $selected_products=Department::find($id)->articles->where('articles_rate','active')->toArray();
             $this->selected_products=$selected_products;
    }

}
