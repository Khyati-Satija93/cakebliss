<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">
<?php
session_start();

if (!isset($_SESSION['auth_user'])) {
    $_SESSION['message'] = "Please login to continue to checkout";
    header("Location: ../auth/login.php");
    exit();
}
include '../config/config.php';

$subtotal = 0;
?>


<section class="checkout-section pt-150 pb-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="checkout-steps mb-5 d-flex justify-content-between">
                    <div class="step active"><span>1</span> Delivery</div>
                    <div class="step"><span>2</span> Payment</div>
                    <div class="step"><span>3</span> Review</div>
                </div>

                <div class="glass-card p-5 reveal">
                    <h3 class="playfair mb-4">Delivery Details</h3>
                    <form id="checkoutForm">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">FULL NAME</label>
                                <input type="text" id="name" name="name" class="form-control custom-input" placeholder="Sophia Sterling">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">EMAIL ADDRESS</label>
                                <input type="email" id="email" name="email" class="form-control custom-input" placeholder="sophia@example.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">PHONE NUMBER</label>
                                <input type="tel" id="phone" name="phone" class="form-control custom-input" placeholder="+1 234 567 890">
                            </div>
                            <div class="col-12">
                                <label class="form-label small opacity-50">SHIPPING ADDRESS</label>
                                <input type="text" id="address" name="address" class="form-control custom-input" placeholder="123 Enchanted Way, Suite 4">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">CITY</label>
                                <input type="text" id="city" name="city" class="form-control custom-input" placeholder="Dreamville">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">POSTAL CODE</label>
                                <input type="text" id="pincode" name="pincode" class="form-control custom-input" placeholder="90210">
                            </div>
                        </div>

                        <div class="mt-5">
                            <h4 class="playfair mb-3">Delivery Notes</h4>
                            <textarea class="form-control custom-input" rows="3" placeholder="Gate code, special instructions for the driver..."></textarea>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="glass-card p-4 sticky-top" style="top: 120px;">
                    <h4 class="playfair mb-4">Final Summary</h4>
                    <?php if (!empty($_SESSION['cart'])): ?>

                        <?php foreach ($_SESSION['cart'] as $item):

                            $product_id = (int)$item['product_id'];
                            $qty = (int)$item['qty'];
                            $size = $item['size'];

                            $sql = "SELECT * FROM pastries WHERE id = $product_id";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) continue;

                            $product = mysqli_fetch_assoc($result);
                            if (!$product) continue;

                            $itemTotal = $product['pastry_price'] * $qty;
                            $subtotal += $itemTotal;

                            $images = explode(',', $product['pastry_image']); // convert string → array
                        ?>
                            <div class="cart-preview-item d-flex gap-3 mb-3 pb-3 border-bottom border-white border-opacity-10">

                                <img src="../seller/uploads/<?php echo $images[0]; ?>" width="60" class="rounded-2">
                                <div class="small">
                                    <p class="mb-0 fw-bold"><?php echo htmlspecialchars($product['pastry_name']); ?></p>
                                    <span class="opacity-50">
                                        Qty: <?php echo $qty; ?> | <?php echo htmlspecialchars($size); ?>
                                    </span>
                                </div>
                                <span class="ms-auto fw-bold">₹<?php echo number_format($itemTotal, 2); ?></span>
                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <p class="opacity-50">Your cart is empty.</p>
                    <?php endif; ?>
                    <div class="price-breakdown mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="opacity-70">Subtotal</span>
                            <span>₹<?php echo number_format($subtotal, 2); ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="opacity-70">Shipping</span>
                            <span class="text-success">FREE</span>
                        </div>
                        <hr class="opacity-10">
                        <div class="d-flex justify-content-between fs-4 fw-bold mb-4">
                            <span>Total</span>
                            <span class="text-accent"><?php echo number_format($subtotal, 2); ?></span>
                        </div>
                    </div>

                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AbBT8tCQQ1CSX3U-ODCsjBEirfqeRo541UB0veafLoQlsi2ETbc-IL3EYKko8xvxdBiPixUiWWZWMZE2&currency=USD"></script>
<script>
    paypal.Buttons({
        onClick: function(data, actions) {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value; // Added email
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('address').value;
            var city = document.getElementById('city').value;
            var pincode = document.getElementById('pincode').value;

            if (name == "" || email == "" || phone == "" || address == "" || city == "" || pincode == "") {
                alert("Please fill in all delivery details before proceeding.");
                return false;
            }
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo number_format($subtotal, 2, '.', ''); ?>'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                var p_id = orderData.purchase_units[0].payments.captures[0].id;

                // Use FormData for cleaner data handling
                var data = {
                    'name': document.getElementById('name').value,
                    'email': document.getElementById('email').value, // Send email to backend
                    'phone': document.getElementById('phone').value,
                    'address': document.getElementById('address').value,
                    'city': document.getElementById('city').value,
                    'pincode': document.getElementById('pincode').value,
                    'total_price': '<?php echo $subtotal; ?>',
                    'payment_mode': "PayPal",
                    'payment_id': p_id,
                    'placeOrderBtn': true
                };

                $.ajax({
                    method: "POST",
                    url: "place_order.php",
                    data: formData,
                    success: function(response) {
                        // Check for 201 Created or successful string
                        if (response.trim() == "201") {
                            window.location.href = "profile.php?status=success";
                        } else {
                            alert("Order saved, but response was: " + response);
                        }
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>