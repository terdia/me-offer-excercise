<?php declare(strict_types=1);

namespace App\MetroOffer\Contract;

use Iterator;

interface OfferCollectionInterface
{
    public function get(int $index): OfferInterface;

    public function getIterator(): Iterator;
}
