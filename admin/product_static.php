<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>

<main class="container py-5">
    
    <div class="d-flex gap-2 mb-5 overflow-x-auto pb-2" data-aos="fade-up">
        <a href="#" class="category-pill active">All Products</a>
        <a href="#" class="category-pill">Wedding Cakes</a>
        <a href="#" class="category-pill">Artisan Bread</a>
        <a href="#" class="category-pill">Cupcakes</a>
        <a href="#" class="category-pill">Vegan</a>
        <a href="#" class="category-pill">Pastries</a>
    </div>

    <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
        <div class="col-md-3">
            <div class="product-card shadow-sm">
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400" class="product-img" alt="cake">
                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <h6 class="fw-bold mb-0">Dark Chocolate Truffle</h6>
                        <span class="text-sage fw-bold small">$45</span>
                    </div>
                    <p class="text-secondary small mb-3">By: <span class="text-clay">Heavenly Bakes</span></p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-light btn-sm flex-grow-1 border">Edit</button>
                        <button class="btn-delete"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="product-card shadow-sm">
                <img src="https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?w=400" class="product-img" alt="cake">
                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <h6 class="fw-bold mb-0">Artisan Sourdough</h6>
                        <span class="text-sage fw-bold small">$12</span>
                    </div>
                    <p class="text-secondary small mb-3">By: <span class="text-clay">The Sourdough Co.</span></p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-light btn-sm flex-grow-1 border">Edit</button>
                        <button class="btn-delete"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="product-card border-danger shadow-sm">
                <div class="position-absolute p-2">
                    <span class="badge bg-danger">Flagged by Users</span>
                </div>
                <img src="https://images.unsplash.com/photo-1535141192574-5d4897c12636?w=400" class="product-img" alt="cake" style="opacity: 0.6;">
                <div class="p-3">
                    <h6 class="fw-bold mb-1">Generic Berry Cake</h6>
                    <p class="text-secondary small mb-3">By: <span class="text-clay">Newbie Baker</span></p>
                    <button class="btn btn-danger btn-sm w-100 rounded-pill">Take Down Product</button>
                </div>
            </div>
        </div>
    </div>
</main>



<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>