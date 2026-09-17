<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Prdazk Portfolio</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('upload/favicon.png') }}" rel="icon">
    <link href="{{ asset('upload/favicon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('Frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('Frontend/assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">


    <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Apr 4 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style>
    .topbar {
        background: #163d30;
    }

    .header {
        background: #163d30 !important;
    }

    .hero {
        background: #17402f !important
    }

    .icon-box {
        background: #235542 !important;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .icon-box:hover {
        background: #2a6350 !important;
    }

    .contact .info-container {
        background: #163d30 !important;
    }

    .contact .info-item {
        background: #235542 !important
    }

    .contact .info-item i {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .contact .php-email-form button[type=submit] {
        background: #367559 !important;
    }

    .contact .php-email-form button[type=submit]:hover {
        background: #3f8465 !important;
    }

    .breadcrumbs .page-header {
        background: #163d30;
    }

    .footer {
        background: #12332a !important
    }

    @media (max-width: 1279px) {
        .navbar ul {
            background: #12332a !important;
        }
    }
</style>

<body>

    @include('Frontend.body.topbar')

    @include('Frontend.body.header')

    <!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <a href="/">
                <img src="{{asset('upload/monster-404-error-concept-illustration_114360-1879.avif')}}" />

            </a>
            
            

        </div>
      </div>

    </div>
  </section><!-- End Frequently Asked Questions Section -->


    <!-- ======= Footer ======= -->
    @include('Frontend.body.footer')
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('Frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('Frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <script src="{{ asset('Frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

   



</body>

</html>
