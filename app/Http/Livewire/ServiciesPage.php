<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Department;

class ServiciesPage extends Component
{
     public $selected_products;
     public $categories;
     //الاكثر مبيعا
     public $bestSeller='';
     //المضاف حديثا
     public $latestAdded='';

     public $_id;


     public function mount()
    {
        $categories=Department::where('categories','active')->get();
        $selected_category=$categories->first();
        $id=$selected_category->id;
        if($this->bestSeller)
        {
            $selected_products=Department::find($id)->articles->where('articles_isactive','active')->toArray();
        }
        elseif($this->latestAdded)
        {
            $selected_products=Department::find($id)->articles->where('articles_rate','active')->toArray();
        }
        else
        {
            $selected_products=Department::find($id)->articles->toArray();
        }

        $categories=Department::where('categories','active')->get()->toArray();

        $this->categories=$categories;
        $this->selected_products=$selected_products;
        $this->_id=$id;
    }

    public function render()
    {
        return view('livewire.servicies-page');
    }

    public function changeSelectedProducts($id)
    {
       // dd($id);
          if($this->bestSeller)
          {
            $selected_products=Department::find($id)->articles->where('articles_isactive','active')->toArray();
          }
          elseif($this->latestAdded)
        {
            $selected_products=Department::find($id)->articles->where('articles_rate','active')->toArray();
        }
          else
          {
            $selected_products=Department::find($id)->articles->toArray();

          }

          $this->selected_products=$selected_products;
          $this->_id=$id;

    }
}
