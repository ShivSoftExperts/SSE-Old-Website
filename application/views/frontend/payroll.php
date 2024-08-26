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
    <section class="py-lg-5">
        <div class="container">
            <div class="row">
                <div class="application-service-text text-center mb-lg-3">
                    <!-- <img src="./Assets/Service_images/01.jpg" alt="about_us-img" class="img-fluid"> -->
                    <h1>PAYROLL</h1>
                    <div class="application-service-text text-center">
                        <h1><?= $details->header_title; ?></h1>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 order-2 order-lg-1 order-md-2">
                    <div class="about_us">
                        <?= $details->header_description; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 order-1 order-lg-2 order-md-1">
                    <div class="about_us-img d-flex justify-content-end align-content-center">
                        <img src="<?= base_url($details->image_path); ?>" alt="img" class="img-fluid flex-grow-1">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if (!empty($details->footer_description)) { ?>
        <section class="py-lg-5">
            <div class="container pt-5 pb-5">
                <div class="testimonial">
                    <div class="text-center">
                        <div class="about_us text-center">
                            <?= $details->footer_description; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>