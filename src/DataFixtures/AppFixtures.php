<?php

namespace App\DataFixtures;

use App\Entity\Eleve;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $generator = Factory::create("fr_FR");


        for ($i = 0; $i < 30; $i++) {
            $gender = $generator->boolean;
            if ($gender) {
                $Eleve = new Eleve();
                $Eleve
                    ->setNom($generator->lastName)
                    ->setPrenom($generator->firstNameMale)
                    ->setDateNaissance($generator->dateTimeBetween('-20 years', '-9 years'))
                    ->setAdresse($generator->address)
                    ->setNumTel($generator->randomNumber(8))
                    ->setLieuNaissance($generator->city)
                    ->setSexe("Homme")
                    ->setCin($generator->randomNumber(8))
                    ->setLogin($generator->userName)
                    ->setMdp($generator->password(6, 8))
                    ->setEmail($generator->email);

                $Eleve->setAge(date_diff(new \DateTime(), $Eleve->getDateNaissance())->y);
                $Eleve->setNiveau($Eleve->getAge() - 8);
            } else {
                $Eleve = new Eleve();
                $Eleve
                    ->setNom($generator->lastName)
                    ->setPrenom($generator->firstNameFemale)
                    ->setDateNaissance($generator->dateTimeBetween('-20 years', '-9 years'))
                    ->setAdresse($generator->address)
                    ->setNumTel($generator->randomNumber(8))
                    ->setLieuNaissance($generator->city)
                    ->setSexe("Femme")
                    ->setCin($generator->randomNumber(8))
                    ->setLogin($generator->userName)
                    ->setMdp($generator->password(6, 8))
                    ->setEmail($generator->email);

                $Eleve->setAge(date_diff(new \DateTime(), $Eleve->getDateNaissance())->y);
                $Eleve->setNiveau($Eleve->getAge() - 8);
            }

            $manager->persist($Eleve);
        }
        $manager->flush();
    }

}

