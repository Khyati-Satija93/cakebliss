<?php include('includes/header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <?php include('includes/sidebar.php'); ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 p-0">
            <?php include('includes/topbar.php'); ?>

            <main class="main-content px-md-5 py-5">
                <div class="profile-header-card mb-5" data-aos="fade-down">
                    <div class="profile-cover"></div>
                    <div class="d-flex align-items-end px-4 pb-4 profile-meta">
                        <div class="profile-avatar-wrapper">
                            <img src="images/emp_1.png" class="profile-main-img" alt="Baker">
                            <button class="btn-edit-avatar"><i class="bi bi-camera"></i></button>
                        </div>
                        <div class="ms-4 mb-2">
                            <h2 class="text-white mb-0">Julian Moore</h2>
                            <p class="text-electric-lavender fw-semibold mb-0">Master Patissier • <span class="text-muted small">Since 2021</span></p>
                        </div>
                        <div class="ms-auto mb-2">
                            <button class="btn btn-sage px-4 rounded-pill"><i class="bi bi-pencil-square me-2"></i>Edit Profile</button>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="seller-card mb-4" data-aos="fade-right">
                            <h5 class="text-white mb-4 border-bottom border-glass pb-2">About the Baker</h5>
                            <div class="mb-4">
                                <label class="text-muted extra-small text-uppercase fw-bold">Bio</label>
                                <p class="text-shimmer">Specializing in long-fermentation sourdough and traditional French pastries. Passionate about bringing local organic grains to your breakfast table.</p>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="text-muted extra-small text-uppercase fw-bold">Specialty</label>
                                    <p class="text-white">Artisan Sourdough</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-muted extra-small text-uppercase fw-bold">Certifications</label>
                                    <p class="text-white">Le Cordon Bleu Diploma</p>
                                </div>
                            </div>
                        </div>

                        <div class="seller-card" data-aos="fade-right" data-aos-delay="100">
                            <h5 class="text-white mb-4 border-bottom border-glass pb-2">Shop Identity</h5>
                            <div class="mb-3">
                                <label class="text-muted extra-small text-uppercase fw-bold d-block mb-2">Store Display Name</label>
                                <input type="text" class="form-control custom-input" value="Artisan Bakery & Co.">
                            </div>
                            <div class="mb-3">
                                <label class="text-muted extra-small text-uppercase fw-bold d-block mb-2">Public Email</label>
                                <input type="email" class="form-control custom-input" value="julian@artisanbakery.com">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="seller-card mb-4" data-aos="fade-left">
                            <h5 class="text-white mb-4 border-bottom border-glass pb-2">Baker Statistics</h5>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Orders Fulfilled</span>
                                <span class="text-white fw-bold">1,248</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Customer Rating</span>
                                <span class="text-electric-lavender fw-bold"><i class="bi bi-star-fill me-1"></i> 4.98</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Shop Followers</span>
                                <span class="text-white fw-bold">852</span>
                            </div>
                        </div>

                        <div class="seller-card" data-aos="fade-left" data-aos-delay="100">
                            <h5 class="text-white mb-4 border-bottom border-glass pb-2">Experience Badges</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge badge-artisan" title="Early Adopter"><i class="bi bi-award me-1"></i> Pioneer</span>
                                <span class="badge badge-artisan" title="High Rating"><i class="bi bi-heart-pulse me-1"></i> Crowd Favorite</span>
                                <span class="badge badge-artisan" title="Reliable Seller"><i class="bi bi-lightning-charge me-1"></i> Fast Prep</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
           
<?php include('includes/footer.php'); ?>