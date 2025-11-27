<?php
/**
 * @package web-rtpslot
 * @since 1.0.0
 */

global $meta, $link;

$prov_name = isset( $_GET['game'] ) ? $_GET['game'] : 'pragmatic-play';
$providers = get_providers( $prov_name );
$games     = get_games( $prov_name );

?>

<main class="container">
    <section class="full-width d-mobile">
        <amp-carousel type="slides" width="560" height="280" layout="responsive" loop autoplay delay="3000" data-next-button-aria-label="Next" data-prev-button-aria-label="Prev" role="region" aria-label="">
            <amp-img src="/assets/images/RtpM.png" width="560" height="280" layout="responsive" alt="Pancaspin"></amp-img>
        </amp-carousel>
    </section>
    <section class="full-width d-desktop">
        <amp-carousel type="slides" width="1536" height="344" layout="responsive" loop autoplay delay="3000" data-next-button-aria-label="Next" data-prev-button-aria-label="Prev" role="region" aria-label="">
            <amp-img src="https://i.postimg.cc/1X2rZjsZ/banner1.webp" width="1536" height="344" layout="responsive" alt="Pancaspin"></amp-img>
        </amp-carousel>
    </section>

    <section class="full-width">
        <div class="marquee-wrapper bg-gradient-4">
            <div class="marquee-text text-white">
                <span>SELAMAT DATANG DI <?php echo $meta->author; ?> | MENANG BERAPAPUN PASTI DIBAYAR | DEPO QRIS 1 DETIK.</span>
                <span class="d-desktop">SELAMAT DATANG DI <?php echo $meta->author; ?> | MENANG BERAPAPUN PASTI DIBAYAR | DEPO QRIS 1 DETIK.</span>
            </div>
        </div>
    </section>

    <section class="full-width d-mobile">
        <div class="row row-2 gap-0">
            <div class="col"><a href="<?php echo $link->login; ?>" class="btn btn-block btn-login">Login</a></div>
            <div class="col"><a href="<?php echo $link->daftar; ?>" class="btn btn-block btn-daftar">Daftar</a></div>
        </div>
    </section>

    <section class="provider-wrapper bg-color-9 mb-2">
        <div class="provider-list">
            <amp-carousel id="providers_slider" slide="0" height="90px" layout="fixed-height" type="carousel">
                <?php $n = 1; foreach ( (array)$providers as $provider ) : ?>
                    <a href="/?game=<?php echo $provider['code']; ?>" title="<?php echo $provider['name']; ?>" <?php echo ( $n == 1 ) ? 'class="current"' : ''; ?>>
                        <div class="provider_nav_item">
                            <amp-img src="<?php echo $provider['icon']; ?>" width="100" height="70" layout="fixed" alt="<?php echo $provider['name']; ?>"></amp-img>
                            <p class="text-white text-center text-normal mb-0"><?php echo $provider['name']; ?></p>
                        </div>
                    </a>
                <?php $n++; endforeach; ?>
            </amp-carousel>
        </div>
    </section>

    <section>
        <h1 class="text-white text-center text-uppercase mb-1">
            <span>RTP Slot <?php echo $providers[$prov_name]['name']; ?> Hari ini</span>
        </h1>
        <h5 class="text-white text-icon">
            <i class="fi fi-br-calendar-day"></i>&ensp;<?php echo tanggal_indo( date( 'Y-m-d' ) ); ?>
        </h5>
    </section>

    <section class="game-list py-2">
        <?php $numb = 1; foreach ( $games as $game ) : $index = set_rtp_index( $numb ); $rtp = set_rtp( $game, $index ); ?>
            <div class="game-wrapper">
                <div class="game-box">
                    <amp-img src="<?php echo $game['image']; ?>" width="200" height="200" layout="responsive" alt="<?php echo $game['title']; ?>"></amp-img>
                    <div class="game-info">
                        <div class="game-title text-white"><?php echo $game['title']; ?></div>
                    </div>
                    <div class="game-link">
                        <a href="<?php echo $link->base . $game['links']['play']; ?>" class="btn btn-play">PLAY</a>
                    </div>
                </div>
                <div class="game-pola <?php echo $rtp['class']; ?>">
                    <p class="text-black text-center mb-05">
                        <span><i><b>Jam</b></i> Panas :</span>
                    </p>
                    <p class="text-clock text-black text-center mb-05">
                        <i class="fi fi-sr-clock-three"></i><b><?php echo $rtp['time']; ?></b>
                    </p>
                    <hr>
                    <p class="text-black text-center mb-05">
                        <span><i><b>Pola</b></i> Gacor :</span>
                    </p>
                    <?php if ( $rtp['class'] == 'red' ) : ?>
                        <div class="game-pola__error">
                            <div class="error-icon"><i class="fi fi-sr-triangle-warning"></i></div>
                            <h3 class="text-center mb-0">WARNING!</h3>
                            <h4 class="text-center mb-0"><small>Pola belum tersedia untuk saat ini</small></h4>
                        </div>
                    <?php else : ?>
                        <p class="text-black text-pola text-center mb-0"><?php echo $rtp['pola']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="game-progress">
                    <div class="percent-bar <?php echo $rtp['class']; ?>" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?php echo $rtp['percent']; ?>" style="width: <?php echo $rtp['percent']; ?>%;"></div>
                    <p style="z-index: 15;"><?php echo $rtp['percent']; ?>%</p>
                </div>
            </div>
        <?php $numb++; endforeach; ?>
    </section>
</main>
