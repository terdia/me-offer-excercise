<?php declare(strict_types=1);

namespace App\MetroOffer\Factory;

use App\MetroOffer\Contract\OfferCollectionFactoryInterface;
use App\MetroOffer\Contract\OfferCollectionInterface;
use App\MetroOffer\Dto\Offer;
use App\MetroOffer\Dto\OfferCollection;

class JsonOfferCollectionFactory implements OfferCollectionFactoryInterface
{

    public function createCollection(string $input): OfferCollectionInterface
    {
        $offerArray = json_decode($input, true, 512, JSON_THROW_ON_ERROR);

        $offers = [];
        foreach ($offerArray as $item) {
            $offers[] = $this->createOffer($item);
        }

        return new OfferCollection(...$offers);
    }

    private function createOffer(array $item): Offer
    {
        $offerId      = $item['offerId'] ?? null;
        $productTitle = $item['productTitle'] ?? null;
        $vendorId     = $item['vendorId'] ?? null;
        $price        = $item['price'] ?? null;

        return new Offer($offerId, $productTitle, $vendorId, $price);
    }
}
