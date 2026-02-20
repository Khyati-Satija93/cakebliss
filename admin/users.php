<?php include 'includes/header.php'; ?>
<?php include 'includes/topbar.php'; ?>
<?php include('../config/config.php'); ?>

<main class="container py-5">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4 gap-3" data-aos="fade-up">
        <div>
            <h2 class="display-6 mb-1">Customer Directory</h2>
            <p class="text-secondary mb-0">Manage registered users and account security.</p>
        </div>
        <div>
            <input type="text" class="search-input shadow-sm" placeholder="Search by name or email...">
        </div>
    </div>

    <?php
    // Get counts for the badges
    $total_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM 	users"));
    $blocked_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users WHERE status = 1"));
    ?>

    <ul class="nav nav-pills mb-4 gap-2">
        <li class="nav-item">
            <button class="btn btn-sage px-4 rounded-pill filter-btn active" data-filter="all">
                All User (<?php echo $total_count; ?>)
            </button>
        </li>

        <li class="nav-item">
            <button class="btn btn-outline-secondary px-4 rounded-pill filter-btn" data-filter="blocked">
                Blocked User<span class="badge bg-danger ms-1"><?php echo $blocked_count; ?></span>
            </button>
        </li>
    </ul>
    <div class="user-container shadow-sm" data-aos="fade-up" data-aos-delay="100">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">User</th>
                        <th>Email</th>
                        <th>Total Orders</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $user) {
                    ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar me-3">AW</div>
                                        <span class="fw-bold text-sage"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></span>
                                    </div>
                                </td>
                                <td class="text-muted"><?php echo $user['email']; ?></td>
                                <td class="fw-semibold">12 Orders</td>
                                <td>
                                    <?php
                                    if ($user['status'] == 0) {
                                    echo '<span class="badge badge-active rounded-pill px-3 py-2">Active</span>';
                                    } else {
                                    echo '<span class="badge badge-blocked rounded-pill px-3 py-2">Blocked</span>';
                                    }
                                    ?>
                                </td>
                                <td class="text-end pe-4">
                                    <?php if ($user['status'] == 0) { ?>
                                        

                                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3 me-2"
                                            onclick="updateStatus(this, <?php echo $user['id']; ?>, 1)">
                                            <i class="bi bi-slash-circle me-1"></i>Block</button>


                                    <?php } elseif ($user['status'] == 1) { ?>
                                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                            onclick="updateStatus(this, <?php echo $user['id']; ?>, 1)">
                                            <i class="bi bi-slash-circle me-1"></i>Block</button>

                                    
                                        <button class="btn btn-success btn-sm rounded-pill px-3"
                                            onclick="updateStatus(this, <?php echo $user['id']; ?>, 0)">
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

    <div class="mt-4 p-3 bg-white border border-soft rounded-3 d-inline-block small shadow-sm" data-aos="fade-in">
        <i class="bi bi-info-circle text-sage-green me-2"></i>
        <strong>Note:</strong> Resetting a password will send a secure link to the user's registered email address.
    </div>
</main>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>