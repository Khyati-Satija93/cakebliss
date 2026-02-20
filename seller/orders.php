<?php include('includes/header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <?php include('includes/sidebar.php'); ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 p-0">
            <?php include('includes/topbar.php'); ?>

            <main class="main-content px-md-5 py-5">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5" data-aos="fade-down">
                    <div>
                        <h1 class="display-6 mb-1 text-white">Bake Queue</h1>
                        <p class="text-muted mb-0">Manage live orders and production stages.</p>
                    </div>
                    <div class="d-flex gap-2 mt-3 mt-md-0">
                        <div class="status-filter-group p-1">
                            <button class="filter-pill active" data-status="new">New</button>
                            <button class="filter-pill" data-status="oven">In Oven</button>
                            <button class="filter-pill" data-status="ready">Ready</button>
                            <button class="filter-pill" data-status="delivered">Delivered</button>
                        </div>
                    </div>
                </div>

                <div class="row g-4" id="ordersContainer">
                    <div class="col-12 order-row" data-aos="fade-up" data-status="oven">
                        <div class="seller-card order-card d-flex flex-column flex-lg-row align-items-lg-center gap-4">
                            <div class="order-time-box text-center">
                                <span class="d-block fw-bold text-white fs-4">10:45</span>
                                <span class="extra-small text-uppercase text-muted">AM Pickup</span>
                            </div>

                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <span class="badge badge-oven"><i class="bi bi-fire me-1"></i> In Oven</span>
                                    <span class="text-muted small">#ORD-7721</span>
                                </div>
                                <h5 class="text-white mb-0">2x Sourdough Loaf, 1x Baguette</h5>
                                <p class="small text-muted mb-0">Customer: <strong>James Wilson</strong> • <i class="bi bi-telephone small"></i> +1 234 567 890</p>
                            </div>

                            <div class="flex-grow-1 px-lg-4 d-none d-xl-block">
                                <div class="progress-track">
                                    <div class="step active completed"></div>
                                    <div class="step active completed"></div>
                                    <div class="step active"></div>
                                    <div class="step"></div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-action-glow" onclick="updateorderStatus(this, 'oven')">
                                    Start Baking
                                </button>
                                <button class="btn btn-outline-secondary btn-icon rounded-circle"><i class="bi bi-printer"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>