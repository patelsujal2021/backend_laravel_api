<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends BaseController
{
    public function index(Request $request)
    {
        \Log::info($request->all());
        try {
            $query = Stock::query();
            $query = $query->with('store');
            $query = $query->select('id','item_name','item_code','quantity','location','store_id','in_stock');

            /*$skip = 0;
            $limit = $request->limit;
            if ($request->has('page') && $request->has('limit') && $request->page > 1) {
                $skip = $request->page * $request->limit;
            }

            if($request->has('search') && !is_null($request->search)) {
                $search = $request->search;
                $query = $query->where('mobile','LIKE',"%$search%");
            }

            $data['total_records'] = $query->count();
            $data['stocks'] = $query->orderBy('id', 'asc')->skip($skip)->take($limit)->get();*/

            $data['stocks'] = $query->orderBy('id', 'asc')->get();

            return $this->sendSuccess($data,'get stocks successfully');
        } catch (Exception $e) {
            \Log::error($e->getMessage());
            return $this->sendError(null,'problem to get stocks');
        }
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
