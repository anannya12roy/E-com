<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        // $hotdeal = Hotdeal::all();
        $categories = Category::all();
        // $settings = DB::table('settings')->get() ;
        // $setting = array();
        // foreach ($settings as $key => $value) {
        //     $setting[$value->name] = $value->value;
        // }

        // $result['setting'] = $setting;

        // $data = [
        //     'setting' => $setting ,
        // ] ;
        return view('user.page',compact('categories'));
    }


    public function findPageBySlug($findSlug)
    {
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id )->get();
            $wishlists = Wishlist::where('user_id', $user_id)->count();
        }else{
            $users_id = Auth::user();
            $carts = Cart::where('user_id', $users_id )->get();
            $wishlists = Wishlist::where('user_id', $users_id)->count();

        }
        $categories = Category::all();
        $settings = DB::table('settings')->get() ;
        $setting = array();
        foreach ($settings as $key => $value) {
            $setting[$value->name] = $value->value;
        }

        $result['setting'] = $setting;

        $data = [
            'setting' => $setting ,
        ] ;
        $pageInfo=Page::where('slug',$findSlug)->first();
        if($pageInfo){
            return view('user.pages.custom-page',compact('categories','pageInfo','setting', 'carts', 'wishlists'));
        }

    }
}
