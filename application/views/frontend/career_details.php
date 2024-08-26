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
    <!-- Start -->
    <section class="section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card bg-white rounded shadow sticky-bar w-100">
                        <div class="p-4">
                            <h5 class="mb-0">Job Information</h5>
                        </div>

                        <div class="card-body p-4 border-top">
                            <div class="d-flex widget align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout fea icon-ex-md me-3">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-0">Company Name:</h6>
                                    <small class="text-primary mb-0"><?= $details->company_name; ?></small>
                                </div>
                            </div>
                            <div class="d-flex widget align-items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check fea icon-ex-md me-3">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <polyline points="17 11 19 13 23 9"></polyline>
                                </svg>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-0">Job ID:</h6>
                                    <small class="text-primary mb-0">SSE<?= sprintf("%03d", $details->id); ?></small>
                                </div>
                            </div>

                            <div class="d-flex widget align-items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check fea icon-ex-md me-3">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <polyline points="17 11 19 13 23 9"></polyline>
                                </svg>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-0">Employement Type:</h6>
                                    <small class="text-primary mb-0"><?= $details->employ_type; ?></small>
                                </div>
                            </div>

                            <div class="d-flex widget align-items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin fea icon-ex-md me-3">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-0">Location:</h6>
                                    <small class="text-primary mb-0"><?= $details->location; ?></small>
                                </div>
                            </div>

                            <div class="d-flex widget align-items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor fea icon-ex-md me-3">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                    <line x1="8" y1="21" x2="16" y2="21"></line>
                                    <line x1="12" y1="17" x2="12" y2="21"></line>
                                </svg>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-0">Job Type:</h6>
                                    <small class="text-primary mb-0"><?= $details->job_type; ?></small>
                                </div>
                            </div>

                            <div class="d-flex widget align-items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase fea icon-ex-md me-3">
                                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                </svg>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-0">Experience:</h6>
                                    <small class="text-primary mb-0"><?= $details->experience; ?></small>
                                </div>
                            </div>

                            <div class="d-flex widget align-items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book fea icon-ex-md me-3">
                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                </svg>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-0">Qualifications:</h6>
                                    <small class="text-primary mb-0"><?= $details->qualifications; ?></small>
                                </div>
                            </div>

                            <div class="d-flex widget align-items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign fea icon-ex-md me-3">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-0">Salary:</h6>
                                    <small class="text-primary mb-0"><?= $details->salary; ?></small>
                                </div>
                            </div>

                            <div class="d-flex widget align-items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock fea icon-ex-md me-3">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-0">Date posted:</h6>
                                    <small class="text-primary mb-0 mb-0"><?= $details->created_date; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-8 col-md-6 col-12 job-description">
                    <h5>Job Description: </h5>
                    <?= $details->description; ?>

                    <h5 class="mt-4">Responsibilities and Duties: </h5>
                    <div id="responsibilities"><?= $details->responsibilities; ?></div>

                    <h5 class="mt-4">Required Experience, Skills and Qualifications: </h5>
                    <div id="skills_qualifications"><?= $details->skills_qualifications; ?></div>


                    <div class="mt-4">
                        <a href="<?= base_url(); ?>job_apply/<?= $details->id; ?>" class="btn apply-job">Apply Now <i class="fa fa-paper-plane-top"></i></a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center mb-4 pb-2">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h4 class="title ">Related Vacancies</h4>
                        <!-- mb-3 -->
                        <!-- <p class="text-muted para-desc mx-auto mb-0">Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p> -->
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <!-- mt-4 pt-2 -->
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
        </div><!--end container-->
    </section>
    <!-- End -->
</main>

<script>
    $('#responsibilities ul, #skills_qualifications ul').addClass('list-unstyled');
    $('#responsibilities ol, #skills_qualifications ol').addClass('list-unstyled');
    $('#responsibilities li, #skills_qualifications li').addClass('text-muted mt-2');
    $('#responsibilities li, #skills_qualifications li').prepend('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right fea icon-sm text-primary me-2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>');
    <?php if (isset($_GET['succ']) && $_GET['succ'] == 'true') { ?>
        alert('Application subbmited successfully');
    <?php } ?>
</script>