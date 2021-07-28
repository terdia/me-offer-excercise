<?php declare(strict_types=1);

namespace App\MetroOffer\Contract;

interface ReaderInterface
{
    public function read(string $input): OfferCollectionInterface;
}
