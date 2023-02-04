<?php

namespace App\VoyagerActions;

use TCG\Voyager\Actions\AbstractAction;

class Deposit extends AbstractAction
{

    public function getTitle()
    {
        return "Deposit";
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
        return route('deposit.manual', "{$this->data->id}");
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug === 'members';
    }
}
