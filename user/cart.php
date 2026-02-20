<?php
session_start();
include '../config/config.php';
include 'includes/header.php';
include 'includes/topbar.php';

$subtotal = 0;
?>

<link rel="stylesheet" href="includes/css/style.css">

<section class="cart-page pt-150 pb-5">
    <div class="container">
        <h2 class="playfair display-5 mb-5">Your Selection</h2>

        <div class="row g-5">
            <!-- CART TABLE -->
            <div class="col-lg-8">
                <div class="glass-card p-4 mb-4">
                    <div class="table-responsive">
                        <table class="table text-white border-0">
                            <thead>
                                <tr class="opacity-50 small text-uppercase">
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody class="align-middle">
                                <?php
                                if (!empty($_SESSION['cart'])) {

                                    foreach ($_SESSION['cart'] as $index => $item) {

                                        $product_id = (int)$item['product_id'];
                                        $qty = (int)$item['qty'];
                                        $size = $item['size'];
                                        $message = $item['message'];
                                        $delivery_date = $item['delivery_date'];

                                        if ($product_id <= 0) {
                                            continue;
                                        }

                                        $sql = "SELECT * FROM pastries WHERE id = $product_id";
                                        $result = mysqli_query($conn, $sql);

                                        if (!$result) continue;

                                        $product = mysqli_fetch_assoc($result);
                                        if (!$product) continue;

                                        $itemTotal = $product['pastry_price'] * $qty;
                                        $subtotal += $itemTotal;
                                ?>

                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <?php
                                                    $images = explode(',', $product['pastry_image']);
                                                    ?>
                                                    <img src="../seller/uploads/<?php echo $images[0]; ?>" width="80" class="rounded-3">
                                                    <div>
                                                        <h6 class="mb-0"><?php echo $product['pastry_name']; ?></h6>
                                                        <span class="small opacity-50">
                                                            Size: <?= htmlspecialchars($size); ?>
                                                        </span>

                                                    </div>
                                                </div>
                                            </td>

                                            <td>₹<?= number_format($product['pastry_price'], 2); ?></td>

                                            <td>
                                                <div class="qty-selector-sm">
                                                    <button><a href="update_cart.php?action=decrease&id=<?= $index ?>">-</a></button>
                                                    <span><?= $qty ?></span>
                                                    <button><a href="update_cart.php?action=increase&id=<?= $index ?>">+</a></button>
                                                </div>
                                            </td>

                                            <td class="text-accent fw-bold">
                                                ₹<?= number_format($itemTotal, 2); ?>
                                            </td>

                                            <td>
                                                <a href="update_cart.php?action=remove&id=<?= $index ?>">
                                                    <i class="bi bi-trash3 opacity-50"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5 opacity-50">
                                            Your cart is empty 🛒
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <!-- SUMMARY -->
            <div class="col-lg-4">
                <div class="glass-card p-4 sticky-top" style="top: 120px;">
                    <h4 class="playfair mb-4">Summary</h4>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>₹<?= number_format($subtotal, 2); ?></span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Delivery</span>
                        <span class="text-success">FREE</span>
                    </div>

                    <hr class="opacity-10">

                    <div class="d-flex justify-content-between fs-5 fw-bold mb-4">
                        <span>Total</span>
                        <span class="text-accent">
                            ₹<?= number_format($subtotal, 2); ?>
                        </span>
                    </div>

                    <a href="checkout.php" class="btn btn-vibrant w-100 py-3 mb-3">
                        Proceed to Checkout
                    </a>

                    <div class="payment-icons d-flex justify-content-center gap-3 opacity-50">
                        <i class="fab fa-cc-visa fa-lg"></i>
                        <i class="fab fa-cc-mastercard fa-lg"></i>
                        <i class="fab fa-apple-pay fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>