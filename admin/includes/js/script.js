document.addEventListener('DOMContentLoaded', function() {
    // 1. Initialize Revenue Chart
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Revenue',
                data: [12000, 19000, 15000, 25000, 22000, 30000, 35000],
                borderColor: '#9d50bb',
                backgroundColor: 'rgba(157, 80, 187, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { ticks: { color: '#C0C0C0' }, grid: { color: 'rgba(255,255,255,0.05)' } },
                x: { ticks: { color: '#C0C0C0' }, grid: { display: false } }
            }
        }
    });

    // 2. Active Link Handling
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
});





document.addEventListener('DOMContentLoaded', () => {
    // 1. Search Filtering
    const searchInput = document.querySelector('.search-input');
    const tableRows = document.querySelectorAll('.table tbody tr');

    searchInput.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();
        
        tableRows.forEach(row => {
            const userName = row.querySelector('.fw-bold').innerText.toLowerCase();
            const userEmail = row.querySelector('.text-muted').innerText.toLowerCase();
            
            if (userName.includes(term) || userEmail.includes(term)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });

});  

document.addEventListener('DOMContentLoaded', () => {
    // 1. Toggle Category Visibility
    const switches = document.querySelectorAll('.form-check-input');
    switches.forEach(sw => {
        sw.addEventListener('change', function() {
            const card = this.closest('.category-card');
            if (this.checked) {
                card.style.opacity = "1";
                card.querySelector('.category-icon-wrapper').style.filter = "grayscale(0)";
            } else {
                card.style.opacity = "0.6";
                card.querySelector('.category-icon-wrapper').style.filter = "grayscale(100%)";
            }
        });
    });

    // 2. Search Logic (Optional for categories)
    // You can implement a simple text filter here if you have many categories
});
// 3. Status Flow Function
    function updateStatus(btn, sellerId, status) {
        status = Number(status);
        const row = btn.closest('tr');
        const badge = row.querySelector('.badge');
        const actionCell = btn.closest('td');

        btn.disabled = true;

        fetch('seller_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `seller_id=${sellerId}&status=${status}`
            })
            .then(res => res.text())
            .then(result => {
                if (result.trim() !== 'success') {
                    alert('Update failed: ' + result);
                    btn.disabled = false;
                    return;
                }

                // ✅ UI Update for ACTIVE (1)
                if (status === 1) {
                    if (badge) {
                        badge.className = "badge badge-active rounded-pill px-3 py-2";
                        badge.innerText = "Active";
                    }
                    actionCell.innerHTML = `
                <span class="text-success fw-semibold me-2">Active</span>
                <button class="btn btn-outline-danger btn-sm rounded-pill px-3" 
                        onclick="updateStatus(this, ${sellerId}, 3)">Block</button>`;
                }

                // 🚫 UI Update for BLOCKED (3)
                if (status === 3) {
                    if (badge) {
                        badge.className = "badge bg-danger rounded-pill px-3 py-2";
                        badge.innerText = "Blocked";
                    }
                    actionCell.innerHTML = '<span class="text-danger fw-semibold">Blocked</span>';
                }

                // ❌ UI Update for REJECTED (2)
                if (status === 2) {
                    if (badge) {
                        badge.className = "badge bg-warning rounded-pill px-3 py-2";
                        badge.innerText = "Rejected";
                    }
                    actionCell.innerHTML = '<span class="text-muted fw-semibold">Rejected</span>';
                }
            })
            .catch(err => {
                alert('Network error');
                btn.disabled = false;
            });
    }

    // 3. Filter Buttons
document.addEventListener('DOMContentLoaded', () => {
    // Initialize Animations
    if (typeof AOS !== 'undefined') {
        AOS.init({ duration: 800, once: true });
    }

    const filterButtons = document.querySelectorAll('.filter-btn');
    const searchBar = document.querySelector('.search-bar');
    const tableRows = document.querySelectorAll('#sellerTable tbody tr');

    // 1. Category Filtering Logic
filterButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        // Handle Button UI
        filterButtons.forEach(b => b.classList.remove('active', 'btn-sage'));
        filterButtons.forEach(b => b.classList.add('btn-outline-secondary'));
        this.classList.add('active', 'btn-sage');
        this.classList.remove('btn-outline-secondary');

        const filterValue = this.getAttribute('data-filter');

        tableRows.forEach(row => {
            const status = row.getAttribute('data-status'); // This is "0", "1", etc.
            
            // Map the filter words to your database numbers
            let shouldShow = false;
            if (filterValue === 'all') shouldShow = true;
            if (filterValue === 'pending' && status === '0') shouldShow = true;
            if (filterValue === 'active' && status === '1') shouldShow = true;
            if (filterValue === 'blocked' && status === '3') shouldShow = true;

            if (shouldShow) {
                row.classList.remove('hidden-row');
            } else {
                row.classList.add('hidden-row');
            }
        });
    });
});

    // 2. Search Bar Logic (Shop Name)
    searchBar.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();
        
        tableRows.forEach(row => {
            const shopName = row.querySelector('.fw-bold').innerText.toLowerCase();
            if (shopName.includes(term)) {
                row.classList.remove('hidden-row');
            } else {
                row.classList.add('hidden-row');
            }
        });
    });
});