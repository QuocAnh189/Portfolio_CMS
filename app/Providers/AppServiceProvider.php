<?php

namespace App\Providers;

use App\Domains\Category\Models\Category;
use App\Domains\Major\Models\Major;
use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Domains\Technology\Models\Technology;
use App\Enum\Status;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Cache category
        $categories = Cache::rememberForever("categories", function () {
            return DB::table("categories")->where('status', Status::Active)->get();
        });

        Category::created(function () {
            Cache::forget("categories");
        });

        Category::updated(function () {
            Cache::forget("categories");
        });

        Category::deleted(function () {
            Cache::forget("categories");
        });

        //Cache role software
        $role_softwares = Cache::rememberForever("role_softwares", function () {
            return DB::table("role_software")->where('status', Status::Active)->get();
        });

        RoleSoftware::created(function () {
            Cache::forget("role_softwares");
        });

        RoleSoftware::updated(function () {
            Cache::forget("role_softwares");
        });

        RoleSoftware::deleted(function () {
            Cache::forget("role_softwares");
        });

        //Cache major
        $majors = Cache::rememberForever("majors", function () {
            return DB::table("majors")->where('status', Status::Active)->get();
        });

        Major::created(function () {
            Cache::forget("majors");
        });

        Major::updated(function () {
            Cache::forget("majors");
        });

        Major::deleted(function () {
            Cache::forget("majors");
        });

        //Cache technology
        $technologies = Cache::rememberForever("technologies", function () {
            return DB::table("technologies")->where('status', Status::Active)->get();
        });

        Technology::created(function () {
            Cache::forget("technologies");
        });

        Technology::updated(function () {
            Cache::forget("technologies");
        });

        Technology::deleted(function () {
            Cache::forget("technologies");
        });

        View::composer('*', function ($view) use ($categories, $role_softwares, $majors, $technologies) {
            $view->with(['categories' => $categories, 'role_softwares' => $role_softwares, 'majors' => $majors, 'technologies' => $technologies]);
        });
    }
}
