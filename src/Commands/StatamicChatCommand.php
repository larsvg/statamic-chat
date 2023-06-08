<?php

namespace Larsvg\StatamicChat\Commands;

use Illuminate\Console\Command;

class StatamicChatCommand extends Command
{
    public $signature = 'statamic-chat';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
