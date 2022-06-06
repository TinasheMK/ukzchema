<?php

namespace App\VoyagerForms;

use TCG\Voyager\FormFields\AbstractHandler;

class NomineeView extends AbstractHandler
{
    protected $codename = 'Nominee View';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('voyager.nominee_view', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}
