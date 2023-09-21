<?php

namespace App\Http\Controllers;
use DB;
use App\Asset;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreTransactionRequest;

use App\Models\Stock;
use App\Models\Transaction;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Gate;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TransactionsController
 * @package App\Http\Controllers\Admin
 */
class TransactionsController extends Controller
{
    public function storeStock(Request $request)
    {
        // dd($request->all());
        $farmData = DB::table('farm_registers')->where('id',$request->activity_id)->first();
   
        $sign ="-";

       

        Transaction::create([
            'stock'    => $sign .  $request->quantity,
            'asset_id' => $request->asset_id,
            'team_id'  => "1",
            'user_id'  => 3,
            'farm_id'  => $farmData->farm_id  ?? $request->farm_id,
            'activity_id'  => $request->activity_id

        ]);

        $stock = stock::where('asset_id',$request->asset_id)->where('team_id',1)->first();


        if ($stock->current_stock - $request->quantity < 0) {

            return redirect()->route('farm.show')->withToastWarning('Not enough items in stock');
         
        }
        else{
            $stock->decrement('current_stock', $request->quantity);
            $status =$request->quantity . ' item(-s) was removed from stock.';

            
            return redirect()->withSuccessMessage($status);
        }


        // $sign 




            //     return redirect()->route('category.index')->withToastWarning('cannot delete existing parent farm');
            // }
            // else{
            //     $farm->delete();
            //     return redirect()->route('farm.index')->withSuccessMessage('farm record deleted successfully');
            // }



    }
    
    public function storeStocksssssssss(Stock $stock)
    {
        $action      = request()->input('action', 'add') == 'add' ? 'add' : 'remove';
        $stockAmount = request()->input('stock', 1);
        $sign        = $action == 'add' ? '+' : '-';

        if ($stockAmount < 1) {
            return redirect()->route('admin.stocks.index')->with([
                'error' => 'No item was added/removed. Amount must be greater than 1.',
            ]);
        }

        Transaction::create([
            'stock'    => $sign . $stockAmount,
            'asset_id' => $stock->asset->id,
            'team_id'  => $stock->team->id,
            'user_id'  => auth()->user()->id,
        ]);

        if ($action == 'add') {
            $stock->increment('current_stock', $stockAmount);
            $status = $stockAmount . ' item(-s) was added to stock.';
        }

        if ($action == 'remove') {
            if ($stock->current_stock - $stockAmount < 0) {
                return redirect()->route('admin.stocks.index')->with([
                    'error' => 'Not enough items in stock.',
                ]);
            }

            $stock->decrement('current_stock', $stockAmount);
            $status = $stockAmount . ' item(-s) was removed from stock.';
        }

        return redirect()->route('admin.stocks.index')->with([
            'status' => $status,
        ]);
    }
}
