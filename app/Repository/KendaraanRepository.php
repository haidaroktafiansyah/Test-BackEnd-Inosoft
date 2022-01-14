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

    public function getAllMobil()
    {
        return Kendaraan::where(
            'tipe_kendaraan',
            'mobil',
        )->get();;
    }


    public function getAllMotor()
    {
        return Kendaraan::where(
            'tipe_kendaraan',
            'motor',
        )->get();;
    }

    public function store($data)
    {
        return Kendaraan::create($data);
    }

    public function update($data, $id)
    {
        $kendaraan = Kendaraan::find($id);


        $kendaraan->tahun_keluaran = $data['tahun_keluaran'];
        $kendaraan->warna = $data['warna'];
        $kendaraan->harga = $data['harga'];
        $kendaraan->stok = $data['stok'];
        $kendaraan->terjual = $data['terjual'];
        $kendaraan->tipe_kendaraan = $data['tipe_kendaraan'];

        if ($data['tipe_kendaraan'] == "motor") {
            $kendaraan->mesin = $data['mesin'];
            $kendaraan->tipe_suspensi = $data['tipe_suspensi'];
            $kendaraan->tipe_transmisi = $data['tipe_transmisi'];
        } else {
            $kendaraan->mesin = $data['mesin'];
            $kendaraan->kapasistas_penumpang = $data['kapasistas_penumpang'];
            $kendaraan->tipe = $data['tipe'];
        }

        $kendaraan->update();

        return $data;
    }

    public function findByid($data)
    {
        return  Kendaraan::find($data);
    }

    public function deleteById($data)
    {
        return  Kendaraan::destroy($data->id) ? 'Data Deleted' : 'Data Not Found';
    }

    public function getAllStockMotor()
    {
        $excludeprice = Kendaraan::where(
            'tipe_kendaraan',
            'motor',
        )->get();;

        return $excludeprice->makeHidden(['terjual']);
    }

    public function getAllStockMobil()
    {
        $excludeprice = Kendaraan::where(
            'tipe_kendaraan',
            'mobil',
        )->get();;

        return $excludeprice->makeHidden(['terjual']);
    }

    public function getAllTerjualMotor()
    {
        $excludeprice = Kendaraan::where(
            'tipe_kendaraan',
            'motor',
        )->get();;

        return $excludeprice->makeHidden(['stok']);
    }

    public function getAllTerjualMobil()
    {
        $excludeprice = Kendaraan::where(
            'tipe_kendaraan',
            'mobil',
        )->get();;

        return $excludeprice->makeHidden(['stok']);
    }
}
