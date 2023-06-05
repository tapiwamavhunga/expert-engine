<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\User\UserRequest;
 use Illuminate\Http\Request;
// use App\Http\Requests;
// use App\Http\Requests\Request;
class UserController extends Controller
{
    public function index()  {

        $users = User::query();

        $users->with('role');

        if(!empty($request->search)) {
            $users->where('name', 'like', '%' . $request->search . '%');
        }

        $users = $users->paginate(10);

        return view('users.index', compact('users'));
    }


    
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $roles = \App\Models\Admin\Role::all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate([]);

        try {

            $user = new User();
            $user->name = $request->name;
        $user->email = $request->email;
        // $user->email_verified_at = $request->email_verified_at;
        $user->password = $request->password;
        // $user->remember_token = $request->remember_token;
        // $user->is_activated = !!$request->is_activated;
        $user->role_id = $request->role_id;
            $user->save();

            return redirect()->route('admin.users.index', [])->with('success', __('User created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.users.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,) {

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,) {

        $roles = \App\Models\Admin\Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,) {

        $request->validate(["name" => "required", "email" => "required|unique:users,email,$user->id", "password" => "required", "role_id" => "required"]);

        try {
            $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = $request->password;
        $user->remember_token = $request->remember_token;
        $user->is_activated = !!$request->is_activated;
        $user->role_id = $request->role_id;
            $user->save();

            return redirect()->route('admin.users.index', [])->with('success', __('User edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.users.edit', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,) {

        try {
            $user->delete();

            return redirect()->route('users.index', [])->with('success', __('User deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.index', [])->with('error', 'Cannot delete User: ' . $e->getMessage());
        }
    }

    
}

