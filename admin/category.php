<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>

<main class="container py-5">


    <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
        <div>
            <h2 class="display-6 mb-1">Menu Categories</h2>
            <p class="text-secondary mb-0">Organize your artisan bakes into manageable collections.</p>
        </div>
    </div>

    <div class="col-md-12 d-flex justify-content-between align-items-center flex-wrap mb-3">

        <div class="mt-3">
            <button class="btn btn-outline-dark rounded-pill px-4 me-2" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="bi bi-plus-lg me-2"></i>New Category
            </button>

            <button class="btn btn-outline-dark rounded-pill px-4 me-2" data-bs-toggle="modal" data-bs-target="#addOccasionCategoryModal">
                <i class="bi bi-plus-lg me-2"></i>Occasion Categories
            </button>

            <button class="btn btn-outline-dark rounded-pill px-4 me-2" data-bs-toggle="modal" data-bs-target="#addDietaryCategoryModal">
                <i class="bi bi-plus-lg me-2"></i> Dietary Category
            </button>
        </div>

        <div class="mt-3 mb-2" style="min-width: 200px;">
            <input type="text" class="search-bar shadow-sm" placeholder="Search categories...">
        </div>

    </div>
    <!-- Category -->
    <div class="mb-4">
        <h3>Category</h3>
    </div>

    <div class="d-flex flex-nowrap overflow-auto pb-4  custom-scrollbar" style="gap: 1.5rem;">
        <?php
        include('../config/config.php');
        //$sql = "SELECT * FROM category WHERE status = 1"
        $sql = "SELECT * FROM category";
        $sql_run = mysqli_query($conn, $sql);

        if (mysqli_num_rows($sql_run) > 0) {
            foreach ($sql_run as $category) {
        ?>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card">
                        <div class="category-actions">
                            <button class="btn-action shadow-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn-action shadow-sm" title="Delete" onclick="return confirm('Delete this product?');"><i class="bi bi-trash"></i></button>
                        </div>
                        <div class="category-img-wrapper">
                            <img src="<?php echo $category['img']; ?>" class="img-fluid" alt="category">
                        </div>
                        <h5 class="text-white mb-1"><?php echo $category['Cat_name']; ?></h5>
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
        <?php
            }
        }
        ?>
    </div>
    <!-- Occasion -->
    <div class="mb-4 mt-3">
        <h3>Occasion</h3>
    </div>

    <div class="d-flex flex-nowrap overflow-auto pb-4  custom-scrollbar" style="gap: 1.5rem;">
        <?php
        include('../config/config.php');
        
        $sql = "SELECT * FROM occasion_category";
        $sql_run = mysqli_query($conn, $sql);

        if (mysqli_num_rows($sql_run) > 0) {
            foreach ($sql_run as $category) {
        ?>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card">
                        <div class="category-actions">
                            <button class="btn-action shadow-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn-action shadow-sm" title="Delete" onclick="return confirm('Delete this product?');"><i class="bi bi-trash"></i></button>
                        </div>
                        <h5 class="text-white mb-1"><?php echo $category['Cat_name']; ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="stat-pill">24 Products</span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <!-- Dietary -->
    <div class="mb-4 mt-3">
        <h3>Dietary</h3>
    </div>

    <div class="d-flex flex-nowrap overflow-auto pb-4  custom-scrollbar" style="gap: 1.5rem;">
        <?php
        include('../config/config.php');

        $sql = "SELECT * FROM dietary_category";
        $sql_run = mysqli_query($conn, $sql);

        if (mysqli_num_rows($sql_run) > 0) {
            foreach ($sql_run as $category) {
        ?>
                <div class="col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card">
                        <div class="category-actions">
                            <button class="btn-action shadow-sm" title="Edit"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn-action shadow-sm" title="Delete" onclick="return confirm('Delete this product?');"><i class="bi bi-trash"></i></button>
                        </div>
                        <h5 class="text-white mb-1"><?php echo $category['Cat_name']; ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="stat-pill">24 Products</span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</main>

<!--Category Modal-->
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

                    <div class="d-grid">
                        <button type="submit" name="save_category" class="btn btn-dark rounded-pill py-2">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Occasion Category Modal -->
<div class="modal fade" id="addOccasionCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px;">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title">Create New Occasion Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form action="catagory_code.php" method="POST" id="newCategoryForm" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Occasion</label>
                        <input type="text" class="form-control" name="occasion" placeholder="e.g., Christmas">
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="save_occasion_category" class="btn btn-dark rounded-pill py-2">Save Occasion Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Dietary Category Modal -->
<div class="modal fade" id="addDietaryCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px;">
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title">Create New Occasion Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form action="catagory_code.php" method="POST" id="newCategoryForm" enctype="multipart/form-data">

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
                        <button type="submit" name="save_diet_category" class="btn btn-dark rounded-pill py-2">Save Diet Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>