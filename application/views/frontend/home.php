<main>
    <!-- hero-section home page banner -->
    <section class="hero-section py-lg-5">
        <video autoplay="" id="video" loop="" muted="" preload="auto">
            <source src="<?= $website_data->banner_video_path; ?>" type="video/mp4" />
        </video>
        <div class="container hero-container">
            <div class="hero-banners-content">
                <div class="heroctas fadeinsecond position-relative">
                    <div class="orangehex">
                        <p><?= $website_data->text1; ?></p>
                    </div>
                    <div class="orangehex">
                        <p><?= $website_data->text2; ?></p>
                    </div>
                    <div class="orangehex" href="/sales-and-recruiting">
                        <p><?= $website_data->text3; ?></p>
                    </div>
                </div>
                <div class="digital-solution text-center">
                    <div class="hero-title">
                        <h1><?= $website_data->slider_text; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="hextop-right">
            <img src="<?= base_url($website_data->small_banner); ?>" alt="home-hexagon-img">
        </div>
    </section>
    <section class="hero-bottom">
        <div class="hexbottomright">
            <img src="<?= base_url('assets/images'); ?>/homehex-1-bottom.png">
        </div>
    </section>

    <section class="services-section py-lg-5">
        <div class="container">
            <div class="our-services text-center">
                <h2>OUR SERVICES</h2>
                <h3>Tailor your customized IT Solutions from the Best in the Industry</h3>
            </div>
            <div class="technologywrapper">
                <?php foreach ($services as $service) { ?>
                    <div class="card p-3 first-row ">
                        <div class="technologyicon">
                            <img src="<?= base_url($service->icon); ?>" alt="<?= $service->icon; ?>">
                        </div>
                        <div class="technologycontent">
                            <p class="subtext"><?= $service->title; ?></p>
                            <p>
                                <?= substr(strip_tags($service->description), 0, 100); ?>...
                            </p>
                            <a href="<?= base_url(); ?>service/<?= $service->code; ?>" class="explore-service-btn">
                                Explore Our Services
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- business-exponentially section -->
    <section>
        <div class="container py-5">
            <div class="our-services text-center">
                <h2>WHY CHOOSE US</h2>
                <h3>We Are Here to Grow Your Business Exponentially</h3>
            </div>
            <div class="business-exponentially py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="customize d-flex justify-content-center align-content-center">
                            <img src="<?= base_url($website_data->why_choose_us_image); ?>" alt="<?= $website_data->why_choose_us_image; ?>" class="img-fluid" />
                        </div>
                    </div>
                    <?php $i = 1;
                    foreach ($why_choose_us as $item) { ?>
                        <?php
                        if ($i % 2 == 1) { ?>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                            <?php } ?>
                            <div class="customize <?= ($i % 2 == 1) ? 'mb-5' : ''; ?> customize-card">
                                <div class="customize-icon">
                                    <img src="<?= base_url($item->image_path); ?>" alt="img" class="img-fluid" />
                                </div>
                                <div class="customize-title">
                                    <h5><?= $item->title; ?></h5>
                                    <p><?= $item->description; ?></p>
                                </div>
                            </div>
                            <?php if ($i % 2 == 0) { ?>
                            </div>
                        <?php } ?>
                    <?php $i++;
                    } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Our-clients listing -->
    <section>
        <div class="container">
            <div class="our-services text-center ">
                <h3>OUR CLIENTS</h3>
            </div>
            <div class="brands-listing py-5">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($clients as $client) { ?>
                        <div class="item">
                            <div class="logo1">
                                <img src="<?= base_url($client->image_path); ?>" alt="<?= $client->image_path; ?>" class="img-fluid w-50" />
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>