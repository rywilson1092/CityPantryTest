<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Collections;

use CityPantry\Interfaces\ItemsCollectionInterface;
use CityPantry\Interfaces\ItemInterface;

final class ItemsCollection implements ItemsCollectionInterface
{
    private $items = array();

    public function __construct( ItemInterface ...$items){
        $this->items = $items;
    }

    public function getItems() : array {
        return $this->items;
    }
}