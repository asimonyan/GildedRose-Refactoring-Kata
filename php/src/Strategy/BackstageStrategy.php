<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Item;

class BackstageStrategy extends AbstractStrategy
{
    public function getName(): string
    {
        return 'Backstage passes to a TAFKAL80ETC concert';
    }

    public function update(Item $item): void
    {
        parent::update($item);
        if ($this->isItemExpired($item)) {
            $item->quality = 0;
            return;
        }

        if ($this->canIncrementQuality($item)) {
            $item->quality = $item->quality + 1;
            if ($item->sellIn < 11 && $this->canIncrementQuality($item)) {
                $item->quality = $item->quality + 1;
            }
            if ($item->sellIn < 6 && $this->canIncrementQuality($item)) {
                $item->quality = $item->quality + 1;
            }
        }
    }
}
