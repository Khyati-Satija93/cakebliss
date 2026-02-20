<?php include 'includes/topbar.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="includes/css/style.css">

<section class="custom-order-section pt-150 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5 reveal">
                    <h1 class="playfair display-3">Commission a Masterpiece</h1>
                    <p class="opacity-50">Tell us about your event, and we will manifest a cake that defies expectation.</p>
                </div>

                <form id="customCakeForm" class="glass-card p-5 reveal">
                    <div class="form-step mb-5">
                        <h4 class="playfair mb-4 text-accent">1. The Occasion</h4>
                        <div class="row g-3">
                            <div class="col-md-6 col-lg-3">
                                <input type="radio" class="btn-check" name="occasion" id="wedding" checked>
                                <label class="btn btn-outline-custom w-100 py-3" for="wedding">Wedding</label>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <input type="radio" class="btn-check" name="occasion" id="birthday">
                                <label class="btn btn-outline-custom w-100 py-3" for="birthday">Birthday</label>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <input type="radio" class="btn-check" name="occasion" id="editorial">
                                <label class="btn btn-outline-custom w-100 py-3" for="editorial">Editorial</label>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <input type="radio" class="btn-check" name="occasion" id="other">
                                <label class="btn btn-outline-custom w-100 py-3" for="other">Other</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-step mb-5">
                        <h4 class="playfair mb-4 text-accent">2. Visual Enchantment</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">PRIMARY COLOR PALETTE</label>
                                <input type="text" class="form-control custom-input" placeholder="e.g. Sage Green and Dusty Rose">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small opacity-50">SERVINGS NEEDED</label>
                                <input type="number" class="form-control custom-input" placeholder="e.g. 50">
                            </div>
                            <div class="col-12">
                                <label class="form-label small opacity-50">UPLOAD INSPIRATION (Moodboard, Venue, or Sketches)</label>
                                <div class="upload-zone p-5 text-center rounded-4">
                                    <input type="file" id="cakeInspo" class="d-none">
                                    <label for="cakeInspo" class="cursor-pointer">
                                        <i class="bi bi-cloud-upload display-4 text-accent"></i>
                                        <p class="mt-2 mb-0">Click to upload images</p>
                                        <span class="small opacity-50">PNG, JPG up to 10MB</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-step mb-5">
                        <h4 class="playfair mb-4 text-accent">3. Additional Secrets</h4>
                        <textarea class="form-control custom-input" rows="4" placeholder="Describe the flavors, textures, or stories you want this cake to tell..."></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-vibrant px-5 py-3">Send Commission Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="includes/js/script.js"></script>