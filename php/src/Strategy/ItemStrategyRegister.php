<?php

declare(strict_types=1);

namespace GildedRose\Strategy;

use GildedRose\Item;

class ItemStrategyRegister
{
    /**
     * @var array|ItemStrategyInterface[]
     */
    private array $itemStrategies;

    private DefaultStrategy $defaultStrategy;

    public function __construct(iterable $itemStrategies)
    {
        foreach ($itemStrategies as $itemStrategy) {
            if ($itemStrategy instanceof ItemStrategyInterface) {
                $this->itemStrategies[] = $itemStrategy;
            }
            if ($itemStrategy->getName() === DefaultStrategy::DEFAULT_STRATEGY) {
                $this->defaultStrategy = $itemStrategy;
            }
        }
    }

    public function getStrategyByItem(Item $item): ItemStrategyInterface
    {
        foreach ($this->itemStrategies as $strategy) {
            if ($strategy->getName() === $item->name) {
                return $strategy;
            }
        }
        return $this->defaultStrategy;
    }
}
