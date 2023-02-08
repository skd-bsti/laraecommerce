<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();// active colors 
        return view('admin.products.create', compact('categories', 'brands', 'colors'));
    }
    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $category =Category::findOrFail( $validatedData['category_id']);
        $product = $category->products()->create([
            'category_id'=>$validatedData['category_id'],
            'name'=>$validatedData['name'],
            'slug'=> Str::slug($validatedData['slug']),
            'brand'=>$validatedData['brand'],
            'short_description'=>$validatedData['short_description'],
            'description'=>$validatedData['description'],
            'original_price'=>$validatedData['original_price'],
            'selling_price'=>$validatedData['selling_price'],
            'quantity'=>$validatedData['quantity'],
            'trending'=>$request->trending== true ? '1':'0',     
            'status'=>$request->status== true ? '1':'0',
           
            'meta_title'=>$validatedData['meta_title'],
            'meta_keyword'=>$validatedData['meta_keyword'],
            'meta_description'=>$validatedData['meta_description'] 
        ]);
        if ($request->hasfile('image')) {
            $uploadPath = 'uploads/products/';
            $i=1;
            foreach ($request->file('image') as $imageFile) {
                $extension =$imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension ;
                $imageFile->move($uploadPath, $filename );
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id'=> $product->id,
                    'image'=> $finalImagePathName,
                
                ]);
            }      
        }
       if ($request->colors) {
        foreach ($request->colors as $key => $color) {
            $product->productColors()->create([
                'product_id' => $product->id,
                'color_id'=>$color,
                'quantity'=>$request->colorquantity[$key] ?? 0

            ]);
        }
       }
        return redirect()->route('product.index')->with('message', 'Product added successfully');
    }
    public function edit(int $id)
    {   $categories =Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($id);
        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get(); ////will return without color which contain this id's
        return view('admin.products.edit', compact('categories','brands', 'product', 'colors'));
    }
    public function update(ProductFormRequest $request, int $id)
    {
       
        $validatedData = $request->validated();
        $product = Category::findOrFail( $validatedData['category_id'])
                    ->products()->where('id', $id)->first();

        if ($product) {
            $product->update([
                'category_id'=>$validatedData['category_id'],
                'name'=>$validatedData['name'],
                'slug'=> Str::slug($validatedData['slug']),
                'brand'=>$validatedData['brand'],
                'short_description'=>$validatedData['short_description'],
                'description'=>$validatedData['description'],
                'original_price'=>$validatedData['original_price'],
                'selling_price'=>$validatedData['selling_price'],
                'quantity'=>$validatedData['quantity'],
                'trending'=>$request->trending== true ? '1':'0',     
                'status'=>$request->status== true ? '1':'0',
               
                'meta_title'=>$validatedData['meta_title'],
                'meta_keyword'=>$validatedData['meta_keyword'],
                'meta_description'=>$validatedData['meta_description'] 
            ]);
            if ($request->hasfile('image')) {
                $uploadPath = 'uploads/products/';
                $i=1;
                foreach ($request->file('image') as $imageFile) {
                    $extension =$imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension ;
                    $imageFile->move($uploadPath, $filename );
                    $finalImagePathName = $uploadPath.$filename;
    
                    $product->productImages()->create([
                        'product_id'=> $product->id,
                        'image'=> $finalImagePathName,
                    
                    ]);
                }      
            }
            return redirect()->route('product.index')->with('message', 'Product updated successfully');

            
        }else {
            return redirect()->route('product.index')->with('message', 'No such product is found');
        }
        
    }
    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->route('product.index')->with('message', 'Product image Deleted');

 
    }
    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);
        if ($product->productImages) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                } 
            }
        }
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Product  Deleted with its images');
    }
}
