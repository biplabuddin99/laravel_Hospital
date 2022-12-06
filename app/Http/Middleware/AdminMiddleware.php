<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Traits\ResponseTrait;
use Session;

class AdminMiddleware
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('userId') || $request->session()->has('userId') === null || !$request->session()->has('roleIdentity')){
            return redirect()->route('logout');

        }else{
            
            $user=User::findOrFail(session()->get('userId'));
            app()->setLocale($user->language); // language
            if(!$user){
                return redirect()->route('logout');
            }else if(session()->get('roleIdentity') != 'admin'){
                return redirect()->back()->with($this->resMessageHtml(false,'error','Access Denied'));
            }else{
                return $next($request);
            }
        }        
        return redirect()->route('logout');
    }

}
