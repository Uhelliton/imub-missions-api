<?php

namespace IGestao\Domains\Stock\Jobs;

use IGestao\Domains\Laboratory\Repositories\Contracts\ProductInterface;
use IGestao\Domains\Stock\Repositories\Contracts\StockInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ChangeCurrentStock implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var mixed
     */
    private $request;

    /**
     * @var mixed
     * @type 'reduce', 'increase'
     */
    private $requestType;

    /**
     * @type instace class
     */
    private $stockRepository;

    /**
     * @type instace class
     */
    private $productRepository;

    /**
     * Cria um anova instancia do job
     *
     * @param array $request
     * @param string $requestType
     */
    public function __construct(array $request, string $requestType)
    {
        $this->request = json_parse($request);
        $this->requestType = $requestType;
        $this->stockRepository   = app()->make(StockInterface::class);
        $this->productRepository = app()->make(ProductInterface::class);
    }

    /**
     * Executa o job
     */
    public function handle()
    {
        if ($this->requestType === 'reduce') {
            $this->reduceStock();
        } else {
            $this->increaseStock();
        }
    }


    /**
     *
     */
    private function reduceStock()
    {
        $request = $this->request;
        $productIds = $this->getOnlyProductIds();
        $collection = $this->stockRepository->findWhereIn('produto_id', $productIds);

        $collection->map(function ($object, $key) use($request) {
            $filter = array_filter($request->items, function($item) use ($object) {
                $item = json_parse($item);
                return  $item->product->id == $object->product->id;
            });
            // lista o primeiro item de uma matriz
            $filter =  json_parse(current($filter));

            $attributes =  [ 'qtd'  => ($object->qtd - $filter->qty)];
            $this->stockRepository->update($attributes, $object->id);
        });
    }


    /**
     *
     */
    private function increaseStock()
    {
        $request = $this->request;
        $productIds = $this->getOnlyProductIds($request);
        $productCollection = $this->productRepository->findWhereIn('id', $productIds);
        $stockCollection   = $this->stockRepository->findWhereIn('produto_id', $productIds);

        // Procedimento para atualizar um produto existente no stock
        $stockFiltered = $stockCollection->whereIn('product.id', $productIds);
        $stockFiltered->map(function ($object, $key) use($request) {
            $filter = array_filter($request->items, function($item) use ($object) {
                $item = json_parse($item);
                return  $item->product->id == $object->product->id;
            });
            $filter    =  json_parse( current($filter) );
            $attributes = [ 'qtd' =>  ($filter->qty + $object->qtd) ];
            $this->stockRepository->update($attributes, $object->id);
        });

        // Procedimento para incluir um novo produto no stock
        $productIdsBelongStock = $stockCollection->whereIn('product.id', $productIds)->pluck('product.id');
        $productFiltered = $productCollection->whereNotIn('id', $productIdsBelongStock);
        $productFiltered->map(function ($object, $key) use($request) {
            $filter = array_filter($request->items, function($item) use ($object) {
                $item = json_parse($item);
                return  $item->product->id == $object->id;
            });
            $filter     =  json_parse( current($filter) );
            $attributes = [
                'produto_id' =>  $filter->product->id,
                'qtd'        =>  $filter->qty
            ];
            $conditon = ['produto_id' =>  $filter->product->id];
            $this->stockRepository->updateOrCreate($conditon, $attributes);
        });
    }


    /**
     * Lista os apenas id dos produtos
     * @return array
     */
    public function getOnlyProductIds()
    {
        foreach ($this->request->items as $item) {
            $item = json_parse($item);
            $productIds[] = $item->product->id;
        }

        return $productIds;
    }
}
