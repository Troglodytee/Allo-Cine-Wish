<?php
    define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'].'/allo-cine-wish');
    define('ROOT_PATH', 'http://localhost/allo-cine-wish');

    define('API_PATH', 'https://api.themoviedb.org/3/');
    define('API_KEY', '98784ac75a5ac8233f488e9d8f15b662');
    define('API_LANGUAGE', 'fr-FR');
    define('API_ORIGINAL_IMAGES_PATH', 'https://image.tmdb.org/t/p/original');
    define('API_SMALL_IMAGES_PATH', 'https://image.tmdb.org/t/p/w500');

    define('MAX_RESEARCH_LENGTH', 64);

    define('GENRE_COLORS', [
        12    => ['007f00', 'ffffff'],
        14    => ['ffbb00', '000000'],
        16    => ['ffffaa', '000000'],
        18    => ['aa1111', 'ffffff'],
        27    => ['ff0000', '000000'],
        28    => ['ff7f00', '000000'],
        35    => ['ffff00', '000000'],
        36    => ['4b2591', 'ffffff'],
        37    => ['804400', 'ffffff'],
        53    => ['da2323', 'ffffff'],
        80    => ['000000', 'ffffff'],
        99    => ['7f7fff', '000000'],
        878   => ['00ccff', '000000'],
        9648  => ['49e462', '000000'],
        10402 => ['cc00ff', '000000'],
        10749 => ['ff009d', '000000'],
        10751 => ['0055ff', 'ffffff'],
        10752 => ['919191', '000000'],
        10770 => ['07be81', '000000'],
    ]);
?>