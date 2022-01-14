<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use App\Models\User;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_kendaraan()
    {
        $response = $this->get('api/kendaraan');

        $response->assertStatus(200);
    }

    public function test_post_kendaraan()
    {
        $formData = [
            "tahun_keluaran" => "2005",
            "warna" => "kuning",
            "harga" => 978875602,
            "stok" => 7846,
            "terjual" => 276,
            "tipe_kendaraan" => "motor",
            "mesin" => "doyle",
            "tipe_suspensi" => "Dickinson-Halvorson",
            "tipe_transmisi" => "ton"
        ];

        $response = $this->post('api/kendaraan', $formData);

        $response->assertStatus(201);
    }



    public function test_show_by_id_kendaraan()
    {
        $kendaraan = Kendaraan::factory()->create();

        $response = $this->get('api/kendaraan/', ['id' => $kendaraan->id]);

        $response->assertStatus(200);
    }


    public function test_get_motor_stock()
    {
        $response = $this->get('api/motor/stock');

        $response->assertStatus(200);
    }

    public function test_get_mobil_stock()
    {
        $response = $this->get('api/mobil/stock');

        $response->assertStatus(200);
    }

    public function test_get_motor_terjual()
    {
        $response = $this->get('api/mobil/stock');

        $response->assertStatus(200);
    }

    public function test_get_mobil_terjual()
    {
        $response = $this->get('api/mobil/stock');

        $response->assertStatus(200);
    }

    public function test_get_all_mobil()
    {
        $response = $this->get('api/mobil');

        $response->assertStatus(200);
    }

    public function test_get_all_motor()
    {
        $response = $this->get('api/motor');

        $response->assertStatus(200);
    }
}
