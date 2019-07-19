<?php
namespace IGestao\Domains\Mission\Evangelism\Repositories;

use IGestao\Domains\Mission\Evangelism\Conversion;
use IGestao\Domains\Mission\Evangelism\Repositories\Contracts\ConversionInterface;
use IGestao\Domains\Mission\Evangelism\Transformers\ConversionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class ConversionRepository extends AbstractRepository implements ConversionInterface
{

    /*
     * @var  $model, Conversion
     * @type instace class
     */
    protected $model = Conversion::class;


    /*
     * @var  $resourceTransformer, ConversionTransformer
     * @type instace class
     */
    protected $resourceTransformer = ConversionTransformer::class;


    /*
    * @var  $collectionTransformer, FactsheetCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = ConversionTransformer::class;  //alterar to collection


}