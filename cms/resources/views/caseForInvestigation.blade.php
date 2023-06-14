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


            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>

                                    <th> Case No</th>

                                    <th>Deadline</th>
                                    
                                    <th>Parties</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php $j=1; @endphp
                                @foreach ($case as $c)
                                    @if (Auth::user()->userInfo->court_id != null )
                                        <tr>
                                            <td>{{ $j }} </td>
                                            <td> <a href="{{ asset('case/' . $c->id) }}" >{{ $c->case_id }}</a> </td>
                                            <td>
                                                @if ($c->petitionerFilledLaw != null)
                                                    @foreach ($c->petitionerFilledLaw as $cp)
                                                        {{ $cp->Law->law_name }},
                                                        <i>Penal code-</i> {{ $cp->Law->p_code }}, Section
                                                        {{ $cp->Law->section }}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if ($c->investigation != null)
                                                    {{ $c->investigation->case_id }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($c->investigation != null)
                                                    {{ date('Y-m-d', strtotime($c->investigation->enddate)) }}
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if ($c->petition != null)
                                                    {{ $c->petition->petitioner }}
                                                @endif
                                                <p class="mb-0">Vs</p>
                                                @if ($c->criminal != null)
                                                    @php $i=1; @endphp
                                                    @foreach ($c->criminal as $cc)
                                                        @if ($i > 1)
                                                            ,
                                                        @endif
                                                        {{ $cc->criminal }}
                                                        @php $i=$i+1; @endphp
                                                    @endforeach
                                                @endif
                                            </td>

                                            

                                        </tr>
                                        @php $j=$j+1; @endphp
                                    @else
                                    @endif
                                @endforeach --}}
                                @php $j=1; @endphp
                                @foreach($case as $c)
                                <tr>
                                    <td>{{$j}}</td>
                                    <td> <a href="{{ asset('case/' . $c->id) }}" >{{ $c->id }}</a> </td>
                                    <td>@if ($c->investigation != null)
                                        {{ date('Y-m-d', strtotime($c->investigation->enddate)) }}
                                    @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($c->petition != null)
                                            {{ $c->petition->petitioner }}
                                        @endif
                                        <p class="mb-0">Vs</p>
                                        @if ($c->criminal != null)
                                            @php $i=1; @endphp
                                            @foreach ($c->criminal as $cc)
                                                @if ($i > 1)
                                                    ,
                                                @endif
                                                {{ $cc->criminal }}
                                                @php $i=$i+1; @endphp
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                @php $j=$j+1; @endphp
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
