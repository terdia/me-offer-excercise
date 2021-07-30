<?php declare(strict_types=1);

namespace App\OfferFilter\Dto;

use App\OfferFilter\Contract\OfferCollectionInterface;
use App\OfferFilter\Contract\OfferInterface;
use App\OfferFilter\Exception\OfferNotFoundException;
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
