<?php

namespace App\Http\Livewire\Backend\Brand;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Session\Session as SessionSession;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug ,$status ,$brandId,$category;

    public function restInput(){
        $this->name=null;
        $this->slug=null;
        $this->status=null;
        $this->category=null;
        $this->brandId=null;
    }
    public function rules(){
        return[
        'name'=>'required|string',
        'slug'=>'required|string',
        'category'=>'required|integer',
        'status'=>'nullable',
        ];
    }
    public function AddBrand(){
       $this->validate();
        Brand::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'category_id'=>$this->category,
            'status'=>$this->status ? 1 : 0,
        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->restInput();

    }
    public function deleteBrand($brandId){
         $this->brandId=$brandId;
    }
    public function deleteBrandFromModal(){
          Brand::findOrFail($this->brandId)->delete();
    }

    public function editBrand(Brand $brand){
            $this->brandId=$brand->id;
            $this->name=$brand->name;
            $this->category=$brand->category_id;
            $this->slug=$brand->slug;
            $this->status=$brand->status;
    }
    public function UpdateBrand(){
        $this->validate();
        Brand::find($this->brandId)->update([
            'name'=>$this->name,
            'category_id'=>$this->category,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status ? 1 : 0,
        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->restInput();

    }
    
    public function render()
    {
        $brand=Brand::orderBy('id','DESC')->paginate(10);
        $categories=Category::whereStatus(1)->get();
        return view('livewire.backend.brand.index',['brands'=>$brand,'categories'=>$categories])
        ->extends('layouts.admin')->
          section('content');
    }
}
