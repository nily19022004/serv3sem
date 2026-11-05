<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Article;
use App\Policies\ArticleControllerPolicy;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Явная привязка модели к политике.
     * Имя ArticleControllerPolicy не совпадает с соглашением (ArticlePolicy),
     * поэтому регистрируем вручную.
     */
    protected $policies = [
        Article::class => ArticleControllerPolicy::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(function (User $user, string $ability) {
            if ($user->role_id == 1) {
                return Response::allow();
            }

            // Только модераторские действия. view/viewAny — НЕ трогаем.
            if (in_array($ability, ['create', 'update', 'delete', 'forceDelete', 'restore'], true)) {
                return Response::deny('Вы не являетесь модератором');
            }

            return null; // дальше — политика
        });

        Gate::define('article', function (User $user) {
            return $user->role_id == 1
                ? Response::allow()
                : Response::deny('Вы не являетесь модератором');
        });
    }
}