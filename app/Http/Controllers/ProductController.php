<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function productsCreate(){
        return view('admin.products');
    }

    public function productsStore(Request $request){
        $credentials = $request->validate([
            'name' => ['string', 'required'],
            'unit_price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'img'  => ['required', 'image']
        ]);
        $imgs = $request->file('img')->store('public/images');
        $urlImage = Storage::url($imgs);
        $url = env('URL_SERVER_API');
        $response = Http::post($url.'/products', [
            'name' => $credentials['name'],
            'unit_price' => $credentials['unit_price'],
            'stock' => $credentials['stock'],
            'img' => $urlImage
        ]);
        return redirect(route('admin.products'))->with('data',$response);
    }

    public function productsEdit(Product $product ,Request $request ){
        $credentials = $request->validate([
            'name' => ['string', 'required'],
            'unit_price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'img'  => ['required', 'image']
        ]);
        $images = $request->file('img')->store('public/images');
        $urlImage = Storage::url($images);
        $url = env('URL_SERVER_API');
        $response = Http::put($url."/products/{$product}", [
            'name' => $request->name,
            'unit_price' => $request->unit_price,
            'stock' => $request->unit_price,
            'img' => $urlImage
        ]);
        return redirect(route('admin.products'))->with('data', $response);
       
       
        // $product->name = $request->name ?? $product->name;
        // $product->unit_price = $request->unit_price ?? $product->unit_price;
        // $product->stock = $request->stock ?? $product->stock;
        // $product->img = $request->img ?? $product->img;
    }

    public function productsDelete(Product $product){
        $url = env('URL_SERVER_API'); 
        
        $response = Http::delete($url."/products/{$product}");
        // $data = $response->json();
        return redirect(route('admin.products'))->with('data', $response);
    }
}