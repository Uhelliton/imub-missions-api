<?php
namespace IGestao\Support\Repository;

use Carbon\Carbon;
use IGestao\Support\Contracts\Repositories\RepositoryInterface;


/**
 * @property instace class model
 * @property instace resource resourceTransformer
 * @property instace collection collectionTransformer
 */
abstract class AbstractRepository implements RepositoryInterface
{

    /**
     * AbstractRepository constructor.
     */
    public function __construct()
    {
        $this->model = app()->make($this->model);
    }


    /**
     * Método que retorna a listagem de todos os dados de uma tabela
     *
     * @param array   $collumns
     * @param int $limit
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function all($collumns = array('*'), int $limit = null)
    {
        $collection =
            $this->model
                ->select($collumns)
                ->orderBy('id', 'desc')
                ->paginate($limit);

        return  $this->collectionTransformer::make($collection);
    }



    /**
     * Método que retorna uma coluna especifica da tabela da tabela
     *
     * @param int $id
     * @param array $collumns
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function find(int $id, $collumns = array('*'))
    {
        $model =
            $this->model
                 ->select($collumns)
                 ->find($id) ;

        if ($model)
           return $this->resourceTransformer::make($model);
    }


    /**
     * Método que retorna um elemento da tabela, usando paramentros diversos
     *
     * @param array $where
     * @param array $collumns
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function findBy(array $where, $collumns = array('*'))
    {
        $model =
            $this->model
                 ->where($where)
                 ->select($collumns)
                 ->first();

        if ($model)
            return $this->resourceTransformer::make($model);
    }


    /**
     * Método que retorna os elementos da tabela, usando paramentros diversos
     *
     * @param array $where
     * @param array $collumns
     * @param int $limit
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function findWhere(array $where, $collumns = array('*'), int $limit = null)
    {
        $collection =
            $this->model
                 ->where($where)
                 ->select($collumns)
                 ->paginate($limit);


        return $this->collectionTransformer::make($collection);
    }


    /**
     * Método que retorna os elementos da tabela, usando paramentros diversos
     *
     * @param string $field
     * @param array $id
     * @param array $where
     * @param array $collumns
     * @param int $limit
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function findWhereIn(string $field, array $id, array $where = array(), $collumns = array('*'), int $limit = null)
    {
        $collection =
            $this->model
                ->whereIn($field, $id)
                ->where($where)
                ->select($collumns)
                ->limit($limit)
                ->get();


        return $this->resourceTransformer::collection($collection);
    }



    /**
     * Método que retorna a quantidade de registro de uma tablela
     *
     * @param array $where
     * @return int
     */
    public function count(array $where)
    {
        return $this->model->where($where)->count();
    }


    /**
     * Método que retorna a soma de registro por campo de uma tablela
     *
     * @param array $where
     * @param string $field
     * @return mixed
     */
    public function sum(array $where, string $field)
    {
        return $this->model->where($where)->sum($field);
    }


    /**
     * Método que retorna o ultimo registro da tablela
     *
     * @param string|null $field
     * @return null
     */
    public function last(string $field = 'created_at')
    {
        $model = $this->model->latest($field)->first();

        if (!$model) return null;
        return $this->resourceTransformer::make($model);
    }


    /**
     * Método que faz a inserção de dados em uma tabela
     *
     * @param array $attributes
     * @exemple create( ['name' => 'Uhelliton', 'email' => 'uhelliton@uol.com.br'] )
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function create(array $attributes)
    {
        if ( array_is_multi($attributes) ) {
            for ($i = 0; $i < count($attributes); $i++)
                $model = $this->model->create($attributes[$i]);

            return $this->resourceTransformer::make($model);
        }

        $model = $this->model->create($attributes);
        return $this->resourceTransformer::make($model);
    }



    /**
     * Método que atualiza dados de uma tabela
     *
     * @param array $attributes
     * @param int $id
     * @exemple update(['name' => 'Uhelliton', 'email' => 'uhelliton@uol.com.br'], 1)
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function update(array $attributes, int $id)
    {
        $update = $this->model->find($id);
        $update->fill( $attributes );
        $model = $update->save();

        return $model; //$this->resourceTransformer::make($model);
    }


    /**
     * Método que atualiza ou insere um registro na tablela
     *
     * @param array $where
     * @param array $attributes
     * @exemple updateOrInsert(['email' => 'uhelliton@uol.com.br'],  ['name' => 'Uhelliton', 'city' => 'Ps'] )
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function updateOrCreate($where = array(), $attributes)
    {
        $model = $this->model->updateOrCreate($where, $attributes );

        return $this->resourceTransformer::make($model);
    }



    /**
     * Método que exclui um registro de uma tabela
     *
     * @param int $id
     * @throws \Exception
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function delete(int $id)
    {
        $delete = $this->model->find($id);
        $delete = $delete->delete();

        return $delete;
    }

}