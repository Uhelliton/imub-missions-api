<?php
namespace IGestao\Domains\Mission\Evangelism\Repositories;

use IGestao\Domains\Mission\Evangelism\Factsheet;
use IGestao\Domains\Mission\Evangelism\Repositories\Contracts\FactsheetInterface;
use IGestao\Domains\Mission\Evangelism\Transformers\FactsheetTransformer;
use IGestao\Domains\Mission\Evangelism\Transformers\FactsheetCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class CourseRepository extends AbstractRepository implements FactsheetInterface
{

    /*
     * @var  $model, Factsheet
     * @type instace class
     */
    protected $model = Factsheet::class;


    /*
     * @var  $resourceTransformer, FactsheetTransformer
     * @type instace class
     */
    protected $resourceTransformer = FactsheetTransformer::class;


    /*
    * @var  $collectionTransformer, FactsheetCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = FactsheetCollectionTransformer::class;


    /**
     * @override all()
     *
     * @param array $collumns
     * @param int|null $limit
     * @return Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function all($collumns = array('*'), int $limit = null)
    {
        $qSearchName          = $_GET['sName'] ?? null;
        $qSearchFactsheetCod  = $_GET['sFactsheetCod'] ?? null;
        $qLimit       = $_GET['limit'] ?? $limit;

        $collection =
            $this->model
                ->select($collumns)
                ->where([
                    ['nome', 'like', "%{$qSearchName}%"],
                    ['codigo', 'like', "%{$qSearchFactsheetCod}%"],
                ])
                ->latest()
                ->paginate($qLimit);

        return  $this->collectionTransformer::make($collection);
    }



    /*
     * Método que faz a inserção de dados em uma tabela com relacionamento
     *
     * @param array $attributes
     * @param array $attributesRelationship
     * @return mixed
     */
    public function createWithRalationship(array $attributesFactsheet, array $attributesFactsheetAddress)
    {
        $model = $this->model->create($attributesFactsheet);
        $model = $this->model->find($model->id);
        $model->address()->create($attributesFactsheetAddress);

        return $this->resourceTransformer::make($model);
    }


    /**
     * Método que faz a inserção de dados em uma tabela com relacionamento
     *
     * @param int  $id
     * @param array $attributes
     * @param array $attributesRelationship
     * @return mixed
     */
    public function updateWithRalationship(int $id, array $attributes, array $attributesRelationship)
    {
        $model =  $this->model->find($id);
        $model->fill( $attributes );
        $model->save();
        $model->address()->update($attributesRelationship);

        $model =  $this->model->find($id);
        return $this->resourceTransformer::make($model);
    }


}