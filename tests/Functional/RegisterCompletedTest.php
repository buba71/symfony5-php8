<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterCompletedTest extends WebTestCase
{
    public function testIfResponseIsSuccessFull()
    {
        $client = static::createClient();

        $client->request('GET', '/register-completed');

        static::assertResponseIsSuccessful();
    }
}
