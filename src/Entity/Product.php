<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Product
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
     * @Assert\NotBlank
     * @Assert\Type("string")
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var float
     * @Assert\NotBlank
     * @Assert\Type("float")
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var ProductOptionProduct[]|Collection
     * @ORM\OneToMany(targetEntity="App\Entity\ProductOptionProduct", mappedBy="product")
     */
    private $productOptionProducts;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->productOptionProducts = new ArrayCollection();
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
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function updatedTimestamps(): void
    {
        $dateTimeNow = new DateTime('now');

        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }
    }

    /**
     * @return ProductOptionProduct[]|Collection
     */
    public function getProductOptionProducts(): Collection
    {
        return $this->productOptionProducts;
    }

    /**
     * @param ProductOptionProduct $productOptionProduct
     * @return $this
     */
    public function addProductOptionProduct(ProductOptionProduct $productOptionProduct): self
    {
        if (!$this->productOptionProducts->contains($productOptionProduct)) {
            $this->productOptionProducts[] = $productOptionProduct;
            $productOptionProduct->setProduct($this);
        }

        return $this;
    }

    /**
     * @param ProductOptionProduct $productOptionProduct
     * @return $this
     */
    public function removeProductOptionProduct(ProductOptionProduct $productOptionProduct): self
    {
        if ($this->productOptionProducts->contains($productOptionProduct)) {
            $this->productOptionProducts->removeElement($productOptionProduct);
        }

        return $this;
    }
}
