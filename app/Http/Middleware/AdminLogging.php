<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class AdminLogging
{
    public function handle(Request$request, Closure $next)
    {
        $user_id = auth()->user()->id;
//        Log::info('logging',[
//            'user_id' => $user_id,
//            'ip_address' => request()->ip(),
//            'browser'    => request()->header('User-Agent'),
//            'action'     => 1,
//            'route'      => Route::currentRouteName(),
//            'method'     => $request->ajax(),
//        ]);

        if(!$request->ajax()){
            User::query()
                ->where('id',$user_id)
                ->update([
                    'last_seen_at' => Carbon::now()
                ]);
        }

        return $next($request);
    }
}
