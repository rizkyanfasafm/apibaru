<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
    public function index(){
        $paket = DB::table('paket')->select('nama','nominal','pasok')->get();

        return response()->json([
            'paket' => $paket
        ],200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'nama' => 'required|unique:paket,nama',
            'nominal' => 'required|numeric',
            'pasok' => 'required|numeric'
        ]);

        if($validator->fails()){
            return $this->validationResponse($validator);
        }

        $paket = DB::table('paket')->insert([
            'nama' => $request->nama,
            'nominal' => $request->nominal,
            'pasok' => $request->pasok,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if($paket == true){
            return response()->json([
                'result' => $paket
            ],201);
        }else{
            return response()->json([
                'result' => 'error'
            ],401);
        }
    }

    public function show($id){
        $paket = DB::table('paket')->find($id);

        return response()->json([
            'paket' => $paket
        ],200);
    }

    public function destroy($id){
        $paket = DB::table('paket')->delete($id);

        return response()->json([
            'paket' => $paket
        ],200);
    }
}
