<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">

<section class="success-section pt-150 pb-5">
    <div class="container text-center">
        <canvas id="confetti-canvas"></canvas>

        <div class="glass-card p-5 d-inline-block reveal" style="max-width: 600px;">
            <div class="success-icon mb-4">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            
            <h1 class="playfair display-4 mb-2">Sweet Success!</h1>
            <p class="opacity-75 mb-4">Your order has been placed and is being prepared with love.</p>

            <div class="order-info-box p-3 mb-4 text-start">
                <div class="d-flex justify-content-between mb-2">
                    <span class="opacity-50">Order Number:</span>
                    <span class="fw-bold text-accent">#EV-98241</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="opacity-50">Estimated Delivery:</span>
                    <span class="fw-bold">Today, 4:00 PM - 6:00 PM</span>
                </div>
            </div>

            <p class="small opacity-50 mb-5">A confirmation email has been sent to your inbox.</p>

            <div class="d-flex gap-3 justify-content-center">
                <a href="/cakebliss/user/shop.php" class="btn btn-outline-silver px-4">Keep Shopping</a>
                <a href="/cakebliss/index.php" class="btn btn-vibrant px-4">Back to Home</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>