@extends('shared.layout')
@section('title', 'Daftar Seluruh Scorecard')
@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"> Scorecard </li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-list"></i>
            Daftar Seluruh <em> Scorecard </em>
        </div>
        <div class="card-body">

            <div class="text-right my-4">
                <a href="" class="btn btn-secondary btn-sm">
                    Tambahkan Scorecard Baru
                    <i class="fa fa-plus"></i>
                </a>
            </div>

            <table class="table table-sm table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th> # </th>
                        <th> Periode </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scorecards as $scorecard)
                    <tr>
                        <td> {{ $loop->iteration }}. </td>
                        <td> {{ $scorecard->period() }} </td>
                        <td>
                            <a href="{{ route('scorecard_detail.index', $scorecard) }}" class="btn btn-dark btn-sm">
                                Detail
                                <i class="fa fa-list-alt"></i>
                            </a>

                            <form class="d-inline-block" method="POST" action="">
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection