<?php
/**
 * @package web-rtpslot
 * @since 1.0.0
 */

global $meta, $link;

?>

<!DOCTYPE html>
<html ⚡ lang="id">
    <head>
        <!-- title -->
        <title><?php echo $meta->title; ?></title>
        
        <!-- meta -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="<?php echo $meta->description; ?>">
        <meta name="keywords" content="<?php echo $meta->keywords; ?>">
        <meta name="author" content="<?php echo $meta->author; ?>">
        <meta name="language" content="id">
        <meta name="robots" content="noindex, nofollow">
        <meta name="geo.placename" content="Indonesia">
        <meta name="geo.country" content="ID">
        <meta name="language" content="ID">
        <meta name="tgn.nation" content="Indonesia">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@<?php echo $meta->author; ?>">
        <meta name="twitter:creator" content="@slot_<?php echo $meta->author; ?>">
        <meta name="twitter:title" content="<?php echo $meta->title; ?>">
        <meta name="twitter:description" content="<?php echo $meta->description; ?>">
        <meta name="twitter:image" content="assets/images/unduh-m.jpg">
        <meta name="theme-color" content="#fff">
        <meta property="og:title" content="<?php echo $meta->title; ?>">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $meta->description; ?>">
        <meta property="og:image" content="assets/images/unduh-m.jpg">
        <meta property="og:url" content="<?php echo $link->base; ?>">
        
        <!-- link -->
        <link rel="canonical" href="<?php echo $link->base; ?>">
        <link rel="shortcut icon" href="assets/images/favicon.webp">
        <link rel="apple-touch-icon" href="assets/images/favicon.webp">
        <link rel="icon" href="assets/images/favicon.webp">

        <!-- style -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preload" href="https://files.sitestatic.net/banners/652d4e0de2306_Mobile1.webp" as="style" />
        <link rel="preload" href="https://files.sitestatic.net/banners/652d4e14746a4_Mobile3.webp" as="style" />
        <link rel="preload" href="https://files.sitestatic.net/banners/6556c33a944df_Mobile3.webp" as="style" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <style amp-boilerplate>
            body {
                -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
                -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
                -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
                animation: -amp-start 8s steps(1, end) 0s 1 normal both
            }

            @-webkit-keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }

            @-moz-keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }

            @-ms-keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }

            @-o-keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }

            @keyframes -amp-start {
                from {
                    visibility: hidden
                }

                to {
                    visibility: visible
                }
            }
        </style>
        <noscript>
            <style amp-boilerplate>
                body {
                    -webkit-animation: none;
                    -moz-animation: none;
                    -ms-animation: none;
                    animation: none
                }
            </style>
        </noscript>
        <style amp-custom>
            <?php echo load_css( 'fonts' ); ?>
            <?php echo load_css( 'color' ); ?>
            <?php echo load_css( 'layout' ); ?>
            <?php echo load_css( 'components' ); ?>
            <?php echo load_css( 'responsive' ); ?>
            <?php echo load_css( 'animations' ); ?>
        </style>

        <!-- script -->
        <script async src="https://cdn.ampproject.org/v0.js"></script>
        <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
        <script async custom-element="amp-anim" src="https://cdn.ampproject.org/v0/amp-anim-0.1.js"></script>
        <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
        <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
        <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
        <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.2.js"></script>
        <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
        <script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
    </head>

    <body>
        <?php get_component( 'header' ); ?>
