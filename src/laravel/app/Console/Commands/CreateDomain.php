<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateDomain extends Command
{
    protected $signature = 'make:domain {domainName : The name of the domain}';
    protected $description = 'Create a new domain with a standardized directory structure';

    public function handle()
    {
        $domainName = $this->argument('domainName');

        // Create domain directory
        $domainPath = base_path("app/Domain/{$domainName}");
        if (! is_dir($domainPath)) {
            mkdir($domainPath, 0755, true);
        }

        // Create domain subdirectories
        $subdirs = ['Actions', 'Models', 'Repositories', 'Services', 'Tests', 'Popos', 'Validations', 'Resources', 'Liveware', 'Exceptions', 'Events', 'Listeners'];
        foreach ($subdirs as $dir) {
            if (! is_dir("{$domainPath}/{$dir}")) {
                mkdir("{$domainPath}/{$dir}", 0755, true);
            }
        }

        Artisan::call("make:provider $domainName\\ServiceProvider");

        // Output success message
        $this->info("Domain '{$domainName}' created successfully. Now, only register your service provider.");
    }
}
