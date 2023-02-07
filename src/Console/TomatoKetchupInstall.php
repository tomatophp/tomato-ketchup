<?php

namespace TomatoPHP\TomatoKetchup\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;

class TomatoKetchupInstall extends Command
{
    use RunCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tomato-ketchup:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install package and publish assets';

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Publish Vendor Assets');
        $this->callSilent('optimize:clear');
        $this->artisanCommand(['tomato-components:install']);
        $this->yarnCommand(['install']);
        $this->yarnCommand(['build']);
        $this->artisanCommand(["migrate"]);
        $this->artisanCommand(["optimize:clear"]);
        $this->info('🍅 Tomato Ketchup installed successfully.');
    }
}
