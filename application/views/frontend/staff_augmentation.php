<main>
    <div class="subpagewrapper serviceofferingssubpage" style="background-image: url('<?= base_url($website_data->staff_augmentation_banner); ?>')">
        <div class="hextop-right">
            <img src="<?= base_url($website_data->staff_augmentation_small_banner); ?>">
        </div>
    </div>
    <!-- about_us block dineshreddy -->
    <section class="hero-bottom">
        <div class="hexbottomright">
            <img src="<?= base_url('assets/images'); ?>/homehex-1-bottom.png">
        </div>
    </section>
    <!-- about_us block dineshreddy -->
    <?php $i = 1;
    foreach ($staff_augmentation as $row) { ?>
        <?php if ($i % 2 == 1) { ?>
            <section class="py-lg-5">
                <div class="container <?= ($i == 1) ? 'mt-5' : ''; ?>">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 order-2 order-lg-1 order-md-2">
                            <div class="aboutus-left application-service-text">
                                <!-- <h3>ABOUT US</h3> -->
                                <h1><?= $row->title; ?></h1>
                            </div>
                            <div class="about_us">
                                <?= $row->description; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 order-1 order-lg-2 order-md-1">
                            <div class="about_us-img d-flex justify-content-end align-content-center">
                                <img src="<?= base_url($row->image_path); ?>" alt="img" class="img-fluid flex-grow-1">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else { ?>
            <section class="py-lg-5">
                <div class="container ">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 order-sm-2  order-md-1 order-lg-1">
                            <div class="about_us-img d-flex justify-content-end align-content-center">
                                <img src="<?= base_url($row->image_path); ?>" alt="img" class="img-fluid flex-grow-1">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 order-sm-1 order-md-2 order-lg-2">
                            <div class="aboutus-left application-service-text">
                                <!-- <h3>ABOUT US</h3> -->
                                <h1><?= $row->title; ?></h1>
                            </div>
                            <div class="about_us">
                                <?= $row->description; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php }
        $i++;
    } ?>
</main>