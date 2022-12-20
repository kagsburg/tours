<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Session;
class TrackUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if ($request->is('api/*')) {
                return $next($request);
            }

            if ($request->is('admin/*')) {
                return $next($request);
            }else{
                $ip = $request->ip();
                $session = resolve('App\Repository\TrackUserRepository');
                $session->create([
                    'ip' => $ip
                ]);
                // $session->ip = $ip;
                // $session->save();
                // $session = new Session();
                // $session->ip = $ip;
                // $session->save();
                return $next($request);
            }
            //get users ip address and user agent 
               
            // $user_agent = $request->header('User-Agent');

            //get the current route
            // $route = $request->route()->getName();
            //get the current time
            $time = now();
            //get the current user
            // $user = auth()->user();
            //add the data to the sessions table in the database
           
            // $session->user_agent = $user_agent;
            // $session->route = $route;
            // $session->time = $time;
            // $session->user_id = $user->id;
            
           
        } catch (\Throwable $th) {
            //throw $th;
        }
        // return $next($request);
    }
}
