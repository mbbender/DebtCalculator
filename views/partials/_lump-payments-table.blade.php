<h2>Lump Sum Payments</h2>
<p>Assumes payments should be applied to highest interest rate loans first.</p>

<table class="table">
    <thead>
    <tr>
        <th>
            Memo
        </th>
        <th>
            Date
        </th>
        <th>
            Amount
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($lumpPayments as $bulkPayment)
        <tr>
            <td>
                {{ $bulkPayment->getMemo() }}
            </td>
            <td>
                {{ $bulkPayment->getDate() }}
            </td>
            <td>
                {{ $bulkPayment->getAmount() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



