<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductOptionProductRepository")
 */
class ProductOptionProduct
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Product
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="productOptionsProduct")
     */
    private $product;

    /**
     * @var ProductOption
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductOption", inversedBy="productOptionsProduct")
     */
    private $productOption;

    /**
     * @var ProductOptionValue|null
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductOptionValue", inversedBy="productOptionsProduct")
     */
    private $productOptionValue;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function setProduct(Product $product): ProductOptionProduct
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return ProductOption
     */
    public function getProductOption(): ProductOption
    {
        return $this->productOption;
    }

    /**
     * @param ProductOption $productOption
     * @return $this
     */
    public function setProductOption(ProductOption $productOption): ProductOptionProduct
    {
        $this->productOption = $productOption;
        return $this;
    }

    /**
     * @return ProductOptionValue|null
     */
    public function getProductOptionValue(): ?ProductOptionValue
    {
        return $this->productOptionValue;
    }

    /**
     * @param ProductOptionValue|null $productOptionValue
     * @return $this
     */
    public function setProductOptionValue(?ProductOptionValue $productOptionValue): ProductOptionProduct
    {
        $this->productOptionValue = $productOptionValue;
        return $this;
    }

}
