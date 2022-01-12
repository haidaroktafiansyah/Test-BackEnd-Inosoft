<?php

namespace App\Repository;

use App\Models\Kendaraan;
use Illuminate\Support\Facades\DB;

class KendaraanRepository
{
    public function getAll()
    {
        return Kendaraan::all();
    }

    public function store($data)
    {
        return Kendaraan::create($data);
    }

    public function update($data)
    {
        return  Kendaraan::find($data);
        // $hungerGames =
        //     DB::collection('kendaraans')
        //     ->where('_id', '%' . $data['id'] . '%')
        //     ->first();
    }

    public function findByid($data)
    {
        return  Kendaraan::find($data);
    }

    public function deleteById($data)
    {
        return   Kendaraan::destroy($data->id) ? 'Data Deleted' : 'Data Not Found';
    }
}
