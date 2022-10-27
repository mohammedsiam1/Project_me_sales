<?php

namespace App\Http\Livewire\Backend\Brand;

use App\Models\Brand;
use Illuminate\Contracts\Session\Session as SessionSession;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug ,$status ,$brandId;

    public function restInput(){
        $this->name=null;
        $this->slug=null;
        $this->status=null;
        $this->brandId=null;
    }
    public function rules(){
        return[
        'name'=>'required|string',
        'slug'=>'required|string',
        'status'=>'nullable',
        ];
    }
    public function AddBrand(){
       $this->validate();
        Brand::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
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
            $this->slug=$brand->slug;
            $this->status=$brand->status;
    }
    public function UpdateBrand(){
        $this->validate();
        Brand::find($this->brandId)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status ? 1 : 0,
        ]);
        $this->dispatchBrowserEvent('close-modal');
        $this->restInput();

    }
    
    public function render()
    {
        $brand=Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.backend.brand.index',['brands'=>$brand])
        ->extends('layouts.admin')->
          section('content');
    }
}
