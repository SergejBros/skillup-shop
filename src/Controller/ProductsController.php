<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    /**
     * @Route("/products/{id}", name="products_item")
     */
    public function item(Product $product)
    {
        // $product = $productRepository->find($id);

        if(!$product){
            throw $this->createNotFoundException("Товар не найден");
        }

        return $this->render('products/item.html.twig', [
            'product' => $product,
        ]);
    }
}
