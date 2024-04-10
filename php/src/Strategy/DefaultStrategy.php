<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Item;

class DefaultStrategy extends AbstractStrategy
{
    public const DEFAULT_STRATEGY = 'Default Strategy';

    public function getName(): string
    {
        return self::DEFAULT_STRATEGY;
    }

    public function update(Item $item): void
    {
        parent::update($item);
        if ($this->canDecrementQuality($item)) {
            $decrement = 1;
            if ($this->isItemExpired($item)) {
                $decrement = 2;
            }
            $item->quality -= $decrement;
        }
    }
}
