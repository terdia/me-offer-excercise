<?php declare(strict_types=1);

namespace Tests\MetroOffer\Service;

use App\MetroOffer\Contract\OfferCollectionInterface;
use App\MetroOffer\Factory\JsonOfferCollectionFactory;
use App\MetroOffer\Service\JsonOfferFilterCommandHandler;
use App\MetroOffer\Service\JsonOfferReader;
use PHPUnit\Framework\TestCase;

class JsonOfferFilterCommandHandlerTest extends TestCase
{

    public function testItFoundTwoOfferWhenGivenValidData(): void
    {
        $reader     = new JsonOfferReader(new JsonOfferCollectionFactory());
        $collection = $this->getCollection($reader);
        $handler = new JsonOfferFilterCommandHandler($collection);

        $result  = $handler->countOfferfilteredByVendorId(35);

        self::assertSame(2, $result);
    }

    //todo clean-up
    private function getCollection(JsonOfferReader $reader): OfferCollectionInterface
    {
        return $reader->read(
            '[
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
    ]'
        );
    }
}
