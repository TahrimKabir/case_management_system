@extends('index')
@section('title')
    Case Management System
@section('style')
    <link rel="stylesheet" href="scss/master.css">
    <!-- summernote -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="../../plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="../../plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="../../plugins/simplemde/simplemde.min.css">
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
        <div class="row d-flex justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0 text-center text-bold">({{ $case->id }})
                            @if ($case->approvedCase != null)
                                {{ date('m/Y', strtotime($case->approvedCase->created_at)) }}
                        </h4>
                        @endif
                        <h3 class="display-6 mb-0 text-center text-bold">
                            @if ($case->petition != null)
                                {{ $case->petition->petitioner }}
                                @endif VS @if ($case->criminal != null)
                                    @php $i=1; @endphp
                                    @foreach ($case->criminal as $cr)
                                        @if ($i > 1)
                                            ,
                                        @endif
                                        {{ $cr->criminal }}
                                        @php $i=$i+1; @endphp
                                    @endforeach
                                @endif
                        </h3>
                        <p class="mb-0 text-center">
                            @if ($case->approvedCase != null)
                                <b>Received:</b> {{ $case->approvedCase->created_at }}
                            @endif
                        </p>
                    </div>

                </div>
                @if (Auth::user()->userInfo->court_id != null)
                    <div class="card">
                        <div class="card-header">
                            <form action="{{ route('hearingDate') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="hdate" class="d-block">Next Hearing
                                            <input type="date" name="hdate" id="hdate" class="form-control">
                                            <input type="text" name="case_id" value="{{ $case->id }}" hdate"
                                                class="form-control" style="display: none;">
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="forwhat" class="d-block">For What to come
                                            <select class="select2 form-control" style="width:100%;" name="hfor">
                                                @foreach ($hfor as $h)
                                                    <option value="{{ $h->id }}">{{ $h->hearing_for }}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-md-12">


                                        <label for="order" class="d-block"> Case Order

                                            <textarea id="summernote">
                                          Place <em>some</em> <u>text</u> <strong>here</strong>
                                        </textarea>

                                        </label>

                                    </div>
                                    <div class="col-md-2">
                                        <label for="" style="visibility: hidden;"
                                            class="d-block mb-0">button</label>
                                        <button class="btn btn-block  btn-info">SAVE</button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                @endif
                {{-- investigate --}}
                @if($case->under_investigation !='V')
                <div class="card">
                    <div class="card-header">
                       <form action="{{route('investigation')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="d-block mb-0">
                                    <input type="checkbox" name="isValid" value="Y" id="">
                                    Is there any validity of the case?
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="d-block">Necessary Documents
                                    <input type="file" name="file[]" id="" class="form-control" multiple="multiple">
                                </label>
                                <input type="hidden" name="case_id" value="{{$id}}">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-sm btn-info">save</button>
                            </div>
                           </div>
                       </form>
                        
                    </div>
                </div>
                @elseif($case->under_investigation =='V')
               <div class="card">
                <div class="card-body">
                    <label for="iv" class="d-block" disabled>
                        <input type="checkbox" name="" id="iv" value="" checked disabled> Case is valid.
                    </label>
                </div>
               </div>
                @endif
                {{-- hearing date list --}}
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Next Date</th>
                                    <th>For What to Come</th>
                                    <th> in Court </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @if ($case->HearingDate != null)
                                    @foreach ($case->HearingDate as $ch)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $ch->next_date }}</td>
                                            <td>
                                                @if ($ch->HearingFor != null)
                                                    {{ $ch->HearingFor->hearing_for }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($ch->HearingFor != null)
                                                    @if ($ch->HearingFor->courtCat != null)
                                                        {{ $ch->HearingFor->courtCat->courtCat }}
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        @php $i=$i+1; @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center display-6">Defendant List of the Case</h4>
                    </div>
                    <div class="card-body" class="table-responsive">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Defendant</th>
                                    <th>Parents</th>

                                    <th>Section</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @if ($case->criminal != null)
                                    @foreach ($case->criminal as $cc)
                                        @php $i=$i+1; @endphp
                                        <form action="{{route('presence')}}" method="POST" id="form{{$i}}">
                                            @csrf
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td> {{ $cc->criminal }} <input type="hidden" name="did" value="{{$cc->id}}"> 
                                                    
                                                </td>
                                                <td> Father: {{ $cc->fname }} <br> Mother: {{ $cc->mname }}<br>
                                                    Address: {{ $cc->address }}</td>
                                                    @php date_default_timezone_set('Asia/Dhaka');
                                                    $currentDate = date('Y-m-d'); @endphp
                                                    @if($case->HearingDate!=NULL)
                                                    @foreach($case->HearingDate as $ch)
                                                    @if(date('Y-m-d',strtotime($ch->next_date))==$currentDate)
                                                    <input type="hidden" name="hearingDate_id" value="{{$ch->id}}">
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                <td> <label for="law" class="d-block">Law
                                                        <select multiple="multiple" name="rule[]"
                                                            id="law{{ $i }}" onchange="getSection(this)"
                                                            class="select2 form-control" style="width:100%;">

                                                            @foreach ($law as $l)
                                                                <option data-state="{{ $l->law_name }}"
                                                                    value="{{ $l->law_name }}">
                                                                    {{ $l->law_name }} {{ $l->section }}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                    <label for="section" class="d-block">Section
                                                        <select id="targetDropdown{{ $i }}" name="section[]"
                                                            class="select2" multiple="multiple" style="width:100%;">

                                                        </select>
                                                    </label>
                                                </td>
                                                <td>
                                                    <textarea name="shortOrder" class="form-control" id="" cols="30" rows="3"></textarea>
                                                </td>
                                                <td>
                                                    <label class="mb-0 d-block"> <input type="checkbox" name="present" value='Y'
                                                            id=""> is absent</label>

                                                            <input type="hidden" name="case_id" value="{{$id}}">
                                                    
                                                </td>
                                                
                                                <td> <button class="btn btn-sm btn-info">save</button> </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                @endif
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
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>
<!-- Page specific script -->
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()


    })
</script>
<script>
    function getSection(select) {
        var id = @json($i);
        for (var k = 1; k <= id; k++) {
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
            var targetDropdown = document.getElementById("targetDropdown" + k);
            targetDropdown.innerHTML = "";

            // Add the selected values to the target dropdown


            var section = @json($section);
            for (var j = 0; j < section.length; j++) {
                for (var i = 0; i < selectedValues.length; i++) {
                    if (section[j].law_name == selectedValues[i]) {
                        var option = document.createElement("option");
                        // option.value = selectedValues[i];
                        // option.text = selectedValues[i];
                        option.value =  section[j].law_name + "Act   Penal Code-" + section[j].p_code + " Section" + section[j]
                            .section;
                        option.text = section[j].law_name + "Act" + section[j].p_code + "  Section" + section[j]
                            .section +
                            ": " + section[j].desc;
                        targetDropdown.appendChild(option);
                    }
                }
            }
            console.log(k);
        }

    }
</script>
{{-- @parent --}}
@endsection
