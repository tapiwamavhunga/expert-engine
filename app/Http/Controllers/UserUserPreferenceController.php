<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserPreference;

class UserUserPreferenceController extends Controller {

    public function __construct() {
		$this->authorizeResource(UserPreference::class, 'userPreference');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user,) {
        $this->authorize('view', [User::class, $user]);

        $userPreference = $user->user_preference();

        if(!empty($request->search)) {
			$userPreference->where('id', 'like', '%' . $request->search . '%');
		}

        $userPreference = $userPreference->paginate(10);

        return view('users.user_preferences.index', compact('user', 'userPreference'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_preferences.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user,) {
        $this->authorize('view', [User::class, $user]);

        $request->validate([]);

        try {

            $userPreference = new UserPreference();

            $userPreference->save();

            return redirect()->route('users.user_preferences.index', compact('user'))->with('success', __('User Preference created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_preferences.create', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\UserPreference $userPreference
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, UserPreference $userPreference,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_preferences.show', compact('user', 'userPreference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UserPreference $userPreference
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, UserPreference $userPreference,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_preferences.edit', compact('user', 'userPreference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, UserPreference $userPreference,) {
        $this->authorize('view', [User::class, $user]);

        $request->validate([]);

        try {

            $userPreference->save();

            return redirect()->route('users.user_preferences.index', compact('user'))->with('success', __('User Preference edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_preferences.edit', compact('user', 'userPreference'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserPreference $userPreference
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, UserPreference $userPreference,) {
        $this->authorize('view', [User::class, $user]);

        try {
            $userPreference->delete();

            return redirect()->route('users.user_preferences.index', compact('user'))->with('success', __('User Preference deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_preferences.index', compact('user'))->with('error', 'Cannot delete User Preference: ' . $e->getMessage());
        }
    }

    
}
