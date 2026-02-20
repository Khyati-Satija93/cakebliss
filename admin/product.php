<?php
include('../config/config.php');

// Get Categories
$cat_query = mysqli_query($conn, "SELECT * FROM category WHERE status = 1");

// Get Pastries
$selected_cat = isset($_GET['cat_id']) ? mysqli_real_escape_string($conn, $_GET['cat_id']) : null;
$pastry_sql = "SELECT * FROM pastries";
if ($selected_cat) {
    $pastry_sql .= " WHERE cat_id = '$selected_cat'";
}
$pastry_result = mysqli_query($conn, $pastry_sql);

include 'includes/header.php';
include 'includes/topbar.php';
?>

<main class="container py-5">
    <div class="d-flex gap-2 mb-5 overflow-x-auto pb-2" data-aos="fade-up">
        <a href="index.php" class="category-pill <?php echo !$selected_cat ? 'active' : ''; ?>">All Products</a>
        <?php while ($cat_row = mysqli_fetch_assoc($cat_query)): ?>
            <a href="?cat_id=<?php echo $cat_row['cat_id']; ?>"
                class="category-pill <?php echo ($selected_cat == $cat_row['cat_id']) ? 'active' : ''; ?>">
                <?php echo $cat_row['Cat_name']; ?>
            </a>
        <?php endwhile; ?>
    </div>

    <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
        <?php if (mysqli_num_rows($pastry_result) > 0): ?>
            <?php while ($item = mysqli_fetch_assoc($pastry_result)): ?>
                <div class="col-md-3 pastry-card-container" id="pastry-card-<?php echo $item['id']; ?>">
                    <div class="product-card shadow-sm <?php echo ($item['pastry_stock'] == 0) ? 'border-danger' : ''; ?>">

                        <?php if ($item['pastry_stock'] == 0): ?>
                            <div class="position-absolute p-2">
                                <span class="badge bg-danger">Flagged / Out of Stock</span>
                            </div>
                        <?php endif; ?>

                        <?php $images = explode(',', $item['pastry_image']); ?>
                        <img src="../seller/uploads/<?php echo $images[0]; ?>" class="product-img" alt="pastry"
                            style="<?php echo ($item['pastry_stock'] == 0) ? 'opacity: 0.6;' : ''; ?>">

                        <div class="p-3">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h6 class="fw-bold mb-0 product-name"><?php echo $item['pastry_name']; ?></h6>
                                <span class="text-sage fw-bold small product-price">₹<?php echo $item['pastry_price']; ?></span>
                            </div>
                            <p class="text-secondary small mb-3">By: <span class="text-clay"><?php echo $item['bakery_owner']; ?></span></p>

                            <div class="d-flex gap-2">
                                <?php if ($item['pastry_stock'] == 0): ?>
                                    <button class="btn btn-success btn-sm flex-grow-1 rounded-pill btn-ajax-visible" data-id="<?php echo $item['id']; ?>">
                                        <i class="bi bi-eye"></i> Make Visible
                                    </button>

                                    <button class="btn-ajax-delete btn btn-outline-danger btn-sm" data-id="<?php echo $item['id']; ?>">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-light btn-sm flex-grow-1 border" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $item['id']; ?>">Edit</button>

                                    <button class="btn-ajax-takedown btn btn-outline-warning btn-sm" data-id="<?php echo $item['id']; ?>" title="Flag Product">
                                        <i class="bi bi-eye-slash"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editModal<?php echo $item['id']; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Edit Pastry</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form class="ajax-edit-form">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Pastry Name</label>
                                        <input type="text" name="pastry_name" class="form-control" value="<?php echo $item['pastry_name']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Price (₹)</label>
                                        <input type="number" name="pastry_price" class="form-control" value="<?php echo $item['pastry_price']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Bakery Owner</label>
                                        <input type="text" name="bakery_owner" class="form-control" value="<?php echo $item['bakery_owner']; ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark w-100">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        // 1. AJAX Edit Action
        $('.ajax-edit-form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const modal = form.closest('.modal');

            $.ajax({
                url: 'catalog_action.php',
                type: 'POST',
                data: form.serialize() + '&action=update',
                success: function(response) {
                    if (response.trim() === "success") {
                        alert("Pastry updated!");
                        location.reload(); // Reloading to reflect all UI changes
                    } else {
                        alert("Update failed: " + response);
                    }
                }
            });
        });

        // 2. AJAX Delete Action
        $('.btn-ajax-delete').on('click', function() {
            const id = $(this).data('id');
            if (confirm("Are you sure you want to delete this permanently?")) {
                $.post('catalog_action.php', {
                    id: id,
                    action: 'delete'
                }, function(response) {
                    if (response.trim() === "success") {
                        $(`#pastry-card-${id}`).fadeOut();
                    }
                });
            }
        });

        // 3. AJAX Takedown (Stock = 0)
        $('.btn-ajax-takedown').on('click', function() {
            const id = $(this).data('id');
            if (confirm("Flag this product as out of stock?")) {
                $.post('catalog_action.php', {
                    id: id,
                    action: 'takedown'
                }, function(response) {
                    if (response.trim() === "success") {
                        location.reload();
                    }
                });
            }
        });
    });

    // 4. AJAX Make Visible (Stock = 1)
    $('.btn-ajax-visible').on('click', function() {
        const id = $(this).data('id');
        const button = $(this);

        $.post('catalog_action.php', {
            id: id,
            action: 'make_visible'
        }, function(response) {
            if (response.trim() === "success") {
                // Instead of just alerting, we reload to restore the card's original styling
                location.reload();
            } else {
                alert("Error: " + response);
            }
        });
    });
</script>

<?php include 'includes/footer.php'; ?>