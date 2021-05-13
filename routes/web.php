<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::group(
        [
            'middleware' => 'menu'
        ]
        , function() {
//Routing Site
    Route::get('/', 'MainController@index')->name('site.index'); //главная страница сайта
    Route::get('page/{url}', 'PageController@index')->name('page_site.index');
    Route::get('product/{url}', 'ProductController@index')->name('product_site.index');
    Route::get('catalog/{url}', 'CatalogController@index')->name('catalog_site.index');
    Route::get('material/{url}', 'MaterialController@index')->name('material_site.index');
    Route::get('category/{url}', 'CategoryController@index')->name('category_site.index');
    Route::get('search', 'SearchController@index')->name('search_site.index');




//END Routing Site
});


Route::post('saveformcallback', 'ContactController@saveCallback');
Route::post('saveformquickorder', 'ContactController@saveQuickOrder');
Route::post('saveformaskquestion', 'ContactController@saveAskQuestion');


//Modal Callback Template
Route::get('modalcallback', function() {
    return view('layouts.modal.modalCallback');
})->name('modalcallback');

//Quick Order Template
Route::get('quickorder', function() {
    return view('layouts.quickorder.quickorder');
})->name('quickorder');

//Ask Question Template
Route::get('askquestion', function() {
    return view('layouts.askquestion.askquestion');
})->name('askquestion');

//Callback Template
Route::get('callback', function() {
    return view('layouts.callback.callback');
})->name('callback');


Route::get('sendbasicemail', 'MailController@basic_email');
Route::get('sendhtmlemail', 'MailController@html_email');
Route::get('sendattachmentemail', 'MailController@attachment_email');

Auth::routes();


//Группе маршрутов административной панели
//Чтобы войти на страничку эти маршрутов нужно пройти через посредник в данном случае через аутентификацию
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


//Получение данных путем AJAX после авторизации пользователя
//Route::get('admin/table_products', [
//    'middleware'=>'auth',
//'uses'=>'Admin\ProductController@tableProducts']);



Route::group(
        [
            'middleware' => 'auth',
            'prefix' => 'admin' //Добавляет префик к каждому маршруту в данном случае
        //  Route::resource('page', 'Admin\PageController'); равняется  Route::resource('admin/page', 'Admin\PageController');
        ]
        , function() {

//Здесь перечислены группы наших маршрутов
    //К каждому начала маршрута добавляется префикс admin

    Route::resource('page', 'Admin\PageController');
    Route::resource('catalog', 'Admin\CatalogController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('gallery', 'Admin\GalleryController');
    Route::resource('material', 'Admin\MaterialController');
    Route::resource('menu', 'Admin\MenuController');

    //Импорт товаров из Excel файла
    Route::post('import', 'Admin\ProductController@import')->name('import-products');
    Route::get('export', 'Admin\ProductController@export')->name('export-products');

    Route::get('list_pages', 'Admin\PageController@getPages'); //Получать список статических страни
    Route::get('table_pages', 'Admin\PageController@tablePages'); //Шаблон таблицы со списком страниц


    Route::get('list_materials', 'Admin\MaterialController@getMaterials'); //Получать список материалов
    Route::get('table_materials', 'Admin\MaterialController@tableMaterials'); //Шаблон таблицы со списком материалов


    Route::get('list_products', 'Admin\ProductController@getProducts'); //Получать список товаров
    Route::get('table_products', 'Admin\ProductController@tableProducts'); //Шаблон таблицы со списком товаров
});




