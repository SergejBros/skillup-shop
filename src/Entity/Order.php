<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ORM\Table(name="orders")
 */
class Order
{
    const STATUS_NEW = 1; // новый
    const STATUS_ORDERED = 2; // заказан
    const STATUS_SENT= 3; // отправлен
    const STATUS_RECEIVED= 4; // получен

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $IsPaid;

    /**
     * @ORM\Column(type="integer")
     */
    private $summ;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="orders")
     */
    private $user;

    /**
     * @var OrderItem
     *
     * @ORM\OneToMany(targetEntity="App\Entity\OrderItem", mappedBy="order",
     * orphanRemoval=true, indexBy="product_id", cascade={"persist"}    )
     */
    private $items;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->status = self::STATUS_NEW;
        $this->isPaid = false;
        $this->amount = 0;
        $this->items = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreated(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->status;
    }

    public function setState(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIsPaid(): ?bool
    {
        return $this->IsPaid;
    }

    public function setIsPaid(bool $IsPaid): self
    {
        $this->IsPaid = $IsPaid;

        return $this;
    }


    public function getSumm(): ?int
    {
        return $this->summ;
    }

    public function setSumm(int $summ): self
    {
        $this->summ = $summ;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|OrderItem[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(OrderItem $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setOrder($this);
        }

        return $this;
    }

    public function removeItem(OrderItem $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
            // set the owning side to null (unless already changed)
            if ($item->getOrder() === $this) {
                $item->setOrder(null);
            }
        }

        return $this;
    }
}
