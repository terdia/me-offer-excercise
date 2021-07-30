<?php declare(strict_types=1);

namespace App\OfferFilter\Contract;

interface OfferCollectionFactoryInterface
{
    public function createCollection(string $input): OfferCollectionInterface;
}
