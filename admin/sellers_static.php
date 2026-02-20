<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>

<main class="container py-5">
    <div class="d-flex justify-content-between align-items-end mb-4" data-aos="fade-up">
        <div>
            <h2 class="display-6 mb-1">Seller Management</h2>
            <p class="text-muted mb-0">Review and moderate your artisan community.</p>
        </div>
        <div class="d-flex gap-3">
            <input type="text" class="search-bar shadow-sm" placeholder="Search shop name...">
        </div>
    </div>

    <ul class="nav nav-pills mb-4 gap-2" data-aos="fade-up">
        <li class="nav-item"><button class="btn btn-sage px-4 rounded-pill filter-btn active" data-filter="all">All Sellers (84)</button></li>
        <li class="nav-item"><button class="btn btn-outline-secondary px-4 rounded-pill position-relative filter-btn" data-filter="pending">Pending Approval <span class="badge bg-danger ms-1">1</span></button></li>
        <li class="nav-item"><button class="btn btn-outline-secondary px-4 rounded-pill filter-btn" data-filter="active">Active</button></li>
    </ul>

    <div class="table-container shadow-sm" data-aos="fade-up" data-aos-delay="100">
        <div class="table-responsive">
            <table class="table align-middle mb-0" id="sellerTable">
                <thead>
                    <tr>
                        <th class="ps-4">Shop Details</th>
                        <th>Owner</th>
                        <th>Joined Date</th>
                        <th>Status</th>
                        <th>Comm. %</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="fade-row" data-status="pending" style="background-color: #FFFCF7;">
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="rounded-3 bg-light p-2 me-3" style="width: 45px; height: 45px;"><i class="bi bi-shop text-sage-green fs-4"></i></div>
                                <div><span class="fw-bold d-block">Wild Flour Bakery</span><small class="text-muted">Home Baker</small></div>
                            </div>
                        </td>
                        <td>Jessica Miller</td>
                        <td>Oct 24, 2025</td>
                        <td><span class="badge badge-pending rounded-pill px-3 py-2">Pending</span></td>
                        <td>10%</td>
                        <td class="text-end pe-4">
                            <button class="btn btn-success btn-sm rounded-pill px-3 me-2" onclick="approveSeller(this)">Approve</button>
                            <button class="btn btn-outline-danger btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>
                        </td>
                    </tr>
                    <tr class="fade-row" data-status="active">
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="rounded-3 bg-light p-2 me-3" style="width: 45px; height: 45px;"><i class="bi bi-patch-check-fill text-primary fs-4"></i></div>
                                <div><span class="fw-bold d-block">The Sourdough Co.</span><small class="text-muted">Professional Shop</small></div>
                            </div>
                        </td>
                        <td>Marcus Vane</td>
                        <td>Aug 12, 2025</td>
                        <td><span class="badge badge-active rounded-pill px-3 py-2">Active</span></td>
                        <td>12%</td>
                        <td class="text-end pe-4">
                            <div class="dropdown">
                                <button class="btn-action" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>View Shop</a></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Remove</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0"><h5 class="modal-title">Reason for Rejection</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <div class="modal-body">
                <textarea class="form-control" rows="3" placeholder="Tell the baker why..."></textarea>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Confirm Rejection</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 20px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title">Reason for Rejection</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" rows="3" placeholder="Tell the baker why..."></textarea>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Confirm Rejection</button>
            </div>
        </div>
    </div>
</div>
<script>
    function approveSeller(btn) {
    const row = btn.closest('tr');
    
    // Add loading state
    btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
    btn.disabled = true;

    setTimeout(() => {
        row.setAttribute('data-status', 'active');
        row.style.backgroundColor = "transparent";
        
        // Update Badge
        const badge = row.querySelector('.badge');
        badge.className = "badge badge-active rounded-pill px-3 py-2";
        badge.innerText = "Active";
        
        // Update Actions Cell
        const actionCell = btn.parentElement;
        actionCell.innerHTML = `
            <div class="text-center fade-in">
                <i class="bi bi-check-circle-fill text-success d-block"></i>
                <small class="text-muted">Approved</small>
            </div>
        `;
    }, 1000);
}
</script>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>