<?php
/**
 * Test case
 * 
 * @link http://www.shopware.de
 * @copyright Copyright (c) 2011, shopware AG
 * @author Heiner Lohaus
 * @package Shopware
 * @subpackage RegressionTests
 * @ticket 5092
 */
class Shopware_RegressionTests_Ticket5092 extends Enlight_Components_Test_Controller_TestCase
{    
    /**
	 * Test case method
	 */
	public function testLinkPlugin()
    {
    	$url = 'http://'.Shopware()->Shop()->Config()->BasePath.'/engine/backend/js/include.php?module=start&include=start.php';
    	$content = file_get_contents($url);
    	$this->assertNotEmpty($content);
    }
}