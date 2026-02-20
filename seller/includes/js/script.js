document.addEventListener('DOMContentLoaded', () => {
    // 1. Sidebar Active State Switcher
    const currentPath = window.location.pathname.split("/").pop();
    const navLinks = document.querySelectorAll('.sidebar .nav-link');

    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        }
    });

    // 2. Notification Pulse Clear
    const notifyBtn = document.querySelector('.notification-btn');
    if (notifyBtn) {
        notifyBtn.addEventListener('click', () => {
            const badge = notifyBtn.querySelector('.pulse-badge');
            if (badge) badge.style.display = 'none';
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    // Initializing AOS if not already done
    if (typeof AOS !== 'undefined') {
        AOS.init({ duration: 1000, once: true });
    }

    // Dynamic Greeting based on time
    const hour = new Date().getHours();
    const greetingEl = document.querySelector('h1.display-6');
    if (hour < 12) greetingEl.innerHTML = "Morning, Baker! 🥐";
    else if (hour < 18) greetingEl.innerHTML = "Good Afternoon, Baker! 🥖";
    else greetingEl.innerHTML = "Evening, Baker! 🥨";
});

// document.addEventListener('DOMContentLoaded', () => {
//     const form = document.getElementById('addPastryForm');
    
//     form.addEventListener('submit', async (e) => {
//         e.preventDefault(); // Prevent page reload
        
//         const btn = form.querySelector('button[type="submit"]');
//         const originalText = btn.innerHTML;
//         const formData = new FormData(form); // Gathers all input fields and images

//         // 1. Start Visual Loading State
//         btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Creating...';
//         btn.disabled = true;

//         try {
//             // 2. Send data to PHP
//             const response = await fetch('add_pastry.php', {
//                 method: 'POST',
//                 body: formData
//             });

//             const result = await response.text(); // Or response.json() if your PHP returns JSON

//             // 3. If PHP was successful, show Success State
//             btn.innerHTML = '<i class="bi bi-check-lg me-2"></i>Added to Menu!';
//             btn.classList.replace('btn-sage', 'btn-success');
            
//             // 4. If PHP was not successful, show Error State
//             if (result === 'error') {
//                 btn.innerHTML = '<i class="bi bi-x-lg me-2"></i>Error Adding Pastry';
//                 btn.classList.replace('btn-sage', 'btn-danger');
//             }
//         } catch (error) {
//             console.error('Error:', error);
//             btn.innerHTML = '<i class="bi bi-x-lg me-2"></i>Error Adding Pastry';
//             btn.classList.replace('btn-sage', 'btn-danger');
//         }
//     });
// });

//Customize Order Management
document.addEventListener('DOMContentLoaded', function() {
    // 1. FILTER LOGIC
    const filterPills = document.querySelectorAll('.filter-pill');
    const orderRows = document.querySelectorAll('.order-row');

    filterPills.forEach(pill => {
        pill.addEventListener('click', function() {
            // Remove active class from all and add to clicked
            filterPills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');

            const selectedStatus = this.getAttribute('data-status');

            orderRows.forEach(row => {
                // Show row if "all" is selected or if status matches
                if (selectedStatus === 'all' || row.getAttribute('data-status') === selectedStatus) {
                    row.style.display = 'block';
                    row.style.animation = 'fadeIn 0.4s ease forwards';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});

// 2. STATUS PROGRESSION LOGIC
function updateStatus(btn, nextStatus) {
    const row = btn.closest('.order-row');
    const badge = row.querySelector('.badge');
    const dots = row.querySelectorAll('.step');
    
    // UI Feedback: Fade out during change
    row.style.opacity = '0.5';
    row.style.transform = 'scale(0.98)';
    row.style.transition = 'all 0.4s ease';

    setTimeout(() => {
        // Update Data Status
        row.setAttribute('data-status', nextStatus);

        // Update Progress Dots (The Steps)
        updateProgressDots(dots, nextStatus);

        // Workflow Switcher
        switch (nextStatus) {
            case 'accepted':
                badge.className = "badge badge-accepted"; // Ensure you have this CSS class
                badge.innerHTML = '<i class="bi bi-check2 me-1"></i> Accepted';
                btn.innerHTML = '<i class="bi bi-fire me-2"></i> Put in Oven';
                btn.onclick = () => updateStatus(btn, 'oven');
                break;

            case 'oven':
                badge.className = "badge badge-oven";
                badge.innerHTML = '<i class="bi bi-fire me-1"></i> In Oven';
                btn.innerHTML = '<i class="bi bi-check2-all me-2"></i> Mark Ready';
                btn.onclick = () => updateStatus(btn, 'ready');
                break;

            case 'ready':
                badge.className = "badge badge-ready";
                badge.innerHTML = '<i class="bi bi-box-seam me-1"></i> Ready to Pickup';
                btn.innerHTML = '<i class="bi bi-truck me-2"></i> Mark Delivered';
                btn.onclick = () => updateStatus(btn, 'delivered');
                break;

            case 'delivered':
                badge.className = "badge bg-success-subtle text-success border border-success";
                badge.innerHTML = '<i class="bi bi-check-all me-1"></i> Delivered';
                btn.innerHTML = '<i class="bi bi-archive me-2"></i> Archive';
                btn.classList.replace('btn-action-glow', 'btn-outline-secondary');
                btn.onclick = () => {
                    row.style.transform = 'translateX(50px)';
                    row.style.opacity = '0';
                    setTimeout(() => row.remove(), 400);
                };
                break;
        }

        // Return UI to normal
        row.style.opacity = '1';
        row.style.transform = 'scale(1)';
    }, 500);
}

// Helper function to handle the 4 progress dots
function updateProgressDots(dots, status) {
    dots.forEach(dot => dot.classList.remove('active', 'completed'));
    
    if (status === 'accepted') {
        dots[0].classList.add('active');
    } else if (status === 'oven') {
        dots[0].classList.add('completed');
        dots[1].classList.add('active');
    } else if (status === 'ready') {
        dots[0].classList.add('completed');
        dots[1].classList.add('completed');
        dots[2].classList.add('active');
    } else if (status === 'delivered') {
        dots.forEach(d => d.classList.add('completed'));
        dots[3].classList.add('active');
    }
}

//Order Management
// 1. FILTER LOGIC
document.addEventListener('DOMContentLoaded', function() {
    const filterPills = document.querySelectorAll('.filter-pill');
    const orderRows = document.querySelectorAll('.order-row');

    filterPills.forEach(pill => {
        pill.addEventListener('click', function() {
            // Update active pill UI
            filterPills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');

            const selectedStatus = this.getAttribute('data-status');

            // Show/Hide order rows
            orderRows.forEach(row => {
                if (selectedStatus === 'all' || row.getAttribute('data-status') === selectedStatus) {
                    row.style.display = 'block';
                    row.style.animation = 'fadeIn 0.4s ease forwards';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
});

// 2.STATUS PROGRESSION LOGIC
function updateorderStatus(btn, nextStatus) {
    const row = btn.closest('.order-row');
    const badge = row.querySelector('.badge');
    const dots = row.querySelectorAll('.step');
    
    // UI Feedback: Shrink and fade slightly during transition
    row.style.opacity = '0.5';
    row.style.transform = 'scale(0.98)';
    row.style.transition = 'all 0.4s ease';

    setTimeout(() => {
        // Update Data Status for filtering
        row.setAttribute('data-status', nextStatus);

        // Update Progress Dots
        updateProgressDots(dots, nextStatus);

        // Workflow Switcher (New -> Oven -> Ready -> Delivered)
        switch (nextStatus) {
            case 'oven':
                badge.className = "badge badge-oven";
                badge.innerHTML = '<i class="bi bi-fire me-1"></i> In Oven';
                btn.innerHTML = '<i class="bi bi-check2-all me-2"></i> Mark Ready';
                btn.onclick = () => updateorderStatus(btn, 'ready');
                break;

            case 'ready':
                badge.className = "badge badge-ready";
                badge.innerHTML = '<i class="bi bi-box-seam me-1"></i> Ready to Pickup';
                btn.innerHTML = '<i class="bi bi-truck me-2"></i> Mark Delivered';
                btn.onclick = () => updateorderStatus(btn, 'delivered');
                break;

            case 'delivered':
                badge.className = "badge bg-success-subtle text-success border border-success";
                badge.innerHTML = '<i class="bi bi-check-all me-1"></i> Delivered';
                btn.innerHTML = '<i class="bi bi-archive me-2"></i> Archive';
                btn.classList.replace('btn-action-glow', 'btn-outline-secondary');
                btn.onclick = () => {
                    row.style.transform = 'translateX(50px)';
                    row.style.opacity = '0';
                    setTimeout(() => row.remove(), 400);
                };
                break;
        }

        // --- AUTO-ACTIVE THE TOP FILTER BUTTON ---
        const targetPill = document.querySelector(`.filter-pill[data-status="${nextStatus}"]`);
        if (targetPill) {
            targetPill.click(); // This triggers the filter logic above
        }

        // Return UI to normal
        row.style.opacity = '1';
        row.style.transform = 'scale(1)';
    }, 400);
}

// 3. HELPER FOR PROGRESS DOTS
function updateProgressDots(dots, status) {
    dots.forEach(dot => dot.classList.remove('active', 'completed'));
    
    if (status === 'new') {
        dots[0].classList.add('active');
    } else if (status === 'oven') {
        dots[0].classList.add('completed');
        dots[1].classList.add('active');
    } else if (status === 'ready') {
        dots[0].classList.add('completed');
        dots[1].classList.add('completed');
        dots[2].classList.add('active');
    } else if (status === 'delivered') {
        dots.forEach(d => d.classList.add('completed'));
        dots[3].classList.add('active');
    }
}
//PROFILE PAGE

document.addEventListener('DOMContentLoaded', function() {
    console.log("Profile Management System Active");

    // --- 1. AVATAR UPLOAD PREVIEW ---
    const editAvatarBtn = document.querySelector('.btn-edit-avatar');
    const profileImg = document.querySelector('.profile-main-img');
    
    if (editAvatarBtn && profileImg) {
        // Create hidden input to keep UI clean
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'file';
        hiddenInput.accept = 'image/*';

        editAvatarBtn.addEventListener('click', () => hiddenInput.click());

        hiddenInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profileImg.style.opacity = '0.5';
                    setTimeout(() => {
                        profileImg.src = e.target.result;
                        profileImg.style.opacity = '1';
                    }, 300);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // --- 2. EDIT MODE TOGGLE ---
    const editProfileBtn = document.querySelector('.btn-sage'); // The 'Edit Profile' button
    let isEditMode = false;

    if (editProfileBtn) {
        editProfileBtn.addEventListener('click', function() {
            isEditMode = !isEditMode;
            
            const inputs = document.querySelectorAll('.custom-input');
            const bioArea = document.querySelector('.text-shimmer');

            if (isEditMode) {
                // ENTER EDIT MODE
                this.innerHTML = '<i class="bi bi-check2-all me-2"></i> Save Changes';
                this.classList.replace('btn-sage', 'btn-success');
                this.style.boxShadow = '0 0 15px rgba(40, 167, 69, 0.4)';

                inputs.forEach(input => {
                    input.removeAttribute('readonly');
                    input.style.background = 'rgba(255, 255, 255, 0.08)';
                    input.style.borderColor = 'var(--electric-lavender)';
                });

                // Optional: Focus first input
                if(inputs[0]) inputs[0].focus();

            } else {
                // SAVE & EXIT EDIT MODE
                saveProfileData(this, inputs);
            }
        });
    }
});

// --- 3. SAVE DATA SIMULATION ---
function saveProfileData(button, inputs) {
    // Show Loading State
    const originalContent = button.innerHTML;
    button.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Saving...';
    button.disabled = true;

    // Simulate an API call to PHP
    setTimeout(() => {
        // Reset Button UI
        button.innerHTML = '<i class="bi bi-pencil-square me-2"></i> Edit Profile';
        button.classList.replace('btn-success', 'btn-sage');
        button.style.boxShadow = 'none';
        button.disabled = false;

        // Lock inputs back
        inputs.forEach(input => {
            input.setAttribute('readonly', true);
            input.style.background = 'rgba(255, 255, 255, 0.03)';
            input.style.borderColor = 'var(--border-glass)';
        });

        // Trigger a success toast or alert
        console.log("Profile Saved Successfully!");
    }, 1200);
}