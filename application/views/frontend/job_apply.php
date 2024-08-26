<main>
    <div class="subpagewrapper serviceofferingssubpage" style="background-image: url('<?= base_url($details->banner); ?>')">
        <div class="hextop-right">
            <img src="<?= base_url($details->small_banner); ?>">
        </div>
    </div>
    <!-- about_us block dineshreddy -->
    <section class="hero-bottom">
        <div class="hexbottomright">
            <img src="<?= base_url('assets/images'); ?>/homehex-1-bottom.png">
        </div>
    </section>
    <!-- Job apply form Start -->
    <section class="section bg-light py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-7">
                    <div class="card border-0 w-100 p-0">
                        <form class="rounded shadow p-4" id="form" method="post" enctype="multipart/form-data" action="<?= base_url(); ?>frontend/job_apply/<?= $details->id; ?>">
                            <input type="hidden" id="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                            <input type="hidden" name="career_id" require class="form-control" readonly value="<?= $details->id; ?>">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Full Name<span class="text-danger">*</span></label>
                                        <input name="name" require type="text" class="form-control" placeholder="Full Name">
                                    </div>
                                </div><!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Email<span class="text-danger">*</span></label>
                                        <input name="email" require type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div><!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Phone Number<span class="text-danger">*</span></label>
                                        <input name="phone_number" maxlength="20" require type="number" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div><!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Job Title</label>
                                        <input name="job_type" type="text" require class="form-control" readonly value="<?= $details->job_type; ?>">
                                    </div>
                                </div><!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Employement Type</label>
                                        <input name="employ_type" type="text" require class="form-control" readonly value="<?= $details->employ_type; ?>">
                                    </div>
                                </div><!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Description</label>
                                        <textarea name="description" rows="4" class="form-control" placeholder="Describe Yourself(Optional)"></textarea>
                                    </div>
                                </div><!--end col-->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label fw-semibold">Upload Your Cv / Resume</label>
                                        <input class="form-control" onchange="check_file_size('resume')" name="resume" require accept="application/msword, application/pdf" type="file" id="resume">
                                    </div>
                                </div><!--end col-->

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-control">What is <span id="num1"></span> + <span id="num2"></span> = ? <i class="ri-refresh-fill" onclick="generateCaptcha()" style="float: right;line-height: 25px;font-size: 32px;"></i></label>
                                    </div>
                                </div><!--end col-->

                                <div class="col-6">
                                    <div class="mb-3">
                                        <input required type="text" class="form-control" name="captcha" id="captcha" placeholder="Enter the result">
                                        <input type="hidden" id="captchaResult" name="captchaResult">
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                            <div class="row justify-content-md-center">
                                <div class="col-3">
                                    <button type="submit" name="submit" value="submit" class="btn apply-job">Apply Now <i class="fa fa-paper-plane-top"></i></button>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div><!--end custom-form-->
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- Job apply form End -->
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

        // $("#form").submit(function(event) {
        //     event.preventDefault(); // Prevent the default form submission
        //     var userCaptcha = $("#captcha").val();
        //     var captchaResult = $("#captchaResult").val();
        //     if (userCaptcha == captchaResult) {
        //         // $("form").unbind('submit').submit();
        //         // $('button[name="submit"]').click();
        //         $('#form').submit();
        //     } else {
        //         alert("Captcha is incorrect. Please try again.");
        //         generateCaptcha(); // Refresh the captcha
        //     }
        // });
    });

    <?php if (isset($_GET['succ']) && $_GET['succ'] == 'captchafail') { ?>
        alert("Captcha not matched please try again.");
    <?php } ?>



    function check_file_size(val) {
        var uploadField = document.getElementById(val);
        var FileName = uploadField.files[0].name;
        var FileExtension = FileName.split('.')[FileName.split('.').length - 1]; //alert(FileExtension);
        if (!(FileExtension == 'pdf' || FileExtension == 'doc' || FileExtension == 'docx' || FileExtension == 'PDF' || FileExtension == 'DOC' || FileExtension == 'DOCX')) {
            alert('Please Upload Files(PDF/DOC) Only');
            document.getElementById(val).value = "";
        } else if (uploadField.files[0].size > 5000000) {
            alert('Max upload size 5 MB');
            document.getElementById(val).value = "";
        }
    }
</script>