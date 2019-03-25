<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(ProductRepository $productRepository)
    {
        $products = $productRepository->findBy([
                'isTop' => true
            ]);
        return $this->render('default/index.html.twig', [
            'products' => $products,

        ]);
    }

    /**
     * @Route("/search", name="search")
     */
    public function search(Request $request, ProductRepository $productRepository)
    {
        $query = $request->query->get('q');
        if($query){
            $products =  $productRepository->findByName($query);
        }
        else{
            $products = [];
        }

        return $this->render('default/search.html.twig', [
            'products' => $products,
        ]);
    }
}
