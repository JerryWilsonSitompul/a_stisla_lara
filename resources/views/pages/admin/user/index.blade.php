@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('User') }}</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Data Users</h2>

        {{-- <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i> Info</a> --}}



        <p class="section-lead">
            We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
        </p>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Users</h4>
                        <div class="card-header-action">
                            <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fas fa-plus"> </i> Add User</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="crudTable">
                                <thead>
                                    <tr>
                                        <th class=" text-center">No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>Create a mobile app</td>
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                <div class="progress-bar bg-success" data-width="100%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-success">Completed</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>Redesign homepage</td>
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="0%">
                                                <div class="progress-bar" data-width="0"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Nur Alpiana">
                                            <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hariono Yusup">
                                            <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Bagus Dwi Cahya">
                                        </td>
                                        <td>2018-04-10</td>
                                        <td>
                                            <div class="badge badge-info">Todo</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>Backup database</td>
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                                                <div class="progress-bar bg-warning" data-width="70%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                                            <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hasan Basri">
                                        </td>
                                        <td>2018-01-29</td>
                                        <td>
                                            <div class="badge badge-warning">In Progress</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>Input data</td>
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                <div class="progress-bar bg-success" data-width="100%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                                            <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Isnap Kiswandi">
                                            <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Yudi Nawawi">
                                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Khaerul Anwar">
                                        </td>
                                        <td>2018-01-16</td>
                                        <td>
                                            <div class="badge badge-success">Completed</div>
                                        </td>
                                        <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                    </tr>
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




</section>

@endsection
@push('addon-script')
<script>
    // AJAX DataTable
    var datatable = $('#crudTable').DataTable({
        processing: true
        , serverSide: true
        , ordering: true
        , ajax: {
            url: '{!! url()->current() !!}'
        , }
        , columns: [{
                data: 'id'
                , name: 'id'
            }
            , {
                data: 'name'
                , name: 'name'
            }
            , {
                data: 'email'
                , name: 'email'
            }
            , {
                data: 'role'
                , name: 'role'

            }


            , {
                data: 'action'
                , name: 'action'
                , orderable: false
                , searchable: false
                , width: '15%'
            }
        , ]
    });

</script>
@endpush
