{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- Page title --}}
@section('title','Form Layouts')



{{-- page content --}}
@section('content')
<div class="section">

  <div class="card">
    <div class="card-content">
      <p class="caption mb-0">New Candidate registration details.</p>
    </div>
  </div>

  <div class="row">
    <!-- Candidate Information Form -->
    <div class="col s12 m12 l12">
      <div class="card card card-default scrollspy">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
              @if (session()->has('status'))
              <ul class="center mb-5 lighten-5 green pt-2 pb-2">
                <li class="green-text center pt-1">{{ ucfirst(session()->get('status')) .' : '.session()->get('message')
                  }}</li>
              </ul>
              @endif
            </div>
            <!--Errors -->
            <div id="errors" class="col s12">
            </div>
            <!--Errors -->
          </div>

          <h4 class="card-title">Candidate Details</h4>
          {{-- <form method="POST" action="{{ route('cv-post') }}" enctype="multipart/form-data"> --}}
            {{-- @csrf --}}
            <!--Candidate Profile -->
            <div class="row">
              <div class="col s12">
                <div class="media mt-2 display-flex align-items-center mb-2">
                  <a class="mr-2" href="javascript:void(0)">
                    <img src="{{asset('images/avatar/avatar-9.png')}}" id="candidate_imagepreview"
                      name="candidate_imagepreview" alt="users avatar" class="z-depth-4 circle" height="100"
                      width="100">
                  </a>
                  <div class="media-body">
                    <h5 class="media-heading mt-0">Avatar</h5>
                    <div class="user-edit-btns display-flex">
                      <a href="javascript:void(0)" class="btn-small indigo"
                        onclick="document.getElementById('image').click();">Change</a>
                      <input type="file" name="image" hidden onchange="loadFile(event)" id="image">
                      <a href="javascript:void(0)"
                        onclick="document.getElementById('image').value='';document.getElementById('candidate_imagepreview').src='{{ asset('images/avatar/avatar-9.png') }}'"
                        class="btn-small ml-5 btn-light-pink">Reset</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Candidate Profile End -->

            <!--Candidate Information -->
            <div class="row">
              <div class="input-field col m4 s12">
                <input id="name" type="text" name="name">
                <label for="name">Candidate Full Name</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="father_name" type="text" name="father_name">
                <label for="father_name">Candidate Father's Name</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="email" type="email" name="email">
                <label for="email">Email</label>
              </div>

              <div class="input-field col m4 s12">
                <input type="text" class="datepicker" name="dob" id="dob">
                <label for="dob">Date of Birth</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="mobile" name="mobile" type="tel" value="7350442472">
                <label for="mobile">Mobile</label>
              </div>
              <div class="input-field col m4 s12">
                <input type="text" class="datepicker" name="doj" id="doj">
                <label for="doj">Date of Joining</label>
              </div>

              <div class="input-field col m4 s12">
                <select id="gender" name="gender">
                  <option disabled>Select Gender</option>
                  <option value="male" selected>Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
                <label>Select Gender</label>
              </div>
              <div class="input-field col m4 s12">
                <select name="zone">
                  <option disabled>Select Zone</option>
                  <option value="North" selected>North</option>
                  <option value="South">South</option>
                  <option value="East">East</option>
                  <option value="West">West</option>
                </select>
                <label>Select Zone</label>
              </div>
              <div class="input-field col m4 s12">
                <select name="grade">
                  <option disabled>Select Grade</option>
                  @forelse ($grades as $grade)
                  <option value="{{ $grade->id }}" {{ ($grade->id === 1) ? 'selected' : '' }}>{{ $grade->name }}
                  </option>
                  @empty
                  @endforelse
                </select>
                <label>Select Grade</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="business_unit" name="business_unit" type="text">
                <label for="business_unit">Business Unit</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="sf_ref_no" type="text" name="sf_ref_no">
                <label for="sf_ref_no">SF Ref Number</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="client_ref_id" type="text" name="client_ref_id">
                <label for="client_ref_id">Client Ref Number</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="employee_id" type="text" value="2131" name="employee_id">
                <label for="employee_id">Employee Code</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="passport_no" type="text" name="passport_no">
                <label for="passport_no">Passport Number</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="pancard_no" type="text" name="pancard_no">
                <label for="pancard_no">Pancard Number</label>
              </div>
              <div class="input-field col m4 s12">
                <input id="aadharcard_no" type="text" name="aadharcard_no">
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
                    <p class="caption mb-0">(Documents like Aadhar Card, Passport, Electricity Bill, Rent Agreement,
                      Election Card, Gas Connection can be used as Address Proof)
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
                <input id="city" type="text" name="city">
                <label for="city">City</label>
              </div>
              <div class="input-field col m3 s12">
                <input id="state" type="text" name="state">
                <label for="state">State</label>
              </div>
              <div class="input-field col m2 s12">
                <input id="pincode" type="text" value="123" name="pincode">
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
                    <p class="caption mb-0">(Documents like Aadhar Card, Passport, Electricity Bill, Rent Agreement,
                      Election Card, Gas Connection can be used as Address Proof)
                    </p>
                    <label class="mt-1">
                      <input type="checkbox" id="check_permanent_address" name="check_permanent_address" />
                      <span>Same as above address</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="permanent_address" name="permanent_address" class="materialize-textarea"></textarea>
                <label for="permanent_address">Address</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col m3 s12">
                <input id="permanent_city" type="text" name="permanent_city">
                <label for="permanent_city">City</label>
              </div>
              <div class="input-field col m3 s12">
                <input id="permanent_state" type="text" name="permanent_state">
                <label for="permanent_state">State</label>
              </div>
              <div class="input-field col m2 s12">
                <input id="permanent_pincode" type="text" name="permanent_pincode">
                <label for="permanent_pincode">Pincode</label>
              </div>
              <div class="col s12 m4 file-field input-field">
                <div class="btn-small ml-1 float-right">
                  <span>Address Proof</span>
                  <input type="file" id="file_permanent_address_proof" name="file_permanent_address_proof">
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
                <input id="qual_name" type="text" name="qual_name">
                <label for="qual_name">Name of Qualification</label>
              </div>
              <div class="input-field col m6 s12">
                <input id="qual_college" type="text" name="qual_college">
                <label for="qual_college">Name of College/Insitute</label>
              </div>
              <div class="input-field col s12">
                <textarea id="qual_address" name="qual_address" class="materialize-textarea"></textarea>
                <label for="qual_address">Address</label>
              </div>
              <div class="input-field col m6 s12">
                <input id="qual_university" type="text" name="qual_university">
                <label for="qual_university">Name of University</label>
              </div>
              <div class="input-field col m6 s12">
                <input id="qual_yop" type="text" name="qual_yop">
                <label for="qual_yop">Year of Passing</label>
              </div>
              <div class="input-field col l6 s12">
                <input id="qual_roll" type="text" name="qual_roll">
                <label for="qual_roll">Unique Identification (RollNo/Reg No/Enroll No/
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
                    <p class="caption mb-0">(Please provide past employment details with proof Or check if Fresher)
                    </p>
                    <div style="display: flex;justify-content:space-between;align-items:end;">
                      <div>
                        <label class="mt-1">
                          <input type="checkbox" id="check_fresher" name="check_fresher" />
                          <span>Is Fresher</span>
                        </label>
                      </div>
                      <button type="button" id="clickBtn" class="btn btn-small mt-1">Add Employment History</button>
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
                  <input type="file" multiple id="file_additional_attachments" name="file_additional_attachments">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <button class="btn cyan waves-effect waves-light right" type="button" id="btn-submit">Submit
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
        </div>
        <!-- Dropdown & Feedback  End-->
        {{-- </form> --}}
      </div>
    </div>
  </div>
  <!-- Candidate Information Form End -->
</div>

</div>
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
{{-- <script src="{{asset('js/vendors.min.js')}}"></script> --}}
<script>
  // Id Counter for Management of Dynamic Input fields.
  var id=1;
  
  //  Generates Avatar Preview blob and Revokes the memory.
  const loadFile = function(event) {
        const output = document.getElementById('candidate_imagepreview');
        output.src = window.URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free blob memory
        }
  };

  // To set as Fresher
  function isFresherChecked(checked=false)
  {
    $('#clickBtn').attr('disabled',checked);
    if(checked) {
      $('#experience_row').empty();
      id = 1;
    } 
  }

  // To set designated address as Permanent
  function permanentChecked(checked = false)
  {
    if(!checked){
      $('#permanent_address').val('').prop('disabled',false);
      $('#permanent_city').val('').prop('disabled',false);
      $('#permanent_state').val('').prop('disabled',false);
      $('#permanent_pincode').val('').prop('disabled',false);
      $('#file_permanent_address_proof').val('').prop('disabled',false);
    } 
    else {
      $('#permanent_address').focus().val($('#address').val()).prop('disabled',true);
      $('#permanent_city').focus().val($('#city').val()).prop('disabled',true);
      $('#permanent_state').focus().val($('#state').val()).prop('disabled',true);
      $('#permanent_pincode').focus().val($('#pincode').val()).prop('disabled',true);
      $('#file_permanent_address_proof').focus().prop('disabled',true);
    }
  }

  //  To generate dynamic Input fields using Id counter with Attribute: name , Label: label
  function generateTextInput(name,label)
  {
    return jQuery('<div>',{
        'class': 'input-field col m4 s12'
      }).append(jQuery('<input>',{
        'name': `${name}_${id}`,
        'type': 'text',
      }),jQuery('<label>',{
        'for':  `${name}_${id}`,
      }).append( document.createTextNode( label )));
  }

  // To generate dynamic Date input feilds using Id counter with Attribute: name , Label: label
  function generateDateInput(name,label)
  {
    return jQuery('<div>',{
        'class': 'input-field col m4 s12'
      }).append(jQuery('<input>',{
        'name': `${name}_${id}`,
        'class' : 'datepicker',
        'type': 'text',
      }),jQuery('<label>',{
        'for': `${name}_${id}`,
      }).append( document.createTextNode( label )));
  }

  // To generate dynamic File input fields using Id counter with Attribute: name , Label: title
  function generateFileInput(title,name)
  {
     var container = jQuery('<div>',{
        'class': 'm4 col s12 file-field input-field'
     });
    
     var uploadBtn = jQuery('<div>',{
        'class' : 'btn-small ml-1 float-right',
     }).append(`<span>${title}</span>`,`<input type="file" name="${name}_${id}" />`);

     var filePathWrapper = jQuery('<div>',{
        'class': 'file-path-wrapper'
     }).append('<input class="file-path validate" type="text" />');

     return container.append(uploadBtn,filePathWrapper);
  }

  function generateSelectInput(name,label)
  {
    var container = jQuery('<div>',{
        'class': 'input-field col m4 s12'
     });
    
     var select = jQuery('<select>',{
        'name' : `${name}_${id}`,
     }).append(`<option disabled selected>${label}</option>`);

     $.ajax({
      url:'{{route("getGrade")}}',
      method: 'GET',
      success:function(result){
        const grades = result.grades;
        Object.entries(grades).forEach(grade => {
        select.append(`<option value="${grade[1]}">${grade[0]}</option>`);
        });
      }
     });

     var selectLabel = jQuery('<label>',{
      'for' : `${name}_${id}`,
     }).append(document.createTextNode(label));

     return container.append(select,selectLabel);
  }

  // Document Ready
  $(document).ready(function()
  {
    $('#errors').hide();
   // Event action for Same Address
    $('#check_permanent_address').click(function() {
      const check = $(this).is(':checked');
      permanentChecked(check); 
    });

    // Event action for Fresher
    $('#check_fresher').click(function() {
        const check = $(this).is(':checked');
        isFresherChecked(check);
     });

    
     //  Event action for Generating Dynamic Input fields. Limit is 3.
    $('#clickBtn').click(function(e)
    {
      e.preventDefault();
      if(id > 3){
        $(this).attr('disabled',true);
        return;
      } else {
        $(this).attr('disabled',false);
      }
      const fieldset = jQuery('<fieldset>',{ 'class':'mt-2 mb-2 col s12',   'id': 'experience_'+id,});
      const employerName = generateTextInput('employer','Employer Name');
      const employeeCode = generateTextInput('employee_code','Employee Code');
      const dateOfJoin = generateDateInput('emp_doj','Date of Joining');
      const dateOfLeave = generateDateInput('emp_dol','Date of Leaving');
      const lastDesignation = generateTextInput('last_designation','Last Designation');
      const grade = generateTextInput('emp_grade','Grade');
      // const grade = generateSelectInput('emp_grade','Select Grade');
      const empReason = generateTextInput('emp_reason','Employee Resignation Reason');
      const reportingManagerName = generateTextInput('emp_manager_name','Reporting Mangager Name');
      const reportingManagerNo = generateTextInput('emp_manager_no','Reporting Mangager Phone Number');
      const resignationLetter = generateFileInput('Resignation Letter','emp_resignationletter');
      const appointmentLetter = generateFileInput('Appointment Letter','emp_appointmentletter');
      const salarySlip = generateFileInput('Salary Slips','emp_salaryslip');

      fieldset.append(`<div class="pt-2" style="display:flex;justify-content:space-between;align-items:center;"><h6 class="mt-1 mb-1"> Employment Detail - ${id} </h6><button type="button" data-id="${id}"" class="btn-small cyan removeExperience">Remove</button></div>`);
      fieldset.append(employerName);
      fieldset.append(employeeCode);
      fieldset.append(dateOfJoin);
      fieldset.append(dateOfLeave);
      fieldset.append(lastDesignation);
      fieldset.append(grade);
      fieldset.append(empReason);
      fieldset.append(reportingManagerName);
      fieldset.append(reportingManagerNo);
      fieldset.append(resignationLetter);
      fieldset.append(appointmentLetter);
      fieldset.append(salarySlip);
      $('#experience_row').append(fieldset);
      id++;
    });

  });
  // Document Ready End

  // Document Loaded Start
  $(document).on('click','.removeExperience',function(e)
  {
    e.preventDefault();
    var del_id = 'experience_' + $(this).data('id');
    if($("#"+del_id).length){
      $("#"+del_id).remove();
      id--;
      if(id <= 1)
      {
        id = 1;
      }
        }
  });

  
 // Method gets Candidate basic information in Array format for AJAX Post.
  function getCandidateInfo()
  {
    // let file = $('#image').val();
    // if(!file){
    //   file = null;
    // }
    return {
      'sf_ref_no': $("input[name=sf_ref_no]").val(),
      'client_ref_id' : $("input[name=client_ref_id]").val(),
      'employee_id' : $("input[name=employee_id]").val(),
      'name' : $("input[name=name]").val(),
      'father_name' : $("input[name=father_name]").val(),
      // 'image' : $('input[name=image]').val(),
      'gender' : $("select[name=gender]").val(),
      'dob' : $("input[name=dob]").val(),
      'doj' : $("input[name=doj]").val(),
      'mobile' : $("input[name=mobile]").val(),
      'email' : $("input[name=email]").val(),
      'zone' : $("select[name=zone]").val(),
      'grade' : $("select[name=grade]").val(),
      'business_unit' : $("input[name=business_unit]").val(),
      'passport_no' : $("input[name=passport_no]").val(),
      'pancard_no' : $("input[name=pancard_no]").val(),
      'aadharcard_no' : $("input[name=aadharcard_no]").val()
    };
  }

  function getCandidateAddress()
  {
    return {
      'address' : $("#address").val() ,
      'state' : $("#city").val(),
      'city' : $("#state").val(),
      'pincode' : $("#pincode").val(),
      'permanent_address' : $("#permanent_address").val(),
      'permanent_state' : $("#permanent_state").val(),
      'permanent_city' : $("#permanent_city").val(),
      'permanent_pincode' : $("#permanent_pincode").val()
    };
  }
  
  function getCandidateEducation()
  { 
    return {
      'qualificationName' : $("#qual_name").val(),
      'collegeName' : $("#qual_college").val(),
      'collegeAddress' : $("#qual_address").val(),
      'universityName' : $("#qual_university").val(),
      'year_of_passing' : $("#qual_yop").val(),
      'uniqueIdentification' : $("#qual_roll").val()
    };
  }

  // To get array of dynamic Employee Experience
  function getExperience()
  {
    const experienceRow = document.getElementById('experience_row').children;
    let fieldList = [];
    let data = [];
    if(experienceRow.length > 0)
    {
      for (let i = 0; i < experienceRow.length; i++) {
        fieldList.push(experienceRow[i].id);
      }
      
      fieldList.forEach(item => {
      let id = item.replace('experience','');
      const row = document.getElementById(item);
      let employer_name = row.children[1].children['employer'+id].value;
      let empl_no = row.children[2].children['employee_code'+id].value;
      let doj = row.children[3].children['emp_doj'+id].value;
      let dol = row.children[4].children['emp_dol'+id].value;
      let designation = row.children[5].children['last_designation'+id].value;
      let grade = row.children[6].children['emp_grade'+id].value;
      let reason_of_leaving = row.children[7].children['emp_reason'+id].value;
      let manager_name = row.children[8].children['emp_manager_name'+id].value;
      let manager_no = row.children[9].children['emp_manager_no'+id].value;
      // console.log(employer_name,empl_no,doj,dol,designation,grade,reason_of_leaving,manager_name,manager_no);
      data.push({employer_name,empl_no,doj,dol,designation,grade,reason_of_leaving,manager_name,manager_no});
      
    });
    // console.log(JSON.stringify(data));
    // console.log(data); 
    return data;
   } else 
   {
     return null;
   }
  
  }


  // Form submit
  $(document).on('click','#btn-submit',function(e)
  {
    e.preventDefault();
    const candidate = getCandidateInfo();
    const check_permanent_address = $('#check_permanent_address').is(':checked') ? 1 : 0;
    const is_fresher = $('#check_fresher').is(':checked') ? 1 : 0;
    const address = getCandidateAddress();
    const education = getCandidateEducation();
    const experience = getExperience();
    var _token = '{{csrf_token()}}';
    $.ajax({
      url:'{{route("cv-post")}}',
      method: 'POST',
      enctype: 'multipart/form-data',
      data:{
        _token:_token,
        check_permanent_address :check_permanent_address,
        is_fresher : is_fresher,
        candidate: candidate,
        address:address,
        experience:{employment:experience},
        education:education
      },
      success:function(result){
        console.log(result);
      },
      error: function(error){
        if(error.status === 422)
        {
          window.scrollTo(0, 0);
          $('#errors').show();
          $('#errors').empty();
          var errorList = jQuery('<ul>',{'class': 'center mb-5 lighten-5 red pt-2 pb-2'});
          $.each(error.responseJSON.errors, function (key, item) 
          {
            errorList.append("<li class='red-text center pt-1'><small>"+item+"</small></li>")
          });
          $("#errors").append(errorList);
        }
      }
    });
  });
  
</script>