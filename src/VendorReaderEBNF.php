<?php

declare(strict_types=1);
namespace CityPantry;

use CityPantry\Interfaces\VendorsCollectionInterface;
use CityPantry\Interfaces\VendorReaderInterface;
use CityPantry\Vendor;
use CityPantry\Item;
use CityPantry\Allergen;
use CityPantry\Collections\VendorsCollection;
use CityPantry\Collections\ItemsCollection;
use CityPantry\Collections\AllergiesCollection;

final class VendorReaderEBNF implements VendorReaderInterface
{
    private $vendors;

    public function __construct( string $filename ){

        if(!$this->doesFileExist( $filename )){
            throw new exception("The file does not exist");
        }

        $this->readFile( $filename);
    }

    public function getVendors() : VendorsCollectionInterface {
        return $this->vendors;
    }

    private function doesFileExist( string $filename ) : bool{ 
        return file_exists($filename);
    }

    private function readFile( $filename ) : void {
        $vendorsArray = array();

        $lines = file($filename);

        $vendorConstructionStarted = false;

        foreach( $lines as $line ){

            if( strlen($line) === 1){

                $vendor = $this->createVendor( $vendorLine , $items );
                array_push($vendorsArray , $vendor);
                $vendorConstructionStarted = false;
                $vendorLine = "";
            }else if( !$vendorConstructionStarted ){
                
                $vendorLine = $line;
                $items = array();
                $vendorConstructionStarted = true;
            }else if( $vendorConstructionStarted){

                $item = $this->createItem( $line );
                array_push($items , $item);
            }
        }

        if( $vendorConstructionStarted ){
            $vendor = $this->createVendor( $vendorLine , $items );
            array_push($vendorsArray , $vendor);
        }      

        $this->vendors = new VendorsCollection( ...$vendorsArray );
    }

    private function createVendor( string $line , array $items) : Vendor {

        $explodedVendor = explode(";" , $line);

        $vendorName = $explodedVendor[0];
        $postCode = $explodedVendor[1];
        $maxCovers = (int) $explodedVendor[2];

        $itemCollection = new ItemsCollection( ...$items );

        $vendor = new Vendor( $vendorName , $postCode , $maxCovers , $itemCollection);

        return $vendor;
    }

    private function createItem( string $line ) : Item {
        $explodedItem = explode(";" , $line);
                
        $itemName = $explodedItem[0];
        $allergens = explode("," , $explodedItem[1]);
        $allergensCollection = new AllergiesCollection( ...$allergens);

        $advanceTime = $explodedItem[2];

        return new Item( $itemName, $advanceTime , $allergensCollection);
    }
}