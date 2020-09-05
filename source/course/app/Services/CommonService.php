<?php

namespace App\Services;
use App\Category;
use App\Slide;

class Common
{
    /**
     * get menu active in sidebar menu
     */
    public static function getMenuActive($nameController)
    {
        $routeArray =  app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($currentController, $currentAction) = explode('@', $controllerAction);
        
        if ($currentController === $nameController) {
            return 'active';
        }
        return '';
    }

    /**
     * get random string width default length 16
     */
    public static function randomString($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    /**
     * build recursive menu
     * 
     * @param  array  $arr
     * @param  integer $parent
     * @param  integer $indent
     * @param  array   &$arrRes
     */
    public static function buildTreeCategories($arr, $parent = 0, $indent = 0, &$arrRes = [])
    {
        foreach($arr as $item)
        {
            if ($item->parent_id == $parent)
            {
                if ($indent != 0)
                {
                    $arrRes[$item->id] = (object)[
                        'id' => $item->id,
                        'name' => str_repeat("&nbsp;", $indent) . "-&nbsp;".$item->name,
                        'description' => $item->description,
                        'status' => $item->status,
                        'parent_id' => $item->parent_id
                    ];
                }
                if ($item->parent_id == 0) {
                    $arrRes[$item->id] = (object)[
                        'id' => $item->id,
                        'name' => $item->name,
                        'description' => $item->description,
                        'status' => $item->status,
                        'parent_id' => $item->parent_id
                    ];
                }
                static::buildTreeCategories($arr, $item->id, $indent + 2, $arrRes);
            }
        }
        return $arrRes;
    }

    /**
     * get list category 
     * 
     * @return array
     */
    public static function getCategoryCanSell()
    {
        $objCategory = new Category();
        $categories = $objCategory->getListCategoriesCanSell();
        $parentCategories = [];
        $childCategories = [];
        foreach ($categories as $value) {
            if ($value->parent_id == 0) {
                $parentCategories[$value->id] = $value;
            } else {
                $childCategories[$value->id] = $value;
            }
        }
        return [
            'parentCategories' => $parentCategories,
            'childCategories' => $childCategories
        ];
    }

    /**
     * get slide in website
     * 
     * @return array
     */
    public static function getSlides()
    {
        $slide = new Slide();
        $slides = $slide->getListSlides();

        return $slides;
    }

    /**
     * get current controller and action in route
     * 
     * @return array
     */
    public static function getCurrentControllerAndAction()
    {
        $routeArray =  app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($currentController, $currentAction) = explode('@', $controllerAction);
        return [
            'controller' => $currentController,
            'action' => $currentAction
        ];
    }

}