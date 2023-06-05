<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller {

    public function __construct() {
		$this->authorizeResource(Company::class, 'company');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ) {

        $companies = Company::query();

		if (!!$request->trashed) {
			$companies->withTrashed();
		}

        if(!empty($request->search)) {
			$companies->where('name', 'like', '%' . $request->search . '%');
		}

        $companies = $companies->paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('companies.create', []);
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

            $company = new Company();
            $company->name = $request->name;
		$company->contact_person = $request->contact_person;
		$company->email = $request->email;
		$company->phone = $request->phone;
            $company->save();

            return redirect()->route('admin.companies.index', [])->with('success', __('Company created successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.companies.create', [])->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company,) {

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company,) {

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company,) {

        $request->validate([]);

        try {
            $company->name = $request->name;
		$company->contact_person = $request->contact_person;
		$company->email = $request->email;
		$company->phone = $request->phone;
            $company->save();

            return redirect()->route('admin.companies.index', [])->with('success', __('Company edited successfully.'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.companies.edit', compact('company'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company,) {

        try {
            $company->delete();

            return redirect()->route('admin.companies.index', [])->with('success', __('Company deleted successfully'));
        } catch (\Throwable $e) {
            return redirect()->route('admin.companies.index', [])->with('error', 'Cannot delete Company: ' . $e->getMessage());
        }
    }

    //@softdelete

    /**
     * Restore the specified deleted resource from storage.
     *
     * @param \App\Models\Company $company
     *
     * @return \Illuminate\Http\Response
     */
    public function restore( int $company_id,) {

        $company = Company::withTrashed()->find($company_id);
        $this->authorize('delete', [Company::class, $company]);

        if (!empty($company)) {
            $company->restore();
            return redirect()->route('admin.companies.index', [])->with('success', __('Company restored successfully'));
        } else {
            return redirect()->route('admin.companies.index', [])->with('error', 'Company not found');
        }
    }

    public function purge( int $company_id,) {

        $company = Company::withTrashed()->find($company_id);
        $this->authorize('delete', [Company::class, $company]);

        if (!empty($company)) {
            $company->forceDelete();
            return redirect()->route('admin.companies.index', [])->with('success', __('Company purged successfully'));
        } else {
            return redirect()->route('admin.companies.index', [])->with('error', __('Company not found'));
        }
    }
    //@endsoftdelete
}
