@extends('layouts.app', [
'class' => '',
'elementActive' => 'home'
])

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DASHBOARD</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <h5 class="text-bold text-dark mt-4">DASHBOARD </h5>
         <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number">{{ $user }}</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Payments</span>
                                    <span class="info-box-number">410</span>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Employer</span>
                                    <span class="info-box-number">410</span>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Agent</span>
                                    <span class="info-box-number">1,410</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Active Jobs</span>
                                    <span class="info-box-number">13,648</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Job</span>
                                    <span class="info-box-number">{{ $jobCount }}</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Canidate Applied</span>
                                    <span class="info-box-number">{{ $candidate }}</span>
                                </div>

                            </div>

                        </div>

                    </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

