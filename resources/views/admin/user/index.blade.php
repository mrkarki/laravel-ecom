@extends('admin.layouts.layout')

@push('style')
    <link href="{{ asset('assets/admin/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">

    <style>
        .normal-actions>li
        { display: inline; list-style: none;}
    </style>
@endpush

@section('title', 'User List')
{{-- {{ $users }} --}}
@section('content')
    @include('admin.common.breadcrumbs', [
        'title'=> 'List',
        'panel'=> 'user',
    ])
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title ibox-title-border">
                        <h5 class="float-left">User List</h5>
                        <a class="btn btn-primary btn-xs float-right" href="user/create"><i class="fa fa-plus"></i> Add New</a>
                    </div>

                    <div class="ibox-content ibox-content-custom">
                        @include('admin.user.partials.table')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
   <script src="{{ asset('assets/admin/js/plugins/dataTables/datatables.min.js') }}"></script>
       <script src="{{ asset('assets/admin/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
       <script>
           $(document).ready(function(){
               $('.dataTables-list').DataTable({
                   pageLength: 25,
                   responsive: true,
                   dom: '<"html5buttons"B>lTfgitp',
                   buttons: [
                    //    { extend: 'copy'},
                    //    {extend: 'csv'},
                    //    {extend: 'excel', title: 'ExampleFile'},
                    //    {extend: 'pdf', title: 'ExampleFile'},

                       {extend: 'print',
                           customize: function (win){
                               $(win.document.body).addClass('white-bg');
                               $(win.document.body).css('font-size', '10px');

                               $(win.document.body).find('table')
                                   .addClass('compact')
                                   .css('font-size', 'inherit');
                           }
                       }
                   ],
                   "columnDefs": [
                       { "width": "20%", "targets": 2 }
                   ],
                   ajax: {
                       url: '{{ route('admin.user.index') }}',
                       dataType: 'json',
                       type: 'GET',
                       data: function (data) {
                           data._token = '{{ csrf_token() }}'
                       }
                   },

                   columns: [
                   {data: 'name',orderable: true},{data: 'email',orderable: true},{data: 'desc',orderable: true},{data: 'status',orderable: true},
                   {data: 'action', orderable: false},
                   ],
                   order: [[ 0, 'desc' ]]


               });

           });

           $(document).on('click','.confirm-delete-row',function () {
               var $this = $(this);
               swal({
                   title: "Are you sure?",
                   text: "You will not be able to recover this imaginary file!",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: "Yes, delete it!",
                   // closeOnConfirm: false
               }, function (isConfirm) {
                   if (isConfirm) {
                       $this.parents('li').find('form').submit();
                   }
               })
           })

       </script>
@endpush

