<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserEmegencyContact;

class UserUserEmegencyContactController extends Controller {

    public function __construct() {
		$this->authorizeResource(UserEmegencyContact::class, 'userEmegencyContact');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user,) {
        $this->authorize('view', [User::class, $user]);

        $userEmegencyContact = $user->user_emegency_contact();
		$userEmegencyContact->where('user_id', auth()->id());

        if(!empty($request->search)) {
			$userEmegencyContact->where('name', 'like', '%' . $request->search . '%');
		}

        $userEmegencyContact = $userEmegencyContact->paginate(10);

        return view('users.user_emegency_contacts.index', compact('user', 'userEmegencyContact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_emegency_contacts.create', compact('user'));
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

        $request->validate(["relationship" => "required"]);

        try {

            $userEmegencyContact = new UserEmegencyContact();
            $userEmegencyContact->user_id = auth()->id();
		$userEmegencyContact->name = $request->name;
		$userEmegencyContact->email = $request->email;
		$userEmegencyContact->phone_number = $request->phone_number;
		$userEmegencyContact->relationship = $request->relationship;
		$userEmegencyContact->street = $request->street;
		$userEmegencyContact->city = $request->city;
		$userEmegencyContact->country = $request->country;
		$userEmegencyContact->postal_code = $request->postal_code;
		$userEmegencyContact->state = $request->state;
            $userEmegencyContact->save();

            return redirect()->route('users.user_emegency_contacts.index', compact('user'))->with('success', __('User Emegency Contact created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_emegency_contacts.create', compact('user'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\UserEmegencyContact $userEmegencyContact
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, UserEmegencyContact $userEmegencyContact,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_emegency_contacts.show', compact('user', 'userEmegencyContact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UserEmegencyContact $userEmegencyContact
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, UserEmegencyContact $userEmegencyContact,) {
        $this->authorize('view', [User::class, $user]);

        return view('users.user_emegency_contacts.edit', compact('user', 'userEmegencyContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, UserEmegencyContact $userEmegencyContact,) {
        $this->authorize('view', [User::class, $user]);

        $request->validate(["relationship" => "required"]);

        try {
            $userEmegencyContact->name = $request->name;
		$userEmegencyContact->email = $request->email;
		$userEmegencyContact->phone_number = $request->phone_number;
		$userEmegencyContact->relationship = $request->relationship;
		$userEmegencyContact->street = $request->street;
		$userEmegencyContact->city = $request->city;
		$userEmegencyContact->country = $request->country;
		$userEmegencyContact->postal_code = $request->postal_code;
		$userEmegencyContact->state = $request->state;
            $userEmegencyContact->save();

            return redirect()->route('users.user_emegency_contacts.index', compact('user'))->with('success', __('User Emegency Contact edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_emegency_contacts.edit', compact('user', 'userEmegencyContact'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UserEmegencyContact $userEmegencyContact
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, UserEmegencyContact $userEmegencyContact,) {
        $this->authorize('view', [User::class, $user]);

        try {
            $userEmegencyContact->delete();

            return redirect()->route('users.user_emegency_contacts.index', compact('user'))->with('success', __('User Emegency Contact deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('users.user_emegency_contacts.index', compact('user'))->with('error', 'Cannot delete User Emegency Contact: ' . $e->getMessage());
        }
    }

    
}
