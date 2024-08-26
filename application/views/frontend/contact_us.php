<link rel="stylesheet" href="<?= base_url(); ?>assets/css/contact-us.css">
<main>
    <section class="contact-section" style="background-image: url(<?= base_url(); ?>assets/images/Contact_banner.jpg);">
        <div class="container">
            <div class="row align-items-center text-white">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="contact-left-text">
                        <div class="ready-to-talk-title mb-5 text-white">
                            <h1><?= $website_data->contact_us_heading; ?></h1>
                        </div>
                        <div class="contact-description mb-5">
                            <p><?= $website_data->contact_us_description; ?></p>
                        </div>
                        <div class="contact-info  mb-3">
                            <h6>CONTACT INFO
                            </h6>
                        </div>
                        <div class="contact-address">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <span><i class="fa fa-envelope me-3"></i></i><?= $settings->support_mail; ?></span>
                                </li>
                                <?php foreach ($branches as $branch) { ?>
                                    <li class="mb-3 d-flex">
                                        <span><i class="fas fa-map-marker-alt me-3"></i></span>
                                        <p><b><?= $branch->branch_name; ?>:</b><br> <?= $branch->address; ?></p>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 align-items-center">
                    <div class="d-flex justify-content-end">
                        <div id="thank-you-popup">
                            <h2 class="popup-heading">Thank's For Choosing Us Shiv Software Experts</h2>
                            <p class="popup-message">Our Team Will Be Get Back To You Shortly</p>
                        </div>
                        <form class="mb-5 contact-box" id="contactForm" method="post" action="<?= base_url('frontend/add_contact_us'); ?>">
                            <input type="hidden" id="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                            <div class="form-group  mt-3">
                                <input required type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <input required type="email" class="form-control" name="email" id="email" placeholder="John@gmail.com">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <input required type="tel" class="form-control" oninvalid="this.setCustomValidity('Please fill out this field with country code')" oninput="setCustomValidity('')" name="phone" id="phone" pattern="^[+]{1}(?:[0-9\-\(\)\/\.]\s?){6,15}[0-9]{1}$" placeholder="Phone Number With Country Code">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <input required type="text" class="form-control" name="companyname" id="companyname" placeholder="Company Name">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Your Message(Optional)"></textarea>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label class="form-control mb-3">What is <span id="num1"></span> + <span id="num2"></span> = ? <i class="ri-refresh-fill" onclick="generateCaptcha()" style="float: right;line-height: 25px;font-size: 32px;"></i></label>
                                <input required type="text" class="form-control" name="captcha" id="captcha" placeholder="Enter the result">
                                <input type="hidden" id="captchaResult" name="captchaResult">
                            </div>
                            <div class="submit-button mb-3 mt-3">
                                <input type="submit" value="Send" name="submit" class="btn btn-block py-2 px-4">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
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

        // $("#contactForm").submit(function(e) {
        //     e.preventDefault();

        //     // Get user's input and the correct result
        //     var userInput = parseInt($("#captcha").val(), 10);
        //     var correctResult = parseInt($("#captchaResult").val(), 10);

        //     // Validate the CAPTCHA
        //     if (isNaN(userInput) || userInput !== correctResult) {
        //         alert("Incorrect CAPTCHA. Please solve the math problem correctly.");
        //         return;
        //     }

        //     // AJAX code for form submission
        //     $.ajax({
        //         type: "POST",
        //         url: "<?= base_url(); ?>frontend/add_contact_us",
        //         data: {
        //             name: $("#name").val(),
        //             email: $("#email").val(),
        //             phone: $("#phone").val(),
        //             companyname: $("#companyname").val(),
        //             message: $("#message").val(),
        //             captcha_result: correctResult,
        //             <?= $this->security->get_csrf_token_name(); ?>: $("#csrf").val(),
        //         },
        //         dataType: "text",
        //         success: function(data) {
        //             // Handle the success response
        //             $("#thank-you-popup").show();
        //             setTimeout(function() {
        //                 $("#thank-you-popup").hide();
        //             }, 15000); //15 sec
        //         },
        //         error: function(error) {
        //             // Handle the error response
        //             alert("Error submitting the form. Please try again later.");
        //         }
        //     });
        //     this.reset();
        //     // Generate a new CAPTCHA for the next submission
        //     generateCaptcha();
        // });
    });
    <?php if (isset($_GET['succ']) && $_GET['succ'] == 'captchafail') { ?>
        alert("Captcha not matched please try again.");
    <?php } ?>
    <?php if (isset($_GET['succ']) && $_GET['succ'] == 'true') { ?>
        alert("Form submitted successfully.");
    <?php } ?>
</script>