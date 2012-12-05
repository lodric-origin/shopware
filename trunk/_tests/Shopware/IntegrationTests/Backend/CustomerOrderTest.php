<?php
/**
 * Shopware
 *
 * LICENSE
 *
 * Available through the world-wide-web at this URL:
 * http://shopware.de/license
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@shopware.de so we can send you a copy immediately.
 *
 * @category   Shopware
 * @package    Shopware_IntegrationTests
 * @subpackage Backend
 * @copyright  Copyright (c) 2012, shopware AG (http://www.shopware.de)
 * @license    http://shopware.de/license
 * @version    $Id$
 * @author:    Patrick Schücker
 * @author     $Author$
 */

/**
 * Test case
 *
 * @category   Shopware
 * @package    Shopware_IntegrationTests
 * @subpackage Backend
 * @copyright  Copyright (c) 2012, shopware AG (http://www.shopware.de)
 * @license    http://enlight.de/license
 * @group selenium
 * @group Customer
 */
class Shopware_IntegrationTests_Backend_CustomerOrderTest extends Shopware_IntegrationTests_Backend_LoginTest
{ 
    /**
     * 
     */
    public function testBasicCustomerOrder()
    {
        // execute Login
        $this->login();
        // open Application in single mode
        $this->openCustomerOrder();
        $this->waitForElementPresent('css=button[data-action=refreshPage]');
    }
    
    /**
     * Open supplier module
     */
    private function openCustomerOrder()
    {
        sleep(2);
        $this->open('backend?app=Order');
        // Wait until default layer is loaded
        $this->waitForElementPresent('css=div[id^=order-list-main-window]');
    }
}