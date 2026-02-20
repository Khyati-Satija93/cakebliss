<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">

<section class="profile-section pt-150 pb-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="glass-card p-4 text-center reveal">
                    <div class="profile-avatar mb-3">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150" class="rounded-circle border border-3 border-accent p-1" alt="User">
                    </div>
                    <h4 class="playfair">Sophia Sterling</h4>
                    <p class="small opacity-50">Member since Jan 2026</p>
                    
                    <hr class="opacity-10 my-4">
                    
                    <div class="list-group list-group-flush text-start bg-transparent">
                        <a href="#" class="list-group-item bg-transparent text-white border-0 py-3 d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-clock-history me-2"></i> Order History</span>
                            <i class="bi bi-chevron-right small"></i>
                        </a>
                        <a href="#" class="list-group-item bg-transparent text-white border-0 py-3 d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-heart me-2"></i> Saved Flavors</span>
                            <i class="bi bi-chevron-right small"></i>
                        </a>
                        <a href="#" class="list-group-item bg-transparent text-white border-0 py-3 d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-geo-alt me-2"></i> Saved Addresses</span>
                            <i class="bi bi-chevron-right small"></i>
                        </a>
                        <a href="logout.php" class="list-group-item bg-transparent text-danger border-0 py-3">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="glass-card p-4 reveal">
                    <h4 class="playfair mb-4">Recent Orders</h4>
                    
                    <div class="order-history-list">
                        <div class="history-item p-3 mb-3 rounded-4 border border-white border-opacity-10 transition-hover">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=60" class="rounded-2" alt="Cake">
                                    <div>
                                        <h6 class="mb-0">Lavender Moon Velvet</h6>
                                        <p class="small opacity-50 mb-0">Order #EV-98241 • Jan 15</p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="badge bg-success-subtle text-success border border-success border-opacity-25 mb-1 d-block">Delivered</span>
                                    <a href="track-order.php" class="small text-accent text-decoration-none">View Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="history-item p-3 mb-3 rounded-4 border border-white border-opacity-10 transition-hover">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="https://images.unsplash.com/photo-1535254973040-607b474cb804?w=60" class="rounded-2" alt="Cake">
                                    <div>
                                        <h6 class="mb-0">Midnight Chocolate Silk</h6>
                                        <p class="small opacity-50 mb-0">Order #EV-97102 • Dec 22</p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="badge bg-white-subtle text-white border border-white border-opacity-25 mb-1 d-block">Archive</span>
                                    <a href="#" class="small text-accent text-decoration-none">Reorder</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>