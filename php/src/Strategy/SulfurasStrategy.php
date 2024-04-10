<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Item;

class SulfurasStrategy extends AbstractStrategy
{
    public function getName(): string
    {
        return 'Sulfuras, Hand of Ragnaros';
    }

    public function update(Item $item): void
    {
        // Является легендарным товаром, поэтому у него нет срока хранения и не подвержен ухудшению качества,
    }
}
