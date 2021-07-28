<?php declare(strict_types=1);

namespace App\MetroOffer\Service;

use App\MetroOffer\Dto\Offer;
use Iterator;

class FilterByPriceRangeIterator extends \FilterIterator
{
    private float $priceFrom;
    private float $priceTo;

    public function __construct(Iterator $iterator, float $priceFrom, float $priceTo)
    {
        $this->priceFrom = $priceFrom;
        $this->priceTo   = $priceTo;
        parent::__construct($iterator);
    }

    public function accept(): bool
    {
        /** @var Offer $offer */
        $offer = $this->getInnerIterator()->current();

        return (($this->priceFrom <= $offer->getPrice())
            && ($offer->getPrice()) <= $this->priceTo);
    }
}
