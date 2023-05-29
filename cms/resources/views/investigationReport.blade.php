@extends('index')
@section('title')
    Case Management System
@endsection


{{-- add style before --}}

@section('wrapper-main')
    @parent
    <!-- Navbar -->
@section('nav-bar')
    @parent
@endsection
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@section('main-side-bar')
    @parent
@endsection

<!-- Content Wrapper. Contains page content -->
@section('content-wrapper')
    @parent
    <!-- Content Header (Page header) -->
@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Trial Register</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Case List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

<!-- Main content -->
@section('content-main')
    @parent
@section('editable')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('search') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="d-block">From:
                                        <input type="date" name="from" id="" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="d-block">To:
                                        <input type="date" name="to" id="" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="d-block">Case Category:
                                        <select name="case" id="" class="select select2 form-control"
                                            style="width: 100%;"></select>
                                    </label>
                                    <input type="hidden" name="id" value="{{ $id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="d-block text-light">Search:
                                        <button class="btn btn-block btn-dark btn-md">search</button>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered border-top">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Case No</th>
                                    <th>Parties</th>
                                    <th>Section</th>
                                    <th>Next Date</th>
                                    <th>For What to come</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
<!-- /.content -->

@endsection
<!-- /.content-wrapper -->
@section('footer')
@parent
@endsection

<!-- Control Sidebar -->
@section('control-sidebar')
@parent
@endsection

@endsection

@section('script')
@parent
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script> --}}
@endsection
