<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticleControllerPolicy
{
    // Любой авторизованный пользователь может смотреть список
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    // Любой авторизованный пользователь может смотреть статью
    public function view(User $user, Article $article): Response
    {
        return Response::allow();
    }

    // Только модератор
    public function create(User $user): Response
    {
        return $user->role_id == 1
            ? Response::allow()
            : Response::deny('Вы не являетесь модератором');
    }

    public function update(User $user, Article $article): Response
    {
        return $user->role_id == 1
            ? Response::allow()
            : Response::deny('Вы не являетесь модератором');
    }

    public function delete(User $user, Article $article): Response
    {
        return $user->role_id == 1
            ? Response::allow()
            : Response::deny('Вы не являетесь модератором');
    }

    public function restore(User $user, Article $article): Response
    {
        return $user->role_id == 1
            ? Response::allow()
            : Response::deny('Вы не являетесь модератором');
    }

    public function forceDelete(User $user, Article $article): Response
    {
        return $user->role_id == 1
            ? Response::allow()
            : Response::deny('Вы не являетесь модератором');
    }
}