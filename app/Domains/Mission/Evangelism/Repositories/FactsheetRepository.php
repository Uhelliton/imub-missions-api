<?php
namespace IGestao\Domains\Mission\Evangelism\Repositories;

use IGestao\Domains\Mission\Evangelism\Factsheet;
use IGestao\Domains\Mission\Evangelism\Repositories\Contracts\FactsheetInterface;
use IGestao\Domains\Mission\Evangelism\Transformers\FactsheetTransformer;
use IGestao\Domains\Mission\Evangelism\Transformers\FactsheetCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class FactsheetRepository extends AbstractRepository implements FactsheetInterface
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



    /* * Método que faz a inserção de dados em uma tabela com relacionamento
     *
     * @param array $attributes
     * @param array $attributesRelationship
     * @return mixed
     */
    public function createWithRalationship(array $attributes, array $attributesRelationship)
    {
        $model = $this->model->create($attributes);
        $model = $this->model->find($model->id);
        $model->address()->create($attributesRelationship);

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