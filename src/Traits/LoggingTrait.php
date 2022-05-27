<?php

namespace Snvk\Logging\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Snvk\Logging\Logging;

trait LoggingTrait
{
    /**
     * Get all the loggings based on order and filteres
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */

    public function Loggings(Request $request){
        $query = Logging::query();

        if($request->has('order_value') && $request->has('order_by')){
            $query->orderBy($request->order_by, $request->order_value);
        }

        if($request->has('filter_type') && $request->has('filter_value')){
            $query->where($request->filter_type, $request->filter_value);
        }
        
        if($request->has('pagination') && empty($request->pagination)){ // $request->pagination = false
            $items = $query->get();
        }else{
            $items = $query->paginate();
        }
        
        if($request->wantsJson()){
            return response()->json($items);
        }

        return new Response($items);
    }
}