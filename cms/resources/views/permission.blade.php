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
            <form action="{{route('role')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <input type="text" name="role" id="" class="form-control">

                
               
                    </div>
                    {{-- <div class="col-12">
                        @foreach($permission as $p)
                        <label for="" class="d-block">
                            <input type="checkbox" name="permit[]" id="" value="{{$p->id}}">{{$p->name}}
                        </label>
                        @endforeach
                    </div> --}}
                    <div class="col-12">
                        <button class="btn btn-sm btn-info mt-1">save</button>
                    </div>
                </div>

            </form>
            <form action="{{route('permission')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label for="" class="d-block">Select role
                            <select name="role_id" id="" class="select2 form-control" style="width:100%;">
                                @foreach($role as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-12">
                        @foreach($permission as $p)
                        <label for="" class="d-block">
                            <input type="checkbox" name="permit[]" id="" value="{{$p->id}}">{{$p->name}}
                        </label>
                        @endforeach
                    </div>
                    <div class="col-12">
                        <button class="btn btn-sm btn-info">save</button>
                    </div>
                </div>
            </form>

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
