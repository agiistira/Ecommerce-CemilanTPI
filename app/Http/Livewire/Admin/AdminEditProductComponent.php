<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;


class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;
    public $product_id;

    public function mount($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->newimage = $product->newimage;
        $this->product_id = $product->id;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }
    protected function category_rules()
    {
        return [
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('categories')->ignore($this->category_id)
            ],
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            //'newimage' => 'image|mimes:jpeg,png',
            'category_id' => 'required',
        ];
    }
    public function update($fields)
    {
        $this->validateOnly($fields, $this->category_rules());
    }
    public function updateProduct()
    {
        $this->validate($this->category_rules());
        $product = Product::find($this->product_id);
        $product->name= $this->name;
        $product->slug= $this->slug;
        $product->short_description= $this->short_description;
        $product->description= $this->description;
        $product->regular_price= $this->regular_price;
        $product->sale_price= $this->sale_price;
        $product->SKU= $this->SKU;
        $product->stock_status= $this->stock_status;
        $product->featured= $this->featured;
        $product->quantity= $this->quantity;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image= $imageName;
        }
        $product->category_id= $this->category_id;
        $product->save();
        session()->flash('message','Product has been updated successfully');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories])->layout("layouts.base");
    }
}
