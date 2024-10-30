<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\Product;
use App\Models\User;
use App\Models\Virtual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function prueba(){
        return view('web-page.prueba');
    }

    public function index(){
        $categories = Category::all();
        $user = Auth::user();
        return view('web-page.index',compact('categories'));
        

    }
    public function Catalogo()
    {
        $categories = Category::all();
        $search = request()->input('search');
        $category = request()->input('category');

        $products = Product::query();

        if ($search) {
            $products->where('product_name', 'LIKE', '%' . $search . '%');
        }

        if ($category && $category != 'All') {
            $products->whereHas('category', function ($query) use ($category) {
                $query->where('category_name', $category);
            });
        }

        $products = $products->where('state', true)->get();

        return view('web-page.catalogo', compact('products', 'categories'));

    }

    public function about_us()
    {
        return view('web-page.about-us');
    }
    public function details_product($id)
    {
        $product = Product::find($id);

        $details = Detail::where('product_id', $id)->get();
        //dd($details);
        if (!$product||!$product->state) {

            abort(404);
        }

        return view('web-page.detail-product', compact('product', 'details'));
    }


    public function contact()
    {
        return view('web-page.contact');
    }

    public function virtual()
    {
        $virtuals = Virtual::all();
        return view('web-page.virtual', compact('virtuals'));
    }
}
