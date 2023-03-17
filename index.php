<?php
    require_once('./my-config.php');

    require('vendor/autoload.php');
    use GuzzleHttp\Client;
    $GLOBALS['CLIENT'] = new Client(['base_uri' => API_PATH]);

    require_once(DOCUMENT_ROOT.'/route.php');
?>