<?php

namespace {

    use Sohoa\Framework\Framework;

    require_once __DIR__ . '/../vendor/autoload.php';

$router = new \Hoa\Router\Http();
$router
    ->any('a', '.*', function ( \Hoa\Dispatcher\Kit $_this ) {

        $uri = $_this->router->getURI();
        $file = __DIR__ . DS . $uri;

        if(!empty($uri) && true === file_exists($file)) {

            $stream = new \Hoa\File\Read($file);
            $mime = new \Hoa\Mime($stream);

            header('Content-Type: ' . $mime->getMime());
            echo $stream->readAll();

            return;
        }

        Framework::initialize(__DIR__);

        require 'index.php';
    });

$dispatcher = new \Hoa\Dispatcher\Basic();
$dispatcher->dispatch($router);

}
