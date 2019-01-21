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
            ->addIdentifier('description')
            ->addIdentifier('price')
            ->addIdentifier('isTop')
            ->addIdentifier('name');
    }
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('id')
            ->add('description')
            ->add('price')
            ->add('isTop')
            ->add('name');
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('id')
            ->add('description')
            ->add('price')
            ->add('isTop')
            ->add('name');
    }


}