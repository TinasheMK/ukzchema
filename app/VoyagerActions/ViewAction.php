<?php

namespace App\VoyagerActions;

use TCG\Voyager\Actions\ViewAction as ActionsViewAction;

class ViewAction extends ActionsViewAction
{

    public function getTitle()
    {
        if($this->dataType->slug === 'applicants'){
            return "Review";
        }
        if ($this->dataType->slug === 'unpaid-members') {
            return "View Member";
        }
        return parent::getTitle();
    }

    public function getDefaultRoute()
    {
        if ($this->dataType->slug === 'unpaid-members') {
            return route('voyager.members.show', $this->data->id);
        }
        return parent::getDefaultRoute();
    }
}
