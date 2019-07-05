<?php
namespace IGestao\Domains\Stock\Repositories;

use IGestao\Domains\Stock\Stock;
use IGestao\Domains\Stock\Repositories\Contracts\StockInterface;
use IGestao\Domains\Stock\Transformers\StockTransformer;
use IGestao\Domains\Stock\Transformers\StockCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class StockRepository extends AbstractRepository implements StockInterface
{

    /*
     * @var  $model, Stock
     * @type instace class
     */
    protected $model = Stock::class;


    /*
     * @var  $resourceTransformer, StockTransformer
     * @type instace class
     */
    protected $resourceTransformer = StockTransformer::class;


    /*
    * @var  $collectionTransformer, StockCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = StockCollectionTransformer::class;


    /**
     * @overrider method
     *
     * @param array $collumns
     * @param int|null $limit
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function all($collumns = array('*'), int $limit = null)
    {
        $qSearchProduct   = $_GET['sProduct'] ?? null;
        $qUserSectorIds   = $_GET['sUserSectorIds'] ?? null;
        $qSectorId        = $_GET['sSectorId'] ?? null;
        $qCategoryProduct = $_GET['sCategoryId'] ?? null;
        $qOrderBy         = $_GET['orderBy'] ?? 'DESC';
        $qLimit           = $_GET['limit'] ?? $limit;

        $collection =
            $this->model
                ->select($collumns)
                ->with(['product', 'product.category'])
                ->whereHas('product', function ($query) use($qSearchProduct) {
                    $query->where('nome', 'like', "%{$qSearchProduct}%");
                })
                ->whereHas('product.category', function ($query) use($qSectorId, $qCategoryProduct, $qUserSectorIds) {
                    if ($qCategoryProduct)
                        $query->where('id', $qCategoryProduct);

                    if ($qSectorId)
                        $query->where('setor_id', $qSectorId);

                    if ($qUserSectorIds) {
                        $sectorIds = explode(',', $qUserSectorIds);
                        $query->whereIn('setor_id', $sectorIds);
                    }
                })
                ->orderBy('qtd', $qOrderBy)
                ->paginate($qLimit);

        return  $this->collectionTransformer::make($collection);
    }

}