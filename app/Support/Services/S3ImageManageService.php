<?php
namespace IGestao\Support\Services;

use Illuminate\Http\Request;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Intervention\Image\ImageManager;
use File;

class S3ImageManageService
{

    /*
    * @var  $intervention, Image
    * @type instace class
    */
    protected  $imageManager;

    /**
     * @var $s3Client
     * @type instance cliente s3
     */
    protected $s3Client;


    /**
     * @var $fileName
     * nome do arquivo
     */
    protected $fileName;


    /**
     * @var $path
     * diretorio da imagem
     */
    protected $path;

    /**
     * @var $width
     * largura da imagem
     */
    protected $width;


    /**
     * Injeta as dependencias da classe
     *
     * @param ImageManager $image
     */
    public function __construct(ImageManager $image)
    {
        $this->imageManager = $image;

        $this->s3Client = S3Client::factory(array(
            'profile' => 'default',
            'region'  => env('AWS_DEFAULT_REGION'),
            'version' => 'latest'
        ));
    }

    /**
     * Seta o nome do arquivo
     *
     * @param string $file
     */
    public function setFileName(string $file)
    {
        $this->fileName = $file;
    }


    /**
     * Retorna o path com o diretorio da imagem upada
     *
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }


    /**
     * Seta o path da imagem
     *
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }


    /**
     * Retorna o path com o diretorio da imagem upada
     *
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }


    /**
     * Seta a largura da imagem
     *
     * @param int $width
     */
    public function setWidth(int $width = 800)
    {
        $this->width = $width;
    }


    /**
     * Retorna a largura da imagem
     *
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }


    /**
     * Responsavel para armazenar imagens na AWS S3
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        if ( request()->file() ) {
            try {
                $file = request()->file($this->fileName);
                $extension = $file->getClientOriginalExtension();

                $fileName  = md5(uniqid(rand(), true)).".{$extension}";
                $fileMove  = $file->move($this->getPath(), $fileName);
                $this->resizeFile($fileMove);

                $this->s3Client->putObject( array(
                    'Bucket'       => env('AWS_BUCKET'),
                    'Key'          => "{$this->getPath()}/{$fileName}",
                    'SourceFile'   => $fileMove,
                    'ContentType'  => "image/{$extension}",
                    'ACL'          => 'public-read',
                    'StorageClass' => 'REDUCED_REDUNDANCY',
                    'CacheControl' => 'public, max-age=2628000',
                    'MetadataDirective' => 'REPLACE'
                ));

                gc_collect_cycles();
                $this->clearFile($fileName);

                return $fileName;
            }
            catch (S3Exception $e) {
                return [
                    'error'   => true,
                    'message' => $e->getMessage()
                ];
            }
        }
    }

    /**
     * Redimenciona a o arquivo para um tamanho especificado na largura
     *
     * @param string $fileMovePath
     */
    private function resizeFile(string $fileMovePath)
    {
        $image = $this->imageManager->make($fileMovePath);

        if ($image->width() <= $this->getWidth()) {
            $resizeWith = $image->width();
        }
        $image->resize($resizeWith ?? $this->getWidth(), null, function ($constraint){
            $constraint->aspectRatio();
        });

        $image->save($fileMovePath);
    }


    /**
     * Limpa arquivos expecificos no diretorio
     *
     * @param $file
     */
    private function clearFile($file)
    {
        $path = public_path($this->getPath());
        File::delete($path.$file);
    }


    /**
     * Exclui um arquivo do bucket
     *
     * @param string $file
     * @return array|string
     */
    public function delete(string $file)
    {
        try {
            $this->s3Client->deleteObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key'    => "{$this->getPath()}{$file}"
            ]);
            return true;
        }
        catch (S3Exception $e) {
            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }



}