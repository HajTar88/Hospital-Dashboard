<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Doctors;
use App\Models\Patients;
use App\Models\Wards;
use App\Models\Rooms;
use App\Models\Transfers;
use App\Models\Cares;
use App\Models\Operations;
use Auth;

class DashBoardController extends Controller
{
    public function index()
    {
        $doctors = Doctors::where('hospital_id', Auth::id())->count();
        $patients = Patients::where('hospital_id', Auth::id())->count();
        $wards = Wards::where('hospital_id', Auth::id())->count();
        $rooms = Rooms::where('hospital_id', Auth::id())->count();
        $transfers = Transfers::count();
        $cares = Cares::where('hospital_id', Auth::id())->count();
        $operations = Operations::where('hospital_id', Auth::id())->count();
        return view('info', compact('doctors' , 'patients', 'wards' , 'rooms' , 'transfers' , 'cares' , 'operations'));
    }
}
?>