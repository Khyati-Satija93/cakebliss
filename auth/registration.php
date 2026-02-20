<?php 
session_start();
include('includes/header.php'); 
?>

<div class="auth-container d-flex align-items-center justify-content-center">
    <div class="registration-card d-flex flex-column flex-lg-row" data-aos="zoom-in">
        
        <div class="auth-sidebar p-5 text-white d-flex flex-column justify-content-center">
            <h2 class="display-5 fw-bold mb-4">Start Your <br><span class="text-electric-lavender">Journey.</span></h2>
            <p class="text-secondary">Join the community of artisan bakers and bread lovers.</p>
            <div class="mt-4">
                <i class="bi bi-quote fs-2 text-electric-lavender opacity-50"></i>
                <p class="fst-italic text-shimmer">"The smell of good bread is like the sound of lightly flowing water, complex and peaceful."</p>
            </div>
        </div>

        <div class="auth-form-container p-5">
            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-warning mb-3"><?= $_SESSION['message']; ?></div>
            <?php unset($_SESSION['message']); } ?>

            <form action="process_register.php" method="POST">
                
                <div class="mb-4">
                    <label class="form-label small text-secondary">Register As</label>
                    <select name="role" class="form-select custom-input" required>
                        <option value="buyer">Foodie</option>
                        <option value="seller">Baker</option>
                    </select>
                </div>

                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small text-secondary">First Name</label>
                        <input type="text" name="firstname" class="form-control custom-input" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small text-secondary">Last Name</label>
                        <input type="text" name="lastname" class="form-control custom-input" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small text-secondary">Email Address</label>
                    <input type="email" name="email" class="form-control custom-input" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small text-secondary">Bakery Name (Bakers Only)</label>
                    <input type="text" name="shop_name" class="form-control custom-input" placeholder="e.g. Hearth & Stone">
                </div>

                <div class="mb-4">
                    <label class="form-label small text-secondary">Password</label>
                    <input type="password" name="password" class="form-control custom-input" required>
                </div>

                <button type="submit" name="register_btn" class="btn btn-sage w-100 py-3 rounded-pill fw-bold">
                    Create Account
                </button>

                <p class="text-center text-secondary small mt-3">
                    Already have an account? <a href="login.php" class="link">Sign In</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>