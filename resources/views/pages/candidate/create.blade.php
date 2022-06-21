{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title','Create Case')

{{-- vendor style --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="seaction">

  <div class="card">
    <div class="card-content">
      <p class="caption mb-0">Candidate Case.</p>
    </div>
  </div>

  <!-- Form Advance -->
  <div class="col s12 m12 l12">
    <div id="Form-advance" class="card card card-default scrollspy">
      <div class="card-content">

        <!--Errors -->
        <div class="row">
          <div class="col s12">
            @if (session()->has('status'))
            <ul class="center mb-5 lighten-5 green pt-2 pb-2">
              <li class="green-text center pt-1">{{ ucfirst(session()->get('status')) .' : '.session()->get('message')
                }}</li>
            </ul>
            @endif
            @if($errors->any())
            <ul class="center mb-5 lighten-5 red pt-2 pb-2">
              @foreach ($errors->all() as $error)
              <li class="red-text center pt-1">*{{ $error }}</li>
              @endforeach
            </ul>
            @endif

          </div>
        </div>
        <!--Errors -->

        <h4 class="card-title">Add Candidate Case</h4>
        <form method="POST" action="add-case" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="client_ref_id" id="client_ref_id" type="number" required>
              <label for="client_ref_id">Client Ref No</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="sf_ref_no" id="sf_ref_no" type="number" required>
              <label for="sf_ref_no">Sf Ref No</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="name" id="name" type="text" required>
              <label for="name">Candidate Full Name</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="father_name" id="father_name" type="text" required>
              <label for="father_name">Candidate Father Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">

              <select id="gender" name="gender" required>
                <option disabled>Select Gender</option>
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>

              <!-- <input name="gender" id="gender" type="text" required> -->
              <label for="gender">Gender</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="dob" id="dob" class="datepicker" type="text" required>
              <label for="dob">Date of Birth</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="doj" id="doj" class="datepicker" type="text" required>
              <label for="doj">Date of Join</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="app_no" id="app_no" type="number" required>
              <label for="app_no">App No</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="mobile" id="mobile" type="number" required>
              <label for="mobile">Mobile No</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="email" id="email" type="email" required>
              <label for="email">Email Id</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="employee_id" id="employee_id" type="number" required>
              <label for="employee_id">Employee Id</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="zone" id="zone" type="text" required>
              <label for="zone">Zone</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="business_unit" id="business_unit" type="text" required>
              <label for="business_unit">Business Unit</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="grade" id="grade" type="text" required>
              <label for="grade">Grade</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="initial_date" id="initial_date" class="datepicker" type="text" required>
              <label for="initial_date">Initial Date</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="report_type" id="report_type" type="text" required>
              <label for="report_type">Report Type</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="interim_rep_upload_date" id="interim_rep_upload_date" class="datepicker" type="text"
                required>
              <label for="interim_rep_upload_date">Interim Rep Upload Date</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="interim_rep_upload_color" id="interim_rep_upload_color" type="text" required>
              <label for="interim_rep_upload_color">Interim Rep Upload Color</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="final_rep_upload_date" id="final_rep_upload_date" class="datepicker" type="text" required>
              <label for="final_rep_upload_date">Final Rep Upload Date</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="final_rep_color" id="final_rep_color" type="text" required>
              <label for="final_rep_color">Final Rep Color</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col m6 s12">
              <input name="supp_rep_upload_date" id="supp_rep_upload_date" class="datepicker" type="text" required>
              <label for="supp_rep_upload_date">Supp Rep Upload Date</label>
            </div>
            <div class="input-field col m6 s12">
              <input name="supp_rep_color" id="supp_rep_color" type="text" required>
              <label for="supp_rep_color">Supp Rep Color</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input name="remarks" id="remarks" type="text" required>
              <label for="remarks">Remarks</label>
            </div>
          </div>

          <div class="row">
            <div class="col s12 m6 file-field input-field">
              <div class="btn-small ml-1 float-right">
                <span>File</span>
                <input type="file" name="file_resume">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="input-field col m3 s12">

              <label>
                <input name="address" id="address" type="checkbox" />
                <span>Address</span>
              </label>
              <!-- <input name="address" id="address" type="checkbox">
                <label for="address">Address</label> -->
            </div>
            <div class="input-field col m3 s12">
              <label>
                <input name="education" id="education" type="checkbox" />
                <span>Education</span>
              </label>
              <!-- <input name="education" id="education" type="checkbox">
                <label for="education">Education</label> -->
            </div>
            <div class="input-field col m3 s12">
              <label>
                <input name="employment" id="employment" type="checkbox" />
                <span>Employment</span>
              </label>
              <!-- <input name="employment" id="employment" type="checkbox">
                <label for="employment">Employment</label> -->
            </div>
          </div>

          <div class="row">
            <div class="row">
              <div class="input-field col s12">
                <button class="btn cyan waves-effect waves-light right" type="submit" name="submit">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection