<?php

    include '../vendor/autoload.php';

    from('Sohoa')
        ->import('Framework.Bootstrap');

    $application = new \Sohoa\Framework\Framework(); // The application is started !
    $application->run(); 
