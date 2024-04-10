<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Strategy\ItemStrategyRegister;

final class GildedRose
{
    public function __construct(
        private array $items,
        private ItemStrategyRegister $itemStrategyRegister
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $strategy = $this->itemStrategyRegister->getStrategyByItem($item);
            $strategy->update($item);
        }
    }
}
