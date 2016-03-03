<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
    $userAdmin = new User();
    $userAdmin->setUsername('admin');
        $userManager = $this->container->get('fos_user.user_manager');
        $userAdmin->setPlainPassword('test');
        $userManager->updatePassword($userAdmin);
        $userAdmin->setEmail('test@test.com');
        $userAdmin->setEnabled(1);
        $userAdmin->addRole('ROLE_ADMIN');

        $user = new User();
        $user->setUsername('xav');
        $userManager = $this->container->get('fos_user.user_manager');
        $user->setPlainPassword('test');
        $userManager->updatePassword($user);
        $user->setEmail('xav@test.com');
        $user->setEnabled(1);
        $user->addRole('ROLE_USER');

    $manager->persist($userAdmin);
        $manager->persist($user);
    $manager->flush();

    }
}