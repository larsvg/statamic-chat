<?php

namespace Larsvg\StatamicChat;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Larsvg\StatamicChat\Commands\StatamicChatCommand;

class StatamicChatServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
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
            ->hasCommand(StatamicChatCommand::class);
    }
}
