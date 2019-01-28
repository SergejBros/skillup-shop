<?php

namespace App\Controller;

use App\Entity\FeedbackRequest;
use App\Form\FeedbackRequestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FeedbackController extends AbstractController
{
    /**
     * @Route("/feedback", name="feedback")
     */
    public function index()
    {
        $feedbackRequest = new FeedbackRequest();
        $form = $this->createForm(FeedbackRequestType::class, $feedbackRequest);

        return $this->render('feedback/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
