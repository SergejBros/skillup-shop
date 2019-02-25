<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 30.01.19
 * Time: 20:28
 */

namespace App\Service;


use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class OrdersService
{
    private $request;
    private $orderRepository;
    private $entityManager;

    public function __construct(
        RequestStack $requestStack,
        OrderRepository $orderRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->request = $requestStack->getCurrentRequest();
        $this->orderRepository = $orderRepository;
        $this->entityManager = $entityManager;
    }

    public function addToCart(Product $product)
    {
        $order = $this->getOrderFromRequest();

        $items = $order->getItems();

        if($items[$product->getId()])
        {
            $items[$product->getId()]->addQuantity(1);
        } else {
            $item = new OrderItem();
            $item->setProduct($product);
            $item->setQuantity(1);
            $order->addItem($item);
            $this->entityManager->persist($item);
        }
        $this->entityManager->flush();

        return $order;
    }

    public function getOrderFromRequest()
    {
        $order = null;
        $orderId = $this->request->cookies->get('orderId');

        if($orderId)
        {
           $order = $this->orderRepository->find($orderId);
        }

        if(!$order)
        {
            $order = new Order();
            $this->entityManager->persist($order);
        }

        return $order;
    }

    public function removeItem(OrderItem $item)
    {
        $cart = $this->getOrderFromRequest();
        $order = $item->getOrder();

        if($cart !== $order){
            return;
        }

        $order->removeItem($item); // убирает item из заказа
        $this->entityManager->remove($item); // убираем item
        $this->entityManager->flush(); // изменения в бд
    }

    public function setItemQuantity(OrderItem $item, $quantity)
    {
        $cart = $this->getOrderFromRequest();
        $order = $item->getOrder();

        if($cart !== $order){
            return;
        }

        if($quantity < 1){
            return;
        }

        $item->setQuantity($quantity);
        $this->entityManager->flush();

    }

    public function prepareOrder(?User $user)
    {
        $order = $this->getOrderFromRequest();

        if($user){
            $order->setFirstName($user->getFirstName());
            $order->setLastName($user->getLastName());
            $order->setEmail($user->getEmail());
            $order->setPhone($user->getPhone());
            $order->setAddress($user->getAddress());

        }

        return $order;

    }

    public function sendOrder(Order $order)
    {
        $order->setStatus(Order::STATUS_ORDERED);
        $this->entityManager->persist($order);
        $this->entityManager->flush();
    }

}