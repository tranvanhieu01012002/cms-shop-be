<?php

namespace App\Services\Product;

use App\Http\Resources\Product\ProductResourceCollection;
use App\Http\Resources\ProductResource;
use App\Repositories\Product\IProductRepository;
use App\Traits\PrepareDataResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductService implements IProductService
{

    use PrepareDataResponse;

    public function __construct(
        protected IProductRepository $productRepo
    ) {
    }

    public function get(Request $request)
    {
        $response = $this->productRepo->paginateWithMediaAndCategories();
        return $this->prepareData(new ProductResourceCollection($response), 200, 'get successful');
    }

    public function create($attribute = [])
    {
        DB::beginTransaction();
        $response = array();
        try {
            $product = $this->productRepo->create($attribute);
            if (isset($attribute['categories'])) {
                $product->categories()->attach($attribute['categories']);
            }
            if (isset($attribute['file'])) {
                foreach ($attribute['file'] as $index => $nameFile) {
                    $url = $this->createUrl($nameFile);
                    $product->media()->create(['path' => $url, 'table_name' => 'categories']);

                    ['url' => $url, 'headers' => ['Host' => [$host]]] = generateUploadUrl($url);
                    $response[$index]['url'] = $url;
                    $response[$index]['host'] = $host;
                }
            }
            DB::commit();
            return $this->prepareData($response, 201, 'create successful');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->prepareData(['error' => $th->getMessage()], 422, 'Can not create new product');
        }
    }

    public function createUrl($nameFile)
    {
        $tableName = $this->productRepo->getEntityModel()->getTable();
        return  $tableName . '/' . time() . '-' . $nameFile;
    }
}
