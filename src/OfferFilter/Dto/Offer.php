<?php declare(strict_types=1);

namespace App\OfferFilter\Dto;

use App\OfferFilter\Contract\OfferInterface;

class Offer implements OfferInterface
{
    private int    $id;
    private string $productTitle;
    private int    $vendorId;
    private float  $price;

    public function __construct(
        int $id,
        string $productTitle,
        int $vendorId,
        float $price
    ) {
        $this->id           = $id;
        $this->productTitle = $productTitle;
        $this->vendorId     = $vendorId;
        $this->price        = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getProductTitle(): string
    {
        return $this->productTitle;
    }

    public function getVendorId(): int
    {
        return $this->vendorId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
