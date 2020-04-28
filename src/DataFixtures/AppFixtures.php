<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\ProductOption;
use App\Entity\ProductOptionProduct;
use App\Entity\ProductOptionValue;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setName('Conditioner 1');
        $product->setPrice(10);
        $manager->persist($product);

        $product2 = new Product();
        $product2->setName('Conditioner 2');
        $product2->setPrice(20);
        $manager->persist($product2);

        $productOption = new ProductOption();
        $productOption->setName('Цвет');
        $manager->persist($productOption);

        $productOption2 = new ProductOption();
        $productOption2->setName('Рекомендованная площадь помещения');
        $manager->persist($productOption2);

        $productOptionValue = new ProductOptionValue();
        $productOptionValue->setValue('black');
        $productOptionValue->setProductOption($productOption);
        $manager->persist($productOptionValue);

        $productOptionValue2 = new ProductOptionValue();
        $productOptionValue2->setValue('white');
        $productOptionValue2->setProductOption($productOption);
        $manager->persist($productOptionValue2);

        $productOptionValue3 = new ProductOptionValue();
        $productOptionValue3->setValue(40);
        $productOptionValue3->setProductOption($productOption2);
        $manager->persist($productOptionValue3);

        $productOptionValue4 = new ProductOptionValue();
        $productOptionValue4->setValue(50);
        $productOptionValue4->setProductOption($productOption2);
        $manager->persist($productOptionValue4);

        $productOptionProduct = new ProductOptionProduct();
        $productOptionProduct->setProduct($product);
        $productOptionProduct->setProductOption($productOption);
        $productOptionProduct->setProductOptionValue($productOptionValue);
        $manager->persist($productOptionProduct);

        $productOptionProduct = new ProductOptionProduct();
        $productOptionProduct->setProduct($product);
        $productOptionProduct->setProductOption($productOption2);
        $productOptionProduct->setProductOptionValue($productOptionValue4);
        $manager->persist($productOptionProduct);

        $manager->flush();
    }
}
