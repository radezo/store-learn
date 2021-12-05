<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $finder = new Finder();
        $files = $finder->in('/var/www/mdezo/public/uploads');
        $filesList = [];
        foreach ($files as $file) {
            $filesList[$file->getFileName()] = $file->getFileName();
        }

        for ($i = 0; $i < 500; $i++) {
            $product = new Product();
            if ($i>=0 && $i<100) {
                $reference = $this->getReference(CategoryFixtures::MANTEAU_REFERENCE);
            }
            if ($i>=100 && $i<200) {
                $reference = $this->getReference(CategoryFixtures::CHEMISE_REFERENCE);
            }
            if ($i>=200 && $i<300) {
                $reference = $this->getReference(CategoryFixtures::PANTALON_REFERENCE);
            }
            if ($i>=300 && $i<400) {
                $reference = $this->getReference(CategoryFixtures::SWEAT_REFERENCE);
            }
            if ($i>=400 && $i<500) {
                $reference = $this->getReference(CategoryFixtures::VESTE_REFENCE);
            }
            $product->setCategory($reference);
            $product->setDescription($faker->text);
            $product->setIllustration(array_rand($filesList));
            $product->setIsBest($faker->boolean(50));
            $product->setName($faker->sentence($nbWords = 2, $variableNbWords = true));
            $product->setPrice($faker->randomNumber(5));
            $product->setSlug($faker->slug());
            $product->setSubtitle($faker->sentence($nbWords = 2, $variableNbWords = true));

            $manager->persist($product);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }

}