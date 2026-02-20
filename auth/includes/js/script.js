function toggleBakerFields(isBaker) {
    const field = document.getElementById('bakerField');
    const input = document.getElementById('shop_name_input');
    
    if(isBaker) {
        field.style.display = 'block';
        input.setAttribute('required', 'true');
    } else {
        field.style.display = 'none';
        input.removeAttribute('required');
    }
}


// Handle Login Submission
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const btn = this.querySelector('button[type="submit"]');
    
    // UI Feedback
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Authenticating...';
    btn.disabled = true;

    // Simulate Server Check
    setTimeout(() => {
        // Success Animation
        btn.innerHTML = '<i class="bi bi-check-lg me-2"></i> Success!';
        btn.classList.replace('btn-sage', 'btn-success');
        
        setTimeout(() => {
            window.location.href = 'index.php'; // Redirect to Dashboard
        }, 800);
    }, 1500);
});