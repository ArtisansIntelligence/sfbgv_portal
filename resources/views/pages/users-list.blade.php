{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Users list')

{{-- vendors styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

{{-- page content --}}
@section('content')
<!-- users list start -->
<section class="users-list-wrapper section">
  <!-- <div class="users-list-filter">
    <div class="card-panel">
      <div class="row">
        <form>
          <div class="col s12 m6 l3">
            <label for="users-list-verified">Verified</label>
            <div class="input-field">
              <select class="form-control" id="users-list-verified">
                <option value="">Any</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
          </div>
          <div class="col s12 m6 l3">
            <label for="users-list-role">Role</label>
            <div class="input-field">
              <select class="form-control" id="users-list-role">
                <option value="">Any</option>
                <option value="User">User</option>
                <option value="Staff">Staff</option>
              </select>
            </div>
          </div>
          <div class="col s12 m6 l3">
            <label for="users-list-status">Status</label>
            <div class="input-field">
              <select class="form-control" id="users-list-status">
                <option value="">Any</option>
                <option value="Active">Active</option>
                <option value="Close">Close</option>
                <option value="Banned">Banned</option>
              </select>
            </div>
          </div>
          <div class="col s12 m6 l3 display-flex align-items-center show-btn">
            <button type="submit" class="btn btn-block indigo waves-effect waves-light">Show</button>
          </div>
        </form>
      </div>
    </div>
  </div> -->
  <div class="users-list-table">
    <div class="card">
      <div class="card-content">
        <!-- datatable start -->
        <div class="responsive-table">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                <th></th>
                <th>id</th>
                <th>username</th>
                <th>name</th>
                <th>email</th>
                <th>role</th>
                <th>status</th>
                <th>edit</th>
                <th>delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($usersData as $user)
              <tr>
                <td></td>
                <td>{{$user->user_id}}</td>
                <td><a href="{{asset('users-view')}}">{{$user->username}}</a>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  @php $ind = array_search ($user->role_id, array_column (json_decode(json_encode($roles), true),
                  'role_id')); @endphp
                  {{$roles[$ind]->role_name}}
                </td>
                <td>
                  @if($user->status == 1)
                  <span class="chip green lighten-5"><span class="green-text">Active</span></span>
                  @elseif($user->status == 2)
                  <span class="chip red lighten-5"><span class="red-text">Banned</span></span>
                  @else
                  <span class="chip orange lighten-5"><span class="orange-text">Close</span></span>
                  @endif
                </td>
                <td><a href="{{route('edituser',['id' => $user->user_id])}}"><i class="material-icons">edit</i></a></td>
                <td><a href='javascript:void(0)' class="deleteUser" data-id="{{$user->user_id}}"><i
                      class="material-icons">delete</i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<!-- users list ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-script')

<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('js/scripts/page-users.js')}}"></script>
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
<script>
  $(document).ready(function () {
      $(document).on('click','.deleteUser',function(e) {
          var _token = '{{ csrf_token() }}';
          const id = $(this).attr('data-id');
          swal({
              title: "Are you sure?",
              text: "You will not be able to recover Department from system",
              icon: 'warning',
              // dangerMode: true,
              buttons: {
                  cancel: 'No, Please!',
                  delete: 'Yes, Delete It'
              }
          }).then(function (willDelete) {
              if (willDelete) {
                  $.ajax({
                      url: '{{ route("deleteuser") }}',
                      type: 'DELETE',
                      data: {
                          _token: _token,
                          id : id,
                      },
                      success: function(result) {
                        // $("#users-list-datatable").DataTable().ajax.reload();
                          swal(result.message, {
                              icon: "success",
                              buttons:false,
                              timer: 1000,
                          });
                          
                      },
                      error: function(err) {
                          swal('Failed to Delete', {
                              icon: "error",
                          });
                      }
                  });
                  } 
          });
         
      });
  });

  @if (session()->has('message'))
  M.Toast.dismissAll();
  M.toast({
          html: '{{session()->get("message")}}',   
          classes:'teal darken-1',
          });
  @endif
     
</script>
@endsection