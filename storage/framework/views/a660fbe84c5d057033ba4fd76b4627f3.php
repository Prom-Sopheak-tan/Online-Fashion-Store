

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <!-- Header Step 5 Cart -->
    <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
        <div>
            <h2 class="fw-bold text-primary-pink mb-1">🛒 Shopping Cart</h2>
            <p class="text-muted mb-0">ពិនិត្យមើលទំនិញ និងចំនួនទឹកប្រាក់សរុបមុនពេលបន្តទៅទូទាត់ប្រាក់</p>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success rounded-4 mb-4 shadow-sm">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                <?php
                    $cart = session()->get('cart', []);
                    $total = 0;
                ?>

                <?php if(count($cart) > 0): ?>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ផលិតផល</th>
                                    <th>តម្លៃ</th>
                                    <th>ចំនួន</th>
                                    <th>សរុប</th>
                                    <th>សកម្មភាព</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                        $price = $details['price'] ?? 0;
                                        $quantity = $details['quantity'] ?? $details['qty'] ?? 1;
                                        $subtotal = $price * $quantity;
                                        $total += $subtotal;
                                    ?>
                                    <tr>
 <td>
    <div class="d-flex align-items-center gap-3">
       <!-- កំណត់ទំហំថេរ 60px និងប្រើ !important ដើម្បីទប់ស្កាត់ Bootstrap CSS -->
        <div style="width: 60px !important; height: 60px !important; min-width: 60px !important; max-width: 60px !important; flex-shrink: 0 !important; overflow: hidden;" class="rounded-3 bg-light shadow-sm d-flex align-items-center justify-content-center">
            <img src="<?php echo e($details['image'] ?? $details['images'] ?? 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=200&auto=format&fit=crop&q=80'); ?>" 
                 alt="<?php echo e($details['name'] ?? 'Product'); ?>" 
                 style="width: 60px !important; height: 60px !important; object-fit: cover !important;">
        </div>
        <div>
            <h6 class="fw-bold text-dark mb-0"><?php echo e($details['name'] ?? 'Product Name'); ?></h6>
            <small class="text-muted">Size: <?php echo e($details['size'] ?? 'M'); ?> | Color: <?php echo e($details['color'] ?? 'Pink'); ?></small>
        </div>
    </div>
</td>
                                        <td class="fw-semibold">$<?php echo e(number_format($price, 2)); ?></td>
                                        <td>
                                            <span class="badge bg-light text-dark border px-3 py-2 fs-6"><?php echo e($quantity); ?></span>
                                        </td>
                                        <td class="fw-bold text-primary-pink">$<?php echo e(number_format($subtotal, 2)); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 py-1">
                                                    លុប
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-5">
                        <div class="fs-1 mb-3">🛒</div>
                        <h5 class="fw-bold text-dark">កន្ត្រកទំនិញរបស់អ្នកទទេរ</h5>
                        <p class="text-muted mb-4">សូមជ្រើសរើសទំនិញដែលអ្នកពេញចិត្តបន្ថែមចូលក្នុងកន្ត្រក។</p>
                        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary-pink rounded-pill px-4">ទិញទំនិញឥឡូវនេះ</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Order Summary & Checkout Button (Step 5) -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h4 class="fw-bold text-dark mb-3">Order Summary</h4>
                <div class="d-flex justify-content-between mb-2 text-muted">
                    <span>សរុប (Subtotal)</span>
                    <span>$<?php echo e(number_format($total, 2)); ?></span>
                </div>
                <div class="d-flex justify-content-between mb-3 text-muted">
                    <span>សេវាដឹកជញ្ជូន</span>
                    <span>Free</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4 fs-5 fw-bold text-dark">
                    <span>ទឹកប្រាក់សរុប (Total)</span>
                    <span class="text-primary-pink">$<?php echo e(number_format($total, 2)); ?></span>
                </div>

                <a href="<?php echo e(route('checkout.index') ?? '#'); ?>" class="btn btn-primary-pink w-100 rounded-pill py-3 fw-bold shadow-sm">
                    ទៅកាន់ការទូទាត់ប្រាក់ (Checkout)
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-pink { background-color: #C84B68 !important; color: white !important; }
    .text-primary-pink { color: #C84B68 !important; }
    .btn-primary-pink { background-color: #C84B68; border-color: #C84B68; color: white; }
    .btn-primary-pink:hover { background-color: #b03d58; border-color: #b03d58; color: white; }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\E-conment\wedsile-backend\resources\views/cart/index.blade.php ENDPATH**/ ?>