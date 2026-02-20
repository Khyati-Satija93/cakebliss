// Scroll Reveal
function reveal() {
    var reveals = document.querySelectorAll(".reveal");
    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        if (elementTop < windowHeight - 150) {
            reveals[i].classList.add("active");
        }
    }
}
window.addEventListener("scroll", reveal);
reveal();

// Hero Floating
gsap.to(".floating-cake", { y: 20, duration: 3, repeat: -1, yoyo: true, ease: "sine.inOut" });

// Gallery Parallax
document.querySelectorAll('.gallery-item').forEach(item => {
    item.addEventListener('mousemove', (e) => {
        const { left, top, width, height } = item.getBoundingClientRect();
        const x = (e.clientX - left) / width - 0.5;
        const y = (e.clientY - top) / height - 0.5;
        item.querySelector('img').style.transform = `scale(1.1) translate(${x * 20}px, ${y * 20}px)`;
    });
    item.addEventListener('mouseleave', () => {
        item.querySelector('img').style.transform = `scale(1) translate(0, 0)`;
    });
});

// Change Main Image
function changeImg(src, el) {
    document.getElementById('mainProductImg').src = src;
    document.querySelectorAll('.thumbnail-grid img').forEach(img => img.classList.remove('active-thumb'));
    el.classList.add('active-thumb');
}

// Quantity Logic
function updateQty(val) {
    const input = document.getElementById('productQty');
    let current = parseInt(input.value);
    if (current + val >= 1) {
        input.value = current + val;
    }
}

// Example Product Filtering
const filterBtns = document.querySelectorAll('.filter-btn');
filterBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        // You can link this to your product filtering logic
        console.log(`Filtering for ${btn.dataset.filter}`);
    });
});

const loadMoreBtn = document.getElementById('loadMoreBtn');

if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', function () {
        const text = this.querySelector('.btn-text');
        const spinner = this.querySelector('.spinner-border');
        const progressBar = document.querySelector('.progress-bar-fill');

        // Start Loading State
        text.classList.add('opacity-50');
        text.innerText = "Baking more results...";
        spinner.classList.remove('d-none');
        this.disabled = true;

        // Simulate API Call (2 seconds)
        setTimeout(() => {
            // Reset Button
            text.classList.remove('opacity-50');
            text.innerText = "Explore More Treats";
            spinner.classList.add('d-none');
            this.disabled = false;

            // Update Progress Bar (example)
            progressBar.style.width = "50%";

            // Logic to append new product cards would go here
            console.log("New products have been served!");
        }, 2000);
    });
}


// 2. Add to Cart Animation & Open Drawer
// function addToCartAnimation(btn) {
//     const originalText = btn.innerHTML;
//     btn.innerHTML = '<i class="bi bi-check2"></i> Added!';
//     btn.disabled = true;
    
//     setTimeout(() => {
//         toggleCart();
//         setTimeout(() => {
//             btn.innerHTML = originalText;
//             btn.disabled = false;
//         }, 1000);
//     }, 600);
// }
function addToCartAnimation(btn) {
    const cakeImg = document.getElementById('mainProductImg');
    // Change this selector to match your bag icon in the header
    const cartIcon = document.querySelector('.bi-bag-heart') || document.querySelector('.nav-icons');

    if (!cakeImg || !cartIcon) {
        // Fallback if elements aren't found: just redirect
        window.location.href = 'cart.php';
        return;
    }

    // 1. Create the Flying Clone
    const flyingImg = cakeImg.cloneNode();
    const rect = cakeImg.getBoundingClientRect();
    const cartRect = cartIcon.getBoundingClientRect();

    Object.assign(flyingImg.style, {
        position: 'fixed',
        left: rect.left + 'px',
        top: rect.top + 'px',
        width: rect.width + 'px',
        height: rect.height + 'px',
        borderRadius: '50%',
        zIndex: '9999',
        transition: 'all 0.8s cubic-bezier(0.42, 0, 0.58, 1)',
        pointerEvents: 'none',
        objectFit: 'cover'
    });

    document.body.appendChild(flyingImg);

    // 2. Feedback on Button
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="bi bi-check2"></i> Added!';
    btn.disabled = true;

    // 3. Start Animation
    requestAnimationFrame(() => {
        flyingImg.style.left = cartRect.left + (cartRect.width / 2) + 'px';
        flyingImg.style.top = cartRect.top + (cartRect.height / 2) + 'px';
        flyingImg.style.width = '20px';
        flyingImg.style.height = '20px';
        flyingImg.style.opacity = '0.4';
        flyingImg.style.transform = 'scale(0.2) rotate(360deg)';
    });

    // 4. Wait for animation to finish, then go to Cart Page
    setTimeout(() => {
        flyingImg.remove();
        window.location.href = 'cart.php'; 
    }, 850);
}

