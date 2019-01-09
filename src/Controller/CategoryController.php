<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{slug}", name="category", requirements={"slug": "^[-\w]+$"})
     */
    public function index($slug = 'all')
    {
        switch ($slug){
            case 'tv': $name = 'телевизор'; break;
            case 'media': $name = 'мультимедиа'; break;
            case 'all': $name = 'все'; break;
            default:
               throw $this->createNotFoundException('no');
        }


        return $this->render('category/index.html.twig', [
            'category_slug' => $slug,
            'category_name' => $name
        ]);
    }
}
