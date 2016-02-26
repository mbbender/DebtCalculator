<?php $__env->startSection('content'); ?>

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
        <?php foreach($debts as $debt): ?>
            <tr>
                <td>
                    <?php echo e($debt->getName()); ?>

                </td>
                <td>
                    <?php echo e($debt->getCurrentInterestRate() * 100); ?>%
                </td>
                <td>
                    <?php echo e($debt->getCurrentBalance()); ?>

                </td>
                <td>
                    <?php echo e($debt->getMinimumPayment()); ?>

                </td>
                <td>
                    <?php echo e($debt->minPayoff); ?>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>