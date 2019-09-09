<?php

declare(strict_types=1);
namespace CityPantry;

use CityPantry\Interfaces\ApplicationInterface;
use CityPantry\Interfaces\ItemsCollectionInterface;

use CityPantry\Interfaces\VendorReaderInterface;
use CityPantry\Interfaces\QueryItemsInterface;

final class Application implements ApplicationInterface
{
    private $items;
    
    public function __construct( VendorReaderInterface $vendorReader , QueryItemsInterface $query ){

        $allVendors = $vendorReader->getVendors();

        $this->setItems( $query->getItems($allVendors));
    }

    public function printItems() : void {
        
        $string = "";

        foreach( $this->items->getItems() as $item ){

            $string .= $item->getName() . ";";

            foreach($item->getAllergies()->getAllergies() as $allergen ){
                $string .= $allergen . ",";
            }

            $string = substr_replace($string ,"",-1);

            $string .= ";\r\n";

        }

        $string = substr_replace($string ,"",-3);

        echo $string;
    }

    private function setItems( ItemsCollectionInterface $items ){
        $this->items = $items;
    }
}