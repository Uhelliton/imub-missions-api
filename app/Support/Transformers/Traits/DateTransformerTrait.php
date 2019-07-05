<?php
namespace IGestao\Support\Transformers\Traits;

use Carbon\Carbon;

trait DateTransformerTrait
{

    /**
     * Seta a data de criacao
     *
     * @return string
     */
    public function setCreatedAt()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d H:i:s');
    }


    /**
     * Seta a data de atualizacao
     *
     * @return string
     */
    public function setUpdatedAt()
    {
        return Carbon::parse($this->updated_at)->format('Y-m-d H:i:s');
    }

}