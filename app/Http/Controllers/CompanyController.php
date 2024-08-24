<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    //show
    public function show($id){
        $company = Company::find($id);
        return view('pages.companies.show', compact('company'));
    }

    //edit
    public function edit($id){
        $company = Company::find($id);
        return view('pages.companies.edit', compact('company'));
    }

    //update
    public function update(Request $request, $id){
        $validasiData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'address' => ['nullable','string'],
            'latitude' => ['nullable','numeric'],
            'longitude' => ['nullable','numeric'],
            'radius_km' => ['nullable','numeric'],
            'time_in' => ['nullable','string'],
            'time_out' => ['nullable','string'],
        ]);
        //update company
        $company = Company::find($id);
        $company->update($validasiData);
        return redirect()->route('companies.show', $id)->with('success', 'Company updated successfully.');
    }
}
