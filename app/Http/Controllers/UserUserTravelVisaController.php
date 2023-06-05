<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserTravelVisa;

class UserUserTravelVisaController extends Controller {

    public function __construct() {
		$this->authorizeResource(UserTravelVisa::class, 'userTravelVisa');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user,) {
        $this->authorize('view', [User::class, $user]);

        $userTravelVisas = $user->user_travel_visas();
		$userTravelVisas->where('user_id', auth()->id());

        if(!empty($request->search)) {
			$userTravelVisas->where('visa_nationality', 'like', '%' . $request->search . '%');
		}

        $userTravelVisas = $userTravelVisas->paginate(10);

        return view('users.user_travel_visas.index', compact('user', 'userTravelVisas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_travel_visas.create', compact('user'));
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

            $userTravelVisa = new UserTravelVisa();
            $userTravelVisa->user_id = auth()->id();
		$userTravelVisa->visa_nationality = $request->visa_nationality;
		$userTravelVisa->visa_type = $request->visa_type;
		$userTravelVisa->visa_number = $request->visa_number;
		$userTravelVisa->visa_number_expiration = $request->visa_number_expiration;
            $userTravelVisa->save();

            return redirect()->route('users.user_travel_visas.index', compact('user'))->with('success', __('User Travel Visa created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_travel_visas.create', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\UserTravelVisa $userTravelVisa
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, UserTravelVisa $userTravelVisa,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_travel_visas.show', compact('user', 'userTravelVisa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UserTravelVisa $userTravelVisa
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, UserTravelVisa $userTravelVisa,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_travel_visas.edit', compact('user', 'userTravelVisa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, UserTravelVisa $userTravelVisa,) {
        $this->authorize('view', [User::class, $user]);

        $request->validate([]);

        try {
            $userTravelVisa->visa_nationality = $request->visa_nationality;
		$userTravelVisa->visa_type = $request->visa_type;
		$userTravelVisa->visa_number = $request->visa_number;
		$userTravelVisa->visa_number_expiration = $request->visa_number_expiration;
            $userTravelVisa->save();

            return redirect()->route('users.user_travel_visas.index', compact('user'))->with('success', __('User Travel Visa edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_travel_visas.edit', compact('user', 'userTravelVisa'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserTravelVisa $userTravelVisa
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, UserTravelVisa $userTravelVisa,) {
        $this->authorize('view', [User::class, $user]);

        try {
            $userTravelVisa->delete();

            return redirect()->route('users.user_travel_visas.index', compact('user'))->with('success', __('User Travel Visa deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_travel_visas.index', compact('user'))->with('error', 'Cannot delete User Travel Visa: ' . $e->getMessage());
        }
    }

    
}
