<?php

namespace App\DataFixtures;

use App\Entity\Category;
//use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CHEMISE_REFERENCE = 'chemise-reference';
    public const VESTE_REFENCE = 'veste-reference';
    public const SWEAT_REFERENCE = 'sweat-reference';
    public const PANTALON_REFERENCE = 'pantalon-reference';
    public const MANTEAU_REFERENCE = 'manteau-reference';

    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName('Manteaux');
        $this->addReference(self::MANTEAU_REFERENCE, $category);
        $manager->persist($category);

        $category = new Category();
        $category->setName('Vestes');
        $this->addReference(self::VESTE_REFENCE, $category);
        $manager->persist($category);


        $category = new Category();
        $category->setName('Sweats');
        $this->addReference(self::SWEAT_REFERENCE, $category);
        $manager->persist($category);


        $category = new Category();
        $category->setName('Pantalons');
        $this->addReference(self::PANTALON_REFERENCE, $category);
        $manager->persist($category);

        $category = new Category();
        $category->setName('Chemises');
        $this->addReference(self::CHEMISE_REFERENCE, $category);
        $manager->persist($category);

        $manager->flush();
    }

}