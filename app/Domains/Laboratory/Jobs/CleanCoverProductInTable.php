<?php

namespace IGestao\Domains\Laboratory\Jobs;

use IGestao\Domains\Laboratory\Repositories\Contracts\ProductInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CleanCoverProductInTable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var mixed
     */
    private $request;

    /**
     * @type instace class
     */
    private $productRepository;

    /**
     * Cria um anova instancia do job
     *
     * @param array $request
     */
    public function __construct(array $request)
    {
        $this->request = json_parse($request);
        $this->productRepository = app()->make(ProductInterface::class);
    }

    /**
     * Executa o job
     * Limpa o campo foto da tabela de produtos
     */
    public function handle()
    {
        $this->productRepository->update(['foto' => ''], $this->request->productId);
    }

}
