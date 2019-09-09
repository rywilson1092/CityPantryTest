<?php

declare(strict_types=1);
namespace CityPantry;

use CityPantry\Interfaces\QueryItemsInterface;
use CityPantry\Interfaces\VendorsCollectionInterface;
use CityPantry\Interfaces\ItemsCollectionInterface;
use CityPantry\Interfaces\VendorInterface;
use CityPantry\Interfaces\ItemInterface;
use CityPantry\Collections\ItemsCollection;

use DateTime;
use DateInterval;

final class QueryItems implements QueryItemsInterface
{
    private $requestedDateTime;
    private $locationPostCode;
    private $covers;
    private $currentDateTime;

    public function __construct( DateTime $requestedDateTime , string $locationPostCode , int $covers , DateTime $currentDateTime ){
        $this->items = $items;
        $this->requestedDateTime = $requestedDateTime;
        $this->locationPostCode = $locationPostCode;
        $this->covers = $covers;
        $this->currentDateTime = $currentDateTime;
    }

    public function getItems( VendorsCollectionInterface $vendors ) : ItemsCollectionInterface {
        
        $items = array();
        
        foreach( $vendors->getVendors() as $vendor){
            
            if($this->isVendorValid( $vendor )){

                foreach($vendor->getItems()->getItems() as $item){

                    if($this->isItemValid( $item )){
                        array_push($items , $item);
                    }

                }

            }
        }

        return new ItemsCollection( ...$items);
    }

    private function isVendorValid( VendorInterface $vendor ) : bool {

        if( !$this->canDeliver( $vendor->getPostCode() , $this->locationPostCode ) ){
            return false;
        }

        if( !$this->enoughCovers($vendor->getMaxCovers() , $this->covers )){
            return false;
        }

        return true;
    }

    private function canDeliver(string $vendorPostCode , string $locationPostCode) : bool{

        $vendorFirstTwoChar = substr($vendorPostCode, 0, 2);
        $requestedFirstTwoChar = substr($locationPostCode, 0, 2);

        if($vendorFirstTwoChar === $requestedFirstTwoChar){
            return true;
        }else{
            return false;
        }
    }

    private function enoughCovers( int $vendorMaxCovers , int $requestedCovers ) : bool{

        if( $requestedCovers <= $vendorMaxCovers ){
            return true;
        }else{
            return false;
        }
    }

    private function isItemValid( ItemInterface $item ) : bool{ 
        
        $hoursOutOfString = preg_replace("/[^0-9]/", "", $item->getAdvanceTime() );
        
        $modifiedDateTime = clone $this->currentDateTime;

        $interval = new DateInterval("PT{$hoursOutOfString}H");

        $modifiedDateTime->add($interval);

        if( $modifiedDateTime->getTimestamp() <= $this->requestedDateTime->getTimestamp()){
            return true;
        }else{
            return false;
        }
    }
}