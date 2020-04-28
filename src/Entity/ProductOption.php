<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductOptionRepository")
 */
class ProductOption
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var ProductOptionProduct|Collection
     * @ORM\OneToMany(targetEntity="App\Entity\ProductOptionProduct", mappedBy="productOption")
     */
    private $productOptionProducts;

    /**
     * @var ProductOptionValue|Collection
     * @ORM\OneToMany(targetEntity="App\Entity\ProductOptionValue", mappedBy="productOption")
     */
    private $productOptionValues;

    /**
     * ProductOption constructor.
     */
    public function __construct()
    {
        $this->productOptionProducts = new ArrayCollection();
        $this->productOptionValues = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|ProductOptionProduct[]
     */
    public function getProductOptionProducts(): Collection
    {
        return $this->productOptionProducts;
    }

    /**
     * @param ProductOptionProduct $productOptionProduct
     * @return $this
     */
    public function addProductOptionProducts(ProductOptionProduct $productOptionProduct): self
    {
        if (!$this->productOptionProducts->contains($productOptionProduct)) {
            $this->productOptionProducts[] = $productOptionProduct;
        }

        return $this;
    }

    /**
     * @param ProductOptionProduct $productOptionProduct
     * @return $this
     */
    public function removeProduct(ProductOptionProduct $productOptionProduct): self
    {
        if ($this->productOptionProducts->contains($productOptionProduct)) {
            $this->productOptionProducts->removeElement($productOptionProduct);
        }

        return $this;
    }

    /**
     * @return string|null
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return Collection|ProductOptionValue[]
     */
    public function getProductOptionValues(): Collection
    {
        return $this->productOptionValues;
    }

    /**
     * @param ProductOptionValue $productOptionValue
     * @return $this
     */
    public function addProductOptionValue(ProductOptionValue $productOptionValue): self
    {
        if (!$this->productOptionValues->contains($productOptionValue)) {
            $this->productOptionValues[] = $productOptionValue;
            $productOptionValue->setProductOption($this);
        }

        return $this;
    }

    /**
     * @param ProductOptionValue $productOptionValue
     * @return $this
     */
    public function removeProductOptionValue(ProductOptionValue $productOptionValue): self
    {
        if ($this->productOptionValues->contains($productOptionValue)) {
            $this->productOptionValues->removeElement($productOptionValue);
        }

        return $this;
    }
}
