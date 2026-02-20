<?php include 'user/includes/topbar.php'; ?>
<?php include 'user/includes/header.php'; ?>
<link rel="stylesheet" href="user/includes/css/style.css">

<header class="hero-section" id="home">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 hero-text">
                <span class="badge-enchanted">Pure Artistry. Always Fresh.</span>
                <h1 class="playfair">Sweet Treats,<br>Perfect Eats</h1>
                <p class="lead opacity-75 mt-3">Handmade with premium ingredients and a dash of magic.</p>
                <div class="hero-btns mt-4">
                    <button class="btn btn-vibrant"><a href="/cakebliss/user/shop.php">Shop Now</a></button>
                    <button class="btn btn-outline-silver ms-3">Our Story</button>
                </div>
            </div>
            <div class="col-lg-6 hero-img-wrapper text-center">
                <img src="user/images/wmremove-transformed.png" alt="Signature Cake" class="floating-cake img-fluid">
            </div>
        </div>
    </div>
    <div class="scroll-indicator"></div>
</header>

<section class="trust-bar-container">
    <div class="container">
        <div class="trust-card">
            <span class="fw-bold fs-4 playfair text-dark mx-3">VOGUE</span>
            <div class="d-flex align-items-center">
                <i class="fab fa-apple me-2 fs-4"></i>
                <span class="small fw-bold">Food&Wine</span>
            </div>
            <span class="small fw-bold text-muted">Condé Nast</span>
            <div class="d-flex align-items-center">
                <i class="fas fa-wallet me-2 fs-5"></i>
                <span class="small fw-bold">Cipali Pay</span>
            </div>
        </div>
    </div>
</section>

<section class="brand-tagline reveal">
    <div class="container">
        <div class="tagline-text playfair">
            A little bit of flour, sugar and love ♡
        </div>
    </div>
</section>

<section class="py-5 reveal">
    <div class="container">
        <div class="row g-4 text-center justify-content-center">
            <div class="col-6 col-md-2">
                <div class="category-card p-3">
                    <div class="category-img-wrapper mb-3">
                        <img src="https://images.unsplash.com/photo-1576618148400-f54bed99fcfd?w=200&h=200&fit=crop" alt="Cupcakes">
                    </div>
                    <h6 class="playfair">Cupcakes</h6>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="category-card p-3">
                    <div class="category-img-wrapper mb-3">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=200&h=200&fit=crop" alt="Cakes">
                    </div>
                    <h6 class="playfair">Cakes</h6>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="category-card p-3">
                    <div class="category-img-wrapper mb-3">
                        <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=200&h=200&fit=crop" alt="Donuts">
                    </div>
                    <h6 class="playfair">Donuts</h6>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="category-card p-3">
                    <div class="category-img-wrapper mb-3">
                        <img src="https://images.unsplash.com/photo-1558301211-0d8c8ddee6ec?w=200&h=200&fit=crop" alt="Macarons">
                    </div>
                    <h6 class="playfair">Macarons</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="top-products py-5   ">
    <div class="container py-5">
        <h2 class="section-title text-center playfair mb-5">Top Products</h2>

        <div class="row g-4">

        <?php
        include("user/includes/config.php");

        $query = "
            SELECT 
                p.id AS pastry_id,
                p.pastry_name,
                p.pastry_price,
                p.pastry_image,
                c.Cat_name,
                b.bakery_name
            FROM pastries p
            JOIN category c ON p.category_id = c.cat_id
            JOIN bakers b ON p.baker_id = b.id
            WHERE p.pastry_stock = 1
            ORDER BY p.created_at DESC
            LIMIT 6
        ";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <div class="col-md-4">
                <div class="product-card h-100">

                    <div class="img-box">
                        <?php
                        $images = explode(',', $row['pastry_image']);
                        ?>
                        <img src="seller/uploads/<?php echo $images[0]; ?>"
                             alt="<?php echo $row['pastry_name']; ?>">
                    </div>

                    <div class="content">
                        <h5 class="playfair">
                            <?php echo $row['pastry_name']; ?>
                        </h5>

                        <p class="text-secondary small mb-1">
                            Category: <?php echo $row['Cat_name']; ?>
                        </p>

                        <p class="text-secondary small mb-3">
                            By:
                            <span class="text-clay">
                                <?php echo $row['bakery_name']; ?>
                            </span>
                        </p>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price">
                                ₹<?php echo $row['pastry_price']; ?>
                            </span>

                            <a href="user/product_detail.php?id=<?php echo $row['pastry_id']; ?>">
                                <button class="btn-add btn-vibrant">
                                    View <i class="bi bi-plus"></i>
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        <?php } ?>

        </div>
    </div>
