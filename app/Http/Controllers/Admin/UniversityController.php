<?php

namespace App\Http\Controllers\Admin;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{

    //This function for display form page
    public function showUniversityFrom() {
        return view('superAdmin.University.addUniversity');
    }

    //This function show details of university
    public function index(Request $req){
        $query = University::query();

        if($req->filled('filter_uni_name')){
            $query->where('uni_name','like','%'.$req->input('filter_uni_name').'%');
        }
        if($req->filled('filter_uni_type')) {
            $query->where('uni_type', $req->input('filter_uni_type'));
        }

        $universities = $query->paginate(5);
        return view('superAdmin.University.showUniversity',compact('universities'));
    }

    // This Function for store the university data
    public function storeUniversity(Request $req){
        $req->validate([
            'uni_name' => 'required|string|max:255',
            'uni_website' => 'required|url|max:255',
            'uni_phone' => 'required|max:10|min:10',
            'email' => 'required|email|max:255',
            'uni_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'uni_type' => 'required|in:Deemed,Central,State,Private',
            'uni_address' => 'required|string',
            'uni_established_year' => 'required|digits:4|integer|min:1900|max:2024' . date('Y'),
            'uni_description' => 'required|string',
        ]);

        // Handle image upload
        if ($req->hasFile('uni_logo')) {
            $imageName = $req->file('uni_logo')->getClientOriginalName();
            $req->file('uni_logo')->move(public_path('/universities/logos/'), $imageName);
        } else {
            return back()->withErrors([
                'uni_logo' => 'Profile image is required.',
            ]);
        }

        $maxId = University::max('id');
        $newId = $maxId+1;

        University::create([
            'id' => $newId,
            'uni_name' => $req->uni_name,
            'uni_website'=>$req->uni_website,
            'uni_phone'=>$req->uni_phone,
            'email'=>$req->email,
            'uni_address'=>$req->uni_address,
            'uni_established_year' => $req->uni_established_year,
            'uni_logo' => $imageName,
            'uni_type' => $req->uni_type,
            'uni_description' => $req->uni_description,
            'uni_verifid' => true,
        ]);
        return redirect()->route('admin.showUniversity')->with('success', 'University added successfully.');
    }

    //This function for Display more details
    public function show($id){
        $university = University::find($id);

        if (!$university) {
            return redirect()->route('admin.showUniversity')->withErrors('University not found.');
        }

        return view('superAdmin.University.universityDetails', compact('university'));
    }

    //This function edit form open with data
    public function editUniversity($id){
        $university = University::findOrFail($id);

        return view('superAdmin.University.addUniversity',compact('university'));

    }

    public function updateUniversity(Request $req,$id){
        $req->validate([
            'uni_name' => 'required|string|max:255',
            'uni_website' => 'required|url|max:255',
            'uni_phone' => 'required|max:10|min:10',
            'email' => 'required|email|max:255',
            'uni_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'uni_type' => 'required|in:Deemed,Central,State,Private',
            'uni_address' => 'required|string',
            'uni_established_year' => 'required|digits:4|integer|min:1900|max:2024' . date('Y'),
            'uni_description' => 'required|string',
        ]);


        $university = University::findOrFail($id);

        $imageName = $university->uni_logo; // Use existing logo if no new logo is uploaded
        if ($req->hasFile('uni_logo')) {
            $imageName = $req->file('uni_logo')->getClientOriginalName();
            $req->file('uni_logo')->move(public_path('/universities/logos/'), $imageName);
        }

        $university->update([
            'uni_name' => $req->uni_name,
            'uni_website'=>$req->uni_website,
            'uni_phone'=>$req->uni_phone,
            'email'=>$req->email,
            'uni_address'=>$req->uni_address,
            'uni_established_year' => $req->uni_established_year,
            'uni_logo' => $imageName,
            'uni_type' => $req->uni_type,
            'uni_description' => $req->uni_description,
            'uni_verifid' => true,
        ]);
        return redirect()->route('admin.showUniversity')->with('success', 'University added successfully.');
    }

    //This function for Delete University
    public function deleteData($id){
        $university = University::findOrFail($id);
        $university->delete();
        return redirect()->route('admin.showUniversity');
    }

}
