<?php

use App\OfferFilter\Factory\JsonOfferCollectionFactory;
use App\OfferFilter\Service\JsonOfferFilterCommandHandler;
use App\OfferFilter\Service\JsonOfferReader;
use App\OfferFilter\Service\OfferFilterComandProcessor;

require_once __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

$reader       = new JsonOfferReader(new JsonOfferCollectionFactory());
$collection   = $reader->read('[
        {
            "offerId": 123,
            "productTitle": "Coffee machine",
            "vendorId": 35,
            "price": 390.4
        },
        {
            "offerId": 124,
            "productTitle": "Napkins",
            "vendorId": 35,
            "price": 15.5
        },
        {
            "offerId": 125,
            "productTitle": "Chair",
            "vendorId": 84,
            "price": 230.0
        }
    ]');

$processor = new OfferFilterComandProcessor(
    new JsonOfferFilterCommandHandler($collection)
);

$processor->run();




