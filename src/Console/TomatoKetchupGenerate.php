<?php

namespace TomatoPHP\TomatoKetchup\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use TomatoPHP\TomatoKetchup\Generator\CRUDGenerator;

class TomatoKetchupGenerate extends Command
{
    use RunCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'tomato:resource';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate a full CRUD resource';

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
        //Get Table Name
        $check = true;
        while ($check){
            $tableName = $this->ask('🍅 Please input your table name you went to create Resource CRUD? (ex: users)');

            if(\Illuminate\Support\Facades\Schema::hasTable($tableName)){
                $check = false;
            }
            else {
                $this->error("Sorry table not found!");
            }
        }

        $moduleName = false;
        //Check if user need to use HMVC
        //TODO: HMVC Support
//        $isModule=$this->ask('🍅 Do you went to use HMVC module? (y/n)', 'y');
//        if(!$isModule){
//            $isModule = 'y';
//        }
//        $moduleName= false;
//        if($isModule === 'y'){
//            $moduleName=$this->ask('🍅 Please input your module name? (ex: Translations)');
//            if($moduleName){
//                if(class_exists(\Nwidart\Modules\Facades\Module::class)){
//                    $check = \Nwidart\Modules\Facades\Module::find($moduleName);
//                    if(!$check){
//                        $this->info("🍅 Module not found but we will create it for you ");
//                        $this->artisanCommand(["module:make", $moduleName]);
//                    }
//                }
//                else {
//                    $this->error("🍅 Sorry nwidart/laravel-modules not installed please install it first");
//                }
//            }
//        }

        //Generate CRUD Service
        try {
            $resourceGenerator = new CRUDGenerator(tableName:$tableName,moduleName:$moduleName);
            $resourceGenerator->generate();
            $this->info('🍅 CRUD Has Been Generated Success');
        }catch (\Exception $e){
            $this->error($e->getMessage());
            return;
        }
    }
}
