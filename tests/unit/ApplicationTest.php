<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CityPantry\Application;
use CityPantry\Interfaces\VendorReaderInterface;
use CityPantry\Interfaces\QueryItemsInterface;

class ApplicationTest extends TestCase
{
    private $application;
    private $vendorReaderMock;
    private $queryItemsMock;
    
    const TEST_DAY = "";
    const TEST_TIME = "";
    const TEST_LOCATION = "";
    const TEST_COVERS = 10;

    /**
     * This fixture is used to setup the object that are used in the unit tests. We will test with an investor starting with 0
     *
     * @method void setUp()
     * @access protected
     * @return void
     */

    protected function setUp(): void
    {
        $this->vendorReaderMock = $this->createMock( VendorReaderInterface::class);
        $this->queryItemsMock = $this->createMock( QueryItemsInterface::class);

        $this->application = new Application( $this->vendorReaderMock , $this->queryItemsMock);
    }

    /**
     * We will test here that the item class can construct
     *
     * @method void testItemCanConstruct()
     * @access public
     * @return void
     */

    public function testItemCanConstruct() : void
    {
        $this->assertInstanceOf('CityPantry\Application', $this->application);
    }
}