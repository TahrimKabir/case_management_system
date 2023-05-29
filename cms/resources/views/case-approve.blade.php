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
                    <h1>View Case List</h1>
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
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="d-block">From:
                                    <input type="date" name="" id="" class="form-control">
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="d-block">To:
                                    <input type="date" name="" id="" class="form-control">
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="d-block">Case Category:
                                    <select name="" id="" class="select select2 form-control"
                                        style="width: 100%;"></select>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="d-block text-light">Search:
                                    <button class="btn btn-block btn-dark btn-md">search</button>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered border-top">
                            <thead>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Petitioner Vs Accused</th>

                                <th>Approve</th>
                            </thead>
                            <tbody>

                                @foreach ($complaint as $c)
                                    <tr>
                                        {{-- <td>01</td> --}}
                                        <td>{{ $c->id }}</td>
                                        <td>{{ date('Y-m-d', strtotime($c->created_at)) }}</td>
                                        <td>
                                            @if (!is_null($c->petition))
                                                {{ $c->petition->petitionType }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if (!is_null($c->petition))
                                                {{ $c->petition->petitioner }}
                                            @endif
                                            <p class='mb-0'> Vs </p>
                                            @if (!is_null($c->criminal))
                                                @php $i=1;  @endphp
                                                @foreach ($c->criminal as $cc)
                                                    @if ($i > 1)
                                                        ,
                                                    @endif
                                                    {{ $cc->criminal }}
                                                    {{-- @if ($i == 1)
                                                        {{ $cc->criminal }}
                                                    @else
                                                        {{ $cc->criminal }},
                                                    @endif --}}
                                                    @php $i=$i+1; @endphp
                                                @endforeach
                                            @endif
                                        </td>
                                        @php $j = 1; @endphp
                                        <td>
                                            @if (!is_null($c->petitionerFilledLaw))
                                                @foreach ($c->petitionerFilledLaw as $pl)
                                                    @if ($j > 1)
                                                        ,
                                                    @endif
                                                    {{ $pl->law->law_name }}-<b>{{ $pl->law->p_code }} Section
                                                    </b>{{ $pl->law->section }}

                                                    @php $j = $j+1; @endphp
                                                @endforeach
                                            @endif
                                        </td>


                                        <td class="d-flex justify-content-center align-items-center"> 
                                            @if($c->under_investigation=='N' ||$c->under_investigation=='V' )
                                            <a href=""
                                                onclick="openModal('{{ $c->id }}','{{ $c->created_at }}')"
                                                class="btn-sm btn-info" type="button" data-toggle="modal"
                                                data-target="#myModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                </svg> Approve
                                            </a>
                                           @if($c->under_investigation!='V')
                                            <a href=""
                                                onclick="openInvestigation('{{ $c->id }}','{{ $c->created_at }}')"
                                                class="btn-sm btn-info ml-1"   type="button" data-toggle="modal"
                                                data-target="#investigation">
                                               
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                </svg>  investigation
                                            </a>
                                            @endif
                                            @else
                                            <a href="" class="btn btn-sm btn-danger ml-1" readonly>sent for investigation</a>
                                            @endif


                                            <!-- Modal -->
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog ">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Add Law</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('approveCase') }}"
                                                                class="d-flex align-items-center flex-column"
                                                                method="post">
                                                                @csrf
                                                                <div class="row" style="display:none;">
                                                                    <div class="col-md-6">
                                                                        <label for="" class="d-block">Law Name:
                                                                            <input type="text" name="caseregid"
                                                                                id="inputId" class="form-control"></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="" class="d-block">Section
                                                                            <input type="number" name="section"
                                                                                id="pcode" class="form-control"></label>
                                                                    </div>


                                                                </div>
                                                                <div class="row">


                                                                    
                                                                    <div class="col-md-12">
                                                                        <label for="section" class="d-block">
                                                                            Section under which the case has been filed:
                                                                            <select  name="section[]"
                                                                                class="duallistbox" multiple="multiple"
                                                                                style="width:100%;">
                                                                                @foreach($section as $s)
                                                                                <option value="{{$s->id}}">{{$s->law_name}},Section-{{$s->section}},Penal Code - {{$s->p_code}}[{{$s->desc}}] </option>
                                                                                @endforeach
                                                                            </select>
                                                                           


                                                                        </label>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-success">SAVE</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- // --}}

                                            <!-- Modal -->
                                            <div id="investigation" class="modal fade" role="dialog">
                                                <div class="modal-dialog ">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Add Law</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('investigate') }}"
                                                                
                                                                method="post">
                                                                @csrf
                                                                <div class="row" style="display:none;">
                                                                    <div class="col-md-6">
                                                                        <label for="" class="d-block">Law Name:
                                                                            <input type="text" name="caseregid"
                                                                                id="inputId" class="form-control"></label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="" class="d-block">Section
                                                                            <input type="number" name="section"
                                                                                id="pcode" class="form-control"></label>
                                                                    </div>


                                                                </div>
                                                                <div class="row">


                                                                    
                                                                    <div class="col-md-6">
                                                                        <label for="section" class="d-block">
                                                                            Section under which the case has been filed:
                                                                            <select  name="sentto"
                                                                                class="select2 form-control"
                                                                                style="width:100%;">
                                                                                @foreach($iareas as $i)
                                                                                <option value="{{$i->id}}">{{$i->area_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                           


                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="section" class="d-block">
                                                                           Date to get finished
                                                                            <input type="date" name="enddate" id="" class="form-control">
                                                                           


                                                                        </label>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-success">SAVE</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- // --}}

                                        </td>
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
@parent
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script> --}}

{{-- <script>
    $('#myModal').modal(options)
</script> --}}
<script>
    // JavaScript function
    function openModal(itemId, date) {
        // Perform the desired action using the itemId parameter
        console.log(itemId); // Example: Output the ID to the console
        $('#myModal').find('#inputId').val(itemId);
        $('#myModal').find('#pcode').val(date);
        // Open the modal or perform other operations
        $('#myModal').modal('show');

        
    }

    function openInvestigation(itemId,date){
        $('#investigation').find('#inputId').val(itemId);
        $('#investigation').find('#pcode').val(date);
        // Open the modal or perform other operations
        $('#investigation').modal('show');
    }
</script>



@endsection
