<?php declare(strict_types=1);

namespace App\MetroOffer\Service;

use App\MetroOffer\Contract\OfferFilterCommandHandlerInterface;

class OfferFilterComandProcessor
{
    private const COUNT_BY_PRICE_RANGE = 'count_by_price_range';
    private const COUNT_BY_VENDOR_ID   = 'count_by_vendor_id';

    private OfferFilterCommandHandlerInterface $handler;

    public function __construct(OfferFilterCommandHandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    public function run(): void
    {
        global $argv;
        $action = $argv[1] ?? null;
        switch ($action) {
            case self::COUNT_BY_PRICE_RANGE:
                $priceFrom = $argv[2] ?? null;
                $priceTo   = $argv[3] ?? null;
                //validate and throw exception
                $offerCount = $this
                    ->handler
                    ->countOfferfilteredByPriceRange(
                        (float)$priceFrom,
                        (float)$priceTo
                    );
                echo $offerCount . ' offer found';
                break;
            case self::COUNT_BY_VENDOR_ID:
                $vendorId = $argv[2] ?? null;
                //validate and throw exception
                $offerCount = $this
                    ->handler
                    ->countOfferfilteredByVendorId((int)$vendorId);
                echo $offerCount . ' offer found';
                break;
            default:
                throw new \InvalidArgumentException('not_supported');
        }
    }
}
