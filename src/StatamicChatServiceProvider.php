<?php

namespace Larsvg\StatamicChat;

use Illuminate\Support\Facades\View;
use Larsvg\StatamicChat\Commands\Publish;
use Larsvg\StatamicChat\Commands\StatamicChatCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Statamic\Statamic;

class StatamicChatServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        Statamic::booted(function () {
            View::share('office_hours', StatamicChat::officeHours());
        });


        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('statamic-chat')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_statamic-chat_table')
            ->hasCommand(Publish::class)
            ->hasCommand(StatamicChatCommand::class);
    }
}
