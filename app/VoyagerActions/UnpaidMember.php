<?php

namespace App\VoyagerActions;

use TCG\Voyager\Actions\AbstractAction;

class UnpaidMember extends AbstractAction
{

    public function getTitle()
    {
        return "Unpaid";
    }

    public function getIcon()
    {
        return "voyager-ticket";
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-dark pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.unpaid-members.index', "obituary={$this->data->id}");
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug === 'obituaries';
    }
}
