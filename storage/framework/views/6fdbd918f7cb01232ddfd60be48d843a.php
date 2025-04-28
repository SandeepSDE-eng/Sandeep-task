<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'My Shop'); ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
        body{background-color: #eeeeee;font-family: 'Open Sans',serif;font-size: 14px}
        .container-fluid{margin-top:70px}
        .card-body{-ms-flex: 1 1 auto;flex: 1 1 auto;padding: 1.40rem}
        .img-sm{width: 80px;height: 80px}
        .itemside .info{padding-left: 15px;padding-right: 7px}
        .table-shopping-cart .price-wrap{line-height: 1.2}
        .table-shopping-cart .price{font-weight: bold;margin-right: 5px;display: block}
        .text-muted{color: #969696 !important}
        a{text-decoration: none !important}
        .card{background-color: #fff;border: 1px solid rgba(0,0,0,.125);}
        .itemside{display: flex;width: 100%}
        .dlist-align{display: flex}
        .coupon{border-radius: 1px}
        .price{font-weight: 600;color: #212529}
        .btn.btn-out{outline: 1px solid #fff;outline-offset: -5px}
        .btn-main{border-radius: 2px;font-size: 15px;padding: 10px 19px;color: #fff;width: 100%}
        .btn-light{color: #ffffff;background-color: #F44336;border-color: #f8f9fa;font-size: 12px}
        .btn-light:hover{background-color: #F44336}
        .btn-apply{font-size: 11px}
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\projects\sandeep\resources\views/layouts/master.blade.php ENDPATH**/ ?>