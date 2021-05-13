<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CatalogController as Catalog;
use App\Models\Admin\Product;
use App\Models\Admin\Catalog as CatalogModel;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequest as ProductRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Laravel\Scout\Searchable;
use TeamTNT\TNTSearch\TNTSearch;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{

    public function __construct()
    {
        //Подключение модели продукта
        $this->product = new Product;
    }

    //AJAX QUERY

    public function tableProducts()
    {
        return view('auth.product.table');
    }

    public function getProducts(Request $request)
    {

        $numPage = $request->input('page'); //Номер страницы
        $idCatalog = $request->input('idCatalog');
        $price = $request->input('price');
        $name = $request->input('name');
        $art = $request->input('art');

        return $products = $this->product->getAllProducts(100, $idCatalog, $price, $name, $art);
    }

    //END AJAX QUERY


    /////////////////// ИМПОРТ И ЭКСПОРТ В XLS И ИЗ XLS ФАЙЛА

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {

        if ($request->file('file')) {

            $validator = Validator::make(
                [
                    'file' => $request->file,
                    'extension' => strtolower($request->file->getClientOriginalExtension()),
                ],
                [
                    'file' => 'required',
                    'extension' => 'required|in:doc,csv,xlsx,xls,docx,ppt,odt,ods,odp',
                ]);

            if ($validator->fails()) {
                return back()->with("error-import", $validator);
            } else {
                try {
                    Excel::import(new ProductsImport, $request->file('file'));
                    return back()->with('success-import', 'Загрузка товаров успешно завершена!');
                } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                    $failures = $e->failures();

                    foreach ($failures as $failure) {
                        $failure->row(); // row that went wrong
                        $failure->attribute(); // either heading key (if using heading row concern) or column index
                        $failure->errors(); // Actual error messages from Laravel validator
                        $failure->values(); // The values of the row that has failed.
                    }
                    return back()->with("error-import", "Не удалось загрузить товары!<br>" . $failure->errors());

                }
            }
        } else {
            return back()->with("error-import", "Вы не выбрали файл!");
        }

    }
    /////////////////// КОНЕЦ ИМПОРТ И ЭКСПОРТ В XLS И ИЗ XLS ФАЙЛА

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = CatalogModel::get()->toTree();
        return view('auth.product.index', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CatalogModel $catalog, Request $request)
    {

        $arrayCheckbox = array(
            'sale' => 'Распродажа',
            'new' => 'Новинка',
            'popular' => 'Популярный'
        );


        $catalogs = CatalogModel::get()->toTree();
        return view('auth.product.form', compact('catalogs', 'arrayCheckbox'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $params = $request->all(); //Все данные с инпутов формы
        $user = auth()->user();

        $product = new Product();
        $product->meta_tag_title = (empty($params['meta_tag_title'])) ? $params['name'] : $params['meta_tag_title'];
        $product->meta_tag_description = $params['meta_tag_description'];
        $product->meta_tag_keywords = $params['meta_tag_keywords'];
        $product->name = $params['name'];
        $product->url = $params['url'];
        $product->id_catalog = $params['id_catalog'];
        $product->anons = $params['anons'];
        $product->description = $params['description'];
        $product->video = $params['video'];
        $product->properties = isset($params['properties']) ? $params['properties'] : '';
        $product->count_stock = $params['count_stock'];
        $product->art = $params['art'];
        $product->price = $params['price'];
        $product->old_price = $params['old_price'];


        //Рейтинг товара и доступность на складе
        $product->sale = $request->has('sale');
        $product->new = $request->has('new');
        $product->popular = $request->has('popular');
        $product->availability = 1;
        $product->index = 1;
        $product->hidden = 1;
        $product->author = $user->name;
        $product->update_author = $user->name;
        $images = array();

        if ($files = $request->file('images')) {
            foreach ($files as $index => $file) {
                $path = $request->images[$index]->store('products');

                $width = 800; // your max width
                $height = 600; // your max height
                $img = Image::make('storage/'.$path);
                $img->height() > $img->width() ? $width=null : $height=null;
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });

                //Перезаписываем и сохраняем образанное изображение
                $img->save('storage/'.$path);
                $images[$index] = $path;
            }


            /* Insert your data array images to json */
            $product->img = json_encode($images);
        }

        //Create Index TNTSearch Product


        $product->save();
        return redirect()->route('product.create')->with('message', 'Продукт успешно создан');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('auth.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $arrayCheckbox = array(
            'hidden' => 'Показать/Скрыть товар',
            'index' => 'Показать/Скрыть из поиска',
            'sale' => 'Распродажа',
            'new' => 'Новинка',
            'popular' => 'Популярный',
            'availability' => 'Наличие товара'
        );


        $catalogs = CatalogModel::get()->toTree();
        if (!empty($product->img)) {
            $productImages = json_decode($product->img);
        } else {
            $productImages = array();
        }
        return view('auth.product.form', compact('product', 'catalogs', 'productImages', 'arrayCheckbox'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $params = $request->all(); //Все данные с инпутов формы
        $user = auth()->user();

        $id = $params['productId'];
        $product = Product::find($id);


        $product->meta_tag_title = (empty($params['meta_tag_title'])) ? $params['name'] : $params['meta_tag_title'];
        $product->meta_tag_description = $params['meta_tag_description'];
        $product->meta_tag_keywords = $params['meta_tag_keywords'];
        $product->name = $params['name'];
        $product->url = $params['url'];
        $product->id_catalog = $params['id_catalog'];
        $product->anons = $params['anons'];
        $product->description = $params['description'];
        $product->video = $params['video'];
        $product->properties = isset($params['properties']) ? $params['properties'] : '';
        $product->count_stock = $params['count_stock'];
        $product->art = $params['art'];
        $product->price = $params['price'];
        $product->old_price = $params['old_price'];


        //Рейтинг товара и доступность на складе
        $product->sale = $request->has('sale');
        $product->new = $request->has('new');
        $product->popular = $request->has('popular');
        $product->availability = $request->has('availability');
        $product->index = $request->has('index');
        $product->hidden = $request->has('hidden');
        $product->author = $product->author;
        $product->update_author = $user->name;

        $images = array();

        if ($files = $request->file('images')) {


            //Удаляем все старые изображения товара
            if (!empty($product->img)) {
                $old_images = json_decode($product->img);
                if (is_array($old_images)) {
                    foreach ($old_images as $index => $img) {
                        $isDelete = Storage::delete($img);
                    }
                }
            }


            foreach ($files as $index => $file) {
                $path = $request->images[$index]->store('products');
                $width = 800; // your max width
                $height = 600; // your max height
                $img = Image::make('storage/'.$path);
                $img->height() > $img->width() ? $width=null : $height=null;
                $img->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
                //Перезаписываем и сохраняем образанное изображение
                $img->save('storage/'.$path);
                $images[$index] = $path;
            }

            /* Insert your data array images to json */
            $product->img = json_encode($images);
        }

        $product->save();
        return redirect()->route('product.edit', $product->id)->with('message', 'Продукт ' . $product->name . ' успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        if ($ids && !empty($ids)) {
            $ids = explode(",", $ids);
            Product::find($ids)->each(function ($product, $key) {
                $product->delete();
            });

            $products = $this->product->getAllProducts();
            return response()->json([
                'success' => true,
                'products' => $products,
                'message' => '<div class="alert alert-success">Товар(ы) успешно удалены</div>',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => '<div class="alert alert-danger">Не удалось удалить товар(ы)</div>',
            ], 500);
        }
    }

}
