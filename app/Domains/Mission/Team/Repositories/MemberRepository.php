<?php
namespace IGestao\Domains\Mission\Team\Repositories;

use IGestao\Domains\Mission\Team\Member;
use IGestao\Domains\Mission\Team\Repositories\Contracts\MemberInterface;
use IGestao\Domains\Mission\Team\Transformers\MemberTransformer;
use IGestao\Domains\Mission\Team\Transformers\MemberCollectionTransformer;
use IGestao\Domains\Mission\Team\Transformers\MemberSimplifiedCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;
use Illuminate\Support\Arr;

class MemberRepository extends AbstractRepository implements MemberInterface
{

    /*
     * @var  $model, Member
     * @type instace class
     */
    protected $model = Member::class;


    /*
     * @var  $resourceTransformer, MemberTransformer
     * @type instace class
     */
    protected $resourceTransformer = MemberTransformer::class;


    /*
    * @var  $collectionTransformer, MemberCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = MemberCollectionTransformer::class;


    /*
    * @var  $collectionExternalTransformer, MemberSimplifiedCollectionTransformer
    * @type instace class
    */
    protected $collectionExternalTransformer = MemberSimplifiedCollectionTransformer::class;



    /**
     * Resposável para retornar um lista simplificada
     *
     * @param array $orderBy
     * @return mixed
     */
    public function allMembersWithCollectionSimplified($orderBy = ['nome' => 'asc']) :Object
    {
        $collection =
            $this->model
                ->orderBy(key($orderBy), Arr::first(array_values($orderBy)))
                ->get();

        return  $this->collectionExternalTransformer::make($collection);
    }


}