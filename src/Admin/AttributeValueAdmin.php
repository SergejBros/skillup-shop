<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 11.03.19
 * Time: 19:13
 */

namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class AttributeValueAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('attribute')
            ->add('value');

    }
}