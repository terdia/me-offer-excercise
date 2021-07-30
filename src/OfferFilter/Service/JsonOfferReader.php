<?php declare(strict_types=1);

namespace App\OfferFilter\Service;

use App\OfferFilter\Contract\OfferCollectionInterface;
use App\OfferFilter\Contract\ReaderInterface;
use App\OfferFilter\Factory\JsonOfferCollectionFactory;

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
