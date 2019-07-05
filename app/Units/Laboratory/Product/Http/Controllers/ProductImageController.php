<?php

namespace IGestao\Units\Laboratory\Product\Http\Controllers;

use IGestao\Domains\Laboratory\Jobs\CleanCoverProductInTable;
use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Support\Services\S3ImageManageService;

class ProductImageController extends Controller
{
    /*
     * @var  $s3ImageManagerService
     * @type instace class
     */
    protected  $s3ImageManagerService;

    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    protected $imagePath;


    /**
     * Injeta as dependencias da classe
     *
     * @param S3ImageManageService $imageManageService
     */
    public function __construct(S3ImageManageService $imageManageService)
    {
        $this->s3ImageManagerService = $imageManageService;
        $this->imagePath = config('bucket.product_image_path');
    }



    /**
     * Responsavel para armazenar imagem do produto
     *
     * @param  Request  $request
     * @return object|array
     */
    public function store(Request $request)
    {
        $bucketPath = $this->imagePath;

        if ($request->hasFile('file')) {
            $imageManager = $this->s3ImageManagerService;
            $imageManager->setFileName('file');
            $imageManager->setWidth(700);
            $imageManager->setPath($bucketPath);
            $image = $imageManager->store($request);

           return $this->response201(['file' => $image]);
        }
    }


    /**
     * Responsavel para remover imagens do evento
     *
     * @param  Request $request
     * @param  string $image
     * @return object|array
     */
    public function destroy(Request $request, string $image)
    {
        $bucketPath = $this->imagePath;

        $imageManager = $this->s3ImageManagerService;
        $imageManager->setPath($bucketPath);
        $delete = $imageManager->delete($image);

        if ($delete) {
            dispatch( new CleanCoverProductInTable($request->all()) );
            return $this->response200(['file' => $image]);
        }
    }

}