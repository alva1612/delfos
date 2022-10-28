<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Product;

use App\Models\ProductList;



class ProductController extends Controller
{
    public function index(Request $request)
    {

        $page = 1;
        if($request->has('page')){
            $page = $request->input('page');
        }

        $productsList = ProductList::getList();
        $productsListSize = count($productsList);

        $productsToDisplay = $this->paginate($productsList, 5,$page);
        $productsReturnedSize = count($productsToDisplay);

        return view('tienda', [
            'size' => $productsListSize,
            'onDisplay' => $productsReturnedSize,
            'products' => $productsToDisplay,
        ]);
    }


    public function api_products(Request $request)
    {
        $page = 1;
        if($request->has('page')){
            $page = $request->input('page');
        }

        $productsList = ProductList::getList();
        $pagination = $this->paginate($productsList, 5,$page);
        $productsToDisplay = $pagination;

        foreach($productsToDisplay as $key=>$product)
        {
            $storedProduct = array(
                '_id' => $product->get_Id(),
                'name' => $product->getName(),
                'slug' => $product->getSlug(),
            );
            $productsArray[] = $storedProduct;
        }

        $productsReturnedSize = count($productsArray);
        return $productsArray;
    }

    public function api_search(Request $request)
    {
        $value = "";
        if($request->has('value')){
            $value = $request->input('value');
            $value = strtolower($value);
        }
        $productsList = ProductList::getList();

        $productsArray = [];
        foreach($productsList as $key=>$product)
        {
            $lowercaseName = strtolower($product->getName());

            if (strpos($lowercaseName, $value) !== FALSE) {
                $storedProduct = array(
                    '_id' => $product->get_Id(),
                    'name' => $product->getName(),
                    'slug' => $product->getSlug(),
                );
                $productsArray[] = $storedProduct;
            }

        }
        return $productsArray;
    }

    private function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


}

