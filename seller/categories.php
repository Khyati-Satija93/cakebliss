<?php
session_start();
include("includes/config.php");

/* ===============================
   ADD CATEGORY
================================ */
if (isset($_POST['addCategory'])) {

    $cat_name = $_POST['category_name'];

    if (!empty($cat_name)) {
        $insert = "INSERT INTO Category (Cat_name) VALUES ('$cat_name')";
        mysqli_query($conn, $insert);

        // Refresh page to show new category
        header("Location: categories.php");
        exit;
    }
}
?>

<?php include('includes/header.php'); ?>

<div class="container-fluid">
    <div class="row">
        <?php include('includes/sidebar.php'); ?>

        <div class="col-md-9 ms-sm-auto col-lg-10 p-0">
            <?php include('includes/topbar.php'); ?>

            <main class="main-content px-md-5 py-5">

                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h1 class="display-6 mb-1 text-white">Categories</h1>
                        <p class="secondary mb-0">Manage your artisan collection and seasonal specials.</p>
                    </div>

                    <button class="btn btn-sage shadow-sm px-4 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#addcategoryModal">
                        <i class="bi bi-plus-lg me-2"></i>Add New Category
                    </button>
                </div>

                <!-- CATEGORY TABLE -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-4">Category Name</th>
                                        <th class="text-end pe-4">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM Category ORDER BY cat_id DESC";
                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td class="ps-4">
                                            <?php echo $row['Cat_name']; ?>
                                        </td>

                                        <td class="text-end pe-4">
                                            <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 me-2">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>

                                            <button class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='2' class='text-center'>No categories found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</div>

<!-- ADD CATEGORY MODAL -->
<div class="modal fade" id="addcategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal">

            <div class="modal-header border-0">
                <h5 class="modal-title text-white">Add New Category</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label small text-muted">Category Name</label>
                        <input type="text"
                               name="category_name"
                               class="form-control custom-input"
                               placeholder="Cake, Pastry, Bread..."
                               required>
                    </div>

                    <button type="submit"
                            name="addCategory"
                            class="btn btn-sage w-100 py-2">
                        Save Category
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
