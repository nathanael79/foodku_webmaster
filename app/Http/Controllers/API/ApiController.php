<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 05/06/18
 * Time: 22:16
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Order;
use App\DetailOrder;

class ApiController extends Controller
{
    function get_menu_all(Request $request){
        $data = DB::table('menu')->get();
        return response()->json($data);
    }

    function get_menu_where(Request $request){        
        $data = DB::table('menu')->where('id', $request->id)->first();
        return response()->json($data);
    }

    function create_order(Request $request){
        $data = Order::create([
            'id_table' => $request->id_table,
            'tanggal' => date('Y-m-d'),
            'pelanggan' => $request->pelanggan,
            'total' => 0,
            'bayar' => 0,
            'kembalian' => 0
        ]);

        return response()->json($data);
    }

    function add_menu_to_order(Request $request){
        $id_order = $request->id_order;
        $id_menu = $request->id_menu;

        if ($data = DetailOrder::where('id_order', $id_order)->where('id_menu', $id_menu)->first()){
            $kuantitas = $data->kuantitas;
        } else {
            $kuantitas = 0;
        }

        if ( $kuantitas > 0){
            $data = DetailOrder::where('id_order', $id_order)->where('id_menu', $id_menu)->update([
                'kuantitas' => $kuantitas+=1,            
            ]);

            return response()->json([
                'code' => 200,
                'status' => 'Jumlah barang berhasil ditambahkan',
                'data' => $data
            ]);
        } else {
            $data = DetailOrder::create([
                'id_order' => $request->id_order,
                'id_menu' => $request->id_menu,
                'kuantitas' => 1,
                'harga' => $request->harga,
            ]);

            return response()->json([
                'code' => 200,
                'status' => 'Barang baru berhasil dimasukkan ke order',
                'data' => $data
            ]);
        }
    }
}