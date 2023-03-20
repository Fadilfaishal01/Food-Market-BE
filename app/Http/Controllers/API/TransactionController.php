<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\MTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function all(Request $request)
    {
        try {
            $id = $request->input('id');
            $limit = $request->input('limit', 6);
            $food_id = $request->input('food_id');
            $status = $request->input('status');

            if ($id) {
                $transaction = MTransaction::with(['food', 'user'])->find($id);

                if ($transaction) {
                    return ResponseFormatter::success($transaction, 'Data transaction berhasil diambil');
                } else {
                    return ResponseFormatter::error(null, 'Data transaction tidak ada', 404);
                }
            }

            $transaction = MTransaction::with(['food', 'user'])->where('user_id', Auth::user()->id);

            if ($food_id) {
                $transaction->where('name', $food_id);
            }

            if ($status) {
                $transaction->where('status', $status);
            }

            return ResponseFormatter::success($transaction->paginate($limit, 'Data list transaksi berhasil diambil'));
        } catch (\Throwable $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error->getMessage(),
            ], 'Authentication Failed', 500);
        }
    }
}
