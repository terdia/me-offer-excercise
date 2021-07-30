<?php declare(strict_types=1);

namespace App\OfferFilter\Contract;

interface OfferInterface
{
    public function getId(): int;

    public function getProductTitle(): string;

    public function getVendorId(): int;

    public function getPrice(): float;
}
