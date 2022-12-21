<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleQRRequest;
use App\Models\VehicleQR;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VehicleQRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('vehicle-qr.index', [
            'vehicleQrs' => VehicleQR::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('vehicle-qr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VehicleQRRequest $request
     * @return RedirectResponse
     */
    public function store(VehicleQRRequest $request): RedirectResponse
    {
        $vehicleQr = VehicleQR::create($request->all(['name', 'number']));

//        $path = '/images/qr-code/';
//
//        $file_path = $path . time() . '.svg';
//
//        $image = QrCode::format('svg')
//            ->generate(url(route('feedback.show',$vehicleQr->id)));
//
//        Storage::disk('public')->put($file_path, $image);
//
//        $vehicleQr->qr_code_image = $file_path;
        $vehicleQr->save();

        Session::flash('message', 'Vehicle QR Code added successfully');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('vehicle-qr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $vehicleQr = VehicleQR::findOrFail($id);

        if(Storage::disk('public')->exists($vehicleQr->qr_code_image)){
            Storage::disk('public')->delete($vehicleQr->qr_code_image);
        }

        $vehicleQr->delete();

        Session::flash('message', 'Vehicle QR Code deleted successfully');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('vehicle-qr.index');
    }

    public function print(VehicleQR $vehicleQR)
    {
        return view('vehicle-qr.print', compact('vehicleQR'));
    }
}
