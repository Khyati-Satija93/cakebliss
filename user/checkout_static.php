<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">

<section class="checkout-section pt-150 pb-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="checkout-steps mb-5 d-flex justify-content-between">
                    <div class="step active"><span>1</span> Delivery</div>
                    <div class="step"><span>2</span> Payment</div>
                    <div class="step"><span>3</span> Review</div>
                </div>

                <div class="glass-card p-5 reveal">
                    <h3 class="playfair mb-4">Delivery Details</h3>
                    <form id="checkoutForm">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">FULL NAME</label>
                                <input type="text" class="form-control custom-input" placeholder="Sophia Sterling">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">PHONE NUMBER</label>
                                <input type="tel" class="form-control custom-input" placeholder="+1 234 567 890">
                            </div>
                            <div class="col-12">
                                <label class="form-label small opacity-50">SHIPPING ADDRESS</label>
                                <input type="text" class="form-control custom-input" placeholder="123 Enchanted Way, Suite 4">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">CITY</label>
                                <input type="text" class="form-control custom-input" placeholder="Dreamville">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">POSTAL CODE</label>
                                <input type="text" class="form-control custom-input" placeholder="90210">
                            </div>
                        </div>

                        <div class="mt-5">
                            <h4 class="playfair mb-3">Delivery Notes</h4>
                            <textarea class="form-control custom-input" rows="3" placeholder="Gate code, special instructions for the driver..."></textarea>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-card p-4 sticky-top" style="top: 120px;">
                    <h4 class="playfair mb-4">Final Summary</h4>
                    <div class="cart-preview-item d-flex gap-3 mb-3 pb-3 border-bottom border-white border-opacity-10">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=60" class="rounded-2">
                        <div class="small">
                            <p class="mb-0 fw-bold">Lavender Moon Velvet</p>
                            <span class="opacity-50">Qty: 1 | 8"</span>
                        </div>
                        <span class="ms-auto fw-bold">$65.00</span>
                    </div>

                    <div class="price-breakdown mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="opacity-70">Subtotal</span>
                            <span>$65.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="opacity-70">Shipping</span>
                            <span class="text-success">FREE</span>
                        </div>
                        <hr class="opacity-10">
                        <div class="d-flex justify-content-between fs-4 fw-bold mb-4">
                            <span>Total</span>
                            <span class="text-accent">$65.00</span>
                        </div>
                    </div>

                    <button type="button" class="btn btn-vibrant w-100 py-3" onclick="processOrder()">
                        Proceed to Payment
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>