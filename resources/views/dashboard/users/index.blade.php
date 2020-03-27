@extends('layouts.admin')
@section('title','Users')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Users</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Users</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h4 class="page-title mt-2">
                        <i class="mdi mdi-account-multiple"></i>
                        List of Users (<span id="agent_count">0</span>)
                    </h4>                
                </div>
                <div class="col-lg-6 col-12 text-right">
                    <a href="{{ route('users.add') }}">
                        <button class="btn btn-info form-group">
                            <i class="mdi mdi-account-plus"></i> Add New User
                        </button>
                    </a>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="users" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            'ajax': "{{ route('users') }}",
            'columns': [
                { 'data': 'DT_RowIndex' },
                { 'data': 'name' },
                { 'data': 'email' },
                { 'data': 'contact_number' },
                { 'data': 'status' },
                { 'data': 'action', orderable: false, searchable: false}
            ],
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false,
            fnDrawCallback: function () {
                self.QtdOcorrenciasAgendadosHoje = this.api().page.info().recordsTotal;
                $('#agent_count').text(self.QtdOcorrenciasAgendadosHoje);
            }
        });

        $('body').on('click','a.btn_status', function(e){
            e.preventDefault();

            let url = $(this).attr('href');
            let status = $(this).data('status');
            swal({
                title: "Are you sure?",
                text: "Once you "+ status +", it will "+ status+" users account!",
                icon: "warning",
                buttons: ['Cancel','Yes'],
                dangerMode: true,
            })
            .then((status) => {
                if (status) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: { 
                            _token: "{{ csrf_token() }}"                           
                        },
                        success: function (response) {
                            table.ajax.reload();
                            swal({
                                text: response.message,
                                icon: "success",
                                button: false,
                                timer: 1500
                            });
                        },
                        error: function (response) {
                            console.log('Error:', response);
                        }
                    });
                }
            });
        })
    </script>
@endpush