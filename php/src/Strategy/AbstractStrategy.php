<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Item;

abstract class AbstractStrategy implements ItemStrategyInterface
{
    protected const QUALITY_MAX = 50;

    protected const QUALITY_MIN = 0;

    public function update(Item $item): void
    {
        $item->sellIn = $item->sellIn - 1;
    }

    protected function canDecrementQuality(Item $item): bool
    {
        return $item->quality > self::QUALITY_MIN;
    }

    protected function canIncrementQuality(Item $item): bool
    {
        return $item->quality < self::QUALITY_MAX;
    }

    protected function isItemExpired(Item $item): bool
    {
        return $item->sellIn < 0;
    }
}
