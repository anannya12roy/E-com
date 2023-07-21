<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AllproductController extends Controller
{
    public function productbycat($name){

        $categories = Category::all();
        // $products = Product::where('status',1)->where('category',$id)->limit(10)->get();

        $products = Product::where('category',$name)->where('status',1)->get();
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id )->get();
            $wishlists = Wishlist::where('user_id', $user_id)->count();
        }else{
            $users_id = Auth::user();
            $carts = Cart::where('user_id', $users_id )->get();
            $wishlists = Wishlist::where('user_id', $users_id)->count();
        }
        $settings = DB::table('settings')->get() ;
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting ,
        ] ;

        $routeName = $name;

        $hotdeal = Product::where('hot_deal',1)->get();
        return view('user.pages.product_by_cat',compact('categories','products','carts', 'hotdeal','setting', 'routeName', 'wishlists'));
    }
}
