<?php
namespace IGestao\Domains\Laboratory\Repositories;

use IGestao\Domains\Laboratory\Product;
use IGestao\Domains\Laboratory\Repositories\Contracts\ProductInterface;
use IGestao\Domains\Laboratory\Transformers\ProductCollectionTransformer;
use IGestao\Domains\Laboratory\Transformers\ProductTransformer;
use IGestao\Support\Repository\AbstractRepository;

class ProductRepository extends AbstractRepository implements ProductInterface
{

    /*
     * @var  $model, Product
     * @type instace class
     */
    protected $model = Product::class;


    /*
     * @var  $resourceTransformer, ProductTransformer
     * @type instace class
     */
    protected $resourceTransformer = ProductTransformer::class;


    /*
    * @var  $collectionTransformer, ProductCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = ProductCollectionTransformer::class;


    /**
     * @override all()
     *
     * @param array $collumns
     * @param int|null $limit
     * @return Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function all($collumns = array('*'), int $limit = null)
    {
        $qSearchProduct  = $_GET['sProduct'] ?? null;
        $qUserSectorIds  = $_GET['sUserSectorIds'] ?? null;
        $qSectorId       = $_GET['sSectorId'] ?? null;
        $qCategoryId     = $_GET['sCategoryId'] ?? null;
        $qLimit          = $_GET['limit'] ?? $limit;

        $collection =
            $this->model
                ->select($collumns)
                ->whereHas('category', function ($query) use($qUserSectorIds, $qSectorId) {
                    if ($qUserSectorIds) {
                       $sectorIds = explode(',', $qUserSectorIds);
                       $query->whereIn('setor_id', $sectorIds);
                    }
                    if ($qSectorId)
                        $query->where('setor_id', $qSectorId);
                })
                ->where([
                    ['nome', 'like', "%{$qSearchProduct}%"],
                    ['categoria_id', 'like', "%{$qCategoryId}%"],
                ])
                ->latest()
                ->paginate($qLimit);

        return  $this->collectionTransformer::make($collection);
    }

}