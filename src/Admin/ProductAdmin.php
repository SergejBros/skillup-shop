<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 21.01.19
 * Time: 19:15
 */

namespace App\Admin;

use App\Entity\Category;
use App\Entity\Product;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductAdmin extends AbstractAdmin
{

    /**
     * @var CacheManager
     */
    private $cacheManager;

    public function __construct(string $code, string $class, string $baseControllerName, CacheManager $cacheManager)
    {
        parent::__construct($code, $class, $baseControllerName);

        $this->cacheManager = $cacheManager;
    }

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
        $cacheManager = $this->cacheManager;
        $form
           // ->add('id')
            ->add('name')
            ->add('price')
            ->add('isTop')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
            ])
            ->add('description')
            ->add('image', VichImageType::class, [
                'required' => false,
                'image_uri' => function(Product $product, $resolvedUri) use ($cacheManager)
                {
                    if(!$resolvedUri){
                        return null;
                    }
                    return $cacheManager->getBrowserPath($resolvedUri, 'squared_thumbnail');
                }
            ]);
    }


}