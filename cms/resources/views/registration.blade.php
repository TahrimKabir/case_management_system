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
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-12 ">
                <div class="card card-success">

                    <div class="card-header bg-dark">
                        <h3 class="text-center mb-0 font-weight-bold"> Add User</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{route('adduser')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="d-block">
                                        User Name:
                                        <input type="text" name="name" id="" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="d-block">
                                        Email Address:
                                        <input type="email" name="email" id="" class="form-control">
                                    </label>
                                </div>
                               
                                <div class="col-md-6" id="court" >Police Station
                                    <select name="thana" class="form-control">
                                        <option value=""selected>Select Area</option>
                                        @foreach($iarea as $i)

                                        <option value="{{$i->id}}">{{$i->area_name}}</option>
                                        
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6" id="iarea" >Court
                                    <select name="court" class="form-control">
                                        <option value=""selected>Select Court</option>
                                        @foreach($court as $c)
                                        <option value="{{$c->id}}">{{$c->court_name}}--- {{$c->Court_number}}</option>
                                        
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <label for="" class="d-block">Password
                                        <input type="password" name="pass" id="" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="d-block">Password
                                        <input type="password" name="pass1" id="" class="form-control">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-sm btn-info">save</button>
                                </div>
                            </div>
                        </form>
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
