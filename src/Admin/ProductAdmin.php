<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 21.01.19
 * Time: 19:15
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductAdmin extends AbstractAdmin
{


    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->addIdentifier('name')
            ->addIdentifier('price')
            ->addIdentifier('isTop')
            ->addIdentifier('description');
    }
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('id')
            ->add('name')
            ->add('price')
            ->add('isTop')
            ->add('description');
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form
           // ->add('id')
            ->add('name')
            ->add('price')
            ->add('isTop')
            ->add('description');
    }


}