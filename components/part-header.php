<?php
/**
 * @package web-rtpslot
 * @since 1.0.0
 */

global $meta, $link;

?>

<header class="container py-1 bg-color-1">
    <div class="row">
        <div class="col">
            <a href="#"><amp-img class="logo" src="assets/images/logo.webp" width="100" height="50" alt="Pancaspin"></amp-img></a>
        </div>
        <div class="col-auto">
            <div class="row gap-10">
                <div class="col-auto"><a href="<?php echo $link->login; ?>" class="btn btn-login">Login</a></div>
                <div class="col-auto"><a href="<?php echo $link->daftar; ?>" class="btn btn-daftar round">Daftar</a></div>
            </div>
        </div>
    </div>
</header>
