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
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5" id="add_blog">
                        <?php foreach ($blog_list as $row) { ?>
                            <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        <img class="img-fluid" src="<?= base_url($row->image_path); ?>" alt="">
                                        <a class="position-absolute top-0 start-0 bg-primary blog-title-strip text-white rounded-end mt-5 py-2 px-4" href="<?= base_url(); ?>blog/<?= $row->id; ?>"><?= $row->title; ?></a>
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">

                                            <small><i class="far fa-calendar-alt text-primary me-2"></i><?= date('d M, Y', strtotime($row->updated_date)); ?></small>
                                        </div>
                                        <h4 class="mb-5 blog-question"><?= $row->question; ?></h4>
                                        <!-- <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p> -->
                                        <a class="text-uppercase blog-read-more" href="<?= base_url(); ?>blog/<?= $row->id; ?>">Read More </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-4 offset-md-4"><button id="loadMore" class="explore-service-btn" type="button">Load More</button></div>
                    </div>
                </div>
                <!-- Blog list End -->

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">

                        <form method="get">
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control p-3" value="<?= (isset($_GET['search'])) ? $_GET['search'] : ''; ?>" placeholder="Keyword">
                                <button class="btn btn-primary blog-title-strip px-4" type="submit"><i class="ri-search-line"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- Search Form End -->

                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Categories</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <?php foreach ($services as $service) { ?>
                                <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="<?= base_url(); ?>service/<?= $service->id; ?>"><i class="bi bi-arrow-right me-2"></i><?= $service->title; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Category End -->

                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Recent Post</h3>
                        </div>
                        <?php $i = 0;
                        foreach ($blog_list as $row) { ?>
                            <div class="d-flex rounded overflow-hidden mb-3">
                                <img class="img-fluid" src="<?= base_url($row->image_path); ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                <a href="<?= base_url(); ?>blog/<?= $row->id; ?>" class="recent-post h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"><?= $row->question; ?></a>
                            </div>
                        <?php $i++;
                            if ($i == 3) {
                                break;
                            }
                        } ?>
                    </div>
                    <!-- Recent Post End -->

                    <!-- Image Start -->
                    <!-- <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="./Assets/Staffing_images/blog-1.jpg" alt="" class="img-fluid rounded">
                    </div> -->
                    <!-- Image End -->

                    <!-- Tags Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Tag Cloud</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <?php $tags = $this->db->where('status', 'active')->group_by('tag')->order_by('rand()')->limit(20, 0)->get('blog_tags')->result();
                            foreach ($tags as $tag) { ?>
                                <a href="<?= base_url(); ?>blogs?search=<?= $tag->tag; ?>" class="btn btn-light m-1"><?= $tag->tag; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        var x = 1;
        $("#loadMore").click(function(e) {
            $.ajax({
                type: "GET",
                url: "<?= base_url(); ?>frontend/load_blogs/" + x,
                data: {
                    search: $("#search").val(),
                    <?= $this->security->get_csrf_token_name(); ?>: '<?= $this->security->get_csrf_hash(); ?>',
                },
                dataType: "text",
                success: function(data) {
                    if (data != '') {
                        $('#add_blog').append(data);
                    } else {
                        $('#loadMore').parent().parent().hide();
                        alert("No more blogs found.");
                    }
                },
                error: function(error) {
                    alert("Error submitting the form. Please try again later.");
                }
            });
            x++;
        });
    });
</script>