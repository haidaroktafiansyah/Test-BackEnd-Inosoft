<?php

namespace App\Service;

use App\Repository\KendaraanRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class KendaraanService
{
    protected $KendaraanRepository;

    public function __construct(KendaraanRepository $KendaraanRepository)
    {
        $this->KendaraanRepository = $KendaraanRepository;
    }

    public function validator($request)
    {
        $validator = Validator::make($request, [
            'tahun_keluaran' => ['required', 'min:1900|max:2500|size:4'],
            'warna' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        return ($request);
    }

    public function getAll()
    {
        return $this->KendaraanRepository->getAll();
    }

    public function store($data)
    {
        return $this->KendaraanRepository->store($data);
    }

    public function update($data)
    {
        return $this->KendaraanRepository->update($data);
    }

    public function findById($data)
    {
        return $this->KendaraanRepository->findByid($data);
    }

    public function deleteById($data)
    {
        return $this->KendaraanRepository->deleteById($data);
    }
}
