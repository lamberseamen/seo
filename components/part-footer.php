<?php
/**
 * @package web-rtpslot
 * @since 1.0.0
 */

global $meta, $link;

?>

<footer class="container py-1">
    <div class="row">
        <div class="col-auto">
            <ul class="menu menu-footer">
                <li class="menu-item"><a href="/" class="menu-link">Tentang Kami</a></li>
                <li class="menu-item"><a href="/" class="menu-link">Pusat Info</a></li>
                <li class="menu-item"><a href="/" class="menu-link">Hubungi Kami</a></li>
            </ul>
        </div>
        <div class="col-auto">
            <p class="text-light mb-0">&copy; <?php echo $meta->author; ?>, All rights reserved.</p>
        </div>
    </div>
</footer>

<section class="fixed-bottom bg-gradient-1">
    <div class="quick-menu">
        <a href="/" class="quick-menu__item text-center">
            <i class="fi fi-sr-home"></i><span>Home</span>
        </a>
        <a href="<?php echo $link->promosi; ?>" class="quick-menu__item text-center">
            <i class="fi fi-ss-gift"></i><span>Promosi</span>
        </a>
        <a href="<?php echo $link->daftar; ?>" class="quick-menu__item text-center round">
            <i class="fi fi-sr-circle-user"></i><span>Daftar</span>
        </a>
        <a href="<?php echo $link->whatsapp; ?>" class="quick-menu__item text-center">
            <i class="fi fi-brands-whatsapp"></i><span>Whatsapp</span>
        </a>
        <a href="<?php echo $link->livechat; ?>" class="quick-menu__item text-center">
            <i class="fi fi-ss-messages-question"></i><span>Livechat</span>
        </a>
    </div>
</section>
