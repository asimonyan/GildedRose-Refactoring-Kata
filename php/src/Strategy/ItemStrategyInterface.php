<?php


declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Item;

interface ItemStrategyInterface
{
    public function getName(): string;

    public function update(Item $item): void;
}
