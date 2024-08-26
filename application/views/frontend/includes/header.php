<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P32P4LJV');
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Shiv Soft Experts",
            "url": "https://shivsoftexperts.com/",
            "logo": "https://shivsoftexperts.com/Assets/Shiv_logo.png",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "",
                "contactType": "customer service",
                "areaServed": ["US", "IN"],
                "availableLanguage": "en"
            },
            "sameAs": "https://www.linkedin.com/company/shiv-software-experts/?originalSubdomain=in"
        }
    </script>
    <!-- End Google Tag Manager -->
    <link rel="canonical" href="https://shivsoftexperts.com">
    <meta charset="UTF-8" />
    <meta name="author" content="Aireddy Dineshreddy">
    <meta name="author" content="Raja Ramesh">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,regular,500,600,700,800,300italic,italic,500italic,600italic,700italic,800italic" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <!-- <script src="https://unpkg.com/scrollreveal"></script> -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css" />
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" />
    <!--Jquery -->
    <script src="<?= base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <title><?= $settings->full_title; ?></title>
    <meta name="description" content="<?= (isset($meta_data)) ? $meta_data : $meta_data1; ?>">
    <meta name="title" content="<?= (isset($meta_title)) ? $meta_title : "shivsoftexperts"; ?>">
    <link rel="shortcut icon" href="<?= base_url() . $settings->favicon; ?>" />
	<script src="https://p.usestyle.ai" defer></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P32P4LJV" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!--====== Header Section Start ======-->
    <header id="header" class="d-flex align-items-center">
        <nav class="navbar navbar-expand-lg navbar-light navbar-shadow">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <img src="<?= base_url($settings->logo); ?>" alt="img" class="img-fluid" width="160px" height="140px" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- <span><i class="ri-menu-3-line"></i></span> -->
                    <!-- <span class="navbar-toggler-icon"></span> -->
                    <span> </span>
                    <span> </span>
                    <span> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-md-auto gap-3">
                        <li class="nav-item <?= ($unique_name == 'home') ? 'active' : ''; ?>">
                            <a class="nav-link  nav-link-grow-up" aria-current="page" href="<?= base_url(); ?>"><i class="bi bi-house-fill me-2"></i>Home</a>
                        </li>
                        <li class="nav-item dropdown <?= ($unique_name == 'why_shivsoft' || $unique_name == 'our_process' || $unique_name == 'blogs' || $unique_name == 'career') ? 'active' : ''; ?>">
                            <a class="nav-link" href="#" onclick="event.preventDefault();"><i class="bi bi-people-fill me-2"></i>Discover</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url(); ?>why-shivsoft">Why ShivSoft?</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url(); ?>our-process">OUr Process</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url(); ?>blogs">Blog</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url(); ?>career">Careers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= ($unique_name == 'about_us') ? 'active' : ''; ?>">
                            <a class="nav-link nav-link-grow-up" href="<?= base_url(); ?>about-us"><i class="bi bi-telephone-fill me-2"></i>About
                                Us</a>
                        </li>
                        <li class="nav-item <?= ($unique_name == 'service') ? 'active' : ''; ?> dropdown">
                            <a class="nav-link" href="#" onclick="event.preventDefault();"><i class="bi bi-person-fill me-2"></i>Services</a>
                            <ul class="dropdown-menu">
                                <?php foreach ($services as $service) { ?>
                                    <li>
                                        <a href="<?= base_url(); ?>service/<?= $service->code; ?>" class="dropdown-item"><?= $service->title; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item <?= ($unique_name == 'staffing') ? 'active' : ''; ?> dropdown">
                            <a class="nav-link" href="#" onclick="event.preventDefault();"><i class="bi bi-telephone-fill me-2"></i>Staffing Solution</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url(); ?>staff-augmentation">Staff Augmentation</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url(); ?>payroll">PayRoll services</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?= ($unique_name == 'contact_us') ? 'active' : ''; ?>">
                            <a class="nav-link nav-link-grow-up" href="<?= base_url(); ?>contact-us"><i class="bi bi-telephone-fill me-2"></i>Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
