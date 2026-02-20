<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">


<section class="product-detail-section pt-150 pb-5">
    <div class="container">
        <div class="row g-5">

            <div class="col-lg-7">
                <div class="product-gallery reveal">
                    <div class="main-img-container mb-3">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=800" id="mainProductImg" class="img-fluid rounded-4" alt="Main Cake Image">
                    </div>
                    <div class="row g-2 thumbnail-grid">
                        <div class="col-3">
                            <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=200" class="img-fluid rounded-3 active-thumb" onclick="changeImg(this.src, this)">
                        </div>
                        <div class="col-3">
                            <img src="https://images.unsplash.com/photo-1535254973040-607b474cb804?w=200" class="img-fluid rounded-3" onclick="changeImg(this.src, this)">
                        </div>
                        <div class="col-3">
                            <img src="https://images.unsplash.com/photo-1621303837174-89787a7d4729?w=200" class="img-fluid rounded-3" onclick="changeImg(this.src, this)">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="product-info-sidebar reveal">
                    <span class="badge-enchanted">Signature Series</span>
                    <h1 class="playfair mt-2">Lavender Moon Velvet</h1>
                    <h3 class="text-accent mb-4">$65.00</h3>

                    <p class="opacity-75">A ethereal blend of organic culinary lavender and rich white chocolate velvet sponge. Decorated with hand-pressed pansies.</p>

                    <div class="product-meta small mb-4">
                        <span class="me-3"><strong>Ingredients:</strong> Organic Flour, Lavender, White Choc</span><br>
                        <span class="text-danger"><strong>Allergens:</strong> Dairy, Gluten, Eggs</span>
                    </div>

                    <hr class="opacity-10 my-4">

                    <div class="custom-options">
                        <label class="form-label small text-uppercase">Select Size</label>
                        <div class="d-flex gap-2 mb-4">
                            <button class="btn btn-option active">6" (Serves 8)</button>
                            <button class="btn btn-option">8" (Serves 12)</button>
                        </div>

                        <label class="form-label small text-uppercase">Flavor Infusion</label>
                        <select class="form-select custom-input mb-4">
                            <option>Classic Lavender</option>
                            <option>Lavender + Honey</option>
                            <option>Lavender + Lemon</option>
                        </select>

                        <label class="form-label small text-uppercase">Message on Cake</label>
                        <input type="text" class="form-control custom-input mb-4" placeholder="e.g. Happy Birthday Sophia">

                        <label class="form-label small text-uppercase">Delivery Date</label>
                        <input type="date" class="form-control custom-input mb-4">
                    </div>

                    <div class="d-flex gap-3 mt-5">
                        <div class="qty-selector">
                            <button type="button" onclick="updateQty(-1)">-</button>
                            <input type="number" value="1" id="productQty" readonly>
                            <button type="button" onclick="updateQty(1)">+</button>
                        </div>
                        <button type="button" class="btn btn-vibrant flex-grow-1" onclick="addToCartAnimation(this)">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mt-100 reveal">
                <div class="col-12">
                    <h2 class="playfair mb-5">Customer Experiences</h2>
                    <div class="testimonial-card p-4 mb-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="playfair">Elena G.</h6>
                            <div class="stars text-accent"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        </div>
                        <p class="mt-2 opacity-75">"The most beautiful cake I've ever ordered. It tasted even better than it looked!"</p>
                    </div>
                </div>
            </div>
        </div>
</section>


<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>