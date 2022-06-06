<?php

namespace App\Providers;

use App\User;
use App\VoyagerActions\DeleteAction as UKZDeleteAction;
use App\VoyagerActions\UKZEditAction;
use App\VoyagerActions\UnpaidMember;
use App\VoyagerActions\ViewAction as UKZViewAction;
use App\VoyagerActions\ViewDonations;
use App\VoyagerActions\ViewNominees;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Actions\DeleteAction;
use TCG\Voyager\Actions\EditAction;
use TCG\Voyager\Actions\ViewAction;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Voyager::addFormField(NomineeView::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Voyager::addAction(ViewNominees::class);
        Voyager::addAction(ViewDonations::class);
        Voyager::addAction(UnpaidMember::class);
        Voyager::replaceAction(DeleteAction::class, UKZDeleteAction::class);
        Voyager::replaceAction(ViewAction::class, UKZViewAction::class);
        Voyager::replaceAction(EditAction::class, UKZEditAction::class);
        Validator::extend('password_check', function ($attribute, $value, $parameters) {
            return Hash::check($value, Auth::user()->password);
        });
    }
}
