@extends('layouts.app')
@section('title','Spokesperson Create')

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/dropify/css/dropify.min.css') }}" />
<style>
    html {
        overflow-x: hidden;
    }
</style>
@endpush

@section('content')

<div class="row">
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>New Case</span></h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Cases</a></li>
                            <li class="breadcrumb-item active">Create Case</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="section">


                    <div class="row">
                        <div class="col l2"></div>
                        <!-- Candidate Information Form -->
                        <div class="col s12 m12 l8">
                            <div class="card card card-default scrollspy">
                                <div class="card-content">

                                    <!--Errors -->
                                    <div class="row">
                                        <div class="col s12">
                                            @if (session()->has('status'))
                                            <ul class="center mb-5 teal lighten-4 pt-1 pb-1">
                                                <li class="teal-text center pt-1">{{ ucfirst(session()->get('status'))
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
                                    </div>
                                    <!--Errors -->

                                    <h4 class="card-title">Create Case Status</h4>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        @csrf
                                        <!--Candidate Information -->
                                        <div class="row">
                                            <div class="input-field col m6 s12">
                                                <input placeholder="12314" id="client_ref_id" type="text"
                                                    class="validate" name="client_ref_id">
                                                <label for="client_ref_id">Client Ref Id</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input placeholder="12314" id="sf_ref_no" type="text" class="validate"
                                                    name="sf_ref_no">
                                                <label for="sf_ref_no">Screenfacts Ref Id</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input placeholder="Samuel Dcosta" id="name" type="text"
                                                    class="validate" name="name">
                                                <label for="name">Candidate Name</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input placeholder="Alfred John" id="father_name" type="text"
                                                    class="validate" name="father_name">
                                                <label for="father_name">Candidate's Father Name</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input type="text" class="datepicker" name="dob" id="dob">
                                                <label for="dob">Date of Birth</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input type="text" class="datepicker" name="doj" id="doj">
                                                <label for="doj">Date of Joining</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select id="gender" name="gender">
                                                    <option disabled>Select Gender</option>
                                                    <option value="male" selected>Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <label>Select Gender</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input placeholder="12312" id="app_no" type="text" class="validate"
                                                    name="app_no">
                                                <label for="app_no">App No</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input placeholder="736556488" id="mobile" type="text" class="validate"
                                                    name="mobile">
                                                <label for="mobile">Mobile</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input placeholder="xyz@gmail.com" id="email" type="text"
                                                    class="validate" name="email">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input placeholder="123123" id="employee_id" type="text"
                                                    class="validate" name="employee_id">
                                                <label for="employee_id">Employee Id</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="zone">
                                                    <option disabled selected>Select Zone</option>
                                                    <option value="North">North</option>
                                                    <option value="South">South</option>
                                                    <option value="East">East</option>
                                                    <option value="West">West</option>
                                                </select>
                                                <label>Select Zone</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input placeholder="Accounts" id="business_unit" type="text"
                                                    class="validate" name="business_unit">
                                                <label for="business_unit">Business Unit</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="grade">
                                                    <option disabled>Select Grade</option>
                                                    @forelse ($grades as $grade)
                                                    <option value="{{ $grade->id }}" {{ ($grade->id === 1) ? 'selected'
                                                        : '' }}>{{ $grade->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                <label>Select Grade</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input type="text" class="datepicker" name="initial_date"
                                                    id="initial_date">
                                                <label for="initial_date">Initial Date</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="report_type">
                                                    <option disabled selected>Select Type</option>
                                                    <option value="1">Interim Report</option>
                                                    <option value="2">Supplementary Report</option>
                                                    <option value="3">Final Report</option>
                                                </select>
                                                <label>Report Type</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input type="text" class="datepicker" name="interim_date"
                                                    id="interim_date">
                                                <label for="interim_date">Interim Rep Upload Date</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="select_interim">
                                                    <option disabled selected>Select Type</option>
                                                    <option value="red">Red</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="green">Green</option>
                                                </select>
                                                <label>Interim Rep Color</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input type="text" class="datepicker" name="final_date" id="final_date">
                                                <label for="final_date">Final Rep Upload Date</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="select_final">
                                                    <option disabled selected>Select Type</option>
                                                    <option value="red">Red</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="green">Green</option>
                                                </select>
                                                <label>Final Rep Color</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <input type="text" class="datepicker" name="supprep_date"
                                                    id="supprep_date">
                                                <label for="supprep_date">SuppRep Upload Date</label>
                                            </div>
                                            <div class="input-field col m6 s12">
                                                <select name="select_supprep">
                                                    <option disabled selected>Select Type</option>
                                                    <option value="red">Red</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="green">Green</option>
                                                </select>
                                                <label>SuppRep Color</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <textarea id="remarks" name="remarks"
                                                    class="materialize-textarea"></textarea>
                                                <label for="remarks">Remarks</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12 m2">
                                                <label>
                                                    <input type="checkbox" name="address" id="address"
                                                        class="filled-in" />
                                                    <span>Address</span>
                                                </label>
                                            </div>
                                            <div class="input-field col s12 m2">
                                                <label>
                                                    <input type="checkbox" name="education" id="education"
                                                        class="filled-in" />
                                                    <span>Education</span>
                                                </label>
                                            </div>
                                            <div class="input-field col s12 m2">
                                                <label>
                                                    <input type="checkbox" name="employment" id="employment"
                                                        class="filled-in" />
                                                    <span>Employment</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mt-9">
                                            <div class="col s12 m4 l3">
                                                <p>Default version</p>
                                            </div>
                                            <div class="col s12 m8 l9">
                                                <input type="file" id="input-file-now" class="dropify" multiple />
                                            </div>
                                        </div>

                                        <!-- Dropdown & Feedback -->

                                        <div class="row mt-2">
                                            <div class="input-field col s12">
                                                <button class="btn cyan darken-1 waves-effect waves-light right"
                                                    type="submit" id="btn-submit">Submit
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                </div>
                                <!-- Dropdown & Feedback  End-->
                                </form>
                            </div>
                        </div>
                        <div class="col l2"></div>
                    </div>
                    <!-- Candidate Information Form End -->
                </div>

            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
</div>
</div>
<!-- Candidate Information Form End -->
@endsection

@push('scripts')

<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-script.js') }}"></script>
<script src="{{ asset('assets/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts/form-file-uploads.js') }}"></script>
@endpush