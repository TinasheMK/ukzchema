<?php

namespace App\VoyagerActions;

use TCG\Voyager\Actions\DeleteAction as ActionsDeleteAction;

class DeleteAction extends ActionsDeleteAction {

    public function shouldActionDisplayOnDataType()
    {
        return !in_array(
            $this->dataType->slug,
                ['applicants', 'unpaid-members', 'obituaries', 'users', 'members']);
    }
    
}