<nav class="navbar navbar-expand-lg admin-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand fs-3" href="#" style="color: var(--text-bright);">
            Cake<span style="color: var(--neon-magenta);">Bliss</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="bi bi-list text-white fs-1"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="sellers.php">Sellers</a></li>
                <li class="nav-item"><a class="nav-link" href="product.php">Catalog</a></li>
                <li class="nav-item"><a class="nav-link" href="category.php">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
            </ul>
            <div class="d-flex align-items-center">
                <div class="dropdown admin-profile-dropdown">
                    <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" style="border: none; color: white;">
                        <img src="https://i.pravatar.cc/100?img=32" alt="Admin" class="profile-img me-2">
                        <span class="profile-name d-none d-md-inline">Admin Name</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user-gear me-2"></i> Settings</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-bell me-2"></i> Notifications</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>