<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 28.01.19
 * Time: 20:37
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FeedbackAdmin extends AbstractAdmin{

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name')
            ->addIdentifier('email')
            ->addIdentifier('message')
            ->addIdentifier('createdAt');
    }
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name')
            ->add('email')
            ->add('message')
            ->add('createdAt');
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name')
            ->add('email')
            ->add('message');
    }

}