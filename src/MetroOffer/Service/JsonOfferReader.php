<?php declare(strict_types=1);

namespace App\MetroOffer\Service;

use App\MetroOffer\Contract\OfferCollectionInterface;
use App\MetroOffer\Contract\ReaderInterface;
use App\MetroOffer\Factory\JsonOfferCollectionFactory;

class JsonOfferReader implements ReaderInterface
{
    private JsonOfferCollectionFactory $factory;

    public function __construct(JsonOfferCollectionFactory $factory)
    {
        $this->factory = $factory;
    }

    public function read(string $input): OfferCollectionInterface
    {
        return $this->factory->createCollection($input);
    }
}
