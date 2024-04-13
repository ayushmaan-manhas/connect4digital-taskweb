<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class FootwearController extends Controller
{
    //
    // public function index()
    // {
    //     $footwearProducts = Footwear::all(); // Fetch footwear products from the database
    //     return view('footwear.index', compact('footwearProducts'));
    // }

    public function index(Request $request, $category = null) 
    {

        // Search operations 
        $search = $request->input('search', ''); // Retrieve the value of the 'search' input field
            
        // Fetch only categories related to footwear (assuming they have a specific condition)
        $categories = Category::whereIn('id', [1, 3, 4])->get();
            
        // Base query to fetch products
        $query = Product::query();
            
        // Apply search query
        if ($search != "") {
            $query->where('name', 'like', '%' . $search . '%');
        }
        
        // Apply category filter
        if ($category && $category !== 'all') {
            $categoryId = Category::where('name', $category)->value('id');
            $query->where('category_id', $categoryId);
        } else {
            $query->whereIn('category_id', [1, 3, 4]);
        }
        
        // Execute the query and retrieve products
        $footwearProducts = $query->paginate(3);
        
        return view('footwear.index', compact('footwearProducts', 'categories', 'search'));

    
    }

    public function mensClothingindex(Request $request, $category = null)
{
    // Fetch only categories related to mens clothing
    $categories = Category::whereIn('id', [5, 7, 8])->get();

    // Search operations
    $search = $request->input('search', ''); // Retrieve the value of the 'search' input field

    // Start building the query to fetch products
    $footwearProductsQuery = Product::query();

    if ($search != "") {
        // Add search filter to the query
        $footwearProductsQuery->where('name', 'like', '%' . $search . '%');
    }

    if ($category && $category !== 'all') {
        // Fetch products based on the selected category
        $categoryId = Category::where('name', $category)->value('id');
        $footwearProductsQuery->where('category_id', $categoryId);
    } else {
        // Fetch all products related to mens clothing categories
        $footwearProductsQuery->whereIn('category_id', [5, 7, 8]);
    }

    // Paginate the query results
    $footwearProducts = $footwearProductsQuery->paginate(3);

    return view('mensCloth.index', compact('footwearProducts', 'categories', 'search'));
}


    public function womensClothingindex( Request $request ,$category = null) 
    {
       // Search operations 
        $search = $request->input('search', ''); // Retrieve the value of the 'search' input field
        $footwearProductsQuery = Product::query(); // Start building the query

        if ($search != "") {
            // Add search filter to the query
            $footwearProductsQuery->where('name', 'like', '%' . $search . '%');
        }

        if ($category && $category !== 'all') {
            // Fetch products based on the selected category
            $categoryId = Category::where('name', $category)->value('id');
            $footwearProductsQuery->where('category_id', $categoryId);
        } else {
            // Fetch all products related to specified categories
            $footwearProductsQuery->whereIn('category_id', [6, 9, 10]);
        }

        // Retrieve the final products based on the built query
        $footwearProducts = $footwearProductsQuery->paginate(3);

        return view('womensCloth.index', compact('footwearProducts', 'category', 'search'));

            }



}
