<?php

declare(strict_types=1);

namespace Tests\Factory;

use GildedRose\Item;
use Tests\Dto\TestItemDto;

class TestItemFactory
{
    public static function createTestItem(
        int $days,
        string $name,
        int $sellIn,
        int $updatedSellIn,
        int $quality,
        int $updatedQuality,
    ): TestItemDto {
        $testItem = new TestItemDto();
        $testItem->days = $days;

        $item = new Item($name, $sellIn, $quality);
        $updatedItem = new Item($name, $updatedSellIn, $updatedQuality);

        $testItem->item = $item;
        $testItem->itemAfterUpdate = $updatedItem;
        return $testItem;
    }
}
