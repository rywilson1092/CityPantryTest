<?php

declare(strict_types=1);
namespace CityPantry;
namespace CityPantry\Collections;

use CityPantry\Interfaces\VendorsCollectionInterface;
use CityPantry\Interfaces\VendorInterface;

final class VendorsCollection implements VendorsCollectionInterface
{
    private $vendors = array();

    public function __construct( VendorInterface ...$vendors){
        $this->vendors = $vendors;
    }

    public function getVendors() : array {
        return $this->vendors;
    }
}