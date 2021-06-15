<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginTest extends WebTestCase
{
    public function testLoginRoute(): void
    {
        $client = static::createClient();

        $client->request('GET', '/login');

        static::assertResponseIsSuccessful();
    }
}