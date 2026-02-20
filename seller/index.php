<?php
session_start();
// 1. Check if user is logged in
if(!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Please login to access the Seller Panel";
    header("Location: ../auth/login.php");
    exit(0);
}

// 2. Check if the logged-in user is a Seller
if($_SESSION['role_as'] != 2) {
    $_SESSION['message'] = "Access Denied! You are not authorized as a Baker.";
    header("Location: ../seller/index.php");
    exit(0);
}
include ('../config/config.php');
?>

<?php include('includes/header.php'); ?>
<div class="container-fluid">
    <div class="row">
        
        <?php include('includes/topbar.php'); ?>
        <?php include('includes/sidebar.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5 py-5 main-content">
            
            <div class="d-flex justify-content-between align-items-center mb-5" data-aos="fade-down">
                <div>
                    <h1 class="display-6 mb-1">Morning, Baker! 🥐</h1>
                    <p class="text-muted mb-0">The oven is preheated. Here's what's happening today.</p>
                </div>
                <div class="d-flex gap-3">
                    <button class="btn btn-outline-secondary rounded-pill px-4" onclick="location.href='settings.php'"><i class="bi bi-shop me-2"></i>View Shop</button>
                    <button class="btn btn-sage shadow-sm" onclick="location.href='finances.php'"><i class="bi bi-plus-lg me-2"></i>New Pastry</button>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-stat">
                        <div class="icon-box" style="background: #EBF5EE; color: #2D6A4F;"><i class="bi bi-bag-heart"></i></div>
                        <h6 class="text-muted small fw-bold text-uppercase">Today's Orders</h6>
                        <h2 class="fw-bold m-0">42</h2>
                        <small class="text-success"><i class="bi bi-arrow-up"></i> 12% vs yesterday</small>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-stat">
                        <div class="icon-box" style="background: #FFF9E6; color: #B08D57;"><i class="bi bi-currency-dollar"></i></div>
                        <h6 class="text-muted small fw-bold text-uppercase">Today's Sales</h6>
                        <h2 class="fw-bold m-0">$842.50</h2>
                        <small class="text-muted">Target: $1,000</small>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-stat">
                        <div class="icon-box" style="background: #F4F1EA; color: #4E6B52;"><i class="bi bi-egg-fried"></i></div>
                        <h6 class="text-muted small fw-bold text-uppercase">Menu Items</h6>
                        <h2 class="fw-bold m-0">18</h2>
                        <small class="text-muted">3 Seasonal specials</small>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-stat">
                        <div class="icon-box" style="background: #FFF3F0; color: #CC7351;"><i class="bi bi-fire"></i></div>
                        <h6 class="text-muted small fw-bold text-uppercase">Active Bakes</h6>
                        <h2 class="fw-bold m-0">5</h2>
                        <small class="text-danger fw-medium">Ready in 12 mins</small>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-8" data-aos="fade-right" data-aos-delay="500">
                    <div class="card card-artisan p-0 border-0 shadow-sm bg-white overflow-hidden" style="border-radius: 16px;">
                        <div class="p-4 border-bottom border-light d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Upcoming Pickups</h5>
                            <a href="orders.html" class="text-sage small text-decoration-none fw-semibold">View Full Queue <i class="bi bi-arrow-right"></i></a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="bg-light small text-muted text-uppercase">
                                    <tr>
                                        <th class="ps-4">Time</th>
                                        <th>Order</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th class="text-end pe-4">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-bottom border-light">
                                        <td class="ps-4 fw-medium">10:30 AM</td>
                                        <td>Sourdough Loaf x2</td>
                                        <td>Sarah W.</td>
                                        <td><span class="badge bg-warning-subtle text-warning rounded-pill px-3">In Oven</span></td>
                                        <td class="text-end pe-4"><button class="btn btn-sm btn-link text-sage"><i class="bi bi-eye"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4 fw-medium">11:15 AM</td>
                                        <td>Honey Scones x6</td>
                                        <td>Michael R.</td>
                                        <td><span class="badge bg-success-subtle text-success rounded-pill px-3">Ready</span></td>
                                        <td class="text-end pe-4"><button class="btn btn-sm btn-link text-sage"><i class="bi bi-eye"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="600">
                    <div class="oven-status mb-4">
                        <h6 class="fw-bold mb-2"><i class="bi bi-info-circle-fill me-2"></i> Baker's Note</h6>
                        <p class="small text-muted mb-0">The humidity is higher today (65%). Consider reducing water in the sourdough batch by 2%.</p>
                    </div>
                    
                    <div class="card-stat bg-white h-auto">
                        <h6 class="fw-bold mb-3">Ingredient Alerts</h6>
                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                            <span class="small">Organic Bread Flour</span>
                            <span class="badge bg-danger-subtle text-danger rounded-pill">Low Stock</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                            <span class="small">Unsalted Butter</span>
                            <span class="badge bg-warning-subtle text-warning rounded-pill">Order Soon</span>
                        </div>
                        <button class="btn btn-outline-dark w-100 btn-sm rounded-pill mt-2 transition-all">Manage Inventory</button>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<?php include('includes/footer.php'); ?>