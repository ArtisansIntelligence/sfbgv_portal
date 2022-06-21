{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title','Client Onboarding')

{{-- vendor style --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div class="seaction">

  <div class="card">
    <div class="card-content">
      <p class="caption mb-0">Onboarding Client.</p>
    </div>
  </div>

    <!-- Form Advance -->
    <div class="col s12 m12 l12">
      <div id="Form-advance" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Register Client</h4>
          <form method="POST" action="add-client">
            @csrf
            <div class="row">
              <div class="input-field col m6 s12">
                <input name="client_name" id="client_name" type="text" required>
                <label for="client_name">Client Name</label>
              </div>
              <div class="input-field col m6 s12">
                <input name="business_unit" id="business_unit" type="text" required>
                <label for="business_unit">Business Unit</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <select id="zone" name="zone" required>
                  <option value="" disabled selected>Choose Zone</option>
                  <option value="East">East</option>
                  <option value="West">West</option>
                  <option value="North">North</option>
                  <option value="South">South</option>
                </select>
                <label for="zone">Zone</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col m6 s12">
                <input name="location" id="location" type="text" required>
                <label for="location">Location</label>
              </div>
              <div class="input-field col m6 s12">
                <input name="hr_name" id="hr_name" type="text" required>
                <label for="hr_name">HR Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col m6 s12">
                <input name="token_expriry" id="token_expriry" type="text" required>
                <label for="token_expriry">Token Expriry</label>
              </div>
              <div class="input-field col m6 s12">
                <select id="token_regenerate" name="token_regenerate" required>
                  <option value="0">No</option>
                  <option value="1">Yes</option>
                </select>
                <label for="token_regenerate">Token Re-generate</label>
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