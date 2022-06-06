<?php

namespace App\VoyagerActions;

use TCG\Voyager\Actions\EditAction;

class UKZEditAction extends EditAction
{

    public function shouldActionDisplayOnDataType()
    {
        return !in_array(
            $this->dataType->slug,
            ['unpaid-members']
        );
    }
}
