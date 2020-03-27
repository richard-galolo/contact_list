@extends('layouts.admin')
@section('title','Dashboard')
@section('styles')
    <style type="text/css">
        thead{
            background-color: #233f4d; 
            color: #fff;
        }
        tbody tr{
            background-color: #fff;
        }
        .card-title mb-0{
            font-weight: 500!important;
        }
    </style>
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="card">
                        <a href="{{ route('users') }}">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-info">
                                        <i class="mdi mdi-account-multiple mdi-24px"></i>
                                    </div>
                                    <div class="m-l-10 align-self-center">
                                        <h5 class="m-b-0 text-dark">Total Users</h5>
                                    </div>
                                    <div class="ml-auto align-self-center">
                                        <h2 class="font-medium m-b-0 users_count"></h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 mb-4">
                    <h4 class="card-title mb-0">List of Users (<span class="users_count"></span>)</h4>
                    <div class="table-responsive">
                        <table id="users" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials.footer')

    </div>
        
@endsection

@push('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let table = $('#users').DataTable({
            'ajax': "{{ route('dashboard') }}",
            'columns': [
                { 'data': 'DT_RowIndex' },
                { 'data': 'name' },
                { 'data': 'email' },
                { 'data': 'contact_number' },
                { 'data': 'status' },
            ],
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false,
            'dom'         : '<"top">rt<"bottom"><"clear">',
            fnDrawCallback: function () {
                self.QtdOcorrenciasAgendadosHoje = this.api().page.info().recordsTotal;
                $('.users_count').text(self.QtdOcorrenciasAgendadosHoje);
            }        
        });
    </script>
@endpush