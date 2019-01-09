<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 09.01.19
 * Time: 19:49
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(){
        return new Response('<h1>Hello</h1>');

    }
    /**
     * @Route("/about", name="about")
     */
    public function about(){
        return new Response('<h1>About us</h1>');
    }

}