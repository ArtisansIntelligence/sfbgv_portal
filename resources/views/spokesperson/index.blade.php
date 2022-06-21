@extends('layouts.app')
@section('title','Spokesperson')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/data-tables/css/jquery.dataTables.min.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/data-tables/css/dataTables.checkboxes.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-spokesperson.css') }}" />
@endpush

@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="col s12">
        <div class="container">
            <!-- spokesperson list -->
            <section class="spokesperson-list-wrapper section">
                <!-- create spokesperson button-->
                <!-- Options and filter dropdown button-->
                <div class="spokesperson-filter-action mr-3">
                    <a href="{{ route('spokesperson.export') }}"
                        class="btn waves-effect waves-light spokesperson-export border-round z-depth-4">
                        <i class="material-icons">picture_as_pdf</i>
                        <span class="hide-on-small-only">Export to Excel</span>
                    </a>
                </div>
                <div class="spokesperson-import-btn">
                    <a href="{{ route('spokesperson.import') }}"
                        class="btn waves-effect waves-light spokesperson-create border-round z-depth-4">
                        <i class="material-icons">picture_as_pdf</i>
                        <span class="hide-on-small-only">Import from Excel</span>
                    </a>
                </div>
                <!-- create spokesperson button-->
                <div class="spokesperson-create-btn">
                    <a href="{{ route('spokesperson.create') }}"
                        class="btn waves-effect waves-light spokesperson-create border-round z-depth-4">
                        <i class="material-icons">add</i>
                        <span class="hide-on-small-only">Create spokesperson</span>
                    </a>
                </div>
                <div class="responsive-table">
                    <table class="table spokesperson-data-table white border-radius-4 pt-1">
                        <thead>
                            <tr>
                                <!-- data table responsive icons -->
                                <th><small></small></th>
                                <th><small>#</small></th>
                                <th><small>Client Ref </small></th>
                                <th><small>SF Ref </small></th>
                                <th><small>Candidate Name</small></th>
                                <th><small>App No</small></th>
                                <th><small>Employee Id</small></th>
                                <th><small>Status </small></th>
                                <th><small>Initial Date</small></th>
                                <th><small>Candidate Submitted Date</small></th>
                                <th><small>Final Report Date </small></th>
                                <th><small>Final Report Color </small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><small></small></td>
                                <td><small>#</small></td>
                                <td><small>Client Ref </small></td>
                                <td><small>SF Ref </small></td>
                                <td><small>Candidate Name</small></td>
                                <td><small>App No</small></td>
                                <td><small>Employee Id</small></td>
                                <td><small>Status </small></td>
                                <td><small>Initial Date</small></td>
                                <td><small>Candidate Submitted Date</small></td>
                                <td><small>Final Report Date </small></td>
                                <td><small>Final Report Color </small></td>
                                <td><small>Action</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
{{-- <script src="{{ asset('assets/vendors/data-tables/js/datatables.checkboxes.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/scripts/app-spokesperson.js') }}"></script>
{{--
<script>
    $(document).ready(function () {
  if ($(".spokesperson-data-table").length) {
    var dataListView = $(".spokesperson-data-table").DataTable({
      processing : true,
      serverSide : true,
      deferRender: true,
      saveState : true,
      search: {
            return: true,
        },
      dom:
        '<"top display-flex  mb-2"<"action-filters"f><"actions action-btns display-flex align-items-center">><"clear">rt<"bottom"p>',
      language: {
        search: "",
        searchPlaceholder: "Search spokesperson"
      },
   
      responsive: {
        details: {
          type: "column",
          target: 0
        }
      }
    });

   
    
    // To append actions dropdown inside action-btn div
    var spokespersonFilterAction = $(".spokesperson-filter-action");
    var spokespersonCreateBtn = $(".spokesperson-create-btn");
    $(".action-btns").append(spokespersonFilterAction, spokespersonCreateBtn);
  }
});
</script> --}}

@endpush