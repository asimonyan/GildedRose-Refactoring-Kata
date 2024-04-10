<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Item;

class ConjuredStrategy extends AbstractStrategy
{
    public function getName(): string
    {
        return 'Conjured Mana Cake';
    }

    public function update(Item $item): void
    {
        parent::update($item);
        if ($this->canDecrementQuality($item)) {
            $decrement = 2;
            if ($this->isItemExpired($item)) {
                $decrement = 4;
            }
            $item->quality -= $decrement;
            $item->quality = max($item->quality, 0);
        }
    }
}
