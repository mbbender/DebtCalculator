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
    <?php foreach($lumpPayments as $bulkPayment): ?>
        <tr>
            <td>
                <?php echo e($bulkPayment->getMemo()); ?>

            </td>
            <td>
                <?php echo e($bulkPayment->getDate()); ?>

            </td>
            <td>
                <?php echo e($bulkPayment->getAmount()); ?>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>



