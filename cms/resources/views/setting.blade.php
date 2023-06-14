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


            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body overflow-auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Properties</th>
                                    <th>form</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('courtCat') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <th>01</th>
                                        <td>Court Category</td>
                                        <td> <input type="text" name="courtCat" id="" class="form-control"
                                                placeholder="Court Category"> </td>
                                        <td> <button class="btn btn-sm btn-info">save</button> </td>
                                    </tr>
                                </form>
                                <form action="{{ route('hearingfor') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <th>02</th>
                                        <td>Hearing For</td>
                                        <td> <input type="text" name="hearingfor" id="" class="form-control"
                                                placeholder="Hearing for What"><br>
                                            <select name="courtCat" id="" class="select2 form-control"
                                                style="width: 100%;">
                                                @foreach ($courtCat as $ct)
                                                    <option value="{{ $ct->id }}">{{ $ct->courtCat }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td> <button class="btn btn-sm btn-info">save</button> </td>
                                    </tr>
                                </form>
                                <form action="{{ route('area') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <th>03</th>
                                        <td>Add Investigation Area</td>
                                        <td> <input type="text" name="area" id="" class="form-control"
                                                placeholder="Add Investigation Area"><br>

                                        </td>
                                        <td> <button class="btn btn-sm btn-info">save</button> </td>
                                    </tr>
                                </form>
                                <form action="{{ route('i_area') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <th>04</th>
                                        <td>Invetigation Area Name</td>
                                        <td> <input type="text" name="area_name" id="" class="form-control"
                                                placeholder="Hearing for What"><br>
                                            <select name="area" id="area" class="select2 form-control"
                                                style="width: 100%;">
                                                @foreach ($area as $a)
                                                    <option value="{{ $a->area }}">{{ $a->area }}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td> <button class="btn btn-sm btn-info">save</button> </td>
                                    </tr>
                                </form>
                                <form action="{{ route('bdcourt') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <th>05</th>
                                        <td> Court Name</td>
                                        <td> <input type="text" name="bdcourt" id="" class="form-control"
                                                placeholder="Court Name"><br>

                                        </td>
                                        <td> <button class="btn btn-sm btn-info">save</button> </td>
                                    </tr>
                                </form>
                                <form action="{{ route('addcourt') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <th>06</th>
                                        <td>Court Number </td>
                                        <td> <input type="text" name="court_num" id="" class="form-control"
                                                placeholder="Hearing for What"><br>
                                            <select name="bdcourt" id="area" class="select2 form-control"
                                                style="width: 100%;">
                                                @foreach ($bdcourt as $b)
                                                    <option value="{{ $b->courtname }}">{{ $b->courtname }}</option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td> <button class="btn btn-sm btn-info">save</button> </td>
                                    </tr>
                                </form>
                                <form action="{{ route('jurisdriction') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <th>07</th>
                                        <td>Add Jurisdriction </td>
                                        <td>
                                            <select name="bdcourt" id="bcourt" class="select2 form-control"
                                                style="width: 100%;"   onchange="getSection(this)">
                                                @foreach ($bdcourt as $b)
                                                    <option value="{{ $b->courtname }}">{{ $b->courtname }}</option>
                                                @endforeach
                                            </select>
                                            <select name="court" id="cnum" class="select2 form-control"
                                                style="width: 100%;">
                                                {{-- @foreach ($bdcourt as $b)
                                            <option value="{{$b->courtname}}">{{$b->courtname}}</option>
                                            @endforeach --}}
                                            </select>
                                            <select name="jurisdriction" id="thana" class="select2 form-control" style="width:100%;">
                                               @foreach($thana as $t)
                                                <option value="{{$t->id}}">{{$t->area_name}}</option>
                                               @endforeach 
                                            </select>

                                        </td>
                                        <td> <button class="btn btn-sm btn-info">save</button> </td>
                                    </tr>
                                </form>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
  var element = document.getElementById('bcourt');
  if (element) {
    var select = document.getElementById('cnum');


     var court = @json($court);
     var select = document.getElementById('cnum');

// Create the option element


// Append the option to the select element

     for(i=0;i<=court.length;i++){
        if(court[i].court_name==element.value){
            var option = document.createElement('option');

// Set the ID for the option
option.id = 'your-option-id';

// Set the text and value for the option
option.text = court[i].court_name+' - '+court[i].Court_number;
option.value = court[i].id;
console.log(option.value);
select.appendChild(option);
        }
     }
  } else {
    console.log('Element not found');
  }
});

</script>

@parent
@endsection
