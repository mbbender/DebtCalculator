@extends('layout.master')

@section('content')

    <h2>Current Debts</h2>

    <table class="table">
        <thead>
        <tr>
            <th>
                Name
            </th>
            <th>
                Current Rate
            </th>
            <th>
                Current Balance
            </th>
            <th>
                Minimum Payment
            </th>
            <th>
                Time to Payoff
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($debts as $debt)
            <tr>
                <td>
                    {{ $debt->getName() }}
                </td>
                <td>
                    {{ $debt->getCurrentInterestRate() * 100 }}%
                </td>
                <td>
                    {{ $debt->getCurrentBalance() }}
                </td>
                <td>
                    {{ $debt->getMinimumPayment() }}
                </td>
                <td>
                    {{ $debt->minPayoff }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection