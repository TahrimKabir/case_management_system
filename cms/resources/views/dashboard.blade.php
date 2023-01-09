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
            <div class="col-12 card">
               <div class="card-header">
                 
               </div>
               <div class="card-body">

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
@endsection