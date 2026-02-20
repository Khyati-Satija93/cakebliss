<?php 
session_start();
include('../config/config.php');
include('includes/header.php');
?>
<div class="auth-container d-flex align-items-center justify-content-center">
    <div class="login-card p-5" data-aos="fade-up">
        <div class="text-center mb-5">
            <h2 class="text-white fw-bold">Welcome Back</h2>
            <p class="text-secondary">Enter your credentials to access your oven.</p>
        </div>

        <form action="process_login.php" method="POST">
            <div class="mb-4">
              
                <label class="form-label small text-secondary">Email Address</label>
                <div class="input-group">
                    <input type="email" name="email" class="form-control custom-input border-start-0" placeholder="name@example.com" required>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <label class="form-label small text-secondary">Password</label>
                    <a href="#" class="extra-small link">Forgot?</a>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="loginPass" class="form-control custom-input border-start-0 border-end-0" placeholder="••••••••" required>
                    <button type="button" class="input-group-text custom-input border-start-0 text-secondary" onclick="togglePassword()">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                </div>
            </div>

            <div class="mb-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <label class="enchanted-switch">
                        <input type="checkbox" id="rememberMe">
                        <span class="toggle-slider"></span>
                    </label>
                    <span class="small text-secondary">Stay signed in</span>
                </div>
            </div>

            <button type="submit" name="login_btn" class="btn btn-sage w-100 py-3 rounded-pill fw-bold shadow-sm mb-4">
                Sign In
            </button>

            <p class="text-center text-secondary small">
                Don't have an account? <a href="registration.php" class="link">Create one</a>
            </p>
        </form>
    </div>
</div>


<?php include('includes/footer.php'); ?>