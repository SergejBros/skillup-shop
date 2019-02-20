<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 20.02.19
 * Time: 19:42
 */

namespace App\Menu;

use App\Repository\CategoryRepository;
use Knp\Menu\FactoryInterface;
use Knp\Menu\Provider\MenuProviderInterface;

class MenuProvider implements MenuProviderInterface
{
    /**
     * @var FactoryInterface
     */
    private $factory;


    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * MenuProvider constructor.
     * @param FactoryInterface $factory
     * @param CategoryRepository $categoryRepository
     */

    public function __construct(FactoryInterface $factory, CategoryRepository $categoryRepository)
    {
        $this->factory = $factory;
        $this->categoryRepository = $categoryRepository;
    }

    public function mainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $categoriesMenu = $menu->addChild('Категории', [
            'attributes' => [
            'dropdown' => true
             ]
        ]);

        foreach ($this->categoryRepository->findAll() as $category){
            $categoriesMenu->addChild($category->getName(),[
              'route' => 'category_item',
              'routeParameters' => ['id' => $category->getId()]
            ]);
        }

        $menu->addChild('Контакты', ['route' => 'feedback']);
        $menu->addChild('О магазине', ['route' => 'about']);

        return $menu;
    }

    /**
     * @param string $name
     * @param array $options
     * @return \Knp\Menu\ItemInterface
     * @throws \InvalidArgumentException if the menu doesn't exists
     */
    public function get($name, array $options = array())
    {
        // TODO: Implement get() method.
        if(!$this->has($name)){
            throw new \InvalidArgumentException('Menu "' . $name . '" doesn\'t exists.');
        }

        return $this->mainMenu($options);
    }


    /**
     * @param string $name
     * @param array $options
     * @return bool|void
     */
    public function has($name, array $options = array())
    {
        if($name == 'main'){
            return true;
        }
        return false;
    }

}