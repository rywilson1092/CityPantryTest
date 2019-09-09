<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\Collections\AllergiesCollection;
use CityPantry\VendorReaderEBNF;
use CityPantry\QueryItems;
use CityPantry\Application;

class ExampleScenarioTest extends TestCase
{
    const FILENAME = "example-input.txt";
    const DAY_SCENARIO_1 = "11/11/18";
    const DAY_SCENARIO_2 = "14/11/18";
    const TIME = "11:00";
    const LOCATION = "NW43QB";
    const COVERS = 20 ;

    const EXPECTED_NUMBER_OF_VENDORS = 4;
    const EXPECTED_NUMBER_OF_ITEMS_SCENARIO_1 = 1;

    const EXPECTED_ALLERGENS_SCENARIO_1 = array( "gluten", "eggs" );

    const EXPECTED_NUMBER_OF_ITEMS_SCENARIO_2 = 2;

    const EXPECTED_OUTPUT_SCENARIO_1 = "Breakfast;gluten,eggs";
    const EXPECTED_OUTPUT_SCENARIO_2 = "Premium meat selection;;\r\nBreakfast;gluten,eggs";

    const FAKED_DATE = "10/11/18 00:00";

    private $fakedDateTime;

    /**
     * We will test here that the allergies collection class can construct
     *
     * @method void testAllergiesCollectionCanConstruct()
     * @access public
     * @return void
     */

    public function testVendorReaderConstruct() : void
    {

        $vendorReader = new VendorReaderEBNF( self::FILENAME );
        
        $this->assertInstanceOf( VendorReaderEBNF::class, $vendorReader);
    }

    /**
     * Check the vendor reader returns the correct number of vendors
     *
     * @method void testAllergiesCollectionCanConstruct()
     * @access public
     * @return void
     */

    public function testCanConstructQueryItems() : void
    {
        $requestedDateTime = DateTime::createFromFormat('d/m/y h:i', self::DAY_SCENARIO_1 . " " . self::TIME);
        
        $this->fakedDateTime = DateTime::createFromFormat('d/m/y h:i', self::FAKED_DATE);

        $queryItems = new QueryItems( $requestedDateTime , self::LOCATION , self::COVERS, $this->fakedDateTime );
        
        $this->assertInstanceOf( QueryItems::class , $queryItems );
    }

    /**
     * Check the vendor reader returns the correct number of vendors
     *
     * @method void testAllergiesCollectionCanConstruct()
     * @access public
     * @return void
     */

    public function testCanConstructApplication() : void
    {
        $vendorReader = new VendorReaderEBNF( self::FILENAME);

        $requestedDateTime = DateTime::createFromFormat('d/m/y h:i', self::DAY_SCENARIO_1 . " " . self::TIME);

        $this->fakedDateTime = DateTime::createFromFormat('d/m/y h:i', self::FAKED_DATE);

        $queryItems = new QueryItems( $requestedDateTime , self::LOCATION , self::COVERS , $this->fakedDateTime );

        $application = new Application( $vendorReader , $queryItems );

        $this->assertInstanceOf( Application::class , $application );
    }


    /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetAllergiesFromCollection()
     * @access public
     * @return void
     */

    public function testCanPrintItemsScenario1() : void
    {
        $vendorReader = new VendorReaderEBNF( self::FILENAME);

        $requestedDateTime = DateTime::createFromFormat('d/m/y h:i', self::DAY_SCENARIO_1 . " " . self::TIME);
        
        $this->fakedDateTime = DateTime::createFromFormat('d/m/y h:i', self::FAKED_DATE);

        $queryItems = new QueryItems( $requestedDateTime , self::LOCATION , self::COVERS , $this->fakedDateTime );

        $application = new Application( $vendorReader , $queryItems );

        $this->expectOutputString( self::EXPECTED_OUTPUT_SCENARIO_1);

        $application->printItems();
    }

     /**
     * We will test here that we can get back the same array that was passed through.
     *
     * @method void testCanGetAllergiesFromCollection()
     * @access public
     * @return void
     */

    public function testCanPrintItemsScenario2() : void
    {
        $vendorReader = new VendorReaderEBNF( self::FILENAME);

        $requestedDateTime = DateTime::createFromFormat('d/m/y h:i', self::DAY_SCENARIO_2 . " " . self::TIME);

        $this->fakedDateTime = DateTime::createFromFormat('d/m/y h:i', self::FAKED_DATE);

        $queryItems = new QueryItems( $requestedDateTime , self::LOCATION , self::COVERS , $this->fakedDateTime );

        $application = new Application( $vendorReader , $queryItems );

        $this->expectOutputString( self::EXPECTED_OUTPUT_SCENARIO_2);

        $application->printItems();
    }
}