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
                        <form action="{{ route('typeSearch') }}" method="post">
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
                                            style="width: 100%;">
                                            @foreach($case as $c)
                                            <option value="{{$c->id}}">
                                                @if($c->petition!=NULL) 
                                                   @if($type=='gr')
                                                   state
                                                   @else
                                                   {{$c->petition->petitioner}}
                                                   @endif
                                                 Vs
                                                 @if($c->criminal!=NULL) 
                                                 @foreach($c->criminal as $cc)
                                                 {{$cc->criminal}}
                                                 @endforeach
                                                 @endif
                                                @endif
                                             </option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <input type="hidden" name="type" value="{{ $type }}">
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
                                @php $i=1; @endphp
                                @foreach ($case as $c)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            @if ($c->approvedCase != null)
                                                {{ date('Y-m-d',strtotime($c->approvedCase->created_at)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($c->approvedCase != null)
                                           @if($type=='cr')  {{$c->IArea->area_name}}   - @endif {{ $c->approvedCase->id }} {{date('(m)d')}}  @if($type=='gr') - {{$c->IArea->area_name}}    @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if($c->petition!=NULL) 
                                            @if($type=='gr')
                                            state
                                            @else
                                            {{$c->petition->petitioner}}
                                            @endif
                                          Vs
                                          @if($c->criminal!=NULL) 
                                          @foreach($c->criminal as $cc)
                                          {{$cc->criminal}}
                                          @endforeach
                                          @endif
                                         @endif
                                        </td>
                                        <td>
                                            
                                            @if($c->HearingDate!=NULL)
                                            @php $next = array(); @endphp
                                            @foreach($c->HearingDate as $ch)
                                            @php array_push($next,strtotime($ch->next_date));
                                            $nextDate = max($next); @endphp
                                            {{ date('Y-m-d',$nextDate)}}
                                            @endforeach
                                             
                                            {{-- @php $ndate = max($next); @endphp --}}
                                            
                                            
                                            
                                            @endif
                                            
                                        </td>
                                    </tr>
                                    @php $i=$i+1; @endphp
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
