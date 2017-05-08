<?php

namespace PMM\LaboBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PMM\UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    
    $names = array(
      'admin',
      'superadmin',
      'caisse',
      'labo',
    );

    foreach ($names as $name) {
      // On crée la catégorie
      $user = new User();
      $user->setUsername($name);
        $user->setName($name);
      $user->setPassword($name);
      $user->setSalt('');
      $user->setRoles(array('ROLE_CAISSE', 'ROLE_LABO'));

      // On la persiste
      $manager->persist($user);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}