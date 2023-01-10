<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    public function testAccessToIndex(){
        $client = static::createClient(); //Crée un client qui agit comme un navigateur

        $crawler = $client->request("GET", "/");

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains("h1", "Hello World !");
    }
}