<?php declare(strict_types=1);

namespace App\MetroOffer\Service;

use App\MetroOffer\Contract\OfferCollectionInterface;
use App\MetroOffer\Contract\OfferFilterCommandHandlerInterface;
use App\MetroOffer\Dto\OfferCollection;
use FilterIterator;

class JsonOfferFilterCommandHandler implements OfferFilterCommandHandlerInterface
{
    private OfferCollectionInterface $offerCollection;

    public function __construct(OfferCollectionInterface $offerCollection)
    {
        $this->offerCollection = $offerCollection;
    }

    public function countOfferfilteredByPriceRange(float $priceFrom, float $priceTo): int
    {
        $iterator = new FilterByPriceRangeIterator(
            $this->offerCollection->getIterator(),
            $priceFrom,
            $priceTo
        );

        return $this->getOfferCount($iterator);
    }

    public function countOfferfilteredByVendorId(int $vendorId): int
    {
        $iterator = new FilterByVendorIdIterator(
            $this->offerCollection->getIterator(),
            $vendorId
        );

        return $this->getOfferCount($iterator);
    }

    private function getOfferCount(
        FilterIterator $iterator
    ): int {
        $offers = [];
        foreach ($iterator as $item) {
            $offers[] = $item;
        }

        $collection = new OfferCollection(...$offers);

        return is_countable($collection->getIterator())
            ? iterator_count($collection->getIterator()) : 0;
    }
}
