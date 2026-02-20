<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">

<section class="contact-section pt-150 pb-5">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <h1 class="playfair display-3">Reach Out</h1>
            <p class="opacity-50">Have a question about a spell or a custom order? Our bakers are listening.</p>
        </div>

        <div class="row g-5">
            <div class="col-lg-5">
                <div class="glass-card p-4 mb-4 reveal">
                    <h4 class="playfair mb-4">Visit the Atelier</h4>
                    <div class="d-flex gap-3 mb-3">
                        <i class="bi bi-geo-alt text-accent"></i>
                        <p class="small opacity-75">123 Enchanted Way, Suite 4<br>Dreamville, CA 90210</p>
                    </div>
                    <div class="d-flex gap-3 mb-3">
                        <i class="bi bi-telephone text-accent"></i>
                        <p class="small opacity-75">+1 (555) 777-CAKE</p>
                    </div>
                    <div class="d-flex gap-3 mb-4">
                        <i class="bi bi-envelope text-accent"></i>
                        <p class="small opacity-75">hello@enchantedbakery.com</p>
                    </div>
                    
                    <div class="rounded-4 overflow-hidden shadow-sm" style="height: 200px; filter: grayscale(1) invert(1) contrast(0.8);">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.733248043701!2d-118.40115!3d34.07362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc04d6d147ab%3A0xd6c7c37927944541!2sBeverly%20Hills%2C%20CA!5e0!3m2!1sen!2sus!4v1642270000000!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="glass-card p-5 reveal">
                    <form id="contactForm" onsubmit="handleContact(event)">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">YOUR NAME</label>
                                <input type="text" class="form-control custom-input" required placeholder="Alice Liddell">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">EMAIL ADDRESS</label>
                                <input type="email" class="form-control custom-input" required placeholder="alice@wonderland.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label small opacity-50">SUBJECT</label>
                                <select class="form-select custom-input">
                                    <option selected>General Inquiry</option>
                                    <option>Custom Cake Request</option>
                                    <option>Wedding Consultations</option>
                                    <option>Order Issue</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small opacity-50">YOUR MESSAGE</label>
                                <textarea class="form-control custom-input" rows="5" required placeholder="Describe your dream cake..."></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-vibrant w-100 py-3 mt-2" id="submitBtn">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                    <div id="contactFeedback" class="mt-4 d-none text-center">
                        <i class="bi bi-send-check fs-2 text-accent"></i>
                        <p class="mt-2">Message sent! We'll reply shortly.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>