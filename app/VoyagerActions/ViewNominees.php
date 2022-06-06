<?php

namespace App\VoyagerActions;

use TCG\Voyager\Actions\AbstractAction;

class ViewNominees extends AbstractAction
{

    public function getTitle()
    {
        return "Nominees";
    }

    public function getIcon()
    {
        return "voyager-heart";
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.nominees.index', "member={$this->data->id} {$this->data->first_name}");
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug === 'members';
    }
}
