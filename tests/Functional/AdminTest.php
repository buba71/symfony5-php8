<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Infrastructure\Persistence\Doctrine\Repository\UserDoctrineRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminTest extends WebTestCase
{
    /**
     * Necessary load test fixtures before launch tests.
     */
    public function testIndex(): void
    {
        $client = static::createClient();
        $userRepository = static::$container->get(UserDoctrineRepository::class);

        $testUser = $userRepository->getUserByEmail('test@test.com');
        
        // Symfony helper.
        $client->loginUser($testUser);

        $client->request('GET', '/admin');

        static::assertResponseIsSuccessful();
    }
}
