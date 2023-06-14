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
        <form action="{{route('searchCase')}}" method="get">
            @csrf
            <div class="row mb-5">
                <div class="col-md-4">
                    <label for="" class="d-block">Case Type
                        <select name="type" id="" class="select2 form-control" style="width:100%;">
                            <option value="cr">CR</option>
                            <option value="gr">GR</option>
                            <option value="non-gr">Non-GR</option>
                        </select>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="" class="d-block">
                        Search by ID
                        <select name="id" id="" class="select2 form-control" style="width:100%;">
                            @foreach ($pcase as $p)
                                <option value="{{ $p->id }}">
                                    @if ($p->approvedCase != null)
                                  PID:{{$p->id}}  ,    {{ $p->approvedCase->id }}
                                        {{ date('(m)Y', strtotime($p->approvedCase->created_at)) }}
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="" class="d-block">
                        Search by Court
                        <select name="court" id="" class="select2 form-control" style="width:100%;">
                            <option value=""></option>
                        </select>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="" class="d-block">
                        From:
                        <input type="date" name="from" id="" class="form-control">
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="" class="d-block">
                        To:
                        <input type="date" name="to" id="" class="form-control">
                    </label>
                </div>
                <div class="col-md-2 justify-content-end">
                    <label for="" class="d-block mb-0" style="visibility: hidden">Search</label>
                    <button class="btn btn-sm btn-dark">seacrh</button>
                </div>
            </div>
        </form>
        
        <table class="mytable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Case No</th>
                    <th>Parties</th>
                    <th>Next Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pcase as $pc)
                    <tr>
                        <td>{{ $pc->id }}</td>
                        <td>
                            @if ($pc->approvedCase != null)
                                {{ $pc->approvedCase->id }} {{ date('(m)Y', strtotime($pc->approvedCase->created_at)) }}
                            @endif
                        </td>
                        <td>
                            @if ($pc->petition != null)
                                {{ $pc->petition->petitioner }} VS
                                @endif @if ($pc->criminal != null)
                                    @foreach ($pc->criminal as $cri)
                                        {{ $cri->criminal }}
                                    @endforeach
                                @endif
                        </td>
                        @php $adate = array(); @endphp
                        <td>@if($pc->HearingDate!=NULL) 
                            @foreach($pc->HearingDate as $ch)
                            @php  array_push($adate,strtotime($ch->next_date)); @endphp
                            @php $bdate = end($adate); @endphp
                            
                            @endforeach
                            @if($adate!=NULL)
                            {{date('Y-m-d',end($adate))}}
                            @endif
                            
                            @endif</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('footer')
@parent
@endsection

@endsection
@section('script')
@parent
@endsection
