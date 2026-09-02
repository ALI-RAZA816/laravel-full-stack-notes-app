<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    public function fetchCategories(){
        $category = DB::table('categories')->get();
        return view('addnote',['category'=>$category]);
    }

    public function fetchNotes(int $id){
        Gate::authorize('isNotes',$id);
        $allnotes = DB::table('notes')->join('categories','notes.category_id','=','categories.id')->where('notes.user_id',$id)->select('notes.*','categories.title as category_name')->get();
        return view('content',['notes'=>$allnotes]);
    }

    public function addNotes(NoteRequest $request){
        $notes = DB::table('notes')->insert([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'user_id'=>Auth::id(),
            'content'=>$request->content,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        if($notes){
            return redirect()->route('dashboard',Auth::id())->with('success','Note added successfully');
        }else{
            return redirect()->route('addnote')->with('success','Note cannot added');
        }
    }

    public function singleView(int $update, int $user){
        Gate::authorize('isNotes',$user);
        $note = DB::table('notes')->join('categories','notes.category_id','=','categories.id')->where('notes.id', $update)->where('notes.user_id', $user)->select('notes.*','categories.title as category_name')->first();
        return view('single',['note'=>$note]);
    }

    public function singleNote(int $update, int $user){
        Gate::authorize('isNotes',$user);
        $note = DB::table('notes')->where('id', $update)->where('notes.user_id',$user)->first();
        $category = DB::table('categories')->get();
        return view('editnote',compact('note','category'));
    }

    public function updateNote(Request $request, int $update, int $user ){

        DB::table('notes')->where('id',$update)->where('user_id', $user)->update([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'content'=>$request->content,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        return redirect()->route('dashboard', $user)->with('success','Note updated');
    }

    public function deleteNote(int $id){
        Gate::authorize('islogin');
        DB::table('notes')->where('id',$id)->delete();
        return redirect()->route('dashboard',Auth::id())->with('success','Note delete');
    }

    public function favourate(int $id){
        Gate::authorize('islogin');
        DB::table('notes')->where('id',$id)->update([
            'favourate'=>'star'
        ]);
        
        return redirect()->route('dashboard',Auth::id())->with('success','Note added to favorite');
    }

    public function fetchfavourate(){
        Gate::authorize('islogin');
        $favorite = DB::table('notes')->join('categories','notes.category_id','=','categories.id')->select('notes.*','categories.title as category_name')->where('favourate','star')->get();
        return view('favourate',['fav'=>$favorite]);
    }

    public function removefavourate(int $id){
        Gate::authorize('islogin');
        DB::table('notes')->where('id',$id)->update([
            'favourate'=>null,
        ]);
        return redirect()->route('dashboard',Auth::id())->with('success','Note remove from favorite');
    }

    public function search(Request $request){
        Gate::authorize('islogin');
        $notes = DB::table('notes')->join('categories','notes.category_id','=','categories.id')->select('notes.*','categories.title as category_name')->where('notes.user_id',Auth::id())->where('notes.title','LIKE','%'. $request->search .'%')->get();
        return view('search',['search'=>$notes]);
    }
}
