<?php
/**
 * @package web-rtpslot
 * @since 1.0.0
 */

require_once './config.php';

define( 'EXCPATH', dirname( __FILE__ ) );

date_default_timezone_set( 'Asia/Samarkand' );

function get_header() {
    if ( file_exists( EXCPATH . '/header.php' ) ) {
        require_once EXCPATH . '/header.php';
    }
}

function get_footer() {
    if ( file_exists( EXCPATH . '/footer.php' ) ) {
        require_once EXCPATH . '/footer.php';
    }
}

function get_component( $file = 'pragmatic-play' ) {
    if ( file_exists( EXCPATH . '/components/part-' . $file . '.php' ) ) {
        require_once EXCPATH . '/components/part-' . $file . '.php';
    }
}

function get_providers() {
    $file_json = EXCPATH . '/database/list_provider.json';

    if ( file_exists( $file_json ) ) {
        $json = file_get_contents( $file_json );

        return json_decode( $json, true );
    }
}

function get_games( $provider = 'pragmatic-play' ) {
    $file_json = EXCPATH . '/database/games/' . $provider . '.json';

    if ( file_exists( $file_json ) ) {
        $json = file_get_contents( $file_json );

        return json_decode( $json, true );
    }
}

function load_css( $file ) {
    if ( file_exists( EXCPATH . '/assets/css/' . $file . '.css' ) ) {
        ob_start();

        require_once EXCPATH . '/assets/css/' . $file . '.css';

        $css = ob_get_contents();

        ob_end_clean();

        return $css;
    }
}

function set_rtp( $game, $index ) {
    date_default_timezone_set( 'Asia/Samarkand' );
    
    $date = intval( date( 'Y' ) ) * intval( date( 'm' ) ) * intval( date( 'd' ) );
    $week = intval( date( 'w', strtotime( date( 'Y-m-d' ) ) )) + 1;
    $hour = intval( date( 'H' ) );
    $rand = rand( 5, 9 );

    $percent = set_rtp_percent( $date, $week, $hour, $game['mixer'] );
    $rtppola = set_rtp_pola( $rand, $percent );
    $rtptime = set_rtp_time( $index, $date, $hour, $percent );
    $x_class = ( $percent > 60 ) ? 'green' : ( ( $percent < 30 ) ? 'red' : 'yellow' );

    return [ 'class' => $x_class, 'pola' => $rtppola, 'time' => $rtptime, 'percent' => $percent ];
}

function set_rtp_index( $numb = 1 ) {
        if ( $numb %  2 == true ) { return 3; }
    elseif ( $numb %  3 == true ) { return 5; }
    elseif ( $numb %  4 == true ) { return 6; }
    elseif ( $numb %  5 == true ) { return 1; }
    elseif ( $numb %  6 == true ) { return -1; }
    elseif ( $numb %  7 == true ) { return 3; }
    elseif ( $numb %  8 == true ) { return -4; }
    elseif ( $numb %  9 == true ) { return 4; }
    elseif ( $numb % 10 == true ) { return 5; }
    else { return 0; }
}

function set_rtp_percent( $date = '', $week = '', $hour = '', $mixs = 1 ) {
    date_default_timezone_set('Asia/Jakarta');

    $time = pow( ($week + $date), $hour );

    if ($mixs > 2500) {
        $math = [ 0 => 27, 1 => 65 ];
    } else {
        $math = [ 0 => 83, 1 => 8 ];
    }

    $numb = fmod( ($time * $mixs), $math[0] ) + $math[1];

    return ( ( $numb < 0 ) ? 12 : $numb );
}

function set_rtp_time( $index, $date, $hour, $percent ) {
    $time  = '';
    $timex = intval( ($percent % 2) + 1 );
    $time1 = intval( ($hour + $index) % 24 );
    $time2 = intval( ($time1 + $timex) % 24 );

    $mins1 = intval( $percent % 60 );
    $mins2 = intval( ($percent * $date) % 60 );

    $time .= ( ($time1 <= 1) ? '0'.$time1 : $time1 ) . ':';
    $time .= ( ($mins1 <= 9) ? '0'.$mins1 : $mins1 ) . ' - ';
    $time .= ( ($time2 <= 9) ? '0'.$time2 : $time2 ) . ':';
    $time .= ( ($mins2 <= 9) ? '0'.$mins2 : $mins2 );

    return $time;
}

function set_rtp_pola( $index = 1, $percent = 0 ) {
    $data_pola = '';
    $pola_icon = ["✅❌❌", "❌✅❌", "❌❌✅", "✅❌✅", "❌✅✅", "❌❌❌"];
    $pola_text = ["Auto", "Auto", "Manual 3", "Manual 5", "Manual 7", "Manual 9", "Auto", "Auto", "Auto", "Auto", "Auto", "Auto"];
    $pola_numb = [10, 20, 50, 70, 100];

    $n1 = $index % 6;
    $p1 = [ ($percent % 4), ($percent % 5), ($percent % 6) ];
    $n2 = $index % 5;
    $p2 = [ ($percent % 4), ($percent % 5), ($percent % 6) ];

    for ($j = 0; $j < 3; $j++) {
        for ($k = 0; $k < 3; $k++) {
            if ($p1[$j] == $p1[$k] && $j != $k) {
                $p1[$k] = ($p1[$k] + 1) % 6;
            }
        }
    }

    $p3 = [ (pow($p1[0], $p2[0]) % 12), (pow($p1[1], $p2[1]) % 12), (pow($p1[2], $p2[2]) % 12) ];

    for ($j = 0; $j < 3; $j++) {
        if ($pola_text[$p3[$j]] == "Auto") {
            $data_pola .= $pola_numb[$p2[$j]]." ".$pola_icon[$p2[$j]]." ".$pola_text[$p3[$j]].( ($j == 3) ? '' : '<br>' );
        } else {
            $data_pola .= $pola_text[$p3[$j]]." ".$pola_icon[$p1[$j]].( ($j == 3) ? '' : '<br>' );
        }
    }

    return $data_pola;
}

function tanggal_indo( $tanggal, $cetak_hari = true ) {
	$hari = [
		1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'
	];
			
	$bulan = [
		1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
	];

	$split 	  = explode( '-', $tanggal );
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	$num      = date( 'N', strtotime( $tanggal ) );

	return $hari[$num] . ', ' . $tgl_indo;
}
