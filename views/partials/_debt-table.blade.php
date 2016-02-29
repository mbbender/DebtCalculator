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
            Min Payment
        </th>
        <th>
            Min Payoff
        </th>
        <th>
            Min Int.
        </th>
        <th>
            Payoff
        </th>
        <th>
            Interest
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
            <td class="text-right" style="padding-right:20px">
                ${{ number_format($debt->getCurrentBalance() / 100, 2) }}
            </td>
            <td class="text-right" style="padding-right:20px">
                ${{ number_format($debt->getMinimumPayment() / 100,2) }}
            </td>
            <td>
                {{ \Mbender\HumanTimeFormatter::humanTimeFromMonths($debt->getMinimumPayoffPeriod()) }}
            </td>
            <td>
                TBD
            </td>
            <td>
                TBD
            </td>
            <td>
                TBD
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
