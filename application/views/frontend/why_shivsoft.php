<main>
    <div class="subpagewrapper serviceofferingssubpage" style="background-image: url('<?= base_url($details->banner); ?>')">
        <div class="hextop-right">
            <img src="<?= base_url($details->banner_2); ?>">
        </div>
    </div>
    <!-- about_us block dineshreddy -->
    <section class="hero-bottom">
        <div class="hexbottomright">
            <img src="<?= base_url('assets/images'); ?>/homehex-1-bottom.png">
        </div>
    </section>
    <!-- about_us block dineshreddy -->
    <section class="py-lg-5 testimonial-section">
        <div class="container pt-5 pb-5">
            <div class="testimonial">
                <div class="text-center">
                    <div class="application-service-text text-center">
                        <h1><?= $details->header_title; ?></h1>
                    </div>
                    <div class="about_us text-center">
                        <?= $details->header_description; ?>
                    </div>
                </div>
                <div class="opposite-grey"></div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <div class="what-we-can-do">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-6 order-2 order-lg-1 order-md-2">
                        <div class="we-offer-list">
                            <div class="services-offer-title mb-4">
                                <h2>EXPERIENCE</h2>
                                <h1><?= $details->body_title; ?></h1>
                            </div>
                            <ul class="list-unstyled">
                                <?php foreach ($points as $point) { ?>
                                    <li class="d-flex align-items-lg-center align-items-md-center"><span><i class="fas fa-chevron-right me-4"></i></span><span><?= $point->title; ?> – <?= $point->small_description; ?></span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 order-1 order-lg-2 order-md-1">
                        <img src="<?= base_url($details->image_path); ?>" alt="img" class="img-fluid flex-grow-1">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-lg-5 testimonial-section">
        <div class="container pt-5 pb-5">
            <div class="testimonial">
                <div class="text-center">
                    <div class="application-service-text text-center">
                        <h1><?= $details->footer_title; ?></h1>
                    </div>
                    <div class="about_us text-center">
                        <?= $details->footer_description; ?>
                    </div>
                    <div class="opposite-grey"></div>
                </div>
            </div>
        </div>
    </section>
</main>
