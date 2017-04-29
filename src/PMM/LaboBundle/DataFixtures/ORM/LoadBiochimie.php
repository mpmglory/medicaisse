<?php

namespace PMM\LaboBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PMM\LaboBundle\Entity\Biochimie;

class LoadBiochimie implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
      
      $exam = new Biochimie();
      $price = 1250;
      $exam->setPrice($price);

      $manager->persist($exam);
      $manager->flush();
  }
}