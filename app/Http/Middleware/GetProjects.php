<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Projects;
use Spatie\Permission\Models\Role;

class GetProjects
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $result = array();
        if (Auth::check()){
            $userId = Auth::user()->id;
            $projects = Projects::where('users_id', '=', $userId)->get();
            
            foreach($projects as $project){
                $result[ $project->id ] = array("title" => $project->title, "current" => $project->current);
            }
        }

        view()->share('appProjects', $result);
        return $next($request);
        
    }
}