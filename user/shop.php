<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">

<section class="shop-header pt-150 pb-5 reveal">
    <div class="container text-center">
        <h1 class="playfair display-3">Artisan Collections</h1>
        <p class="lead opacity-75">Every bite is a story told in sugar and flour.</p>

        <div class="d-flex justify-content-between align-items-center mt-5 shop-controls p-3">
            <span class="small opacity-50">Showing 1–12 of 48 results</span>
            <div class="d-flex gap-3">
                <select class="form-select filter-select">
                    <option selected>Sort by: Latest</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Popularity</option>
                </select>
            </div>
        </div>
    </div>
</section>

<section class="shop-main pb-5">
    <div class="container">
        <div class="row">
            <aside class="col-lg-3 d-none d-lg-block">
                <form method="GET">
                    <div class="filter-sidebar p-4 reveal">
                        <h5 class="playfair mb-4 text-accent">Categories</h5>
                        <ul class="list-unstyled filter-list">
                            <li><input type="checkbox" id="cat1" name="category[]" value="1"> <label for="cat1">Designer Cakes</label></li>
                            <li><input type="checkbox" id="cat2" name="category[]" value="2"> <label for="cat2">French Macarons</label></li>
                            <li><input type="checkbox" id="cat3" name="category[]" value="3"> <label for="cat3">Daily Pastries</label></li>
                        </ul>

                        <h5 class="playfair my-4 text-accent">Occasion</h5>
                        <ul class="list-unstyled filter-list">
                            <li><input type="checkbox" name="occasion[]" value="wedding" id="occ1"> <label for="occ1">Weddings</label></li>
                            <li><input type="checkbox" name="occasion[]" value="birthday" id="occ2"> <label for="occ2">Birthdays</label></li>
                        </ul>

                        <h5 class="playfair my-4 text-accent">Dietary</h5>
                        <ul class="list-unstyled filter-list">
                            <li><input type="checkbox" name="dietary[]" value="sugar-free" id="diet1"> <label for="diet1">Sugar-Free</label></li>
                            <li><input type="checkbox" name="dietary[]" value="eggless" id="diet2"> <label for="diet2">Eggless</label></li>
                            <li><input type="checkbox" name="dietary[]" value="vegan" id="diet3"> <label for="diet3">Vegan</label></li>
                        </ul>

                        <h5 class="playfair my-4 text-accent">Price Range</h5>
                        <input type="range" name="price" class="form-range custom-range" min="0" max="200" id="priceRange">
                        <div class="d-flex justify-content-between small opacity-50">
                            <span>₹100</span>
                            <span>₹2000+</span>
                        </div>
                    </div>
                </form>
            </aside>

            <div class="col-lg-9">
                <div class="row g-4">
                    <?php
                    include('../config/config.php');

                    $where = [];
                    $where[] = "p.pastry_stock = 1";

                    /* CATEGORY FILTER */
                    if (!empty($_GET['category'])) {
                        $cats = array_map('intval', $_GET['category']);
                        $catList = implode(',', $cats);
                        $where[] = "p.category_id IN ($catList)";
                    }

                    /* PRICE FILTER */
                    if (!empty($_GET['price'])) {
                        $price = (int)$_GET['price'];
                        $where[] = "p.pastry_price <= $price";
                    }

                    /* FINAL WHERE */
                    $whereSQL = implode(' AND ', $where);

                    $sql = "SELECT p.id AS pastry_id,
               p.pastry_name,
               p.pastry_price,
               p.pastry_image,
               p.pastry_description,
               c.Cat_name,
               b.bakery_name
        FROM pastries p
        JOIN category c ON p.category_id = c.cat_id
        JOIN bakers b ON p.baker_id = b.id
        WHERE $whereSQL
        ORDER BY p.created_at DESC
        LIMIT 6";

                    $result = mysqli_query($conn, $sql);

                    // Check if there are any results
                    if (mysqli_num_rows($result) > 0) {
                        // THE FIX: Loop directly through results. 
                        // Do not call mysqli_fetch_assoc outside this while statement.
                        while ($row = mysqli_fetch_assoc($result)) {
                            $images = explode(',', $row['pastry_image']);
                    ?>
                            <div class="col-md-6 col-xl-4 reveal">
                                <div class="product-card h-100">
                                    <div class="img-box position-relative">
                                        <span class="badge-tag">New</span>
                                        <img src="../seller/uploads/<?php echo $images[0]; ?>" alt="<?php echo $row['pastry_name']; ?>">

                                        <div class="card-actions">
                                            <a href="add-to-wishlist.php?id=<?php echo $row['pastry_id']; ?>"
                                                class="action-btn"
                                                title="Add to Wishlist">
                                                <i class="bi bi-heart"></i>
                                            </a>

                                            <a href="product_detail.php?id=<?php echo $row['pastry_id']; ?>"
                                                class="action-btn"
                                                title="Quick View">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content pt-3">
                                        <h5 class="playfair mb-1"><?php echo $row['pastry_name']; ?></h5>
                                        <p class="small opacity-50 mb-2">By :<span class="fw-bold"><?php echo $row['bakery_name']; ?></span></p>
                                        <p class="small opacity-50"><?php echo $row['pastry_description']; ?></p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="price fw-bold text-accent">₹<?php echo $row['pastry_price']; ?></span>
                                            <a href="product_detail.php?id=<?php echo $row['pastry_id']; ?>"><button class="btn-add-sm">Add to Cart</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        } // End of while loop
                    } else {
                        echo '<div class="col-12 text-center"><p class="lead">No pastries found in our oven yet!</p></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop End -->
<!-- Pagination Start -->
<section class="shop-pagination-wrapper mt-5 reveal">
    <div class="text-center">
        <div class="load-more-container mb-4">
            <button class="btn btn-vibrant px-5 py-3" id="loadMoreBtn">
                <span class="btn-text">Load More</span>
                <span class="btn-icon"><i class="bi bi-arrow-down"></i></span>
            </button>
        </div>
    </div>
</section>
<!-- Pagination End -->
</main>
<!-- Main End -->

<div class="shop-pagination-wrapper mt-5 reveal">
    <div class="text-center">
        <div class="load-more-container mb-4">
            <button class="btn btn-vibrant px-5 py-3" id="loadMoreBtn">
                <span class="btn-text">Explore More Treats</span>
                <div class="spinner-border spinner-border-sm d-none" role="status"></div>
            </button>
            <p class="mt-3 small opacity-50">Viewing 12 of 48 delicious creations</p>
            <div class="progress-bliss mx-auto mt-2">
                <div class="progress-bar-fill" style="width: 25%;"></div>
            </div>
        </div>

        <nav aria-label="Shop Pagination">
            <ul class="pagination justify-content-center luxury-pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="bi bi-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>