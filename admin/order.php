<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>

<main class="container py-5">
    
    <div class="row mb-5 align-items-end" data-aos="fade-up">
        <div class="col-md-7">
            <h2 class="display-6 mb-1">Order Tracking</h2>
            <p class="text-secondary mb-0">Oversee transactions and ensure timely cake deliveries.</p>
        </div>
        <div class="col-md-5 d-flex justify-content-md-end gap-2">
            <select class="form-select border-0 shadow-sm rounded-pill px-4" style="width: 200px;">
                <option selected>Filter by Status</option>
                <option>Pending Bakes</option>
                <option>Out for Delivery</option>
                <option>Refund Requests</option>
            </select>
        </div>
    </div>

    <div class="refund-notice d-flex justify-content-between align-items-center shadow-sm" data-aos="zoom-in">
        <div class="d-flex align-items-center">
            <i class="bi bi-exclamation-triangle-fill fs-4 text-danger me-3"></i>
            <div>
                <p class="mb-0 fw-bold text-danger">2 New Refund Requests</p>
                <small class="text-secondary">High priority: Customers reporting "Damaged on Arrival"</small>
            </div>
        </div>
        <button class="btn btn-danger btn-sm rounded-pill px-4">Review Disputes</button>
    </div>

    <div class="order-container shadow-sm" data-aos="fade-up" data-aos-delay="100">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Order ID</th>
                        <th>Product & Shop</th>
                        <th>Customer</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ps-4 fw-bold">#ORD-9921</td>
                        <td>
                            <span class="d-block fw-semibold">Lavender Lemon Drizzle</span>
                            <small class="text-clay">From: Petite Patisserie</small>
                        </td>
                        <td>Sarah Wilkins</td>
                        <td class="fw-bold text-sage-green">$42.50</td>
                        <td><span class="status-pill st-baking">In the Oven</span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-outline-dark btn-sm rounded-pill px-3">View Invoice</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold">#ORD-9918</td>
                        <td>
                            <span class="d-block fw-semibold">Artisan Sourdough Bundle</span>
                            <small class="text-clay">From: The Sourdough Co.</small>
                        </td>
                        <td>Michael Ross</td>
                        <td class="fw-bold text-sage-green">$18.00</td>
                        <td><span class="status-pill st-delivery">Out for Delivery</span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-outline-dark btn-sm rounded-pill px-3">View Invoice</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-4 fw-bold text-danger">#ORD-9905</td>
                        <td>
                            <span class="d-block fw-semibold">Rainbow Sprinkles Cake</span>
                            <small class="text-clay">From: Sugar Magic</small>
                        </td>
                        <td>Emma Thompson</td>
                        <td class="fw-bold text-sage-green">$55.00</td>
                        <td><span class="status-pill st-refund">Refund Requested</span></td>
                        <td class="text-end pe-4">
                            <button class="btn btn-danger btn-sm rounded-pill px-4">Handle Dispute</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>