<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Roles;
use App\Models\ClientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        // dd(Auth::user());
    }

    public function usersList()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "User"], ['name' => "Users List"]
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];
        $usersData = User::where('user_id', '!=', auth()->user()->user_id)->get();
        $roles = Roles::all();

        return view('pages.users-list', ['pageConfigs' => $pageConfigs, 'usersData' => $usersData, 'roles' => $roles], ['breadcrumbs' => $breadcrumbs]);
    }

    public function usersView()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "User"], ['name' => "Users View"]
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];

        return view('pages.page-users-view', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs]);
    }

    public function usersEdit($id)
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "User"], ['name' => "Users Edit"]
        ];
        $user = User::where('user_id', $id)->get()->first();
        $roles = Roles::all();
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => false];
        return view('pages.page-users-edit', ['pageConfigs' => $pageConfigs, 'user' => $user, 'roles' => $roles], ['breadcrumbs' => $breadcrumbs]);
    }

    public function createUser()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "User"], ['name' => "Users Edit"]
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];
        $clientsData = ClientModel::all();
        $roles = Roles::where("role_id", '!=', 1)->get();

        return view('pages.page-users-create', ['pageConfigs' => $pageConfigs, 'clientsData' => $clientsData, 'roles' => $roles], ['breadcrumbs' => $breadcrumbs]);
    }

    public function addUser(Request $request)
    {
        $userValidate = $this->validate($request, [
            'username' => 'required|unique:users,username',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|numeric',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
            'client' => 'required|numeric'
        ]);
        $userValidate['password'] = Hash::make($request->password);
        $newUser = User::create(array_merge($userValidate, ['created_by' => 1, 'updated_by' => 0]));
        $newUserMapping = DB::table('user_client_mappings')->insert([
            'user_id' => $newUser->user_id,
            'client_id' => $userValidate['client'],
            'is_active' => 1,
            'created_by' => 1, 'updated_by' => 0,
            'created_dt' => now(),
            'updated_dt' => null
        ]);
        if ($newUser) {
            return to_route('userlist')->with(['message' => 'User created successfully']);
        } else {
            return back()->with(['message' => 'User creation failed']);
        }
    }

    public function updateUser(Request $request)
    {
        $userValidate = $this->validate($request, [
            'username' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'role_id' => 'required|numeric',
        ]);
        $user = User::where('user_id', $request->id)->update($userValidate);
        if ($userValidate['role_id'] == 3) {
        }
        if ($user) {
            return to_route('userlist')->with(['message' => 'Successfully updated User']);
        }
        return back()->with(['message' => 'Could\'nt update User']);
    }

    public function deleteUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $deleteMapping = DB::table('user_client_mappings')->where('user_id', $request->id)->delete();
        $status = $user->delete();
        if ($status && $deleteMapping) {
            return response()->json(['message' => 'User deleted succesfully']);
        }
        return response()->json(['message' => 'User deletion failed']);
    }
}
