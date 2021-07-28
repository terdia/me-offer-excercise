<?php declare(strict_types=1);

namespace App\MetroOffer\Service;

use App\MetroOffer\Dto\Offer;
use FilterIterator;
use Iterator;

class FilterByVendorIdIterator extends FilterIterator
{
    private int   $vendorId;

    public function __construct(Iterator $iterator, int $vendorId)
    {
        $this->vendorId = $vendorId;
        parent::__construct($iterator);
    }

    public function accept(): bool
    {
        /** @var Offer $offer */
        $offer = $this->getInnerIterator()->current();

        return $this->vendorId === $offer->getVendorId();
    }
}
