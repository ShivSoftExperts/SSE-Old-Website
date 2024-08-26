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
    <section class="py-lg-5 testimonial-section bg-white">
        <div class="container pb-5">
            <div class="testimonial">
                <div class="text-center">
                    <div class="application-service-text text-center">
                        <h1><?= $details->header_title; ?></h1>
                    </div>
                    <div class="about_us text-center">
                        <?= $details->header_description; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="rowcontainer secondrow middlerow">
        <div class="container">
            <div class="timelinewrapper">
                <?php $i = 1;
                $t = count($points);
                foreach ($points as $point) { ?>
                    <div class="timebox">
                        <div>
                            <div class="pointwrapper">
                                <div class="citywrapper transparent" style="opacity: 1;">
                                    <img src="<?= base_url($point->icon); ?>">
                                </div>
                                <div class="dotwrapper">
                                    <div class="dot"></div>
                                    <?php if ($i != $t) { ?>
                                        <div class="line"></div>
                                    <?php } ?>
                                </div>
                                <div class="timelineinfowrapper transparent fadein<?= $i; ?>" style="opacity: 1;">
                                    <h3><?= $point->title; ?></h3>
                                    <p><?= $point->small_description; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                } ?>
            </div>
        </div>
    </div>
    <section class="py-lg-5 testimonial-section bg-white">
        <div class="container pt-5 pb-5">
            <div class="testimonial">
                <div class="text-center">
                    <div class="application-service-text text-center">
                        <h1><?= $details->footer_title; ?></h1>
                    </div>
                    <div class="about_us text-center">
                        <?= $details->footer_description; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>