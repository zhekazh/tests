<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductOptionValueRepository")
 */
class ProductOptionValue
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
    private $value;

    /**
     * @var ProductOption
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductOption", inversedBy="productOptionValues")
     */
    private $productOption;

    /**
     * @var ProductOptionProduct[]|Collection
     * @ORM\OneToMany(targetEntity="App\Entity\ProductOptionProduct", mappedBy="productOptionValues")
     */
    private $productOptionsProduct;

    /**
     * ProductOptionValue constructor.
     */
    public function __construct()
    {
        $this->productOptionsProduct = new ArrayCollection();
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
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return ProductOption|null
     */
    public function getProductOption(): ?ProductOption
    {
        return $this->productOption;
    }

    /**
     * @param ProductOption|null $productOption
     * @return $this
     */
    public function setProductOption(?ProductOption $productOption): self
    {
        $this->productOption = $productOption;

        return $this;
    }
}
