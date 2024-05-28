<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate;//them vao
use Illuminate\Contracts\Auth\Access\Authorizable;//them vào

use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       
       app(Gate::class)->before(function(Authorizable $auth,$route){

        
            // Nếu không phải là admin, tiếp tục kiểm tra quyền theo route
            
            if(method_exists($auth, 'checkQuyen')){

                return $auth->checkQuyen($route) ? $auth->checkQuyen($route) : false;
            }
            return false;
        }); 

    }

    






}
