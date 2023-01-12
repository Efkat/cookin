<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    private array $methods = array("POST", "DELETE", "PATCH", "PUT");

    public function testAccessToIndexOnGet(){
        $client = static::createClient(); //Crée un client qui agit comme un navigateur

        $client->request("GET", "/");

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains("h1", "Hello World !");
    }

    public function testCantAccessToIndexOnOthersMethods(){
        $client = static::createClient();

        foreach($this->methods as $method){
            $client->request($method, "/");
            $this->assertResponseStatusCodeSame(405);
        }
    }
}