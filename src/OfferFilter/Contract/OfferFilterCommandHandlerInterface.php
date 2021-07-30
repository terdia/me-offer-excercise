<?php declare(strict_types=1);

namespace App\OfferFilter\Contract;

interface OfferFilterCommandHandlerInterface
{
    public function countOfferfilteredByPriceRange(float $priceFrom, float $priceTo): int;

    public function countOfferfilteredByVendorId(int $vendorId): int;
}
