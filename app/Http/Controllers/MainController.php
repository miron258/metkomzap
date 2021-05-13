<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Page;
use App\Models\Admin\Product;
use App\Models\Admin\Catalog;

class MainController extends Controller {

    public function index(Request $request) {
        $page = Page::where('url', 'main')->first();
        $catalogs = Catalog::where('parent_id', 6)->get(); //Вытаскиваем все дочерние каталоги Каталога Запчастей
        return view('index', compact('page', 'catalogs'));
    }

}
