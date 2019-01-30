<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderItemRepository")
 * @ORM\Table(name="order_items")
 */
class OrderItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Order
     * @ORM\ManyToOne(targetEntity="App\Entity\Order", inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $order;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="orderItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\Column(type="integer", options={"defaul": 0})
     */
    private $quantity;

    /**
     * @ORM\Column(type="integer", options={"defaul": 0})
     */
    private $price;

    /**
     * @ORM\Column(type="integer", options={"defaul": 0}))
     */
    private $cost;

    public function __construct(){
        $this->quantity = 0;
        $this->price = 0;
        $this->cost = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrder(): ?string
    {
        return $this->order;
    }

    public function setOrder(string $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(string $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCost(): ?int
    {
        return $this->cost;
    }

    public function setCost(int $cost): self
    {
        $this->cost = $cost;

        return $this;
    }
}
