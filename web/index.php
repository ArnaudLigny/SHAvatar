<?php
require_once __DIR__.'/../vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

$app = new Silex\Application();

$app['debug'] = true;

$app->get('/avatar/{hash}', function ($hash) use ($app) {
    $image = __DIR__.'/images/'.$hash.'-80x80.jpg';
    $size  = $app['request']->get('s');

    if (file_exists($image)) {
        // readfile
        if (!isset($size)) {
            $stream = function () use ($image) {
                readfile($image);
            };
        // resize
        } else {
            $stream = function () use ($image, $size) {
                echo Image::make($image)->resize($size, $size)->response();
            };
        }
    // gravatar fallback
    } else {
        $stream = function () use ($hash) {
            readfile('http://www.gravatar.com/avatar/'.$hash.'.jpg');
        };
    }

    return $app->stream($stream, 200, array('Content-Type' => 'image/jpg'));
})
->assert('hash', '[a-f0-9]{32}');

$app->run();