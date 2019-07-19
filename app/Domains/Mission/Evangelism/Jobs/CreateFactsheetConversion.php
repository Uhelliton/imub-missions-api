<?php

namespace IGestao\Domains\Mission\Evangelism\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use IGestao\Domains\Mission\Evangelism\Repositories\Contracts\ConversionInterface;

class CreateFactsheetConversion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;
    protected $id;

    /**
     * @type instace class
     */
    protected $conversionRepository;

    /**
     * Cria uma nova instância do job
     *
     * @param object $request
     * @param int $id
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __construct(array $request, int $id)
    {
        $this->request = json_parse($request);
        $this->id = $id;
        $this->conversionRepository = app()->make(ConversionInterface::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $codition = ['ficha_inscricao_id' => $this->id];
        $attributes = [
            'ficha_inscricao_id'  => $this->id,
            'local_id'            => $this->request->decisionLocaleId,
            'data_decisao'        => $this->request->decisionDate
        ];
        $this->conversionRepository->updateOrCreate($codition, $attributes);
    }
}
