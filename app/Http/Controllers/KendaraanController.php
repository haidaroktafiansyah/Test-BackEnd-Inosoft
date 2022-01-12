<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Service\KendaraanService;
use App\Service\MotorService;
use Exception;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    private $motorService;
    private $KendaraanService;

    public function __construct(MotorService $motorService, KendaraanService $KendaraanService)
    {
        $this->motorService = $motorService;
        $this->KendaraanService = $KendaraanService;
    }

    public function index()
    {
        try {
            return $this->KendaraanService->getAll();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $datatervalidasi = $this->motorService->validator($request);
            return $this->KendaraanService->store($datatervalidasi);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function show(Kendaraan $kendaraan)
    {
        try {
            return $this->KendaraanService->findById($kendaraan);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $datatervalidasi = $this->motorService->validator($request);
            return $this->KendaraanService->update($datatervalidasi);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function destroy(Kendaraan $kendaraan)
    {
        try {
            return $this->KendaraanService->deleteById($kendaraan);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
