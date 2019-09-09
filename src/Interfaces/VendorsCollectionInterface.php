<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Interfaces;

use CityPantry\Interfaces\VendorInterface;

interface VendorsCollectionInterface
{
    public function getVendors() : array;
}