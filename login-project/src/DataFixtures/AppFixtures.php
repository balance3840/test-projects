<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Enums\RolesEnum;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class AppFixtures
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{

    /** @var EncoderFactoryInterface */
    private $encoderFactory;

    /**
     * AppFixtures constructor.
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }


    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $newUser = new User;
        $encoder = $this->encoderFactory->getEncoder($newUser);

        $availableRoles = RolesEnum::getRoles();
        $role = $availableRoles[rand(0, count($availableRoles) - 1)];
        $password = $encoder->encodePassword(123456, null);

        $newUser->setEmail('test.email@gmail.com');
        $newUser->setPassword($password);
        $newUser->setRoles([$role]);
    
        $manager->persist($newUser);
        $manager->flush();
    }
}
