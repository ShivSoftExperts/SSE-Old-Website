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
    <section class="py-lg-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 order-2 order-lg-1 order-md-2">
                    <div class="aboutus-left">
                        <h1>ABOUT US</h1>
                        <h2><?= $details->header_title; ?></h2>
                    </div>
                    <div class="about_us">
                        <?= $details->header_description; ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 order-1 order-lg-2 order-md-1">
                    <div class="about_us-img d-lg-flex justify-content-lg-end align-items-lg-center">
                        <img src="<?= base_url($details->image_path); ?>" alt="img" class="img-fluid flex-grow-1" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 order-sm-2 order-lg-1 order-md-2">
                    <div class="about_us">
                        <p><?= $details->footer_description; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
</main>