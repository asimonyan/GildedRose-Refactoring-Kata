<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Factory\ItemStrategyRegisterFactory;
use GildedRose\GildedRose;
use PHPUnit\Framework\TestCase;
use Tests\Dto\TestItemDto;
use Tests\Factory\TestItemFactory;

class GildedRoseTest extends TestCase
{
    public function itemDataProvider(): array
    {
        return [
            [TestItemFactory::createTestItem(5, '+5 Dexterity Vest', 3, -3, 20, 11)], // Обычный кейс
            [TestItemFactory::createTestItem(5, 'Elixir of the Mongoose', 1, -5, 3, 0)], // Качество товара не может быть отрицательным;
            [TestItemFactory::createTestItem(4, 'Aged Brie', 10, 5, 20, 25)], // Обычный кейс
            [TestItemFactory::createTestItem(15, 'Aged Brie', 10, -6, 30, 50)], // Качество товара никогда не может быть больше, чем 50;
            [TestItemFactory::createTestItem(6, 'Sulfuras, Hand of Ragnaros', 10, 10, 20, 20)], // Sulfuras не меняется срока хранения и качества
            [TestItemFactory::createTestItem(8, 'Backstage passes to a TAFKAL80ETC concert', 10, 1, 20, 43)], // Обычный кейс
            [TestItemFactory::createTestItem(9, 'Backstage passes to a TAFKAL80ETC concert', 8, -2, 20, 0)], // качество падает до 0 после даты проведения концерта
            [TestItemFactory::createTestItem(7, 'Conjured Mana Cake', 10, 2, 20, 4)], // Обычный кейс
            [TestItemFactory::createTestItem(7, 'Conjured Mana Cake', 5, -3, 40, 18)], // кейс с истекшим сроком
        ];
    }

    /**
     * @dataProvider itemDataProvider
     */
    public function testUpdateQuality(TestItemDto $testItemDto): void
    {
        $itemStrategyRegister = ItemStrategyRegisterFactory::create();
        $app = new GildedRose([$testItemDto->item], $itemStrategyRegister);
        $app->updateQuality();

        for ($i = 0; $i < $testItemDto->days; $i++) {
            $app->updateQuality();
        }

        $this->assertSame($testItemDto->item->name, $testItemDto->itemAfterUpdate->name);
        $this->assertSame($testItemDto->item->quality, $testItemDto->itemAfterUpdate->quality);
        $this->assertSame($testItemDto->item->sellIn, $testItemDto->itemAfterUpdate->sellIn);
    }
}
