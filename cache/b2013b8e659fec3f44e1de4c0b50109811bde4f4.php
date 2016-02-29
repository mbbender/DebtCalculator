<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('partials._debt-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <div class="row">
        <div class="col-sm-6">
            <?php echo $__env->make('partials._lump-payments-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('partials._monthly-payments-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>


    <?php echo $__env->make('partials._amortization-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>