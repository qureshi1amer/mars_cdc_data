<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CdcDataResource;
use App\Models\CdcData;
use App\Models\User;
use Illuminate\Http\Request;

class CdcDataController extends Controller
{
    public function index(Request $request)
    {
        $query = CdcData::query();

        if ($request->has('jurisdiction')) {
            $query->where('jurisdiction', $request->jurisdiction);
        }

        if ($request->has('demographic')) {
            $query->where('demographic', $request->demographic);
        }

        $data = $query->paginate(10);
        return CdcDataResource::collection($data);
    }

    /*
     * IMP:: Just A DUMMY FUNCTION NOT FOR REAL WORLD
     * */
    public  function token()
    {
        $user = User::find(1);
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json($token);

    }
}
