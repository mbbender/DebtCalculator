@extends('layout.master')

@section('content')

    @include('partials._debt-table')


    <div class="row">
        <div class="col-sm-6">
            @include('partials._lump-payments-table')
        </div>
        <div class="col-sm-6">
            @include('partials._monthly-payments-table')
        </div>
    </div>


    @include('partials._amortization-table')

@endsection