<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Service\KendaraanService;
use App\Service\MobilService;
use App\Service\MotorService;
use Exception;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    private $motorService;
    private $KendaraanService;
    private $mobilService;

    public function __construct(MotorService $motorService, KendaraanService $KendaraanService, MobilService $mobilService)
    {
        $this->motorService = $motorService;
        $this->KendaraanService = $KendaraanService;
        $this->mobilService = $mobilService;
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
            if ($request->tipe_kendaraan == 'motor') {
                $datatervalidasi = $this->motorService->validator($request);
                return $this->KendaraanService->store($datatervalidasi);
            } else {
                $datatervalidasi = $this->mobilService->validator($request);
                return $this->KendaraanService->store($datatervalidasi);
            }
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

    public function update(Request $request, $id)
    {
        try {
            $datatervalidasi = $this->motorService->validator($request);
            return $this->KendaraanService->update($datatervalidasi, $id);
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

    public function getAllMobil()
    {
        try {
            return  $this->KendaraanService->getAllMobil();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function getAllMotor()
    {
        try {
            return  $this->KendaraanService->getAllMotor();
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
