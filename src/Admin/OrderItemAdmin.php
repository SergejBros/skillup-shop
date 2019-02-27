<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 27.02.19
 * Time: 19:51
 */

namespace App\Admin;


use App\Form\MoneyTransformer;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OrderItemAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $form)
    {
       $form
           ->add('product')
           ->add('quantity', null, [
               'attr' => ['class' => 'js-quantity js-recalc-cost'],
           ])
           ->add('price', TextType::class, [
               'attr' => ['class' => 'js-price js-recalc-cost']
           ])
           ->add('cost', TextType::class, [
               'attr' => ['class' => 'js-cost']
           ]);

        $form->get('price')->addModelTransformer(new MoneyTransformer());
        $form->get('cost')->addModelTransformer(new MoneyTransformer());
    }
}