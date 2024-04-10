<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Item;

class AgedBrieStrategy extends AbstractStrategy
{
    public function getName(): string
    {
        return 'Aged Brie';
    }

    public function update(Item $item): void
    {
        parent::update($item);
        if ($this->canIncrementQuality($item)) {
            $increment = 1;
            if ($this->isItemExpired($item)) {
                $increment = 2;
            }
            $item->quality += $increment;
        }
    }
}
