<style>
    #thank-you-popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 45%;
        transform: translate(-50%, -50%);
        background-color: #f5f5f5;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 20px;
        font-family: Arial, sans-serif;
        text-align: center;
        max-width: 600px;
    }

    .popup-heading {
        font-size: 24px;
        margin-bottom: 10px;
        color: #007bff;
    }

    .popup-message {
        font-size: 16px;
        margin-bottom: 0;
        color: #333;
    }
</style>
<main>
    <div class="subpagewrapper serviceofferingssubpage" style="background-image: url('<?= base_url($details->banner1); ?>')">
        <div class="hextop-right">
            <img src="<?= base_url($details->banner2); ?>">
        </div>
    </div>
    <!-- about_us block dineshreddy -->
    <section class="hero-bottom">
        <div class="hexbottomright">
            <img src="<?= base_url('assets/images'); ?>/homehex-1-bottom.png">
        </div>
    </section>
    <!-- about_us block dineshreddy -->
    <section class="stepper-section py-5 wow fadeInUp" data-wow-delay="0.1s detail-page">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="steps-to-register">
                        <!-- Blog Detail Start -->
                        <div class="blog-details application-service-text">
                            <h1 class="title text-center mb-5"><?= $details->question; ?></h1>
                            <img src="<?= base_url($details->image_path); ?>" alt="blog-detail" class="img-fluid">
                        </div>
                        <div class="mb-5 mt-5">
                            <?= $details->description; ?>
                        </div>
                        <!-- <a class="moreless-button" href="javascript:void(0)">Read more</a> -->
                        <!-- Blog Detail End -->

                        <!-- Comment List Start -->
                        <div class="mb-5">
                            <div id="add_comments">
                                <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                    <?php $c = $this->db->where('blog_id', $details->id)->get('blog_comments')->num_rows(); ?>
                                    <h3 class="mb-0"><?= $c; ?> Comments</h3>
                                </div>
                                <?php $list = $this->db->where('blog_id', $details->id)->where('status', 'active')->where('parent_id', 0)->order_by('id', 'desc')->limit(2, 0)->get('blog_comments')->result();
                                foreach ($list as $row) {
                                ?>
                                    <div class="d-flex mb-4">
                                        <div class="ps-3 commenter-name">
                                            <h6><a href="#"><?= $row->name; ?></a> <small><i><?= date('d M, Y', strtotime($row->created_date)); ?></i></small></h6>
                                            <p><?= $row->comment; ?></p>
                                            <button class="btn btn-sm btn-light" type="button" onclick="reply(<?= $row->id; ?>)">Reply</button>
                                        </div>
                                    </div>
                                    <?php $list1 = $this->db->where('blog_id', $details->id)->where('status', 'active')->where('parent_id', $row->id)->order_by('id', 'asc')->get('blog_comments')->result();
                                    foreach ($list1 as $row1) {
                                    ?>
                                        <div class="d-flex ms-5 mb-4">
                                            <div class="ps-3 commenter-name">
                                                <h6><a href="#"><?= $row1->name; ?></a> <small><i><?= date('d M, Y', strtotime($row1->created_date)); ?></i></small></h6>
                                                <p><?= $row1->comment; ?></p>
                                                <button class="btn btn-sm btn-light" type="button" onclick="reply(<?= $row->id; ?>)">Reply</button>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                            <div class="row ">
                                <div class="col-md-4 offset-md-4"><button id="loadMore" class="explore-service-btn" type="button">Load More</button></div>
                            </div>
                        </div>
                        <!-- Comment List End -->
                        <div id="thank-you-popup">
                            <h2 class="popup-heading">Comment added successfully</h2>
                        </div>
                        <!-- Comment Form Start -->
                        <div class="bg-light rounded p-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="mb-0" id="head">Leave A Comment</h3>
                            </div>
                            <form id="contactForm">
                                <input type="hidden" name="parent_id" id="parent_id" value="0" />
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" require id="name" name="name" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" require id="email" name="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control bg-white border-0" require name="comment" id="comment" rows="5" placeholder="Comment"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-control mb-3">What is <span id="num1"></span> + <span id="num2"></span> = ? <i class="ri-refresh-fill" onclick="generateCaptcha()" style="float: right;line-height: 25px;font-size: 32px;"></i></label>
                                    </div>
                                    <div class="col-6">
                                        <input required type="text" class="form-control bg-white border-0" name="captcha" id="captcha" placeholder="Enter the result">
                                        <input type="hidden" id="captchaResult" name="captchaResult">
                                    </div>
                                    <div class="col-12 submit-comment">
                                        <button class="btn w-100 py-3" type="submit">Leave Your Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Comment Form End -->
                    </div>
                </div>
                <!-- Blog list End -->

                <!-- Sidebar Start -->
                <div class="col-lg-4 sticky-sidebar">
                    <div class="left-content">
                        <!-- Search Form Start -->
                        <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                            <form method="get" action="<?= base_url(); ?>blogs" autocomplete="off">
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
                                    <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="<?= base_url(); ?>service/<?= $service->code; ?>"><i class="bi bi-arrow-right me-2"></i><?= $service->title; ?></a>
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
                            <img src="./Assets/Re_ Blog_banner images/QA.jpg" alt="" class="img-fluid rounded">
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
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </section>
</main>

<script>
    function reply(id) {
        $("#parent_id").val(id);
        $("#name").focus();
        $("#head").text('Reply To Comment');
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    // Function to generate the local CAPTCHA
    function generateCaptcha() {
        var num1 = getRandomInt(10, 20);
        var num2 = getRandomInt(1, 10);

        // Display the numbers in the CAPTCHA label
        $("#num1").text(num1);
        $("#num2").text(num2);

        // Store the correct result in a hidden input field
        $("#captchaResult").val(num1 + num2);
    }
    $(document).ready(function() {

        // Call the function to generate the initial CAPTCHA
        generateCaptcha();

        $("#contactForm").submit(function(e) {
            e.preventDefault();

            // Get user's input and the correct result
            var userInput = parseInt($("#captcha").val(), 10);
            var correctResult = parseInt($("#captchaResult").val(), 10);

            // Validate the CAPTCHA
            if (isNaN(userInput) || userInput !== correctResult) {
                alert("Incorrect CAPTCHA. Please solve the math problem correctly.");
                return;
            }

            // AJAX code for form submission
            $.ajax({
                type: "POST",
                url: "<?= base_url(); ?>frontend/add_comment",
                data: {
                    name: $("#name").val(),
                    email: $("#email").val(),
                    comment: $("#comment").val(),
                    parent_id: $("#parent_id").val(),
                    blog_id: <?= $details->id; ?>
                },
                dataType: "text",
                success: function(data) {
                    // Handle the success response
                    $("#thank-you-popup").show();
                    setTimeout(function() {
                        $("#thank-you-popup").hide();
                    }, 5000); //15 sec
                },
                error: function(error) {
                    // Handle the error response
                    alert("Error submitting the form. Please try again later.");
                }
            });
            this.reset();
            $("#parent_id").val(0);

            // Generate a new CAPTCHA for the next submission
            generateCaptcha();
        });

        var x = 1;
        $("#loadMore").click(function(e) {
            $.ajax({
                type: "GET",
                url: "<?= base_url(); ?>frontend/load_comments/<?= $details->id; ?>/" + x,
                dataType: "text",
                success: function(data) {
                    if (data != '') {
                        $('#add_comments').append(data);
                    } else {
                        $('#loadMore').parent().parent().hide();
                        alert("No more comments found.");
                    }
                },
                error: function(error) {
                    alert("Error. Please try again later.");
                }
            });
            x++;
        });
    });
</script>