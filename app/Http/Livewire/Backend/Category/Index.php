<?php

namespace App\Http\Livewire\Backend\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categoryId;
    public function destroyCategory($categoryId){
        $this->categoryId=$categoryId;
    }

    public function deleteCategory(){
        $category=Category::findOrFail($this->categoryId);
        $path='Categories/Images'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $category=Category::orderBy('id','desc')->paginate(10);
        return view('livewire.backend.category.index',['categories'=>$category]);
    }
}
