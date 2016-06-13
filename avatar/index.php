<?php
/*
 * Copyright (c) Arnaud Ligny <arnaud@ligny.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// trying to find autoload file
switch (true) {
    case (file_exists(__DIR__.'/../../vendor/autoload.php')):
        require __DIR__.'/../../vendor/autoload.php';
        break;
    case (file_exists(__DIR__.'/../vendor/autoload.php')):
        require __DIR__.'/../vendor/autoload.php';
        break;
    default:
        echo 'Unable to locate Composer autoloader.'.PHP_EOL;
}

use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\ImageManagerStatic as Image;

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/{hash}', function ($hash) use ($app) {
    $image = __DIR__.'/images/'.$hash.'-80x80.jpg';
    $size  = $app['request']->get('s');
    // read file if exists
    if (file_exists($image)) {
        // readfile directly
        if (!isset($size)) {
            $stream = function () use ($image) {
                readfile($image);
            };
        // resize if "size" is set in the query string
        } else {
            $stream = function () use ($image, $size) {
                echo Image::make($image)->resize($size, $size)->response();
            };
        }
    // gravatar fallback if file doesn't exists
    } else {
        return $app->redirect('http://www.gravatar.com/avatar/'.$hash.'.jpg');
    }
    return $app->stream($stream, 200, array('Content-Type' => 'image/jpg'));
})
->assert('hash', '[a-f0-9]{32}'); // assert hash is a valid md5 string

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }
    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }
    return new Response($message);
});

$app->run();
