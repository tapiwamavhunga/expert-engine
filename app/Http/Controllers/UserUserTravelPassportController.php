<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserTravelPassport;

class UserUserTravelPassportController extends Controller {

    public function __construct() {
		$this->authorizeResource(UserTravelPassport::class, 'userTravelPassport');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user,) {
        $this->authorize('view', [User::class, $user]);

        $userTravelPassports = $user->user_travel_passports();
		$userTravelPassports->where('user_id', auth()->id());

        if(!empty($request->search)) {
			$userTravelPassports->where('passport_nationality', 'like', '%' . $request->search . '%');
		}

        $userTravelPassports = $userTravelPassports->paginate(10);

        return view('users.user_travel_passports.index', compact('user', 'userTravelPassports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_travel_passports.create', compact('user'));
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

            $userTravelPassport = new UserTravelPassport();
            $userTravelPassport->user_id = auth()->id();
		$userTravelPassport->passport_nationality = $request->passport_nationality;
		$userTravelPassport->passport_number = $request->passport_number;
		$userTravelPassport->passport_date_issued = $request->passport_date_issued;
		$userTravelPassport->passport_date_expiry = $request->passport_date_expiry;
		$userTravelPassport->passport_issued_place = $request->passport_issued_place;
		$userTravelPassport->passport_issued_country = $request->passport_issued_country;
            $userTravelPassport->save();

            return redirect()->route('users.user_travel_passports.index', compact('user'))->with('success', __('User Travel Passport created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_travel_passports.create', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\UserTravelPassport $userTravelPassport
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, UserTravelPassport $userTravelPassport,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_travel_passports.show', compact('user', 'userTravelPassport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UserTravelPassport $userTravelPassport
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, UserTravelPassport $userTravelPassport,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_travel_passports.edit', compact('user', 'userTravelPassport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, UserTravelPassport $userTravelPassport,) {
        $this->authorize('view', [User::class, $user]);

        $request->validate([]);

        try {
            $userTravelPassport->passport_nationality = $request->passport_nationality;
		$userTravelPassport->passport_number = $request->passport_number;
		$userTravelPassport->passport_date_issued = $request->passport_date_issued;
		$userTravelPassport->passport_date_expiry = $request->passport_date_expiry;
		$userTravelPassport->passport_issued_place = $request->passport_issued_place;
		$userTravelPassport->passport_issued_country = $request->passport_issued_country;
            $userTravelPassport->save();

            return redirect()->route('users.user_travel_passports.index', compact('user'))->with('success', __('User Travel Passport edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_travel_passports.edit', compact('user', 'userTravelPassport'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserTravelPassport $userTravelPassport
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, UserTravelPassport $userTravelPassport,) {
        $this->authorize('view', [User::class, $user]);

        try {
            $userTravelPassport->delete();

            return redirect()->route('users.user_travel_passports.index', compact('user'))->with('success', __('User Travel Passport deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_travel_passports.index', compact('user'))->with('error', 'Cannot delete User Travel Passport: ' . $e->getMessage());
        }
    }

    
}
