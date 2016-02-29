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
    <?php foreach($monthlyPayments as $monthlyPayment): ?>
        <tr>
            <td>
                <?php echo e($monthlyPayment->getMemo()); ?>

            </td>
            <td>
                <?php echo e($monthlyPayment->getStartDate()); ?>

            </td>
            <td>
                <?php echo e($monthlyPayment->getAmount()); ?>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>



