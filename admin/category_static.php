<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>

<main class="container py-5">


    <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
        <div>
            <h2 class="display-6 mb-1">Menu Categories</h2>
            <p class="text-muted mb-0">Organize your artisan bakes into manageable collections.</p>
        </div>
        <div class="col-md-5 text-md-end">
            <button class="btn btn-outline-dark rounded-pill px-4 me-2" data-bs-toggle="modal" data-bs-target="#categoryModal">
                <i class="bi bi-tags me-2"></i>Manage Categories
            </button>

            <button class="btn btn-outline-dark rounded-pill px-4 me-2" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bi bi-plus-lg me-2"></i>New Category
            </button>
        </div>

    </div>

    <div class="row g-4">
        <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="category-card">
                <div class="category-actions">
                    <button class="btn-action shadow-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                </div>
                <div class="category-icon-wrapper">
                    <i class="bi bi-cake2"></i>
                </div>
                <h5 class="text-white mb-1">Celebration Cakes</h5>
                <p class="small text-secondary mb-3">Custom tiered bakes for events.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="stat-pill">24 Products</span>
                    <span class="badge rounded-pill bg-light text-sage-green border small">Vegan</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" checked>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
            <div class="category-card">
                <div class="category-actions">
                    <button class="btn-action shadow-sm"><i class="bi bi-pencil-square"></i></button>
                </div>
                <div class="category-icon-wrapper">
                    <i class="bi bi-egg-fried"></i>
                </div>
                <h5 class="text-white mb-1">Artisan Pastries</h5>
                <p class="small text-muted mb-3">Flaky croissants and danishes.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="stat-pill">18 Products</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" checked>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="category-card">
                <div class="category-actions">
                    <button class="btn-action shadow-sm"><i class="bi bi-pencil-square"></i></button>
                </div>
                <div class="category-icon-wrapper" style="color: var(--neon-magenta); border-color: var(--neon-magenta);">
                    <i class="bi bi-cup-hot"></i>
                </div>
                <h5 class="text-white mb-1">Coffee & Brews</h5>
                <p class="small text-muted mb-3">Pairings for your sweet treats.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="stat-pill">12 Products</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="categoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px;">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title">Marketplace Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="input-group mb-4">
                    <input type="text" class="form-control" placeholder="category name...">
                    <button class="btn btn-dark px-3"><i class="bi bi-search"></i></button>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Wedding Cakes <i class="bi bi-x-circle text-danger pointer" style="cursor:pointer"></i>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Artisan Bread <i class="bi bi-x-circle text-danger pointer" style="cursor:pointer"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px;">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title">Create New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form action="catagory_code.php" method="POST" id="newCategoryForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Category Name</label>
                        <input type="text" class="form-control" name="category_name" placeholder="e.g., Seasonal Special">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Category Image</label>
                        <div class="upload-area" style="cursor: pointer; border: 2px dashed #ddd; padding: 20px; text-align: center;" onclick="document.getElementById('fileInput').click()">
                            <i class="bi bi-cloud-arrow-up fs-2 text-white"></i>
                            <p class="mb-0 small text-secondary">Click to upload image</p>
                            <input type="file" id="fileInput" class="form-control" name="category_image" hidden accept="image/*" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Occasion</label>
                        <input type="text" class="form-control" name="occasion" placeholder="e.g., Christmas">
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold d-block">Dietary Tags</label>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="dietary_tags[]" value="vegan" id="vegan">
                                    <label class="form-check-label small" for="vegan">Vegan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="dietary_tags[]" value="gluten-free" id="gf">
                                    <label class="form-check-label small" for="gf">Gluten-Free</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="dietary_tags[]" value="nut-free" id="nutfree">
                                    <label class="form-check-label small" for="nutfree">Nut-Free</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="dietary_tags[]" value="sugar-free" id="sugarfree">
                                    <label class="form-check-label small" for="sugarfree">Sugar-Free</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="save_category" class="btn btn-dark rounded-pill py-2">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>