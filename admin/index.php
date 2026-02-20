<?php

session_start();

// 1. Check if user is logged in at all
if(!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Please login to access the Admin Dashboard";
    header("Location: ../auth/login.php");
    exit(0);
}

// 2. Check if the logged-in user is actually an Admin
if($_SESSION['role_as'] != 1) {
    $_SESSION['message'] = "Access Denied! You are not authorized as an Admin.";
    header("Location: ../admin/index.php"); // redirect to the admin dashboard
    exit(0);
}

include('../config/config.php');
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>


<main class="container py-5">
    
    <div class="row mb-5" data-aos="fade-down">
        <div class="col-md-8">
            <h1 class="display-5 fw-bold">Marketplace Overview</h1>
            <p class="text-secondary">Global summary of bakery sellers, customers, and revenue.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <div class="alert-pill">
                <i class="bi bi-stars me-2"></i>Global Systems: Online
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
            <div class="card-stat">
                <div class="icon-box" style="background: rgba(0, 255, 150, 0.1); color: #00FF96;"><i class="bi bi-people-fill"></i></div>
                <h6 class="text-secondary small fw-bold text-uppercase">Total Customers</h6>
                <h2 class="fw-bold m-0 text-white">1,482</h2>
                <small style="color: #00FF96;">+5.2% this week</small>
            </div>
        </div>
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
            <div class="card-stat">
                <div class="icon-box" style="background: rgba(212, 175, 55, 0.1); color: var(--gold-glow);"><i class="bi bi-shop"></i></div>
                <h6 class="text-secondary small fw-bold text-uppercase">Active Sellers</h6>
                <h2 class="fw-bold m-0 text-white">84</h2>
                <small style="color: var(--gold-glow);">3 Pending Approval</small>
            </div>
        </div>
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
            <div class="card-stat">
                <div class="icon-box" style="background: rgba(123, 66, 245, 0.1); color: var(--soft-lavender);"><i class="bi bi-cash-stack"></i></div>
                <h6 class="text-secondary small fw-bold text-uppercase">Monthly Sales</h6>
                <h2 class="fw-bold m-0 text-white">$24,910</h2>
                <small class="text-info">International Peak</small>
            </div>
        </div>
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
            <div class="card-stat">
                <div class="icon-box" style="background: rgba(255, 77, 77, 0.1); color: #FF4D4D;"><i class="bi bi-exclamation-octagon"></i></div>
                <h6 class="text-secondary small fw-bold text-uppercase">Refunds</h6>
                <h2 class="fw-bold m-0 text-white">5</h2>
                <small class="text-secondary">Requires action</small>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-7" data-aos="fade-right">
            <div class="card-stat h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="m-0">Global Revenue Analytics</h5>
                    <select class="form-select form-select-sm w-25 border-secondary bg-dark text-white">
                        <option>Last 30 Days</option>
                    </select>
                </div>
                <div style="height: 300px; border: 1px dashed var(--border-glass); border-radius: 12px;" class="d-flex align-items-center justify-content-center">
                    <span class="text-secondary">Revenue Flow Visualization</span>
                </div>
            </div>
        </div>

        <div class="col-lg-5" data-aos="fade-left">
            <div class="card-stat h-100">
                <h5 class="mb-4">Live System Logs</h5>
                <div class="d-flex mb-4">
                    <div class="me-3 text-success fs-4"><i class="bi bi-patch-check"></i></div>
                    <div>
                        <p class="mb-0 small fw-bold text-white">Boutique Approved: "Midnight Bakes"</p>
                        <small class="text-secondary">15 minutes ago</small>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <div class="me-3 text-warning fs-4"><i class="bi bi-flag-fill"></i></div>
                    <div>
                        <p class="mb-0 small fw-bold text-white">Review Required: Cake Listing #99</p>
                        <small class="text-secondary">1 hour ago</small>
                    </div>
                </div>
                <button class="btn btn-outline-light w-100 rounded-pill mt-4">Browse All Activity</button>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>