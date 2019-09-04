<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
        {
            $this->encoder = $encoder;
        }

    public function load(ObjectManager $manager)
    { 
        //$user = new User();
        
        $user->setUsername('student');

        $user->setPassword(
            $this->encoder->encodePassword($user, '5555')
        );

        $user->setFunction('student');

        $user->setFullname('Luka Luketin');

        $user->setRoom('');

        $user->setPosition('sveučilišni prvostupnik, inženjer računarstva');

        $user->setEmail('lluket00@fesb.hr');

        $user->setBalance(0);

        $user->setPhone('+385 919265837');

        $user->setProfilePicPath('/images/ja.jpg');

        $user->setRoles(array('ROLE_LOW_PRIV'));

        $manager->persist($user);

        $manager->flush();
    }
}
