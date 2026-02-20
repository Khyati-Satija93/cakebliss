<?php include('includes/header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <?php include('includes/sidebar.php'); ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 p-0">
            <?php include('includes/topbar.php'); ?>

            <main class="main-content px-md-5 py-5">
                <div class="d-flex justify-content-between align-items-center mb-5" data-aos="fade-down">
                    <div>
                        <h1 class="display-6 mb-1 text-white">The Menu</h1>
                        <p class="secondary mb-0">Manage your artisan collection and seasonal specials.</p>
                    </div>
                    <button class="btn btn-sage shadow-sm px-4 py-2" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="bi bi-plus-lg me-2"></i>Add New Pastry
                    </button>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                    <?php
                    include('../config/config.php');

                    $sql = "SELECT * FROM pastries WHERE pastry_stock = 1";
                    $sql_run = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($sql_run) > 0) {
                        foreach ($sql_run as $pastry) {
                            // MOVE THE "COL" INSIDE THE LOOP
                    ?>
                            <div class="col">
                                <div class="product-card h-100">
                                    <div class="product-img-container">
                                        <?php
                                        $images = explode(',', $pastry['pastry_image']);
                                        ?>
                                        <img src="uploads/<?php echo $images[0]; ?>" class="product-img" alt="Pastry">
                                        <span class="badge badge-active position-absolute top-0 end-0 m-3 rounded-pill px-3 py-2">In Stock</span>
                                    </div>
                                    <div class="px-2 pb-2 mt-3">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h5 class="product-title m-0"><?php echo $pastry['pastry_name']; ?></h5>
                                            <span class="product-price">₹<?php echo $pastry['pastry_price']; ?></span>
                                        </div>
                                        <p class="product-desc mb-3"><?php echo $pastry['pastry_description']; ?></p>

                                        <div class="d-flex gap-2">
                                            <button class="btn btn-edit-product flex-grow-1 rounded-pill py-2 editBtn" data-id="<?php echo $pastry['id']; ?>">
                                                <i class="bi bi-pencil-square me-2"></i>Edit
                                            </button>
                                            <a href="delete_pastry.php?id=<?php echo $pastry['id']; ?>" class="btn btn-edit-product rounded-circle px-3 py-2" style="aspect-ratio: 1/1;" onclick="return confirm('Delete this pastry?')">
                                                <i class="bi bi-trash text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> <?php
                                }
                            }
                                    ?>
                </div>
            </main>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white">New Creation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="add_pastry.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label small secondry">Pastry Image</label>
                        <div class="upload-area" onclick="document.getElementById('fileInput').click()">
                            <i class="bi bi-cloud-arrow-up fs-2 text-electric-lavender"></i>
                            <p class="small mb-0">Click to upload photo</p>
                            <input type="file" name="pastry_image[]" id="fileInput" multiple hidden accept="image/*" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small secondry">Pastry Name</label>
                        <input type="text" name="pastry_name" id="pastry_name" class="form-control custom-input" placeholder="e.g. Sourdough Boule" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small secondry">Price (₹)</label>
                            <input type="number" name="pastry_price" id="price" class="form-control custom-input" placeholder="0.00" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small secondry">Category</label>
                            <select name="category" id="category" class="form-select text-dark" required>
                                <option value="" disabled selected>---SELECT CATEGORY---</option>
                                <?php
                                $result = $conn->query("SELECT * FROM Category");
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["cat_id"] . '">' . htmlspecialchars($row["Cat_name"]) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label small secondry">In Stock</label>
                        <input type="checkbox" class="form-check-input" name="in_stock" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small secondry">Description</label>
                        <textarea name="pastry_description" class="form-control custom-input" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-sage w-100 py-2 mt-3" name="addPastry">Save to Menu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white">Edit Pastry</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editPastryForm" enctype="multipart/form-data">
                    <input type="hidden" name="pastry_id" id="pastry_id">
                    <div class="mb-3">
                        <label class="form-label small secondry">Name</label>
                        <input type="text" name="pastry_name" id="edit_pastry_name" class="form-control custom-input" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small secondry">Price</label>
                        <input type="number" name="pastry_price" id="edit_pastry_price" class="form-control custom-input" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small secondry">Category</label>
                        <select class="form-select custom-input" required>
                            <option>Bread</option>
                            <option>Cakes</option>
                            <option>Pastries</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label small secondry">In Stock</label>
                        <input type="checkbox" class="form-check-input" id="edit_in_stock" name="in_stock" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small secondry">Description</label>
                        <textarea name="pastry_description" id="edit_pastry_description" class="form-control custom-input" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-sage w-100 py-2 mt-3" name="updatePastry">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script>
    $(document).on('click', '.editBtn', function() {

        let pastry_id = $(this).data('id'); // now works

        $.ajax({
            url: "fetch_pastry.php",
            type: "POST",
            data: {
                pastry_id: pastry_id
            },
            dataType: "json",
            success: function(data) {

                $('#pastry_id').val(data.id);
                $('#edit_pastry_name').val(data.pastry_name);
                $('#edit_pastry_price').val(data.pastry_price);
                $('#edit_pastry_description').val(data.pastry_description);
                $('#edit_in_stock').prop('checked', data.pastry_stock == 1);

                $('#editProductModal').modal('show'); // correct modal
            }
        });
    });
</script>


<script>
    $('#editPastryForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: "update_pastry.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response);
                $('#editProductModal').modal('hide');
                location.reload();
            }
        });
    });
</script>