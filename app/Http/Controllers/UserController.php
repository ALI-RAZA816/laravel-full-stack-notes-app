<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function allusers(){
        
        $allusers = DB::table('users')->paginate(4);
        $total = DB::table('users')->count();
        $active = DB::table('users')->where('status','active')->count();
        $average = $total > 0 ? round(($active / $total) * 100, 2) : 0;
        
        $inactive = DB::table('users')->where('status','inactive')->count();
        $averageInactive = $inactive > 0 ? round(($inactive / $total) * 100, 2) : 0;
        $thismonth = DB::table('users')->whereMonth('created_at',now()->month)->whereYear('created_at',now()->year)->count();
        return view('users',compact('allusers','total','thismonth','active','average','inactive','averageInactive'));

    }

    public function createAccount(UserRequest $request){

        $Imagename = null;

        $name = DB::table('users')->where('name',$request->fullname)->first();
        $email = DB::table('users')->where('email',$request->email)->first();

        if($name){
            return back()->withErrors([
                'fullname'=>'This username already exist',
            ])->onlyInput('fullname');
        }
        if($email){
            return back()->withErrors([
                'email'=>'This email already exist',
            ])->onlyInput('email');
        }

        if($request->profile){
            $image = $request->profile;
            $ext = $image->getClientOriginalExtension();
            $Imagename = time(). "." . $ext;
            $image->move(public_path('uploads'), $Imagename);
        }

        $user = DB::table('users')->insert([
            'name'=>$request->fullname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'profile'=>$Imagename,
            'phone'=>null,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        if($user){
            return redirect()->route('login');
        }

    }

    public function singleuser(int $id){
        $user = DB::table('users')->where('id',$id)->first();
        return view('setting',compact('user'));
    }

    public function updateuser(Request $request, int $id){
        $users = DB::table('users')->select('profile')->where('id',$id)->first();

        if($request->profile != ''){
            // $path = public_path().'/uploads/';
            if($users->profile != null){
                $old_image = public_path().'/uploads/'. $users->profile;
                if(file_exists($old_image)){
                    unlink($old_image);
                }
            }
            $image = $request->profile;
            $ext = $image->getClientOriginalExtension();
            $Imagename = time(). "." . $ext;
            $image->move(public_path('uploads'), $Imagename);

        }else{
            $Imagename = $users->profile;
        }

        DB::table('users')->where('id',$id)->update([
            'name'=>$request->fullname,
            'email'=>$request->email,
            'role'=>$request->role,
            'profile'=>$Imagename,
            'phone'=>$request->phone,
        ]);
        return redirect()->route('users');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = DB::table('users')->where('email',$request->email)->first();
        if(!$user){
            return back()->withErrors([
                'email'=>"This email doesn't exist",
            ])->onlyInput('email');
        }

        if(!Hash::check($request->password, $user->password)){
             return back()->withErrors([
                'password'=>"Password incorrect",
            ])->onlyInput('password');
        }

        Auth::loginUsingId($user->id);
        DB::table('users')->where('id',Auth::id())->update([
                'status'=>'active'
            ]);
        return redirect()->route('dashboard',Auth::id());
    }

    public function logoutaccount(int $id){
        if(Auth::check()){
            DB::table('users')->where('id',$id)->update([
                'status'=>'inactive'
            ]);
            Auth::logout();
        }
        return redirect()->route('login');
    }


    public function searchUser(Request $search){
        Gate::authorize('islogin');
        $allusers = DB::table('users')->get();
        $total = DB::table('users')->count();
        $active = DB::table('users')->where('status','active')->count();
        $average = $total > 0 ? round(($active / $total) * 100, 2) : 0;
        
        
        $inactive = DB::table('users')->where('status','inactive')->count();
        $averageInactive = $inactive > 0 ? round(($inactive / $total) * 100, 2) : 0;
        $thismonth = DB::table('users')->whereMonth('created_at',now()->month)->whereYear('created_at',now()->year)->count();
        $searched = DB::table('users')->where('name','LIKE','%' . $search->search . '%')->orWhere('email','LIKE','%' . $search->search . '%')->paginate(4);
        return view('searchuser',compact('searched','total','thismonth','active','average','inactive','averageInactive'));
    }

    public function deleteUser(int $id){
        DB::table('notes')->where('user_id',$id)->delete();
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('users');
    }

    public function profile(int $id){
        Gate::authorize('isNotes', $id);
        $user = DB::table('users')->where('id',$id)->first();
        return view('profile',compact('user'));
    }

    public function profileSetting(Request $request, int $id){
        $users = DB::table('users')->select('profile')->where('id',$id)->first();

        if($request->profile != ''){
            // $path = public_path().'/uploads/';
            if($users->profile != null){
                $old_image = public_path().'/uploads/'. $users->profile;
                if(file_exists($old_image)){
                    unlink($old_image);
                }
            }
            $image = $request->profile;
            $ext = $image->getClientOriginalExtension();
            $Imagename = time(). "." . $ext;
            $image->move(public_path('uploads'), $Imagename);

        }else{
            $Imagename = $users->profile;
        }

        DB::table('users')->where('id',$id)->update([
            'name'=>$request->fullname,
            'email'=>$request->email,
            'profile'=>$Imagename,
            'phone'=>$request->phone,
        ]);
        return redirect()->route('dashboard',Auth::id());
    }
}
