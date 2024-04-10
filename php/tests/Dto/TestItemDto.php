<?php

declare(strict_types=1);

namespace Tests\Dto;

use GildedRose\Item;

class TestItemDto
{
    public Item $item;

    public Item $itemAfterUpdate;

    public int $days;
}
