<?php

namespace PMM\LaboBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PMM\CoreBundle\Entity\Patient;

class LoadPatient implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    // Liste des noms de catégorie à ajouter
    $names = array(
      'Plata Magloire',
      'Epoh Isaac',
      'Fokou Bienvenu',
      'Hibrahima Issa',
    );

    foreach ($names as $name) {
      // On crée la catégorie
      $patient = new Patient();
      $patient->setName($name);
      $patient->setsex('M');

      // On la persiste
      $manager->persist($patient);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}