<?php

namespace Larsvg\StatamicChat\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Studio1902\PeakCommands\Commands\SharedFunctions;

class Publish extends Command
{
    use SharedFunctions;

    public $signature = 'chat-widget:publish';

    public $description = 'Publish chat widget files';

    public function handle(): int
    {
        File::makeDirectory(resource_path('blueprints/forms'), 0755, true, true);
        File::makeDirectory(resource_path('forms'), 0755, true, true);

        $this->publishFieldsets();
        $this->publishBlueprints();
        $this->publishContent();
        $this->publishViews();
        $this->publishForms();

        $this->comment('Chat widget published');

        return self::SUCCESS;
    }

    protected function publishBlueprints(): void
    {
        $blueprints = [
            'globals/chat_widget.yaml',
            'forms/chat_widget_mail.yaml',
        ];

        foreach ($blueprints as $blueprint) {
            File::copy(__DIR__.'/../../stubs/blueprints/'.$blueprint, resource_path('blueprints/'.$blueprint));
        }
    }

    protected function publishViews(): void
    {
        $views = [
            'components/_chat_widget.antlers.html',
        ];

        foreach ($views as $view) {
            File::copy(__DIR__.'/../../stubs/views/'.$view, resource_path('views/'.$view));
        }
    }

    protected function publishFieldsets(): void
    {
        $fieldsets = [];

        foreach ($fieldsets as $fieldset) {
            File::copy(__DIR__.'/../../stubs/fieldsets/'.$fieldset, resource_path('fieldsets/'.$fieldset));
        }
    }

    protected function publishForms(): void
    {
        $forms = [
            'chat_widget_mail.yaml',
        ];

        foreach ($forms as $form) {
            File::copy(__DIR__.'/../../stubs/forms/'.$form, resource_path('forms/'.$form));
        }
    }

    protected function publishContent(): void
    {
        if (file_exists(base_path('content/globals/chat_widget.yaml'))) {
            if (!$this->confirm('Replace content files?', true)) {
                return;
            }
        }

        $contents = [
            'globals/chat_widget.yaml',
        ];

        foreach ($contents as $content) {
            $file = 'content/'.$content;
            File::copy(__DIR__.'/../../stubs/content/'.$content, base_path($file));
        }
    }

    protected function getPrimaryColorFromTailwindConfig(): string
    {
        $configPath = base_path('tailwind.config.site.js');
        $configContents = file_get_contents($configPath);
        $pattern = '/primary:\s+{\s+DEFAULT:\s+([\'"])(#[a-fA-F0-9]{6})\1/';
        $matches = [];
        preg_match($pattern, $configContents, $matches);

        return $matches[2];
    }
}
