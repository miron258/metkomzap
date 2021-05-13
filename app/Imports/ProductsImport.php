<?php

namespace App\Imports;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Transliterate;

use Illuminate\Database\Eloquent\Model;
use DB;
use Laravel\Scout\Searchable;


class ProductsImport implements ToModel, WithHeadingRow
{
    use Searchable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $params = request()->all();
        $user = auth()->user();

        /*
         * Длинные isset через тернарный оператор
         *   'name' => $row['client_name'] ?? $row['client'] ?? $row['name'] ?? null
        */

        $product = new Product();
        $product->meta_tag_title = isset($row['meta_tag_title']) ? $row['meta_tag_title'] : $row['name'];
        $product->meta_tag_description =  isset($row['meta_tag_description']) ? $row['meta_tag_description'] : $row['name'];
        $product->meta_tag_keywords =  isset($row['meta_tag_description']) ? $row['meta_tag_description'] : $row['name'];
        $product->name = isset($row['name']) ? $row['name'] : null;
        $product->url = isset($row['name']) ? Transliterate::slugify($row['name']) : null;
        $product->id_catalog = isset($params['id_catalog'] )? $params['id_catalog'] : null;
        $product->anons = isset($row['anons']) ? $row['anons'] : null;
        $product->description = isset($row['description']) ? $row['description'] : null;
        $product->art = isset($row['art']) ? $row['art'] : null;
        $product->price = isset($row['price']) ? $row['price'] : null;
        $product->sale = isset($row['sale']) ? $row['sale'] : 0;
        $product->new = isset($row['new']) ? $row['price'] : 0;
        $product->popular = isset($row['popular']) ? $row['popular'] : 0;
        $product->availability = isset($row['availability']) ? $row['availability'] :1;
        $product->properties = isset($row['properties']) ? $row['properties'] :null;
        $product->img = isset($row['img']) ? $row['img'] : null;
        $product->hidden = 1;
        $product->index = 1;
        $product->author = isset($row['author'])? $row['author']: $user->name;
        $product->update_author = isset($row['update_author'])? $row['update_author']: $user->name;


        $product->save();
    }
}
