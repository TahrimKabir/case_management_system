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
                    <div class="card-header">
                        <h3 class="text-center mb-0 font-weight-bold"> New Case (Initial)</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-center mb-0">Accused Person Details</h4>
                                </div>
                            </div>
                            <div class="row input_fields_wrap ">

                                <div class="col-12 ">
                                    <label for="aname" class="d-block " data-repeater-list="car">
                                        Accused Person Name:
                                        <input type="text" id="aname" class="form-control">
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="aname" class="d-block">
                                        Father's Name:
                                        <input type="text" id="aname" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="aname" class="d-block">
                                        Mother's Name:
                                        <input type="text" id="aname" class="form-control">
                                    </label>
                                </div>

                            </div>
                            <div class="row ">
                                <div class="col-12">
                                    <button class="add_field_button btn btn-info btn-sm">more to add?</button>
                                </div>
                                
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <label for="afor" class="d-block">
                                        Accused for:
                                        <select name="" id="afor" class="select2 form-control"
                                            style="width:100%;"></select>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label for="afor" class="d-block">
                                        Accused for:
                                        <select name="" id="afor" class="select2 form-control"
                                            style="width:100%;"></select>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label for="afor" class="d-block">
                                        Accused for:
                                        <select name="" id="afor" class="select2 form-control"
                                            style="width:100%;"></select>
                                    </label>
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


<script>
    $(document).ready(function() {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(
                    '<div class="container-fluid "><div class="row"><div class="col-md-12"><label class="d-block">Accused person Name:<input type="text" name="mytext[]" class="form-control"></label></div></div> <div class="row "><div class="col-md-6"><label for="afname" class="d-block">Fathers name: <input type="text" id="afname" class="form-control"> </label></div><div class="col-md-6"><label for="afname" class="d-block">Father s name: <input type="text" id="afname" class="form-control"> </label></div></div> <a href="#" class="remove_field btn btn-danger btn-sm mb-1">Remove</a></div>'
                ); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
@endsection
