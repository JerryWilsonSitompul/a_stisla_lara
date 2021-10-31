@extends('layouts.main')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('User') }}</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Create Users</h2>

        <p class="section-lead">
            We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
        </p>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Users</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                {{-- <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password-confirm">
                                    </div> --}}
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{route('user.index')}}" class="btn btn-light pull-left"> &nbsp;Back</a> &nbsp;


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>




</section>

@endsection
