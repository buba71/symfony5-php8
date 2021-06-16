<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterAdminTest extends WebTestCase
{
    /**
     * @var \Symfony\Bundle\FrameworkBundle\KernelBrowser
     */
    private \Symfony\Bundle\FrameworkBundle\KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testRegisterAdminIfValidRequest(): void
    {
        $crawler = $this->client->request('GET', '/create-admin');

        $form = $crawler->selectButton('Inscription')->form();

        $form['register_admin[firstName]'] = 'David';
        $form['register_admin[lastName]'] = 'De Lima';
        $form['register_admin[email]'] = 'john@doe.com';
        $form['register_admin[password]'] = 'secret';


        $this->client->submit($form);

        $this->client->followRedirects();
        
        static::assertResponseStatusCodeSame(302);
    }
}
