<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index', compact('companies'), [
            'title' => 'Company Details'
        ]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'regno' => 'required|string|max:255',
            'regdate' => 'required|date',
            'pan' => 'required|string|max:255',
            'panregdate' => 'required|date',
            'vat' => 'required|string|max:255',
            'tole' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'ward' => 'required|numeric',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'oemail' => 'required|email',
            'accno' => 'required|string|max:255',
            'bankname' => 'required|string|max:255',
            'bankbranch' => 'required|string|max:255',
            'signature' => 'required|string|max:255',
            'created' => 'required|date',
            'cid' => 'required|string|max:255',
            'cpassword' => 'required|string|max:255',
            'rid' => 'required|string|max:255',
            'rpassword' => 'required|string|max:255',
            'remail' => 'required|email',
            'rphone' => 'required|string|max:15',
            'rcontactperson' => 'required|string|max:255',
            
        ]);

        // Add the user ID to the validated data
        $validatedData['user_id'] = Auth::id();

        $userDetail = Company::where('user_id', Auth::id())->first();
            
        if ($userDetail) {
            // If the user already has an address, update the existing record
            $userDetail->update($validatedData);
            $message = 'Your address details have been updated!';
        } else {
            // If no address exists, create a new record
            $userDetail = new Company($validatedData);
            $userDetail->save();
            $message = 'Your address details have been saved!';
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', $message);
    }

    public function delete($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->back()->with('success', 'Company deleted successfully!');
    }
}
