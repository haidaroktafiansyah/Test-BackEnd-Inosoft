<?php

namespace App\Service;

use App\Repository\KendaraanRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use phpDocumentor\Reflection\Types\Parent_;

class MobilService extends KendaraanService
{
    public function validator($data)
    {
        $data = parent::validator($data->all());

        $validator = Validator::make($data, [
            'mesin' => ['required', 'string'],
            'kapasitas_penumpang' => ['required', 'numeric'],
            'tipe' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $data;
    }
}
