<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotdeal;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function create(){

        return view('admin.category.create');
    }

    public function store(Request $request){
        $data = $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'description' => 'sometimes'
        ]);
        $uploadPath = 'category';
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('images/category'), $filename);
                $data['image'] = $filename;

                if (Category::create($data)) {
                    return redirect()->route('admin.category')
                        ->with('alert', [
                            'type' => 'success',
                            'message' => 'Updated',
                        ]);
                }

            }
    }
    public function index(){

        $categories = Category::all();
        return view('admin.category.index',compact('categories'));

    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id){

        $category= Category::where('id',$id)->update([
                'name' => $request->name,
                'image' => $request->name,
                'description' => $request->description,
            ]);
            return redirect()->back();
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->back();
    }

}