</section>


<section class="promo-banner reveal" id="promo-banner">
    <div class="container">
        <div class="banner-glass">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="playfair">20% Off Your First Order</h2>
                    <p>Experience the magic of artisan baking with a special enchanted discount.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <button class="btn btn-vibrant"><a href="/cakebliss/user/offer.php">Learn More</a></button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="special-services py-5 reveal">
    <div class="container text-center">
        <h2 class="playfair display-5 mb-5">Magical Services</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <i class="fas fa-hand-holding-heart service-icon"></i>
                <h4 class="playfair">Custom Cakes</h4>
                <p class="opacity-75">Your vision, our flour.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-truck service-icon"></i>
                <h4 class="playfair">Swift Delivery</h4>
                <p class="opacity-75">Fresh to your door.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-gem service-icon"></i>
                <h4 class="playfair">Events</h4>
                <p class="opacity-75">Elegant catering.</p>
            </div>
        </div>
    </div>
</section>


<section class="explore-more py-5 reveal" id="explore">
    <div class="container py-5 text-center">
        <h2 class="section-title playfair mb-4">Explore More</h2>
        <div class="category-tabs mb-5">
            <span class="active">Cake</span>
            <span>Muffins</span>
            <span>Croissant</span>
            <span>Bread</span>
            <span>Tart</span>
        </div>
        <div class="masonry-grid">
            <div class="row g-3">
                <div class="col-md-4"><img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=400"
                        class="img-fluid rounded-4"></div>
                <div class="col-md-4"><img src="https://images.unsplash.com/photo-1482049016688-2d3e1b311543?w=400"
                        class="img-fluid rounded-4"></div>
                <div class="col-md-4"><img src="https://images.unsplash.com/photo-1464305795204-6f5bdee7351a?w=400"
                        class="img-fluid rounded-4"></div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 reveal">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="playfair">Love Notes</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="stars mb-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p>"Absolutely magical flavors!"</p>
                    <h6 class="playfair">- Sarah J.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card active-card">
                    <div class="stars mb-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p>"Best wedding cake ever."</p>
                    <h6 class="playfair">- Mike R.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-section py-5 reveal" id="about">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=800" class="img-fluid rounded-4 shadow">
            </div>
            <div class="col-md-6 ps-md-5">
                <h2 class="playfair display-5 mb-4">About Us</h2>
                <p class="opacity-75 lead mb-4">Our journey began in a small Parisian kitchen with one goal: to bring the art of the perfect crust to the entire world.</p>
                <button class="btn btn-vibrant"><a href="/cakebliss/user/about.php">Read More</a></button>
            </div>
        </div>
    </div>
</section>

<section class="gallery-section py-5 reveal" id="gallery">
    <div class="container">
        <h2 class="playfair text-center mb-5">Gallery of Bliss</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="gallery-item"><img src="https://images.unsplash.com/photo-1535141123063-3bb61093135c?w=600">
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item gallery-tall"><img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?w=600"></div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item"><img src="https://images.unsplash.com/photo-1558301211-0d8c8ddee6ec?w=600"></div>
            </div>
        </div>
    </div>
</section>

<section class="custom-order-section py-5 reveal" id="custom-orders">
    <div class="container">
        <div class="order-form-wrapper">
            <div class="row g-0">
                <div class="col-md-5 custom-form-img d-none d-md-block"></div>
                <div class="col-md-7 p-5">
                    <h3 class="playfair mb-4">Design Your Dream Cake</h3>
                    <form>
                        <input type="text" class="form-control custom-input mb-3" placeholder="Name">
                        <select class="form-select custom-input mb-3">
                            <option>Wedding</option>
                            <option>Birthday</option>
                        </select>
                        <textarea class="form-control custom-input mb-3" rows="3" placeholder="Description"></textarea>
                        <button class="btn btn-vibrant w-100">Send Inquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="newsletter-section py-5 reveal">
    <div class="container text-center">
        <div class="newsletter-box p-5">
            <i class="bi bi-envelope-heart-fill newsletter-icon mb-3"></i>
            <h2 class="playfair">Join the Inner Circle</h2>
            <div class="input-group mt-4 mx-auto" style="max-width: 500px;">
                <input type="email" class="form-control newsletter-input" placeholder="Your Email">
                <button class="btn btn-vibrant">Join</button>
            </div>
        </div>
    </div>
</section>

<?php include 'user/includes/footer.php'; ?>
<script src="user/includes/js/script.js"></script>
