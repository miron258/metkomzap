<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin\Menu;
use App\Models\API\Admin\MenuItems;
use App\Models\Admin\Catalog;
use Illuminate\Support\Facades\View;

class GenerateMenus {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        //Главное навигационное меню вверху сайта
        $menu = buildMenu(MenuItems::getMenuItems(1), 'topMenu', Menu::where('id', 1)->first()->class);
        $footerMenu1 = buildMenu(MenuItems::getMenuItems(2), 'footerMenu1', Menu::where('id', 2)->first()->class);
        $footerMenu2 = buildMenu(MenuItems::getMenuItems(3), 'footerMenu2', Menu::where('id', 3)->first()->class);
        $footerMenu3 = buildMenu(MenuItems::getMenuItems(4), 'footerMenu3', Menu::where('id', 4)->first()->class);
        $catalogsMenu = Catalog::where('parent_id', 6)->get(); //Вытаскиваем все дочерние каталоги Каталога Запчастей

        $data = array(
            'catalogsMenu' => $catalogsMenu,
            'menu' => $menu,
            'footerMenu1' => $footerMenu1,
            'footerMenu2' => $footerMenu2,
            'footerMenu3' => $footerMenu3,
        );

        View::share('menu', $data);
        return $next($request);
    }

}
