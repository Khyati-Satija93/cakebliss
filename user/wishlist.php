<?php
session_start();
include 'includes/config.php';
include 'includes/header.php';
include 'includes/topbar.php';

$products = [];

if (!empty($_SESSION['wishlist'])) {

    $ids = array_map('intval', array_keys($_SESSION['wishlist']));
    $ids = array_filter($ids); // remove 0 or invalid

    if (!empty($ids)) {

        $ids = implode(',', $ids);
        $sql = "SELECT * FROM pastries WHERE id IN ($ids)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
        }
    }
}
?>


<link rel="stylesheet" href="includes/css/style.css">

<section class="wishlist-section pt-150 pb-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h1 class="playfair display-4">My Wishlist</h1>
                <p class="opacity-50 mb-0">Your saved enchantments and future cravings.</p>
            </div>

            <?php if (!empty($products)) { ?>
                <a href="wishlist-to-cart-all.php" class="btn btn-outline-silver btn-sm">
                    Add All to Cart
                </a>
            <?php } ?>
        </div>

        <div class="row g-4">

            <?php if (!empty($products)) { ?>

                <?php foreach ($products as $product) { ?>
                    <div class="col-lg-4 col-md-6 wishlist-item-card">
                        <div class="glass-card p-0 overflow-hidden">
                            <div class="position-relative">
                                <?php
                                $images = explode(',', $product['pastry_image']);
                                ?>
                                <img src="../seller/uploads/<?php echo $images[0]; ?>"
                                    class=" w-100 object-fit-cover"
                                    style="height:250px;">

                                <a href="remove-wishlist.php?id=<?= $product['id']; ?>"
                                    class="btn-remove-wishlist">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </div>

                            <div class="p-4">
                                <h5 class="playfair"><?= $product['pastry_name']; ?></h5>
                                <p class="text-accent fw-bold mb-3">
                                    ₹<?= number_format($product['pastry_price'], 2); ?>
                                </p>

                                <a href="wishlist-to-cart.php?id=<?= $product['id']; ?>"
                                    class="btn btn-vibrant w-100">
                                    <i class="bi bi-bag-plus me-2"></i>
                                    Move to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            <?php } else { ?>

                <div class="text-center py-5">
                    <i class="bi bi-heart opacity-20 display-1 mb-4"></i>
                    <h3 class="playfair">Your wishlist is empty</h3>
                    <p class="opacity-50 mb-4">Explore our gallery to find something magical.</p>
                    <a href="shop.php" class="btn btn-vibrant">Go to Shop</a>
                </div>

            <?php } ?>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>