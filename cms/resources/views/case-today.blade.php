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
                <div class="row">
                    <div class="col-md-10 col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        . <tr>
                                            @foreach ($hfor as $h)
                                                <th>{{$h->hearing_for}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                       <tr>
                                        @foreach($hfor as $h)
                                        <td>
                                           @if($h->hDate!=NULL) 
                                           @foreach($h->hDate as $hh)
                                           
                                           {{-- @if(date('Y-m-d',strtotime($hh->next_date)) ==date('Y-m-d') ) --}}
                                            @if(Auth::user()->userInfo->court_id !=NULL)
                                           @if($hh->CaseR->court_id == Auth::user()->userInfo->court->id)
                                            {{$hh->approvedlist->id}} {{date('(m)y',strtotime($hh->approvedlist->created_at))}} <br>
                                           {{-- @endif --}}
                                          @endif
                                          @endif
                                           @endforeach
                                           @endif
                                        </td>
                                        @endforeach
                                       </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
