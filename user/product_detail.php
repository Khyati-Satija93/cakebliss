<?php
include 'includes/config.php';
include 'includes/topbar.php';
include 'includes/header.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$pastry_id = $_GET['id'];

$query = "
SELECT 
    p.id,
    p.pastry_name,
    p.pastry_price,
    p.pastry_description,
    p.pastry_image,
    c.Cat_name,
    b.bakery_name
FROM pastries p
LEFT JOIN category c ON p.category_id = c.cat_id
LEFT JOIN bakers b ON p.baker_id = b.id
WHERE p.id = '$pastry_id'
";

$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
?>

<link rel="stylesheet" href="includes/css/style.css">

<section class="product-detail-section pt-150 pb-5">
    <div class="container">
        <div class="row g-5">

            <!-- IMAGE SECTION -->
            <div class="col-lg-7">
                <div class="product-gallery reveal">
                    <div class="main-img-container mb-3">
                        <!-- MAIN IMAGE -->
                        <?php
                        $images = explode(',', $product['pastry_image']); // convert string → array
                        ?>
                        <img src="../seller/uploads/<?php echo $images[0]; ?>"
                            id="mainProductImg"
                            class="img-fluid rounded-4"

                            alt="Main Cake Image">
                    </div>
                    <!-- THUMBNAILS -->
                    <div class="row g-2 thumbnail-grid">
                        <?php foreach ($images as $index => $img) { ?>
                            <div class="col-3">
                                <img
                                    src="../seller/uploads/<?php echo $img; ?>"
                                    class="img-fluid rounded-3 <?php echo $index == 0 ? 'active-thumb' : ''; ?>"
                                    onclick="changeImg(this.src, this)">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- PRODUCT INFO -->
            <div class="col-lg-5">
                <div class="product-info-sidebar reveal">

                    <span class="badge-enchanted">
                        <?php echo $product['Cat_name']; ?>
                    </span>

                    <h1 class="playfair mt-2">
                        <?php echo $product['pastry_name']; ?>
                    </h1>

                    <h3 class="text-accent mb-4">
                        ₹<?php echo $product['pastry_price']; ?>
                    </h3>

                    <p class="opacity-75">
                        <?php echo $product['pastry_description']; ?>
                    </p>

                    <div class="product-meta small mb-4">
                        <span class="me-3">
                            <strong>Bakery:</strong>
                            <?php echo $product['bakery_name']; ?>
                        </span>
                    </div>

                    <hr class="opacity-10 my-4">

                    <!-- OPTIONAL CUSTOM OPTIONS -->
                    <div class="custom-options">
                        <label class="form-label small text-uppercase">Select Size</label>
                        <div class="d-flex gap-2 mb-4">
                            <button type="button" class="btn btn-option active">6" (Serves 8)</button>
                            <button type="button" class="btn btn-option">8" (Serves 12)</button>
                        </div>


                        <label class="form-label small text-uppercase">Message on Cake</label>
                        <input type="text"
                            class="form-control custom-input mb-4"
                            placeholder="e.g. Happy Birthday">

                        <label class="form-label small text-uppercase">Delivery Date</label>
                        <input type="date"
                            class="form-control custom-input mb-4">
                    </div>

                    <!-- ADD TO CART -->
                    <div class="d-flex gap-3 mt-5">
                        <div class="qty-selector">
                            <button type="button" onclick="updateQty(-1)">-</button>
                            <input type="number" value="1" id="productQty" readonly>
                            <button type="button" onclick="updateQty(1)">+</button>
                        </div>

                        <button type="button"
                            class="btn btn-vibrant flex-grow-1"
                            onclick="addToCart(<?php echo $product['id']; ?>)">
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
    </div>
</section>
<script>
    document.querySelectorAll('.btn-option').forEach(btn => {

        btn.addEventListener('click', function() {

            document.querySelectorAll('.btn-option').forEach(b => {
                b.classList.remove('active');
            });

            this.classList.add('active');
        });

    });




    function changeImg(src, el) {
        document.getElementById("mainProductImg").src = src;

        document.querySelectorAll(".thumbnail-grid img").forEach(img => {
            img.classList.remove("active-thumb");
        });

        el.classList.add("active-thumb");
    }


    function addToCart(productId) {

        let qty = document.getElementById('productQty').value;

        // GET SIZE
        let activeBtn = document.querySelector('.btn-option.active');
        let size = activeBtn ? activeBtn.innerText : '';

        // GET MESSAGE
        let messageInput = document.querySelector('input[placeholder="e.g. Happy Birthday"]');
        let message = messageInput ? messageInput.value : '';

        // GET DELIVERY DATE
        let dateInput = document.querySelector('input[type="date"]');
        let deliveryDate = dateInput ? dateInput.value : '';

        fetch("add_to_cart.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "product_id=" + productId +
                    "&qty=" + qty +
                    "&size=" + encodeURIComponent(size) +
                    "&message=" + encodeURIComponent(message) +
                    "&delivery_date=" + deliveryDate
            })
            .then(res => res.text())
            .then(data => {
                if (data === "success") {
                    alert("Product added to cart 🛒");
                } else {
                    alert("Something went wrong");
                }
            });
    }

    function updateQty(value) {
        let qty = document.getElementById("productQty");
        let current = parseInt(qty.value);

        if (current + value >= 1) {
            qty.value = current + value;
        }
    }
</script>
<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>