// Ensure these functions are also present
function updateQty(val) {
    const input = document.getElementById('productQty');
    let current = parseInt(input.value);
    if (current + val >= 1) input.value = current + val;
}

function changeImg(src, el) {
    document.getElementById('mainProductImg').src = src;
    document.querySelectorAll('.thumbnail-grid img').forEach(img => img.classList.remove('active-thumb'));
    el.classList.add('active-thumb');
}

// Simple quantity handler for the cart page
document.querySelectorAll('.qty-selector-sm').forEach(selector => {
    const btnMinus = selector.querySelector('button:first-child');
    const btnPlus = selector.querySelector('button:last-child');
    const span = selector.querySelector('span');

    btnMinus.onclick = () => {
        let val = parseInt(span.innerText);
        if (val > 1) span.innerText = val - 1;
    };

    btnPlus.onclick = () => {
        let val = parseInt(span.innerText);
        span.innerText = val + 1;
    };
});

function processOrder() {
    const btn = document.querySelector('.btn-vibrant');
    const originalText = btn.innerHTML;
    
    // Add loading state
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Securing your slot...';
    btn.disabled = true;

    // Simulate server delay
    setTimeout(() => {
        // Here you would normally redirect to the Payment page or show the Payment Section
        alert("Delivery Address Confirmed! Moving to Payment...");
        window.location.href = 'order-success.php';
        btn.innerHTML = originalText;
        btn.disabled = false;
    }, 1500);
}

window.onload = function() {
    const canvas = document.getElementById('confetti-canvas');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let particles = [];
    const colors = ['#9d50bb', '#ff00ff', '#20c997', '#ffffff'];

    for (let i = 0; i < 100; i++) {
        particles.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height - canvas.height,
            size: Math.random() * 7 + 3,
            color: colors[Math.floor(Math.random() * colors.length)],
            speed: Math.random() * 3 + 2,
            angle: Math.random() * 6.28
        });
    }

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach((p, i) => {
            p.y += p.speed;
            p.x += Math.sin(p.angle) * 2;
            ctx.fillStyle = p.color;
            ctx.fillRect(p.x, p.y, p.size, p.size);

            if (p.y > canvas.height) particles[i].y = -10;
        });
        requestAnimationFrame(draw);
    }

    draw();
};

// Simulate progress update
setTimeout(() => {
    const items = document.querySelectorAll('.track-item');
    if(items.length >= 2) {
        items[1].classList.remove('active');
        items[1].classList.add('completed');
        items[1].querySelector('.track-dot').innerHTML = '<i class="bi bi-check"></i>';
        
        items[2].classList.add('active');
        items[2].innerHTML += '<div class="dot-inner"></div>'; // Add pulse to next item
    }
}, 5000); // Updates after 5 seconds

function toggleFavorite(btn) {
    const icon = btn.querySelector('i');
    icon.classList.toggle('bi-heart');
    icon.classList.toggle('bi-heart-fill');
    
    if(icon.classList.contains('bi-heart-fill')) {
        icon.style.color = '#ff00ff'; // Neon Magenta
        // Logic to save to database would go here
    } else {
        icon.style.color = 'inherit';
    }
}

