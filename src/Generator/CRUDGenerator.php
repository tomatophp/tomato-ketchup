<?php

namespace TomatoPHP\TomatoKetchup\Generator;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Illuminate\Support\Str;
use TomatoPHP\ConsoleHelpers\Traits\HandleStub;
use TomatoPHP\TomatoKetchup\Generator\Concerns\GenerateResource;
use TomatoPHP\TomatoKetchup\Generator\Concerns\GenerateCols;
use TomatoPHP\TomatoKetchup\Generator\Concerns\GenerateCreateView;
use TomatoPHP\TomatoKetchup\Generator\Concerns\GenerateEditView;
use TomatoPHP\TomatoKetchup\Generator\Concerns\GenerateFolders;
use TomatoPHP\TomatoKetchup\Generator\Concerns\GenerateModel;
use TomatoPHP\TomatoKetchup\Generator\Concerns\GenerateShowView;

class CRUDGenerator
{
    private string $modelName;
    private string $stubPath;
    private array $cols;

    //Handler
    use HandleStub;

    //Generate Classes
    use GenerateFolders;
    use GenerateCols;
    use GenerateModel;
    use GenerateResource;

    //Generate Views
    use GenerateShowView;
    use GenerateCreateView;
    use GenerateEditView;

    private Connection $connection;

    /**
     * @param string $tableName
     * @param string|bool|null $moduleName
     * @throws Exception
     */
    public function __construct(
        private string $tableName,
        private string | bool | null $moduleName
    ){
        $connectionParams = [
            'dbname' => config('database.connections.mysql.database'),
            'user' => config('database.connections.mysql.username'),
            'password' => config('database.connections.mysql.password'),
            'host' => config('database.connections.mysql.host'),
            'driver' => 'pdo_mysql',
        ];

        $this->connection = DriverManager::getConnection($connectionParams);
        $this->modelName = Str::ucfirst(Str::singular(Str::camel($this->tableName)));
        $this->stubPath = config('tomato-ketchup.stubs-path'). "/";
        $this->cols = $this->getCols();
    }

    /**
     * @return void
     */
    public function generate(): void
    {
        $this->generateFolders();
        $this->generateModel();
        $this->generateCreateView();
        $this->generateEditView();
        $this->generateShowView();
        $this->generateResource();
    }

}
