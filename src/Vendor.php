<?php

declare(strict_types=1);

namespace CityPantry;

use CityPantry\Interfaces\VendorInterface;
use CityPantry\Interfaces\ItemsCollectionInterface;

final class Vendor implements VendorInterface
{
    private $name;
    private $postCode;
    private $maxCovers;
    private $items;
    
    public function __construct( string $name, string $postCode , int $maxCovers, ItemsCollectionInterface $items ){
        $this->name = $name;
        $this->postCode = $postCode;
        $this->maxCovers = $maxCovers;
        $this->items = $items;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getPostCode() : string {

        return $this->postCode;
    }

    public function getMaxCovers() : int {
        return $this->maxCovers;
    }

    public function getItems() : ItemsCollectionInterface {
        return $this->items;
    }
}