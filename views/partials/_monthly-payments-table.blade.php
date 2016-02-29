<h2>Monthly Payments</h2>
<p>Applied on top of minimum payments.</p>

<table class="table">
    <thead>
    <tr>
        <th>
            Memo
        </th>
        <th>
            Start Date
        </th>
        <th>
            Amount
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($monthlyPayments as $monthlyPayment)
        <tr>
            <td>
                {{ $monthlyPayment->getMemo() }}
            </td>
            <td>
                {{ $monthlyPayment->getStartDate() }}
            </td>
            <td>
                {{ $monthlyPayment->getAmount() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



