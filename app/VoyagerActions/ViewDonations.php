<?php

namespace App\VoyagerActions;

use TCG\Voyager\Actions\AbstractAction;

class ViewDonations extends AbstractAction
{

    public function getTitle()
    {
        return "Payments";
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
        return route('voyager.payments.index', "member={$this->data->member_id} {$this->data->full_name}");
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug === 'obituaries';
    }
}
