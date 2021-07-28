<?php declare(strict_types=1);

namespace App\MetroOffer\Dto;

use App\MetroOffer\Contract\OfferCollectionInterface;
use App\MetroOffer\Contract\OfferInterface;
use App\MetroOffer\Exception\OfferNotFoundException;
use ArrayIterator;
use Iterator;

class OfferCollection implements OfferCollectionInterface
{
    /**
     * @var Offer[]
     */
    private array $offers;

    public function __construct(Offer ...$offers)
    {
        $this->offers = $offers;
    }

    public function get(int $index): OfferInterface
    {
        $offer = $this->offers[$index] ?? null;
        if (null === $offer) {
            throw new OfferNotFoundException('not_found');
        }

        return $offer;
    }

    public function getIterator(): Iterator
    {
        return new ArrayIterator($this->offers);
    }
}
