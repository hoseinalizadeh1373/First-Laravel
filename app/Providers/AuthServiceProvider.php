<?php

namespace App\Providers;

use App\Http\Controllers\UserController;
use App\Models\Todo;
use App\Policies\TodoPolicy;
use App\Policies\UserPolicy;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // Todo::class =>TodoPolicy::class,
        // UserController::class =>UserPolicy::class,
        'app\Models\Todo'=>'app\Policies\ToDoPolicy',
        'app\Models\User' => 'app\Policies\UserPolicy'

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //  Gate::before(function($user,$ability,$params){
        //     if($user->type=='admin'){
        //         return true;
        //     }
        //  });

        // Gate::define('GetTodo', function ($user, $todo) {
            
        //     if ($user->id === $todo->user_id) {
        //         return true;
        //     } else
        //         return false;
        // });

        // Gate::after(function($user,$ability,$result,$params){
        //     //...//
        // });
    }
}
