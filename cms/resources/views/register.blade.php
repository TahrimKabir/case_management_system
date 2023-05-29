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
                    <h1>Trial Register</h1>
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
                        <form action="{{ route('search') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="d-block">From:
                                        <input type="date" name="from" id="" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="d-block">To:
                                        <input type="date" name="to" id="" class="form-control">
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="d-block">Case Category:
                                        <select name="case" id="" class="select select2 form-control"
                                            style="width: 100%;"></select>
                                    </label>
                                    <input type="hidden" name="id" value="{{ $id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="d-block text-light">Search:
                                        <button class="btn btn-block btn-dark btn-md">search</button>
                                    </label>
                                </div>
                            </div>
                        </form>
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
                                {{-- @php $i=0; @endphp --}}
                                {{-- @for ($i = $from; $i <= $to; $i = $i + 86400) --}}
                                @foreach ($hfor as $h)
                                    @if ($h->HearingDate != null)
                                        @php $date = array();  @endphp
                                        {{-- @for ($date = $start; $date <= $end; $date->modify('+1 day')) --}}
                                        @foreach ($h->HearingDate as $hd)
                                            @if ($hd->CaseR != null)
                                                {{-- @if ($hd->CaseR->court_id == Auth::user()->userInfo->court->id) --}}
                                                @php
                                                    array_push($date, strtotime($hd->next_date));
                                                    $nextDate = max($date);
                                                @endphp
                                                @if (date('Y-m-d', $nextDate) == date('Y-m-d', strtotime($hd->next_date)))
                                                @if( strtotime($hd->next_date)>=  $from && strtotime($hd->next_date)<= $to)
                                                    <tr>
                                                        <td>{{ $hd->id }} </td>
                                                        <td>{{ $hd->CaseR->approvedCase->created_at }}</td>
                                                        <td>
                                                            @if ($hd->CaseR != null)
                                                                @if ($hd->CaseR->case_type == 'cr')
                                                                    {{ $hd->CaseR->approvedCase->id }}{{ date('(m)y ', strtotime($hd->CaseR->created_at)) }}
                                                                @else
                                                                    {{ $hd->CaseR->approvedCase->id }}
                                                                    {{ date('(m)y ', strtotime($hd->CaseR->created_at)) }}
                                                                @endif
                                                            @endif
                                                        </td>




                                                        <td class="text-center">
                                                            @if ($hd->CaseR->petition != null)
                                                                {{ $hd->CaseR->petition->petitioner }}
                                                            @endif
                                                            <p class="mb-0">Vs</p>
                                                            @if ($hd->CaseR->criminal != null)
                                                                @foreach ($hd->CaseR->criminal as $cr)
                                                                    {{ $cr->criminal }}
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($hd->CaseR->approveCourtCase != null)
                                                                @php $i=0; @endphp
                                                                @foreach ($hd->CaseR->approveCourtCase as $hca)
                                                                    @php $i=$i+1; @endphp
                                                                    @if ($i > 1)
                                                                        <b> ;</b>
                                                                    @endif
                                                                    {{ $hca->law->law_name }} , <i>Penal Code-</i>
                                                                    {{ $hca->law->p_code }},<i>Section-</i>
                                                                    {{ $hca->law->section }}
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td>{{ $hd->next_date }}</td>
                                                        <td>{{ $h->hearing_for }}</td>


                                                    </tr>
                                                    {{-- @endif --}}
                                                @endif
                                                @endif
                                            @endif
                                        @endforeach
                                        {{-- @endfor --}}
                                    @endif
                                @endforeach

                                {{-- @endfor    --}}

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
