<?php

declare(strict_types=1);

namespace GildedRose\Factory;

use GildedRose\Strategy\AgedBrieStrategy;
use GildedRose\Strategy\BackstageStrategy;
use GildedRose\Strategy\ConjuredStrategy;
use GildedRose\Strategy\DefaultStrategy;
use GildedRose\Strategy\ItemStrategyRegister;
use GildedRose\Strategy\SulfurasStrategy;

class ItemStrategyRegisterFactory
{
    public static function create(): ItemStrategyRegister
    {
        $strategies = [
            new DefaultStrategy(),
            new AgedBrieStrategy(),
            new BackstageStrategy(),
            new ConjuredStrategy(),
            new SulfurasStrategy(),
        ];
        return new ItemStrategyRegister($strategies);
    }
}
