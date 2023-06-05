<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;

class CountryController extends Controller {

    public function __construct() {
		$this->authorizeResource(Country::class, 'country');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $countries = Country::query();

        if(!empty($request->search)) {
			$countries->where('code', 'like', '%' . $request->search . '%');
		}

        $countries = $countries->paginate(10);

        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('countries.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ) {

        $request->validate(["code" => "required", "name" => "required"]);

        try {

            $country = new Country();
            $country->code = $request->code;
		$country->name = $request->name;
            $country->save();

            return redirect()->route('countries.index', [])->with('success', __('Country created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('countries.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Country $country
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country,) {

        return view('countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Country $country
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country,) {

        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country,) {

        $request->validate(["code" => "required", "name" => "required"]);

        try {
            $country->code = $request->code;
		$country->name = $request->name;
            $country->save();

            return redirect()->route('countries.index', [])->with('success', __('Country edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('countries.edit', compact('country'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Country $country
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country,) {

        try {
            $country->delete();

            return redirect()->route('countries.index', [])->with('success', __('Country deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('countries.index', [])->with('error', 'Cannot delete Country: ' . $e->getMessage());
        }
    }

    
}
