<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedsile - E-Commerce Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-pink: #C84B68;
            --bg-pastel: #F9EBF0;
        }
        body { background-color: var(--bg-pastel); font-family: 'Kantumruy Pro', sans-serif; }
        .bg-primary-pink { background-color: var(--primary-pink) !important; }
        .text-primary-pink { color: var(--primary-pink) !important; }
        .btn-primary-pink { background-color: var(--primary-pink); color: white; border: none; }
        .btn-primary-pink:hover { background-color: #a83b54; color: white; }
    </style>
</head>
<body>
    <!-- Main Navigation Bar[cite: 28] -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary-pink sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="<?php echo e(route('home')); ?>">Wedsile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('products.index')); ?>">Products / Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('orders.tracking')); ?>">Order Tracking</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('support.faq')); ?>">Customer Support</a></li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-outline-light position-relative">
                        🛒 Cart
                    </a>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('account.profile')); ?>" class="btn btn-light text-primary-pink fw-bold">My Account</a>
                    <?php else: ?>
                        <a href="/login" class="btn btn-light text-primary-pink fw-bold">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Area -->
    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer[cite: 28] -->
    <footer class="bg-dark text-white pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-primary-pink">Wedsile Store</h5>
                    <p>ហាងលក់សម្លៀកបំពាក់អនឡាញទាន់សម័យ ជាមួយផលិតផលគុណភាពខ្ពស់។</p>
                </div>
                <div class="col-md-4">
                    <h5>Customer Support</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('support.contact')); ?>" class="text-white-50 text-decoration-none">Contact Us</a></li>
                        <li><a href="<?php echo e(route('support.shipping')); ?>" class="text-white-50 text-decoration-none">Shipping Information</a></li>
                        <li><a href="<?php echo e(route('support.returns')); ?>" class="text-white-50 text-decoration-none">Return & Refund Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('orders.tracking')); ?>" class="text-white-50 text-decoration-none">Order Tracking</a></li>
                        <li><a href="<?php echo e(route('products.index')); ?>" class="text-white-50 text-decoration-none">Men's & Women's Collection</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\E-conment\wedsile-backend\resources\views/layouts/app.blade.php ENDPATH**/ ?>