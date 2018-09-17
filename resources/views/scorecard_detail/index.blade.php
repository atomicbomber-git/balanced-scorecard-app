@extends('shared.layout')
@section('title', 'Detail Scorecard Periode ' . $scorecard->period())
@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('scorecard.index') }}"> Scorecard </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Detail Scorecard </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i>
            Detail Scorecard Periode {{ $scorecard->period() }}
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th> # </th>
                        <th> Perspective </th>
                        <th> Strategic Objective </th>
                        <th> KPI </th>
                        <th> Action Plan </th>
                        <th> Current </th>
                        <th> Target </th>
                        <th> Actual </th>
                        <th> Weight </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perspectives as $perspective => $strategic_objectives)
                        <tr>
                            <td rowspan="{{ $strategic_objectives->sum('kpi_count') }}"> {{ $loop->iteration }}. </td>
                            <td rowspan="{{ $strategic_objectives->sum('kpi_count') }}"> {{ $perspective }} </td>
                            
                            @php $objective = $strategic_objectives->shift() @endphp
                            <td rowspan="{{ $objective->kpi_count }}"> {{ $objective->name }} </td>

                            @php $kpi = $objective->key_performance_indicators->shift() @endphp
                            <td> {{ $kpi->name }} </td>
                            <td> {{ $kpi->action_plan }} </td>
                            <td> {{ $kpi->current }} </td>
                            <td> {{ $kpi->target }} </td>
                            <td> {{ $kpi->actual }} </td>
                            <td> {{ $kpi->weight }} </td>
                            <td>
                                <form method="POST" action="">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @foreach ($objective->key_performance_indicators as $kpi)
                        <tr>
                            <td> {{ $kpi->name }} </td>
                            <td> {{ $kpi->action_plan }} </td>
                            <td> {{ $kpi->current }} </td>
                            <td> {{ $kpi->target }} </td>
                            <td> {{ $kpi->actual }} </td>
                            <td> {{ $kpi->weight }} </td>
                            <td>
                                <form method="POST" action="">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @foreach ($strategic_objectives as $objective)
                        <tr>
                            <td rowspan="{{ $objective->kpi_count }}"> {{ $objective->name }} </td>

                            @php $kpi = $objective->key_performance_indicators->shift() @endphp
                            <td> {{ $kpi->name }} </td>
                            <td> {{ $kpi->action_plan }} </td>
                            <td> {{ $kpi->current }} </td>
                            <td> {{ $kpi->target }} </td>
                            <td> {{ $kpi->actual }} </td>
                            <td> {{ $kpi->weight }} </td>
                            <td>
                                <form method="POST" action="">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @foreach ($objective->key_performance_indicators as $kpi)
                        <tr>
                            <td> {{ $kpi->name }} </td>
                            <td> {{ $kpi->action_plan }} </td>
                            <td> {{ $kpi->current }} </td>
                            <td> {{ $kpi->target }} </td>
                            <td> {{ $kpi->actual }} </td>
                            <td> {{ $kpi->weight }} </td>
                            <td>
                                <form method="POST" action="">
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection