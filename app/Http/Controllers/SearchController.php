<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\Catalog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Lavary\Menu\Collection;
use TeamTNT\TNTSearch\Support\Highlighter;
use TeamTNT\TNTSearch\TNTSearch;

class SearchController extends Controller {

    public function __construct() {
        //Подключение модели продукта
        $this->product = new Product;
    }

    public function index(Request $request) {

        //Поисковый запрос
        $query = $request->all()['query'];
        if (!empty($query)) {
            $tnt = new TNTSearch;
            $paginator =  Product::search($query)->paginate(50);




            //Products Collection Filter Transform
            $items = $paginator->getCollection()->transform(function($product) use ($query, $tnt){
                $product->name = $tnt->highlight($product->name, $query, 'b', [
                    'simple' => false,
                    'wholeWord' => false,
                    'tagOptions' => [
                        'class' => 'search-term',
                        'title' => $query
                    ]
                ]);

                return $product;
            });

            $products = new \Illuminate\Pagination\LengthAwarePaginator(
                $items,
                $paginator->total(),
                $paginator->perPage(),
                $paginator->currentPage(), [
                    'path' => \Request::url(),
                    'query' => [
                        'query' => $query,
                        'page' => $paginator->currentPage()
                    ]
                ]
            );

            if (is_null($products)) {
                return response()
                                ->view(
                                        'search.index',
                                        [
                                            'products' => $products,
                                            'message' => 'По вашему запросу ничего не найдено', 'meta_tag_title' => 'По вашему запросу ничего не найдено'
                                        ],
                                        404);
            } else {
                ///Делаем подсветку найденного слова в поиске
                return view('search.index', compact('products'));
            }
        } else {
            return response()
                            ->view(
                                    'search.index',
                                    [
                                        'products' => '',
                                        'message' => 'По вашему запросу ничего не найдено', 'meta_tag_title' => 'По вашему запросу ничего не найдено'
                                    ],
                                    200);
        }
    }

}
