<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserProfile;

class UserUserProfileController extends Controller {

    public function __construct() {
		$this->authorizeResource(UserProfile::class, 'userProfile');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user,) {
        $this->authorize('view', [User::class, $user]);

        $userProfiles = $user->user_profiles();
		$userProfiles->where('user_id', auth()->id());

        if(!empty($request->search)) {
			$userProfiles->where('home_address', 'like', '%' . $request->search . '%');
		}

        $userProfiles = $userProfiles->paginate(10);

        return view('users.user_profiles.index', compact('user', 'userProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_profiles.create', compact('user'));
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

            $userProfile = new UserProfile();
            $userProfile->user_id = auth()->id();
		$userProfile->home_address = $request->home_address;
		$userProfile->street = $request->street;
		$userProfile->city = $request->city;
		$userProfile->state = $request->state;
		$userProfile->postal_code = $request->postal_code;
		$userProfile->country = $request->country;
		$userProfile->work_phone = $request->work_phone;
		$userProfile->home_phone = $request->home_phone;
		$userProfile->work_email = $request->work_email;
            $userProfile->save();

            return redirect()->route('users.user_profiles.index', compact('user'))->with('success', __('User Profile created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_profiles.create', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\UserProfile $userProfile
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, UserProfile $userProfile,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_profiles.show', compact('user', 'userProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UserProfile $userProfile
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, UserProfile $userProfile,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_profiles.edit', compact('user', 'userProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, UserProfile $userProfile,) {
        $this->authorize('view', [User::class, $user]);

        $request->validate([]);

        try {
            $userProfile->home_address = $request->home_address;
		$userProfile->street = $request->street;
		$userProfile->city = $request->city;
		$userProfile->state = $request->state;
		$userProfile->postal_code = $request->postal_code;
		$userProfile->country = $request->country;
		$userProfile->work_phone = $request->work_phone;
		$userProfile->home_phone = $request->home_phone;
		$userProfile->work_email = $request->work_email;
            $userProfile->save();

            return redirect()->route('users.user_profiles.index', compact('user'))->with('success', __('User Profile edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_profiles.edit', compact('user', 'userProfile'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserProfile $userProfile
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, UserProfile $userProfile,) {
        $this->authorize('view', [User::class, $user]);

        try {
            $userProfile->delete();

            return redirect()->route('users.user_profiles.index', compact('user'))->with('success', __('User Profile deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_profiles.index', compact('user'))->with('error', 'Cannot delete User Profile: ' . $e->getMessage());
        }
    }

    
}
