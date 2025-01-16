<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query if available
        $search = $request->input('search');

        $sortBy = $request->get('sortBy', 'name'); 
        $sortOrder = $request->get('sort', 'asc'); 
        if($sortOrder === 'desc') {
            $sortOrder = 'desc';
        } else {
            $sortOrder = 'asc';
            
        }
        // Query products with search and sorting logic
        $products = Product::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                             ->orWhere('description', 'like', '%' . $search . '%')
                             ->orWhere('product_id', 'like', '%' . $search . '%')
                             ->orWhere('price', 'like', '%' . $search . '%');
            })
            ->orderBy($sortBy, $sortOrder)
            ->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'product_id' => 'required|unique:products',
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);
    
    $input = $request->all();

    if ($image = $request->file('image')) {
        
        $image->move(public_path('images'), $image->getClientOriginalName());
            $input['image'] = $image->getClientOriginalName();
    }

    Product::create($input);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            if ($product->image && File::exists(public_path('images/' . $product->image))) {
                File::delete(public_path('images/' . $product->image));
            }
            $image->move(public_path('images'), $image->getClientOriginalName());
            $input['image'] = $image->getClientOriginalName();
        }

       

        $product->update($input);

      
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && File::exists(public_path('images/' . $product->image))) {
            File::delete(public_path('images/' . $product->image));
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }


}
