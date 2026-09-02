<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function fetchCategory(){
        Gate::authorize('islogin');
        $allcategory = DB::table('categories')->get();
        return view('category',['categories'=>$allcategory]);
    }

    public function storeCategory(CategoryRequest $request){
        Gate::authorize('islogin');
        $allcateg = DB::table('categories')->where('title',$request->category)->exists();
        if($allcateg){
            return redirect()->route('category')->with('error','Category name already exist.');
        }else{
            $category= DB::table('categories')->insert([
                'title'=>$request->category,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }

        if($category){
            return redirect()->route('dashboard',Auth::id())->with('success','Category added successfully');
        }else{
           return redirect()->route('dashboard',Auth::id())->with('error',"Category can't be added");
        }

    }

    public function fetchSingle(int $id){
        $allCat = DB::table('categories')->get();
        $singleCategory = DB::table("categories")->where('id',$id)->first();
        return view('editcategory',[
                                    'singleCat'=>$singleCategory,
                                    'allcategory'=>$allCat
                                    ]);
    }

    public function update(Request $request, int $id){
        $editCategory = DB::table('categories')->where('id',$id)->update([
            'title'=>$request->editcategory
        ]);

        if($editCategory){
            return redirect()->route('category')->with('success','Category updated successfully');
        }else{
           return redirect()->route('category')->with('error',"Category can't be updated");
        }
    }

    public function deleteCategory(int $id){
        // Gate::authorize('islogin');
        $deleteCategory = DB::table('categories')->where('id',$id)->delete();
        if($deleteCategory){
            return redirect()->route('category');
        }
    }
}
