<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', ''); ?>星云开放平台</title>

    <link rel="stylesheet" href="<?php echo e(asset('assets/base/styles/basic/index.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/base/screen-lock/index.css')); ?>">

    <script src="<?php echo e(asset('assets/base/scripts/jquery.min.js')); ?>"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            }
        });
    </script>
    <script src="<?php echo e(asset('assets/base/screen-lock/index.js')); ?>"></script>

    <?php echo $__env->yieldContent('page-assets'); ?>
</head>
<body>
<div class="header">
    <div class="inner-header">
        <a href="<?php echo e(route('index')); ?>" class="logo" title="星云开放平台"><h1>星云开放平台</h1></a>
    </div>
</div>

<div class="body">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<div class="footer">

</div>

</body>
</html>