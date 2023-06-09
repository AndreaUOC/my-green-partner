<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Sunlight;



class PlantController extends Controller
{
    public function tableApp(Request $request)
    {
        
        if (!$request->has('watering') && !$request->has('cycle') && !$request->has('sunlight')) {
            $plants = Plant::with('sunlights')->paginate(10);
        } else {
                    
            if ($request->has('watering') && !$request->has('sunlight') && !$request->has('cycle')) {
                $wateringFilter = $request->get('watering');
                $plants = Plant::with('sunlights')->whereWatering($wateringFilter)->paginate(10);
            } elseif ($request->has('cycle') && !$request->has('watering') && !$request->has('sunlight')) {
                $cycleFilter = $request->get('cycle');
                $plants = Plant::with('sunlights')->whereCycle($cycleFilter)->paginate(10);
            } elseif ($request->has('sunlight') && !$request->has('watering') && !$request->has('cycle')) {
                $sunlightFilter = $request->get('sunlight');
                $plants = Plant::with('sunlights')->whereHas('sunlights', function ($query) use ($sunlightFilter) {
                    $query->whereIn('sunlights.id', $sunlightFilter);
                })->paginate(10);
                
            } elseif ($request->has('watering') && $request->has('cycle') && !$request->has('sunlight')) {
                $cycleFilter = $request->get('cycle');
                $wateringFilter = $request->get('watering');
                $plants = Plant::with('sunlights')->whereWatering($wateringFilter)->whereCycle($cycleFilter)->paginate(10);
            } elseif ($request->has('watering') && $request->has('sunlight') && !$request->has('cycle')) {
                $sunlightFilter = $request->get('sunlight');
                $wateringFilter = $request->get('watering');
                $plants = Plant::with('sunlights')->whereHas('sunlights', function ($query) use ($sunlightFilter) {
                    $query->whereIn('sunlights.id', $sunlightFilter);
                })->whereWatering($wateringFilter)->paginate(10);
            } elseif ($request->has('cycle') && $request->has('sunlight') && !$request->has('watering')) {
                $sunlightFilter = $request->get('sunlight');
                $cycleFilter = $request->get('cycle');
                $plants = Plant::with('sunlights')->whereHas('sunlights', function ($query) use ($sunlightFilter) {
                    $query->whereIn('sunlights.id', $sunlightFilter);
                })->whereCycle($cycleFilter)->paginate(10);
                
            } else {
                $sunlightFilter = $request->get('sunlight');
                $wateringFilter = $request->get('watering');
                $cycleFilter = $request->get('cycle');

                $plants = Plant::with('sunlights')->whereHas('sunlights', function ($query) use ($sunlightFilter) {
                    $query->whereIn('sunlights.id', $sunlightFilter);
                })->whereWatering($wateringFilter)->whereCycle($cycleFilter)->paginate(10);
            }
        }

        $watType = Plant::select('watering')->distinct()->get();
        $cyType = Plant::select('cycle')->distinct()->get();
        $sunlights = Sunlight::select('id', 'name')->orderBy('name')->get()->toArray();

        return view('plants.tableApp', ['plants' => $plants, 'watType' => $watType, 'cyType' => $cyType, 'sunlights' => $sunlights]);
    }

    public function database(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $plants = Plant::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $plants = Plant::orderBy('id', 'asc')->paginate(10);
        }
        return view('plants.database', ['plants' => $plants]);
    }
}
