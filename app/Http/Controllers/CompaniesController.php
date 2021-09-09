<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CompanyCreated;
use App\Models\Employe;
use App\Models\Company;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isEmpty;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::OrderBy('created_at', 'desc')->get()/**->paginate(10) */;
        return view('companies.index')->with('companies',$companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'name' => 'required|string|unique:companies',
            'email' => 'required|email:rfc,dns|unique:companies',
            'website' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2040'
        ]);

        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('storage'),$imageName);

        $companies = new Company([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'image' => $imageName
        ]);
        $companies->save();
    
        $data = $request->all();
        Mail::to($request->email)->send(new CompanyCreated($data));

        return redirect(route('companies.index'))->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Company::find($id);
        return view('companies.show')->with('companies', $companies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::find($id);
        return view('companies.edit')->with('companies', $companies);
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
        $companies = Company::where('id', $id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|unique:companies,name,' . $companies->id,
            'email' => 'required|email:rfc,dns|unique:companies,email,' . $companies->id,
            'website' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        if ($request->hasFile("image")) {
            if (File::exists('storage/'.$companies->image)) {
                File::delete('storage/'.$companies->image);
            }
            $file = $request->file("image");
            $companies->image = time()."_".$file->getClientOriginalName();
            $file->move(\public_path('storage'),$companies->image);
            $request['image'] = $companies->image;
        }
        $companies->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'image' => $companies->image
        ]);

        return redirect(route('companies.index'))->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Company::find($id);

        $employesCount = Employe::where('company_id', $companies->id)->get();

        $employesCount = count($employesCount);

        if ($employesCount == 0) {
            if (File::exists('storage/'.$companies->image)) {
                File::delete('storage/'.$companies->image);
            }
            $companies->delete();
            return redirect(route('companies.index'))->with('success', 'Company deleted successfully');
        }else {
            return redirect()->back()->with('error', 'Sorry company has employees');
        }
    }
}
