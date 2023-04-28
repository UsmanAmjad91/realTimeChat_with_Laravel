<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mockery\Expectation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Toastr;
use Exception;
use Session;
use Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function logout(Request $request){
        Auth::logout();
        return redirect(route('login'));
    }


    public function create(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',

        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);


        if($user){
            toastr()->success('Successfully Added User');
            return Redirect::to(route('users.show'));
        }else{
         toastr()->error('Some Thing Wrong');
          return back();
        }

    }
    public function show(Request $request)
    {
        $data = [];
        $data['title'] = "User List";
        $data['users'] = User::orderBy('id','desc')->get();
        return view('auth.users',$data);
    }
    public function edit(Request $request,$id){
        // Auth::user()->roles->pluck('id')
        $data = [];
        $data['title'] = "Update User";
        $data['user'] = User::find($id);
        $data['user_role'] = $data['user']->roles->pluck('id')->first();
        $data['roles'] = Role::all();
        return view('auth.edituser',$data);
    }

    public function update(Request $request,$id){
        //  dd($request->all());
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);


        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            unset($input['password']);
        }

        $user=User::find($id);
        $user->update($input);

        if($user){
            toastr()->success('Successfully Update User');
            return Redirect::to(route('users.show'));
        }else{
         toastr()->error('Some Thing Wrong');
          return back();
        }
    }

    public function destroy(Request $request,$id){
       $user = User::find($id)->delete();

        if($user){
            toastr()->success('Successfully Delete User');
            return Redirect::to(route('users.show'));
        }else{
         toastr()->error('Some Thing Wrong');
          return back();
        }
    }

    public function login(Request $request)
    {
        $data = [];
        $data['title'] = "Login";
        return view('auth.login',$data);
    }
    public function sign_in(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Please Fill All Feilds');
            return back();
        }
        $credentials = $request->except(['_token']);
        // $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            toastr()->success('You Successfully Login');

            return Redirect::to('/chatify');
        }

        toastr()->error('You have Insert wrong Credentials');
          return back();

    }


    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        if($user){
            toastr()->success('Successfully Added User');
            return Redirect::to(route('login'));
        }else{
         toastr()->error('Some Thing Wrong');
          return back();
        }

    }

}
