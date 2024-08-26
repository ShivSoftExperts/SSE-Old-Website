<main>
    <div class="subpagewrapper serviceofferingssubpage" style="background-image: url('<?= base_url($website_data->career_banner); ?>'); position: relative;">
        <div class="hextop-right">
            <img src="<?= base_url($website_data->career_small_banner); ?>" />
        </div>
        <div class="container job-filter-container shadow">
            <div class="row justify-content-center">
                <div class="col-12 mb-md-5">
                    <div class="features-absolute">
                        <div class="d-md-flex justify-content-between align-items-center bg-white shadow rounded p-lg-4">
                            <form class="card-body text-start" method="get">
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-0">
                                        <div class="col-lg-3 col-md-6 col-12 mb-md-2">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Search :</label>
                                                <div class="filter-search-form position-relative filter-border bg-light d-flex align-content-center p-2">
                                                    <i class="ri-search-line"></i>
                                                    <input name="search" id="search" value="<?php if (isset($_GET['search'])) {
                                                                                                echo $_GET['search'];
                                                                                            } ?>" type="text" id="job-keyword" class="form-control filter-input-box bg-light border-0" placeholder="Job or Company Name">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12 mb-md-2">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Location:</label>
                                                <div class="filter-search-form position-relative filter-border bg-light d-flex align-content-center p-2">
                                                    <i class="ri-map-pin-line"></i>
                                                    <select class="form-select bg-light border-0" name="location" data-trigger id="location" aria-label="Default select example">
                                                        <option value="">Select Location</option>
                                                        <?php $locations = $this->db->select('location')->where('status', 'active')->group_by('location')->get('careers')->result();
                                                        foreach ($locations as $location) { ?>
                                                            <option value="<?= $location->location; ?>" <?php if (isset($_GET['location']) && $_GET['location'] == $location->location) {
                                                                                                            echo 'selected';
                                                                                                        } ?>><?= $location->location; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12 mb-md-2">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Type :</label>
                                                <div class="filter-search-form relative filter-border bg-light d-flex align-content-center p-2">
                                                    <i class="ri-briefcase-line"></i>
                                                    <select class="form-select bg-light border-0" name="employ_type" data-trigger id="employ_type" aria-label="Default select example">
                                                        <option value="">Select Employement Type</option>

                                                        <?php $items = $this->db->select('employ_type')->where('status', 'active')->group_by('employ_type')->get('careers')->result();
                                                        foreach ($items as $item) { ?>
                                                            <option value="<?= $item->employ_type; ?>" <?php if (isset($_GET['employ_type']) && $_GET['employ_type'] == $item->employ_type) {
                                                                                                            echo 'selected';
                                                                                                        } ?>><?= $item->employ_type; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12 mb-md-2">
                                            <input type="submit" class="btn btn-primary searchbtn w-100 p-2 job-search-filter">
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                            </form><!--end form-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
    <!-- about_us block dineshreddy -->
    <section class="hero-bottom">
        <div class="hexbottomright">
            <img src="<?= base_url('assets/images'); ?>/homehex-1-bottom.png" />
        </div>
    </section>
    <!-- Blog Start -->
    <!-- Start -->
    <section class="section py-5">

        <div class="container mt-60">
            <div class="row g-4" id="add_career">
                <?php foreach ($careers_list as $row) { ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="job-post rounded-3 shadow p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url($row->company_logo); ?>" style="max-width: 75px;" class="img-sm avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                    <div class="ms-3">
                                        <a href="<?= base_url(); ?>career_details/<?= $row->id; ?>" class="h5 company text-dark"><?= $row->company_name; ?></a>
                                        <span class="text-muted d-flex align-items-center small mt-2"><i class="ri-time-line me-1"></i><?= date('d M, Y', strtotime($row->created_date)); ?></span>
                                    </div>
                                </div>

                                <span class="badge bg-soft-primary"><?= $row->employ_type; ?></span>
                            </div>

                            <div class="mt-4">
                                <a href="<?= base_url(); ?>career_details/<?= $row->id; ?>" class="text-dark job-title h5"><?= $row->job_type; ?></a>

                                <span class="text-muted d-flex align-items-center mt-2"><i class="ri-map-pin-line me-1"></i><?= $row->location; ?></span>

                                <div class="progress-box mt-3">
                                    <div class="progress mb-2">
                                        <div class="progress-bar position-relative bg-primary" style="width:<?= ($row->applied_count / $row->total_vacancies) * 100; ?>%;"></div>
                                    </div>

                                    <span class="text-dark"><?= $row->applied_count; ?> applied of <span class="text-muted"><?= $row->total_vacancies; ?> vacancy</span></span>
                                </div>
                            </div>
                        </div><!--end job post-->
                    </div><!--end col-->
                <?php } ?>
            </div><!--end row-->

            <div class="row">
                <div class="col-12 mt-4 pt-2">
                    <div class="col-md-4 offset-md-4">
                        <button id="loadMore" class="explore-service-btn" type="button">Load More</button>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</main>

<script>
    $(document).ready(function() {
        var x = 1;
        $("#loadMore").click(function(e) {
            $.ajax({
                type: "GET",
                url: "<?= base_url(); ?>frontend/load_careers/" + x,
                data: {
                    search: $("#search").val(),
                    location: $("#location").val(),
                    employ_type: $("#employ_type").val(),
                },
                dataType: "text",
                success: function(data) {
                    if (data != '') {
                        $('#add_career').append(data);
                    } else {
                        $('#loadMore').parent().parent().hide();
                        alert("No more jobs found.");
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