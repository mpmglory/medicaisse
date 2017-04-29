<?php

namespace PMM\LaboBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PMM\LaboBundle\Entity\Serologie;

class LoadSerologie implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
      
      $exam = new Serologie();
      $exam->setVih('800');
      $exam->setAlso('1950');
      $exam->setCrp('2700');
      $exam->setTpha('1800');
      $exam->setVdrl('1250');
      $exam->setAgHbs('6500');
      $exam->setToxoIgg('4500');
      $exam->setWidalTest('3800');
      $exam->setRubeole('1300');
      $exam->setHcv('2300');
      $exam->setChlamydia('6200');
      $exam->setFr('2540');
      $exam->setSelles('1200');

      $manager->persist($exam);
      $manager->flush();
  }
}