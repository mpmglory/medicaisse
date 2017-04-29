<?php

namespace PMM\LaboBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PMM\LaboBundle\Entity\Hematologie;

class LoadHematologie implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
    {

          $exam = new Hematologie();
          $price = 9600;
          $exam->setPrice($price);

          $manager->persist($exam);
          $manager->flush();
      }
}