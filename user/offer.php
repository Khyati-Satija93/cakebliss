<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">

<section class="offers-section pt-150 pb-5">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h1 class="playfair display-3">Enchanted Deals</h1>
            <p class="opacity-50">Limited-time infusions and bundles to sweeten your journey.</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="glass-card offer-card featured-offer p-0 overflow-hidden reveal">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?w=500" class="h-100 w-100 object-fit-cover" alt="Bundle">
                        </div>
                        <div class="col-md-7 p-4 d-flex flex-column justify-content-center">
                            <span class="badge-enchanted mb-2">Bestseller Bundle</span>
                            <h3 class="playfair">The Moon & Stars Duo</h3>
                            <p class="small opacity-75">Get one Lavender Moon Velvet and one Midnight Silk Cake for a special price.</p>
                            <div class="d-flex align-items-center gap-2 mb-4">
                                <span class="fs-4 fw-bold text-accent">$99.00</span>
                                <span class="text-decoration-line-through opacity-50 small">$130.00</span>
                            </div>
                            <button class="btn btn-vibrant w-100" onclick="window.location.href='shop.php'">Claim Offer</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="glass-card offer-card p-4 text-center reveal">
                    <div class="promo-circle mb-3">
                        <span class="display-6 fw-bold">15%</span>
                        <span class="small d-block">OFF</span>
                    </div>
                    <h5 class="playfair">First Order Magic</h5>
                    <p class="small opacity-50">Use code <strong class="text-accent">MAGIC15</strong> at checkout for your first enchantment.</p>
                    <button class="btn btn-outline-silver btn-sm w-100 mt-3">Copy Code</button>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="glass-card offer-card p-4 text-center reveal border-accent">
                    <div class="flash-tag">FLASH SALE</div>
                    <h5 class="playfair mt-3">Twilight Cupcakes</h5>
                    <p class="small opacity-50">Box of 6 signature cupcakes.</p>
                    <div class="timer mb-3" id="flashTimer">00:00:00</div>
                    <button class="btn btn-vibrant btn-sm w-100">Grab Now - $18</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>