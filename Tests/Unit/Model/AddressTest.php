<?php

namespace Osl\Bundle\Common\Tests\Unit\Model;

use PHPUnit\Framework\TestCase;
use Addressable\Bundle\Entity\Address;

class AddressTest extends TestCase
{
    public function testAddressCreation()
    {
        $address = new Address();
        $address->setStreetNumber(101);
        
        $this->assertEquals($address->getStreetNumber(), '101');
    }
}
