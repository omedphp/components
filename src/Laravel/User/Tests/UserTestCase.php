<?php

/*
 * This file is part of the Omed project.
 *
 * (c) Anthonius Munthi <https://itstoni.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Omed\Laravel\User\Tests;

use Kilip\Laravel\Alice\AliceServiceProvider;
use Kilip\Laravel\Alice\Testing\ORM\RefreshDatabaseTrait;
use Kilip\LaravelDoctrine\ORM\KilipDoctrineServiceProvider;
use Kilip\SanctumORM\SanctumORMServiceProvider;
use Laravel\Sanctum\SanctumServiceProvider;
use LaravelDoctrine\Extensions\GedmoExtensionsServiceProvider;
use LaravelDoctrine\ORM\DoctrineServiceProvider;
use Omed\Component\User\Model\UserInterface;
use Omed\Laravel\ORM\Testing\ORMTestCase;
use Omed\Laravel\Security\SecurityServiceProvider;
use Omed\Laravel\User\Model\User;
use Omed\Laravel\User\SecurityEventServiceProvider;
use Omed\Laravel\User\Testing\UserManagerTrait;
use Omed\Laravel\User\UserServiceProvider;
use Tymon\JWTAuth\Providers\LaravelServiceProvider as JWTAuthServiceProvider;

class UserTestCase extends ORMTestCase
{
    use UserManagerTrait;
    use RefreshDatabaseTrait;

    protected function setUp(): void
    {
        parent::setUp();
        $this->refreshDatabase();
    }

    protected function getPackageProviders($app)
    {
        return [
            JWTAuthServiceProvider::class,
            DoctrineServiceProvider::class,
            GedmoExtensionsServiceProvider::class,
            KilipDoctrineServiceProvider::class,
            AliceServiceProvider::class,
            SanctumServiceProvider::class,
            SanctumORMServiceProvider::class,
            SecurityServiceProvider::class,
            UserServiceProvider::class,
            SecurityEventServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $defPath = sys_get_temp_dir().'/omed-user/foo-model';
        if (!is_dir($defPath)) {
            mkdir($defPath, 0777, true);
        }
        $app['config']->set('doctrine.managers.default.connection', 'sqlite');
        $app['config']->set('doctrine.managers.default.paths', [$defPath]);
        $app['config']->set('alice.doctrine_orm.default.paths', [
            __DIR__.'/Resources/fixtures',
        ]);
        $app['config']->set('alice.doctrine_orm.default.manager', 'default');
        $app['config']->set('sanctum.orm.models.user', User::class);
    }

    /**
     * @return UserInterface
     */
    protected function generateUserData()
    {
        $manager = $this->getUserManager();
        $user = $manager->findByUsername('test');
        if (null === $user) {
            $user = $manager->createUser();
            $user
                ->setUsername('test')
                ->setPlainPassword('test')
                ->setEmail('test@example.com');
            $manager->storeUser($user);
        }

        return $user;
    }
}
