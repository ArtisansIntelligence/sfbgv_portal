<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Grade;
use App\Models\Candidate;
use App\Models\CandidateCase;
use App\Models\Qualification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "CV"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];
        $grades = Grade::select('id', 'name')->get();
        return view('pages.candidate.cv', ['breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs, 'grades' => $grades]);
    }

    public function getCandidates()
    {
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "CV"],
        ];
        //Pageheader set true for breadcrumbs
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => true];
        $candidates = Candidate::all();
        return view('pages.candidate.list', ['breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs, 'candidates' => $candidates]);
    }

    public function store(Request $request)
    {
        // $allExperiences = $request->experience;
        // return response()->json($request->experience);

        $validatedCandidate = Validator::make($request->candidate, [
            'client_ref_id' => 'required',
            'employee_id' => 'required|numeric',
            'sf_ref_no' => 'required',
            'name' => 'required|max:100',
            'father_name' => 'required|max:100',
            // 'image' => 'sometimes|mimes:pdf,jpg,png|max:2048',
            'gender' => 'required',
            'dob' => 'required',
            'doj' => 'required',
            'mobile' => 'required',
            'email' => 'required|unique:candidates,email',
            'zone' => 'required',
            'business_unit' => 'required',
            'grade' => 'required',
            'passport_no' => 'required|numeric',
            'pancard_no' => 'required|numeric',
            'aadharcard_no' => 'required|numeric',
        ]);

        if ($validatedCandidate->fails()) {
            return response()->json(['errors' => $validatedCandidate->getMessageBag()->toArray()], 422);
        }

        $validatedAddress = Validator::make($request->address, [
            'address' => 'required',
            'state' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|numeric',
            'permanent_address' => 'sometimes',
            'permanent_state' => 'sometimes|string',
            'permanent_city' => 'sometimes|string',
            'permanent_pincode' => 'sometimes|numeric',
        ]);

        if ($validatedAddress->fails()) {
            return response()->json(['errors' => $validatedAddress->getMessageBag()->toArray()], 422);
        }


        $validatedQualification = Validator::make($request->education, [
            'qualificationName' => 'required|string',
            'collegeName' => 'required|string',
            'collegeAddress' => 'required|string',
            'universityName' => 'required|string',
            'year_of_passing' => 'required|numeric',
            'uniqueIdentification' => 'required|numeric',
        ]);

        if ($validatedQualification->fails()) {
            return response()->json(['errors' => $validatedQualification->getMessageBag()->toArray()], 422);
        }

        if (!($validatedAddress && $validatedCandidate && $validatedQualification)) {
            return response()->json(['message' => 'One of validation failed']);
        }

        if ($validatedAddress && $validatedCandidate && $validatedQualification) {

            // $validatedCandidate['image'] = $this->candidateFiles(request: $request, directory: "client", name: "image");
            $newCandidateId = Candidate::create(array_merge($request->candidate, ['updated_by' => 1, 'created_by' => 1]))->id;
            $candidateAddress = $request->address;
            if ($request->check_permanent_address) {
                $candidateAddress['permanent_address'] = $candidateAddress['address'];
                $candidateAddress['permanent_state'] = $candidateAddress['state'];
                $candidateAddress['permanent_city'] = $candidateAddress['city'];
                $candidateAddress['permanent_pincode'] = $candidateAddress['pincode'];
            }
            $newAddress = Address::create(array_merge($candidateAddress, ['candidate_id' => $newCandidateId, 'updated_by' => 1, 'created_by' => 1]));
            $newQualification = Qualification::create([
                'candidate_id' => $newCandidateId,
                'candidate_id' => 1,
                'qual_name' => $request->education['qualificationName'],
                'college' => $request->education['collegeName'],
                'address' => $request->education['collegeAddress'],
                'university' => $request->education['universityName'],
                'roll_reg_enroll_pin_hall_no' => $request->education['uniqueIdentification'],
                'year_of_passing' => $request->education['year_of_passing'],
                'updated_by' => 1,
                'created_by' => 1
            ]);
            // if ($newQualification) {
            //     return response()->json(['message' => 'new qual created']);
            // } else {
            //     return response()->json(['message' => 'qual creation failed Failed']);
            // }
            // if (!$request->is_fresher) {
            //     $allExperience = $request->experience;
            // }

        }

        if (!$newCandidateId) {
            return response()->json(['message' => 'Some error occurred with insert query']);
        }
        return response()->json(['message' => 'Generated candidate successfully']);
    }

    public function candidateFiles($request, $directory, $name)
    {
        if (!$request->hasFile($name)) {
            return null;
        }
        $fileName = str($request->client_ref_id . '-' . $request->name)->slug('-', 'en') . '.' . $request->$name->extension();
        $filePath = $request->file($name)->move(public_path($directory), $fileName);
        return ($filePath) ?  $directory . '/' . $fileName : 'Failure';
    }

    public function uploadFiles()
    {
    }

    public function createCase()
    {
        // dd("sd");
        $breadcrumbs = [
            ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "CV"],
        ];
        $candidates = array();
        return view('pages.candidate.create', ['breadcrumbs' => $breadcrumbs, 'candidates' => $candidates]);
    }

    public function addCase(Request $request)
    {
        $validatedCandidate = $this->validate($request, [
            "client_ref_id" => "required|numeric",
            "employee_id" => "required|numeric",
            "sf_ref_no" => "required|numeric",
            "name" => "required|max:100",
            "father_name" => "required|max:100",
            "gender" => "required|string",
            "dob" => "required",
            "doj" => "required",
            "mobile" => "required|min:10|numeric",
            "email" => "required|unique:candidates,email",
            "zone" => "required",
            "business_unit" => "required",
            "grade" => "required"
        ]);

        $validatedCase = $this->validate($request, [
            "app_no" => "required|numeric",
            "initial_date" => "required",
            "report_type" => "",
            "interim_rep_upload_date" => "",
            "interim_rep_upload_color" => "",
            "final_rep_upload_date" => "",
            "final_rep_color" => "",
            "supp_rep_upload_date" => "",
            "supp_rep_color" => "",
            "remarks" => ""
        ]);

        if (!$validatedCandidate || !$validatedCase) {
            return back()->with(['status' => 'Error', 'message' => 'Some error occurred with insert query']);
        }
        // return back()->with(['status' => 'success', 'message' => 'Generated candidate successfully']);
        if ($validatedCase && $validatedCandidate) {

            $newCandidateId = Candidate::create($validatedCandidate)->id;

            $validatedCase['candidate_id'] = $newCandidateId;
            $validatedCase['created_by'] = $newCandidateId;
            $validatedCase['updated_by'] = $newCandidateId;
            // echo "<pre>";var_dump($validatedCase);die;
            CandidateCase::create($validatedCase);
        }

        return back()->with(['status' => 'success', 'message' => 'Generated candidate successfully']);
    }
}
