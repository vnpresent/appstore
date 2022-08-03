<?php

namespace App\Providers;


use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\SoftwareRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\SoftwareRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(SoftwareRepositoryInterface::class, SoftwareRepository::class);
//        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
//        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
//        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
//        $this->app->bind(PermissionRepositoryInterface::class, PermissiontRepository::class);
//        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
//        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
