@extends('index')
@section('title')
    Case Management System
@section('style')
    <link rel="stylesheet" href="scss/master.css">
    @parent
@endsection
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body" style="overflow:auto";>
                    <table class="table table-bordered">
                     <thead>
                        <tr>
                            <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $i=0; @endphp
                        @foreach($users as $u)
                        <tr>
                         <td>{{$i}}</td>
                         <td>{{$u->name}}</td>
                         <td>{{$u->email}}</td>
                         <td>@if($u->userInfo->court_id!=NULL){{$u->userInfo->court->court_name}} {{$u->userInfo->court->Court_number}} @else Police Station: {{$u->userInfo->IArea->area_name}}  @endif</td>
                         <td><a href="{{asset('user/'.$u->id)}}" class="btn btn-sm btn-info">edit role</a></td>
                        </tr>
                        @php $i=$i+1; @endphp
                        @endforeach
                     </tbody>
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
<script>
    $('#myModal').modal(options)
</script>
@parent
@endsection
