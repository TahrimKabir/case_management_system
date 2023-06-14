@extends('front')


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="scss/front.css">

</head> --}}


@section('main')

    @parent
@section('top-nav')
    @parent
@endsection
@section('body')
    @parent
@section('side-bar')
    @parent
@endsection
@section('content')
    @parent
    {{-- in future, i wanna transfer login design here --}}
@endsection

@endsection
@section('edit')
<div class="myrow">
    <div class="mycol-8">
        <div class="row">
            <div class="col-12 ">
                <div class="card card-success">

                    <div class="card-header bg-dark">
                        <h3 class="text-center mb-0 font-weight-bold"> New Case (Initial)</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('casestored') }}" method="post">
                            @csrf
                            <div class="row my-4" id="p1">
                                <div class="col-12 bg-dark p-1 ">
                                    <h4 class="text-center mb-0">Petitioner Details</h4>
                                </div>
                            </div>
                            <div class="row " id="p2">

                                <div class="col-12 ">
                                    <label for="aname" class="d-block ">
                                        Petitioner Name:
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
                                        <select multiple="multiple" name="rule" id="law"
                                            onchange="getSection(this)" class="select2 form-control"
                                            style="width:100%;">

                                            @foreach ($law as $l)
                                                        <option data-state="{{ $l->law_name }}" value="{{ $l->law_name }}">
                                                            {{ $l->law_name }} {{ $l->section }}</option>
                                                    @endforeach
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="section" class="d-block">
                                        Section under which the case has been filed:
                                        <select id="targetDropdown" name="section[]" class="select2"
                                            multiple="multiple" style="width:100%;">

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
                                            <option value="cr">Court</option>
                                            <option value="gr">Police Station</option>
                                        </select>
                                    </label>
                                </div>
                                


                                <div class="col-md-4" id="jurisdriction">

                                    <label for="jurisdriction" class="d-block">jurisdriction
                                        <select name="jurisdriction" id="" class="select2 form-control">
                                            @foreach ($jrd as $jd)
                                                    <option value="{{$jd->id}}">@if ($jd->IArea != null) {{$jd->IArea->area_name}}@endif </option>
                                            @endforeach
                                        </select>
                                    </label>

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
</div>
@endsection
@section('footer')
@parent
@endsection

@endsection
@section('script')
@parent
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
{{-- dependent dropdown --}}
<script>
    function getSection(select) {
        var selectedValues = [];

        // Loop through the selected options
        for (var i = 0; i < select.options.length; i++) {
            var option = select.options[i];

            // Check if the option is selected
            if (option.selected) {
                selectedValues.push(option.value);
            }
        }

        // Pass the selectedValues to another function or perform any other actions
        console.log(selectedValues);
        // Clear the target dropdown
        var targetDropdown = document.getElementById("targetDropdown");
        targetDropdown.innerHTML = "";

        // Add the selected values to the target dropdown
        var section = @json($section);
        for (var j = 0; j < section.length; j++) {
            for (var i = 0; i < selectedValues.length; i++) {
                if (section[j].law_name == selectedValues[i]) {
                    var option = document.createElement("option");
                    // option.value = selectedValues[i];
                    // option.text = selectedValues[i];
                    option.value = section[j].id;
                    option.text = section[j].law_name + "Act" + section[j].p_code + ", Section" + section[j].section +
                        ": " + section[j].desc;
                    targetDropdown.appendChild(option);
                }
            }
        }
    }
</script>
{{-- add type --}}
<script>
    function myFunction() {
        var x = document.getElementById("ctype").value;
        console.log(x);
        if (x == 'c') {
            // document.getElementById("p1").style.display = 'none';
            // document.getElementById("p2").style.display = 'none';

            
                "<label class='d-block' for='dist'>Distance:<input type='date' class='form-control' name='dist'></label>";
        } else {
            // document.getElementById("distance").innerHTML = "";
            // document.getElementById("date").innerHTML = "";
        }


    }
</script>
@endsection
