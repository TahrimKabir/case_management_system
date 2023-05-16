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
            <div class="col-md-4">
                <label for="afor1" class="d-block">
                    Law:
                    <select name="caseCat" id="afor1" class="select2 form-control" style="width:100%;"></select>
                </label>
            </div>
            <div class="col-md-4">
                <label for="afor1" class="d-block">
                    Law Section:
                    <select name="caseCat" id="afor2" class="select2 form-control" style="width:100%;"></select>
                </label>
            </div>
            <div class="col-md-2 col-6">
                <label for="" class="d-block mb-0" style="visibility:hidden;">hi</label>
                <button type="button" class="btn btn-info btn-md btn-block">SEARCH</button>
            </div>
            <div class="col-md-2 col-6">
                <label for="" class="d-block mb-0" style="visibility:hidden;">hi</label>
                <button type="button" class="btn btn-info btn-md btn-block" data-toggle="modal" data-target="#myModal">Add
                    Law</button>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog ">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header bg-dark">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Law</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('law') }}" class="d-flex align-items-center flex-column" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Law Name:
                                                <input type="text" name="law" id=""
                                                    class="form-control"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Section
                                                <input type="number" name="section" id=""
                                                    class="form-control"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Penal Code:
                                                <input type="text" name="pcode" id=""
                                                    class="form-control"></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Description:
                                                <input type="text" name="desc" id=""
                                                    class="form-control"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-sm btn-success">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- // --}}
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                <th>Law Name</th>
                                <th>Section</th>
                                <th>In Details</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($law as $l)
                                <tr>
                                <td>{{$i}}</td>
                                <td>{{$l->law_name}}</td>
                                <td>{{$l->section}}</td>
                                <td>{{$l->desc}}</td>
                                <td> <a href="" class="btn btn-sm btn-success">edit</a><a href="" class="btn btn-sm btn-danger">delete</a> </td>
                                @php $i=$i+1; @endphp
                                </tr>
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
