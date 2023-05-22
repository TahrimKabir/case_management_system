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
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Case No</th>
                                    <th>Parties</th>
                                    <th>Section</th>
                                    <th>Next Date</th>
                                    <th>For What to come</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($allCase as $c)
                                <tr>
                                    {{-- <td>01</td> --}}
                                    <td>{{ $c->id }}</td>
                                    <td>{{ date('Y-m-d', strtotime($c->created_at)) }}</td>
                                    <td>@if($c->approvedCase!=NULL){{$c->approvedCase->id}}/{{date("m/Y",strtotime($c->approvedCase->created_at))}} @endif</td>
                                    {{-- <td>
                                        @if (!is_null($c->petition))
                                            {{ $c->petition->petitionType }}
                                        @endif
                                    </td> --}}
                                    <td class="text-center">
                                        @if (!is_null($c->petition))
                                            {{ $c->petition->petitioner }}
                                        @endif
                                        <p class='mb-0'> Vs </p>
                                        @if (!is_null($c->criminal))
                                            @php $i=1;  @endphp
                                            @foreach ($c->criminal as $cc)
                                            @if($i>1)
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
                                    {{-- <td> @if (!is_null($c->petitionerFilledLaw))

                                        @foreach($c->petitionerFilledLaw as $pl)
                                        @if($j>1)
                                        ,
                                        @endif
                                        {{ $pl->law->law_name }}-<b>{{ $pl->law->p_code }} Section </b>{{ $pl->law->section }}
                                        
                                        
                                        @endforeach
                                    @endif </td> --}}

                                   

                                    <td>
                                        @if($c->approveCourtCase !=NULL)
                                    @foreach($c->approveCourtCase as $ca)
                                    @if($j>1) , @endif
                                    {{$ca->law->law_name}}
                                    @php $j = $j+1; @endphp
                                    @endforeach
                                    @endif
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
@endsection
