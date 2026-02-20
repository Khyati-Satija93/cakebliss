<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">

<section class="cart-page pt-150 pb-5">
    <div class="container">
        <h2 class="playfair display-5 mb-5">Your Selection</h2>
        
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="glass-card p-4 mb-4">
                    <div class="table-responsive">
                        <table class="table text-white border-0">
                            <thead>
                                <tr class="opacity-50 small text-uppercase">
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=80" class="rounded-3">
                                            <div>
                                                <h6 class="mb-0">Lavender Moon Velvet</h6>
                                                <span class="small opacity-50">Size: 8"</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$65.00</td>
                                    <td>
                                        <div class="qty-selector-sm">
                                            <button type="button">-</button><span>1</span><button>+</button>
                                        </div>
                                    </td>
                                    <td class="text-accent fw-bold">$65.00</td>
                                    <td><i class="bi bi-trash3 opacity-50 cursor-pointer"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-card p-4 sticky-top" style="top: 120px;">
                    <h4 class="playfair mb-4">Summary</h4>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span><span>$65.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Delivery</span><span class="text-success">FREE</span>
                    </div>
                    <hr class="opacity-10">
                    <div class="d-flex justify-content-between fs-5 fw-bold mb-4">
                        <span>Total</span><span class="text-accent">$65.00</span>
                    </div>
                    <button class="btn btn-vibrant w-100 py-3 mb-3"><a href="checkout.php">Proceed to Checkout</a></button>
                    <div class="payment-icons d-flex justify-content-center gap-3 opacity-50">
                        <i class="fab fa-cc-visa fa-lg"></i>
                        <i class="fab fa-cc-mastercard fa-lg"></i>
                        <i class="fab fa-apple-pay fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>