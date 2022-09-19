<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="<?= CLAB__URL ?>assets/img/favicon.png">

	<?php wp_head(); ?>

    <!--web fonts-->


    <!--basic styles-->
    <link href="<?= CLAB__URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= CLAB__URL ?>assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="<?= CLAB__URL ?>assets/vendor/custom-icon/style.css" rel="stylesheet">
    <link href="<?= CLAB__URL ?>assets/vendor/vl-nav/css/core-menu.css" rel="stylesheet">
    <link href="<?= CLAB__URL ?>assets/vendor/animate.min.css" rel="stylesheet">
    <link href="<?= CLAB__URL ?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?= CLAB__URL ?>assets/vendor/owl/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= CLAB__URL ?>assets/vendor/owl/assets/owl.theme.default.min.css" rel="stylesheet">

    <!--custom styles-->
    <link href="<?= CLAB__URL ?>assets/css/main.css" rel="stylesheet">

    <!--[if (gt IE 9) |!(IE)]><!-->
    <!--<link rel="stylesheet" href="assets/vendor/custom-nav/css/effects/fade-menu.css"/>-->
    <link rel="stylesheet" href="<?= CLAB__URL ?>assets/vendor/vl-nav/css/effects/slide-menu.css"/>
    <!--<![endif]-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136585988-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-136585988-1');
    </script>
</head>

<body <?php body_class( 'bg-gray' ); ?>>