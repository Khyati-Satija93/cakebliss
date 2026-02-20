<?php include('includes/header.php'); ?>
<?php include('includes/topbar.php'); ?>
<?php include('../config/config.php'); ?>

<main class="container py-5">
    <div class="d-flex justify-content-between align-items-end mb-4" data-aos="fade-up">
        <div>
            <h2 class="display-6 mb-1">Seller Management</h2>
            <p class="secondary mb-0">Review and moderate your artisan community.</p>
        </div>
        <div class="d-flex gap-3">
            <input type="text" class="search-bar shadow-sm" placeholder="Search shop name...">
        </div>
    </div>

    <?php
    // Get counts for the badges
    $total_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM bakers"));
    $pending_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM bakers WHERE shop_status = 0"));
    $active_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM bakers WHERE shop_status = 1"));
    $blocked_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM bakers WHERE shop_status = 3"));
    ?>

    <ul class="nav nav-pills mb-4 gap-2">
        <li class="nav-item">
            <button class="btn btn-sage px-4 rounded-pill filter-btn active" data-filter="all">
                All Sellers (<?php echo $total_count; ?>)
            </button>
        </li>
        <li class="nav-item">
            <button class="btn btn-outline-secondary px-4 rounded-pill position-relative filter-btn" data-filter="pending">
                Pending Approval <span class="badge bg-warning ms-1"><?php echo $pending_count; ?></span>
            </button>
        </li>
        <li class="nav-item">
            <button class="btn btn-outline-secondary px-4 rounded-pill filter-btn" data-filter="active">
                Active Sellers (<?php echo $active_count; ?>)
            </button>
        </li>
        <li class="nav-item">
            <button class="btn btn-outline-secondary px-4 rounded-pill filter-btn" data-filter="blocked">
                Blocked Sellers<span class="badge bg-danger ms-1"><?php echo $blocked_count; ?></span>
            </button>
        </li>
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
                        <th class="text-center pe-4 ">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT b.*, a.firstname, a.lastname, a.email 
                    FROM bakers b 
                    INNER JOIN auth a ON b.user_id = a.id";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $seller) {
                    ?>
                            <tr class="fade-row" data-status="<?php echo $seller['shop_status']; ?>" style="background-color: #FFFCF7;">
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-3 bg-light p-2 me-3" style="width: 45px; height: 45px;"><i class="bi bi-shop text-sage-green fs-4"></i></div>
                                        <div><span class="fw-bold d-block"><?php echo $seller['bakery_name']; ?></span><small class="text-muted"><?php echo $seller['bakery_type']; ?></small></div>
                                    </div>
                                </td>
                                <td><?php echo $seller['firstname']; ?> <?php echo $seller['lastname']; ?></td>
                                <td>Aug 12, 2025</td>
                                <td>
                                    <?php
                                    if ($seller['shop_status'] == 0) {
                                        echo '<span class="badge badge-pending rounded-pill px-3 py-2">Pending</span>';
                                    } elseif ($seller['shop_status'] == 1) {
                                        echo '<span class="badge badge-active rounded-pill px-3 py-2">Active</span>';
                                    } elseif ($seller['shop_status'] == 3) {
                                        echo '<span class="badge badge-blocked rounded-pill px-3 py-2">Blocked</span>';
                                    }
                                    ?>
                                </td>
                                <td>10%</td>
                                <td class="text-end pe-4">
                                    <?php if ($seller['shop_status'] == 0) { ?>
                                        <button class="btn btn-success btn-sm rounded-pill px-3 me-2"
                                            onclick="updateStatus(this, <?php echo $seller['id']; ?>, 1)">Approve</button>

                                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3 me-2"
                                            onclick="updateStatus(this, <?php echo $seller['id']; ?>, 3)">
                                            <i class="bi bi-slash-circle me-1"></i>Block</button>

                                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                            data-bs-toggle="modal" data-bs-target="#rejectModal"
                                            onclick="setRejectId(<?php echo $seller['id']; ?>)">Reject</button>

                                    <?php } elseif ($seller['shop_status'] == 1) { ?>

                                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                            onclick="updateStatus(this, <?php echo $seller['id']; ?>, 3)">
                                            <i class="bi bi-slash-circle me-1"></i>Block</button>

                                    <?php } elseif ($seller['shop_status'] == 2) { ?>


                                    <?php } elseif ($seller['shop_status'] == 3) { ?>

                                        <button class="btn btn-success btn-sm rounded-pill px-3"
                                            onclick="updateStatus(this, <?php echo $seller['id']; ?>, 1)">
                                            Unblock
                                        </button>
                                    <?php } ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

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

<?php include('includes/footer.php'); ?>
<script src="includes/js/script.js"></script>

<script>

</script>