<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.08.2018
 * Time: 11:27
 */

namespace app\components;
use yii\base\Widget;
use app\models\Category;
use Yii;
class MenuWidget extends Widget
{
    public $tpl;
    public $data; //свойства ДАТА (Будут хранится все записи категории из б.д.)
    public $tree; //свойства Tree (будут хранится результат работы функции data и записывать в массив в виде дерево)
    public $menuHtml;
    public $model;

    public function init(){
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .='.php';
    }

    public function  run(){
        //get cache
        if($this->tpl == 'menu.php')
         {
             $menu = Yii::$app->cache->get('menu');
             if($menu) return $menu;
         }


        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);;
        //set cache
        if($this->tpl == 'menu.php')
        {
            Yii::$app->cache->set('menu', $this->menuHtml, 60);
        }

        return $this->menuHtml;
    }

    /*Выводим деревом элементы массива категории*/
    protected function getTree(){
        $tree = [];
        foreach ($this->data as $id=>&$node) {
          if(!$node['parent_id'])
              $tree[$id] = &$node;
          else
              $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }
    /**/
    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $category){
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    /**/
    protected function catToTemplate($category,$tab){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}