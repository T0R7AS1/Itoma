<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Company;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::OrderBy('created_at', 'desc')->get()/**->paginate(10)*/;
        return view('employes.index')->with('employes',$employes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view ('employes.create')->with('companies',$companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name' => 'required|string|regex:^[A-Za-z]$^',
            'email' => 'required|email:rfc,dns|unique:employes',
            'telephone' => 'required|between:7,7|regex:/^[0-9]+$/|unique:employes',
            'company_id' => 'required'
        ]);

        $employes = new Employe([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => '3706' . $request->telephone,
            'company_id' => $request->company_id
        ]);

        $employes->save();

        return redirect(route('employes.index'))->with('success', 'Employe added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employes = Employe::find($id);
        return view('employes.show')->with('employes', $employes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();
        $employes = Employe::find($id);
        return view('employes.edit')->with([
            'employes' => $employes,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employes = Employe::where('id', $id)->firstOrFail();

        $this->validate(request(),[
            'name' => 'required|string|regex:^[A-Za-z]$^',
            'email' => 'required|email:rfc,dns|unique:employes,email,'. $employes->id,
            'telephone' => 'required|between:7,7|regex:/^[0-9]+$/|unique:employes,telephone,'. $employes->telephone,
            'company_id' => 'required'
        ]);
        

        $employes->update([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => '3706' . $request->telephone,
            'company_id' => $request->company_id
        ]);


        return redirect(route('employes.index'))->with('success', 'Employe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function destroy($id)
    {
        $employes = Employe::find($id);
        $employes->delete();
        return redirect(route('employes.index'))->with('success', 'Employe deleted successfully');
    }
}
