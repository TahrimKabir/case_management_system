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
                        <h3 class="text-center mb-0 font-weight-bold"> New Case (Initial)</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('case.store') }}" method="post">
                            @csrf
                            <div class="row my-4">
                                <div class="col-12 bg-dark p-1 ">
                                    <h4 class="text-center mb-0">Petitioner  Details</h4>
                                </div>
                            </div>
                            <div class="row  ">

                                <div class="col-12 ">
                                    <label for="aname" class="d-block ">
                                        Petitioner  Name:
                                        <input type="text" id="aname" name="petitioner" class="form-control">
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="aname" class="d-block">
                                        Father's Name:
                                        <input type="text" id="aname" name="vfname" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="aname" class="d-block">
                                        Mother's Name:
                                        <input type="text" id="aname" name="vmname" class="form-control">
                                    </label>
                                </div>

                                <div class="col-12">
                                    <label for="vaddress" class="d-block">Address:
                                        <textarea class="form-control" name="vaddress" id="vaddress" cols="30" rows="3"></textarea>
                                    </label>
                                </div>

                            </div>
                            <div class="row my-4">
                                <div class="col-12 bg-dark p-1 ">
                                    <h4 class="text-center mb-0">Accused Person Details</h4>
                                </div>
                            </div>
                            <div class="row input_fields_wrap ">

                                <div class="col-12 ">
                                    <label for="aname" class="d-block ">
                                        Accused Person Name:
                                        <input type="text" id="aname" name="aname[]" class="form-control">
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="aname" class="d-block">
                                        Father's Name:
                                        <input type="text" id="aname" name="afname[]" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="aname" class="d-block">
                                        Mother's Name:
                                        <input type="text" id="aname" name="amname[]" class="form-control">
                                    </label>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="d-block">Address:
                                        <textarea class="form-control" name="a_address[]" id="address" cols="30" rows="3"></textarea>
                                    </label>
                                </div>

                            </div>
                            <div class="row ">
                                <div class="col-12">
                                    <button class="add_field_button btn btn-info btn-sm">more to add?</button>
                                </div>

                            </div>

                            <div class="row my-4">
                                <div class="col-12 bg-dark p-1 ">
                                    <h4 class="text-center mb-0">Witness Details</h4>
                                </div>
                            </div>
                            <div class="row input_fields_wrap_1 ">

                                <div class="col-12 ">
                                    <label for="aname" class="d-block ">
                                        Witness Name:
                                        <input type="text" id="aname" name="wname[]" class="form-control">
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="aname" class="d-block">
                                        Father's Name:
                                        <input type="text" id="aname" name="wfname[]" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="aname" class="d-block">
                                        Mother's Name:
                                        <input type="text" id="aname" name="wmname[]" class="form-control">
                                    </label>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="d-block">Address:
                                        <textarea class="form-control" name="w_address[]" id="address" cols="30" rows="3"></textarea>
                                    </label>
                                </div>

                            </div>
                            <div class="row ">
                                <div class="col-12">
                                    <button class="add_field_button_1 btn btn-info btn-sm">more to add?</button>
                                </div>

                            </div>

                            <div class="row my-4">
                                <div class="col-12 bg-dark p-1">
                                    <h4 class="text-center mb-0">Incident in Details</h4>
                                </div>
                            </div>
                            <div class="row">

                               
                                <div class="col-md-6">
                                    <label for="law" class="d-block">
                                        Act under which the case is filed:
                                        <select name="rule" id="law" class="select2 form-control"
                                            style="width:100%;">
                                            @foreach($law as $l)
                                            <option data-state="{{$l->law_name}}"  value="{{$l->law_name}}">{{$l->law_name}} {{$l->section}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="section" class="d-block">
                                        Section under which the case has been filed:
                                        <select name="section" id="section" class="select2 form-control"
                                            style="width:100%;">
                                            @foreach($section as $l)
                                            <option data-state="{{$l->law_name}}"  value="{{$l->id}}">{{$l->section}}</option>
                                            @endforeach
                                        </select>

                                        

                                    </label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="" class="d-block">Description:
                                        <textarea class="form-control" name="incidentDesc" id="" cols="30" rows="2"></textarea>
                                    </label>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="ctype" class="d-block">
                                        Case Type:
                                        <select name="ctype" id="ctype" onchange="myFunction()"
                                            class="select2 form-control" style="width:100%;">
                                            <option value="cr">cr</option>
                                            <option value="gr">gr</option>
                                            <option value="nongr">non-gr</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-4">

                                    <p id="distance" class="mb-0"></p>

                                </div>
                                <div class="col-md-4">

                                    <p id="date" class="mb-0"></p>

                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <button class="btn btn-info btn-sm btn-block">Save</button>

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

{{-- add/remove form --}}
<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(
                    '<div class="container-fluid "><div class="row"><div class="col-md-12"><label class="d-block">Accused person Name:<input type="text" name="aname[]" class="form-control"></label></div></div> <div class="row "><div class="col-md-6"><label for="afname" class="d-block">Fathers name: <input type="text" name="afname[]" id="afname" class="form-control"> </label></div><div class="col-md-6"><label for="afname" class="d-block">Mothers name: <input type="text" id="afname" name="amname[]" class="form-control"> </label></div></div> <div class="row"><div class="col-12"><label class="d-block" for="address">Address:<textarea class="form-control" name="a_address[]" cols="30" rows="3"></textarea></label></div></div> <a href="#" class="remove_field btn btn-danger btn-sm mb-1">Remove</a></div>'
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
<script>
    $(document).ready(function() {
        var max_fields = 100; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap_1"); //Fields wrapper
        var add_button = $(".add_field_button_1"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(
                    '<div class="container-fluid "><div class="row"><div class="col-md-12"><label class="d-block">Accused person Name:<input type="text" name="wname[]" class="form-control"></label></div></div> <div class="row "><div class="col-md-6"><label for="afname" class="d-block">Fathers name: <input type="text" name="wfname[]" id="afname" class="form-control"> </label></div><div class="col-md-6"><label for="afname" class="d-block">Mothers name: <input type="text" id="afname" name="wmname[]" class="form-control"> </label></div></div> <div class="row"><div class="col-12"><label class="d-block" for="address">Address:<textarea class="form-control" name="w_address[]" cols="30" rows="3"></textarea></label></div></div> <a href="#" class="remove_field btn btn-danger btn-sm mb-1">Remove</a></div>'
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
{{-- // --}}
<script>
    function myFunction() {
        var x = document.getElementById("ctype").value;
        if (x == 'gr') {
            document.getElementById("distance").innerHTML =
                "<label class='d-block' for='dist'>Distance:<input type='text' class='form-control' name='dist'></label>";
            document.getElementById("date").innerHTML =
                "<label class='d-block' for='dist'>Distance:<input type='date' class='form-control' name='dist'></label>";
        } else {
            document.getElementById("distance").innerHTML = "";
            document.getElementById("date").innerHTML = "";
        }


    }
</script>
<script>
    var $law = $('#law'),
		$section = $('#section'),
    $options = $section.find('option');
    
$law.on('change', function() {
	$section.html($options.filter('[data-state="'+this.value+'"]'));
}).trigger('change');
</script>
@endsection
