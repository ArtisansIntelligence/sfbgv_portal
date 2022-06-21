@extends('layouts.app')
@section('title','Candidate')

@push('styles')
<style>
    html {
        overflow-x: hidden;
    }
</style>
@endpush
@section('content')

<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>Candidate</span></h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Candidates</a></li>
                        <li class="breadcrumb-item active">Create Candidate</li>
                    </ol>
                </div>
                {{-- <div class="col s2 m6 l6">
                    <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="#!"
                        data-target="dropdown1"><i class="material-icons hide-on-med-and-up">settings</i><span
                            class="hide-on-small-onl">Settings</span><i
                            class="material-icons right">arrow_drop_down</i></a>
                    <ul class="dropdown-content" id="dropdown1" tabindex="0">
                        <li tabindex="0">
                            <a class="grey-text text-darken-2" href="user-profile-page.html">Profile<span
                                    class="new badge red">2</span></a>
                        </li>
                        <li tabindex="0"><a class="grey-text text-darken-2" href="app-contacts.html">Contacts</a></li>
                        <li tabindex="0"><a class="grey-text text-darken-2" href="page-faq.html">FAQ</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li tabindex="0"><a class="grey-text text-darken-2" href="user-login.html">Logout</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <!-- users view start -->
            <div class="row">
                <!-- Candidate Information Form -->
                <div class="col l1"></div>
                <div class="col s12 m12 l10">
                    <div class="card card card-default scrollspy">
                        <div class="card-content">

                            <!--Errors -->
                            <div class="row">
                                <div class="col m3"></div>
                                <div class="col s12 m6">
                                    @if (session()->has('status'))
                                    <ul class="center mb-5 teal lighten-4 pt-1 pb-1">
                                        <li class="teal-text center pt-1">{{
                                            ucfirst(session()->get('status'))
                                            .' : '.session()->get('message') }}</li>
                                    </ul>
                                    @endif
                                    @if($errors->any())
                                    <ul class="center mb-5 lighten-4 red pt-1 pb-1">
                                        @foreach ($errors->all() as $error)
                                        <li class="red-text center pt-1">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                                <div class="col m3"></div>
                            </div>
                            <!--Errors -->

                            <h4 class="card-title">Candidate Details</h4>
                            <form method="POST" action="{{ route('candidate.post') }}" enctype="multipart/form-data">
                                @csrf
                                <!--Candidate Profile -->
                                <div class="row">
                                    <div class="col s12 mb-2">
                                        <div class="media mt-2 display-flex align-items-center mb-2">
                                            <a class="mr-2" href="javascript:void(0)">
                                                <img src="{{asset('assets/images/avatar/avatar-9.png')}}"
                                                    id="candidate_imagepreview" name="candidate_imagepreview"
                                                    alt="users avatar" class="z-depth-4 circle" height="150"
                                                    width="150">
                                            </a>
                                            <div class="media-body">
                                                <div class="user-edit-btns display-flex flex-column">
                                                    <a href="javascript:void(0)" class="btn-small indigo mb-2"
                                                        onclick="document.getElementById('image').click();">Change</a>
                                                    <input type="file" name="image" hidden onchange="loadFile(event)"
                                                        id="image">
                                                    <a href="javascript:void(0)"
                                                        onclick="document.getElementById('image').value='';document.getElementById('candidate_imagepreview').src='{{ asset('assets/images/avatar/avatar-9.png') }}'"
                                                        class="btn-small mt-2">Reset</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Candidate Profile End -->

                                <!--Candidate Information -->
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <input placeholder="Sam John" id="name" name="name" type="text"
                                            class="validate">
                                        <label for="name">Candidate Full Name</label>
                                    </div>

                                    <div class="input-field col m4 s12">
                                        <input placeholder="Father John" id="father_name" name="father_name" type="text"
                                            class="validate">
                                        <label for="father_name">Candidate Father's Name</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input placeholder="Father John" id="email" name="email" type="email"
                                            class="validate">
                                        <label for="email">Email</label>
                                    </div>

                                    <div class="input-field col m4 s12">
                                        <input type="text" class="datepicker" name="dob" id="dob">
                                        <label for="dob">Date of Birth</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input placeholder="7350XXXX82" id="mobile" name="mobile" type="tel"
                                            class="validate">
                                        <label for="mobile">Mobile</label>
                                    </div>

                                    <div class="input-field col m4 s12">
                                        <input type="text" class="datepicker" name="doj" id="doj">
                                        <label for="doj">Date of Joining</label>
                                    </div>

                                    <div class="input-field col m4 s12">
                                        <select id="gender" name="gender">
                                            <option disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <label>Select Gender</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <select name="zone">
                                            <option disabled selected>Select Zone</option>
                                            <option value="North">North</option>
                                            <option value="South">South</option>
                                            <option value="East">East</option>
                                            <option value="West">West</option>
                                        </select>
                                        <label>Select Zone</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <select name="grade">
                                            <option disabled selected>Select Grade</option>
                                            @forelse ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label>Select Grade</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input placeholder="Business" id="business_unit" name="business_unit"
                                            type="text" class="validate">
                                        <label for="business_unit">Business Unit</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input placeholder="2131" id="client_ref_id" name="client_ref_id" type="text"
                                            class="validate">
                                        <label for="client_ref_id">Client Ref Number</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input placeholder="2131" id="employee_id" name="employee_id" type="text"
                                            class="validate">
                                        <label for="employee_id">Employee Code</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input placeholder="2131" id="passport_no" name="passport_no" type="text"
                                            class="validate">
                                        <label for="passport_no">Passport Number</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input placeholder="2131" id="pancard_no" name="pancard_no" type="text"
                                            class="validate">
                                        <label for="pancard_no">Pancard Number</label>
                                    </div>
                                    <div class="input-field col m4 s12">
                                        <input placeholder="2131" id="aadharcard_no" name="aadharcard_no" type="text"
                                            class="validate">
                                        <label for="aadharcard_no">Aadhar Card Number</label>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col s12 m6 file-field input-field">
                                        <div class="btn-small ml-1 float-right">
                                            <span>Resume</span>
                                            <input type="file" name="file_resume">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12 m6 file-field input-field">
                                        <div class="btn-small ml-1 float-right">
                                            <span>Passport</span>
                                            <input type="file" name="file_passport">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12 m6 file-field input-field">
                                        <div class="btn-small ml-1 float-right">
                                            <span>Pan Card</span>
                                            <input type="file" name="file_pancard">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="col s12 m6 file-field input-field">
                                        <div class="btn-small ml-1 float-right">
                                            <span>Aadhar</span>
                                            <input type="file" name="file_aadharcard">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                                <!--Candidate Information End -->


                                <!--Candidate Address -->
                                <div class="row mt-4 pt-2">
                                    <div class="col s12">
                                        <div class="card">
                                            <div class="card-content">
                                                <h5>Candidate Address </h5>
                                                <p class="caption mb-0">(Documents like Aadhar Card,
                                                    Passport,
                                                    Electricity Bill, Rent Agreement,
                                                    Election Card, Gas Connection can be used as Address
                                                    Proof)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="address" name="address" class="materialize-textarea"></textarea>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m3 s12">
                                        <input placeholder="Mumbai" id="city" name="city" type="text" class="validate">
                                        <label for="city">City</label>
                                    </div>
                                    <div class="input-field col m3 s12">
                                        <input placeholder="Maharashtra" id="state" name="state" type="text"
                                            class="validate">
                                        <label for="state">State</label>
                                    </div>
                                    <div class="input-field col m2 s12">
                                        <input placeholder="21314" id="pincode" name="pincode" type="text"
                                            class="validate">
                                        <label for="pincode">Pincode</label>
                                    </div>

                                    <div class="col s12 m4 file-field input-field">
                                        <div class="btn-small ml-1 float-right">
                                            <span>Address Proof</span>
                                            <input type="file" name="file_address_proof">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                                <!--Candidate Address End -->

                                <!--Candidate Permanent Address -->
                                <div class="row mt-5 pt-2">
                                    <div class="col s12">
                                        <div class="card">
                                            <div class="card-content">
                                                <h5>Candidate Permanent Address</h5>
                                                <p class="caption mb-0">(Documents like Aadhar Card,
                                                    Passport,
                                                    Electricity Bill, Rent Agreement,
                                                    Election Card, Gas Connection can be used as Address
                                                    Proof)
                                                </p>
                                                <label class="mt-1">
                                                    <input type="checkbox" id="check_permanent_address"
                                                        name="check_permanent_address" />
                                                    <span>Same as above address</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="permanent_address" name="permanent_address"
                                            class="materialize-textarea"></textarea>
                                        <label for="permanent_address">Address</label>
                                    </div>
                                    <div class="input-field col m3 s12">
                                        <input placeholder="Mumbai" id="permanent_city" name="permanent_city"
                                            type="text" class="validate">
                                        <label for="permanent_city">City</label>
                                    </div>
                                    <div class="input-field col m3 s12">
                                        <input placeholder="Maharashtra" id="permanent_state" name="permanent_state"
                                            type="text" class="validate">
                                        <label for="permanent_state">State</label>
                                    </div>
                                    <div class="input-field col m2 s12">
                                        <input placeholder="21314" id="permanent_pincode" name="permanent_pincode"
                                            type="text" class="validate">
                                        <label for="permanent_pincode">Pincode</label>
                                    </div>

                                    <div class="col s12 m4 file-field input-field">
                                        <div class="btn-small ml-1 float-right">
                                            <span>Address Proof</span>
                                            <input type="file" id="file_permanent_address_proof"
                                                name="file_permanent_address_proof">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                                <!--Candidate Permanent Address End -->

                                <!-- Highest Qualification -->
                                <div class="row mt-2 pt-2">
                                    <div class="col s12">
                                        <div class="card">
                                            <div class="card-content">
                                                <h5>Highest Qualification</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input placeholder="Bsc - IT" id="qual_name" name="qual_name" type="text"
                                            class="validate">
                                        <label for="qual_name">Name of Qualification</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input placeholder="Usha Pravin Gandhi" id="qual_college" name="qual_college"
                                            type="text" class="validate">
                                        <label for="qual_college">Name of College/Insitute</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea id="qual_address" name="qual_address"
                                            class="materialize-textarea"></textarea>
                                        <label for="qual_address">Address</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input placeholder="Mumbai University" id="qual_university"
                                            name="qual_university" type="text" class="validate">
                                        <label for="qual_university">Name of University</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input placeholder="2012" id="qual_yop" name="qual_yop" type="text"
                                            class="validate">
                                        <label for="qual_yop">Year of Passing</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input placeholder="2012" id="qual_roll" name="qual_roll" type="text"
                                            class="validate">
                                        <label for="qual_roll">Unique Identification (RollNo/Reg No/Enroll
                                            No/
                                            PU Pin No/Hall Ticket Number )</label>
                                    </div>
                                </div>
                                <!-- Highest Qualification End -->

                                <!--Employment -->
                                <div class="row mt-2 pt-2">
                                    <div class="col s12">
                                        <div class="card">
                                            <div class="card-content">
                                                <h5>Employment History</h5>
                                                <p class="caption mb-0">(Please provide past employment
                                                    details
                                                    with proof Or check if Fresher)
                                                </p>
                                                <div
                                                    style="display: flex;justify-content:space-between;align-items:end;">
                                                    <div>
                                                        <label class="mt-1">
                                                            <input type="checkbox" id="check_fresher"
                                                                name="check_fresher" />
                                                            <span>Is Fresher</span>
                                                        </label>
                                                    </div>
                                                    <button type="button" id="clickBtn" class="btn btn-small mt-1">Add
                                                        Employment
                                                        History</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="experience_row">
                                </div>
                                <!--Employment End -->

                                <!-- Dropdown & Feedback -->
                                <div class="row mt-2 pt-2">
                                    <div class="col s12">
                                        <div class="card">
                                            <div class="card-content">
                                                <h5>Upload Additional Attachments </h5>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 file-field input-field">
                                        <div class="btn-small ml-1 float-right">
                                            <span>Additional Attachments</span>
                                            <input type="file" multiple id="file_additional_attachments"
                                                name="file_additional_attachments">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn cyan waves-effect waves-light right" type="submit"
                                            id="btn-submit">Submit
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>
                                </div>
                        </div>
                        <!-- Dropdown & Feedback  End-->
                        </form>
                    </div>
                </div>
                <div class="col l1"></div>
            </div>



            <!-- users view ends -->

        </div>
    </div>
</div>
@endsection

@push('scripts')

<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-script.js') }}"></script>
@endpush