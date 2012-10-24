<?php

class JsonSerializerTest extends PHPUnit_Framework_TestCase {

	private $userId = "2721ad21bcf0d71e";
	private $privateKey = "8d8a7d642a807a31c2741c101a60cef2";
	private $signer;
	
	protected function setUp() {
        $this->signer = new GroupDocsRequestSigner($this->privateKey);
	}
	
	public function testPrimitiveSerilization() {
		
	}
	
	public function testPrimitiveDeserilization() {
		
	}
	
	public function testSimpleObjectSerilizationDeserilization() {
		
	}
	
	public function testNestedObjectSerilizationDeserilization() {
		
	}
	
	public function testListOfPrimitivesSerilization() {
		
	}
	
	public function testListOfPrimitivesDeserilization() {
		
	}
	
	public function testListOfObjectsSerilization() {
		
	}
	
	public function testListOfObjectsDeserilization() {
		
	}

}
