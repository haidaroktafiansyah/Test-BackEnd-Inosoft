<?php

namespace App\Service;

use App\Repository\KendaraanRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use phpDocumentor\Reflection\Types\Parent_;

class MotorService extends KendaraanService
{
    public function validator($data)
    {
        $data = parent::validator($data->all());

        $validator = Validator::make($data['kendaraan'], [
            'mesin' => ['required', 'string'],
            'tipe_transmisi' => ['required', 'string'],
            'tipe_suspensi' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $data;
    }

    public function getAll()
    {
        return $this->MotorRepository->getAll();
    }
}
