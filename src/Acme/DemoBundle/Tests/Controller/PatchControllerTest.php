<?php

namespace Acme\DemoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PatchControllerTest extends WebTestCase
{
    public function testPatch()
    {
        $client = static::createClient();

        $client->request('PATCH', '/test-patch');

        $this->assertEquals('ok', $client->getResponse()->getContent());
    }
}
