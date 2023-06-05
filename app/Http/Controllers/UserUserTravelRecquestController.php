<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserTravelRecquest;

class UserUserTravelRecquestController extends Controller {

    public function __construct() {
		$this->authorizeResource(UserTravelRecquest::class, 'userTravelRecquest');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user,) {
        $this->authorize('view', [User::class, $user]);

        $userTravelRecquest = $user->user_travel_recquest();
		$userTravelRecquest->where('user_id', auth()->id());

        if(!empty($request->search)) {
			$userTravelRecquest->where('home_address', 'like', '%' . $request->search . '%');
		}

        $userTravelRecquest = $userTravelRecquest->paginate(10);

        return view('users.user_travel_recquests.index', compact('user', 'userTravelRecquest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_travel_recquests.create', compact('user'));
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

            $userTravelRecquest = new UserTravelRecquest();
            $userTravelRecquest->user_id = auth()->id();
		$userTravelRecquest->home_address = $request->home_address;
		$userTravelRecquest->street = $request->street;
		$userTravelRecquest->city = $request->city;
		$userTravelRecquest->state = $request->state;
		$userTravelRecquest->postal_code = $request->postal_code;
		$userTravelRecquest->country = $request->country;
		$userTravelRecquest->work_phone = $request->work_phone;
		$userTravelRecquest->home_phone = $request->home_phone;
		$userTravelRecquest->work_email = $request->work_email;
            $userTravelRecquest->save();

            return redirect()->route('users.user_travel_recquests.index', compact('user'))->with('success', __('User Travel Recquest created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_travel_recquests.create', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\UserTravelRecquest $userTravelRecquest
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, UserTravelRecquest $userTravelRecquest,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_travel_recquests.show', compact('user', 'userTravelRecquest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UserTravelRecquest $userTravelRecquest
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, UserTravelRecquest $userTravelRecquest,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_travel_recquests.edit', compact('user', 'userTravelRecquest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, UserTravelRecquest $userTravelRecquest,) {
        $this->authorize('view', [User::class, $user]);

        $request->validate([]);

        try {
            $userTravelRecquest->home_address = $request->home_address;
		$userTravelRecquest->street = $request->street;
		$userTravelRecquest->city = $request->city;
		$userTravelRecquest->state = $request->state;
		$userTravelRecquest->postal_code = $request->postal_code;
		$userTravelRecquest->country = $request->country;
		$userTravelRecquest->work_phone = $request->work_phone;
		$userTravelRecquest->home_phone = $request->home_phone;
		$userTravelRecquest->work_email = $request->work_email;
            $userTravelRecquest->save();

            return redirect()->route('users.user_travel_recquests.index', compact('user'))->with('success', __('User Travel Recquest edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_travel_recquests.edit', compact('user', 'userTravelRecquest'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserTravelRecquest $userTravelRecquest
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, UserTravelRecquest $userTravelRecquest,) {
        $this->authorize('view', [User::class, $user]);

        try {
            $userTravelRecquest->delete();

            return redirect()->route('users.user_travel_recquests.index', compact('user'))->with('success', __('User Travel Recquest deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_travel_recquests.index', compact('user'))->with('error', 'Cannot delete User Travel Recquest: ' . $e->getMessage());
        }
    }

    
}