// Countdown Timer Logic
function startCountdown(duration, display) {
    let timer = duration, hours, minutes, seconds;
    setInterval(function () {
        hours = parseInt(timer / 3600, 10);
        minutes = parseInt((timer % 3600) / 60, 10);
        seconds = parseInt(timer % 60, 10);

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = hours + ":" + minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.addEventListener('load', function () {
    let threeHours = 60 * 60 * 3;
    let display = document.querySelector('#flashTimer');
    if(display) startCountdown(threeHours, display);
});

function removeFromWishlist(btn) {
    const card = btn.closest('.wishlist-item-card');
    card.classList.add('removing');
    
    setTimeout(() => {
        card.remove();
        checkEmptyWishlist();
    }, 400);
}

function moveToCart(btn) {
    // Re-use your existing Add to Cart animation
    addToCartAnimation(btn);
    
    // Remove from wishlist after moving
    setTimeout(() => {
        const card = btn.closest('.wishlist-item-card');
        card.classList.add('removing');
        setTimeout(() => card.remove(), 400);
    }, 1000);
}

function checkEmptyWishlist() {
    const items = document.querySelectorAll('.wishlist-item-card');
    if (items.length === 0) {
        document.getElementById('emptyWishlist').classList.remove('d-none');
        document.getElementById('wishlistGrid').classList.add('d-none');
    }
}

function handleContact(event) {
    event.preventDefault();
    const btn = document.getElementById('submitBtn');
    const form = document.getElementById('contactForm');
    const feedback = document.getElementById('contactFeedback');

    // 1. Loading State
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Casting your spell...';
    btn.disabled = true;

    // 2. Simulate Server Delay
    setTimeout(() => {
        form.classList.add('d-none');
        feedback.classList.remove('d-none');
        
        // Optionally reset after 5 seconds to allow another message
        setTimeout(() => {
            form.reset();
            form.classList.remove('d-none');
            feedback.classList.add('d-none');
            btn.innerHTML = 'Send Message';
            btn.disabled = false;
        }, 5000);
    }, 2000);
}

// Blog Reading Progress Bar
window.onscroll = function() {
    let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrolled = (winScroll / height) * 100;
    let progressBar = document.getElementById("reading-progress");
    if(progressBar) {
        progressBar.style.width = scrolled + "%";
    }
};

document.getElementById('cakeInspo')?.addEventListener('change', function(e) {
    const fileName = e.target.files[0].name;
    const uploadZone = document.querySelector('.upload-zone p');
    const uploadIcon = document.querySelector('.upload-zone i');
    
    if (fileName) {
        uploadZone.innerHTML = `<strong>Selected:</strong> ${fileName}`;
        uploadIcon.className = 'bi bi-check-circle text-success display-4';
    }
});

// Form Submission handling
document.getElementById('customCakeForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Sending your vision...';
    
    setTimeout(() => {
        alert("Your request has been sent to our Head Enchanter. Expect a response via Raven (or Email) within 24 hours.");
        window.location.href = 'index.php';
    }, 2000);
});

function switchAuth(type, element) {
    // 1. Update Button Visuals
    const buttons = document.querySelectorAll('.auth-toggle-btn');
    buttons.forEach(btn => btn.classList.remove('active'));
    element.classList.add('active');

    // 2. Switch Forms
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (type === 'login') {
        loginForm.classList.remove('d-none');
        registerForm.classList.add('d-none');
        // Optional: Trigger a small fade-in animation
        loginForm.style.animation = 'fadeIn 0.5s';
    } else {
        loginForm.classList.add('d-none');
        registerForm.classList.remove('d-none');
        registerForm.style.animation = 'fadeIn 0.5s';
    }
}

document.querySelector('.custom-checkbox input').addEventListener('change', function() {
    if(this.checked) {
        console.log("Memory spell cast: User will be remembered.");
        // You could trigger a small particle effect here if desired
    }
});