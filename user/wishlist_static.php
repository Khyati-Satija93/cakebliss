<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">

<section class="wishlist-section pt-150 pb-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5 reveal">
            <div>
                <h1 class="playfair display-4">My Wishlist</h1>
                <p class="opacity-50 mb-0">Your saved enchantments and future cravings.</p>
            </div>
            <button class="btn btn-outline-silver btn-sm" onclick="addAllToCart()">Add All to Cart</button>
        </div>

        <div class="row g-4" id="wishlistGrid">
            <div class="col-lg-4 col-md-6 wishlist-item-card">
                <div class="glass-card p-0 overflow-hidden reveal">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=500" class="w-100 object-fit-cover" style="height: 250px;" alt="Cake">
                        <button class="btn-remove-wishlist" onclick="removeFromWishlist(this)">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h5 class="playfair">Lavender Moon Velvet</h5>
                        <p class="text-accent fw-bold mb-3">$65.00</p>
                        <button class="btn btn-vibrant w-100" onclick="moveToCart(this)">
                            <i class="bi bi-bag-plus me-2"></i> Move to Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wishlist-item-card">
                <div class="glass-card p-0 overflow-hidden reveal">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1535254973040-607b474cb804?w=500" class="w-100 object-fit-cover" style="height: 250px;" alt="Cake">
                        <button class="btn-remove-wishlist" onclick="removeFromWishlist(this)">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h5 class="playfair">Midnight Chocolate Silk</h5>
                        <p class="text-accent fw-bold mb-3">$55.00</p>
                        <button class="btn btn-vibrant w-100" onclick="moveToCart(this)">
                            <i class="bi bi-bag-plus me-2"></i> Move to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="emptyWishlist" class="text-center py-5 d-none">
            <i class="bi bi-heart opacity-20 display-1 mb-4"></i>
            <h3 class="playfair">Your wishlist is empty</h3>
            <p class="opacity-50 mb-4">Explore our gallery to find something magical.</p>
            <a href="shop.php" class="btn btn-vibrant">Go to Shop</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>