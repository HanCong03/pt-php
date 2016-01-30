<?php $__env->startSection('title'); ?>开发者中心 - <?php $__env->stopSection(); ?>

<?php $__env->startSection('common-assets'); ?>
@parent

<link rel="stylesheet" href="<?php echo e(asset('assets/base/styles/cropper.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/base/date-picker/jquery.datetimepicker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/base/date-picker/date-picker.css')); ?>">

<script src="<?php echo e(asset('assets/base/scripts/cropper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/date-picker/jquery.datetimepicker.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/base/date-picker/date-picker.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/pages/dev/basic/page.css')); ?>">
<script src="<?php echo e(asset('assets/pages/dev/basic/page.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-box'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout.dev', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>