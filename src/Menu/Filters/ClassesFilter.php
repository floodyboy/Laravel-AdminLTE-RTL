<?php

namespace acharsoft\LaravelAdminLte\Menu\Filters;

use acharsoft\LaravelAdminLte\Menu\Builder;

class ClassesFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        if (! isset($item['header'])) {
            $item['classes'] = $this->makeClasses($item);
            $item['class'] = implode(' ', $item['classes']);
            $item['top_nav_classes'] = $this->makeClasses($item, true);
            $item['top_nav_class'] = implode(' ', $item['top_nav_classes']);
        }

        return $item;
    }

    protected function makeClasses($item, $topNav = false)
    {
        $classes = [];

        if ($item['active']) {
            $classes[] = 'active';
        }

        if (isset($item['submenu'])) {
            $classes[] = $topNav ? 'dropdown' : 'has-treeview';
            if ($item['active']) {
                $classes[] = 'menu-open';
            }
        }

        return $classes;
    }
}
