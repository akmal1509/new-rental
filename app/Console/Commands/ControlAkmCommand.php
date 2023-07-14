<?php

namespace App\Console\Commands;

use App\Console\CreateFile;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ControlAkmCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:controlakm
    {name : The name of the controller }
    {--repo : Create a service along with the repository}?
    {--request : Create a service along with the repository}?
    {--model : Create a service along with the repository}?
    {--all : Create a service along with the repository}?
    {--ws : Create a service along with the repository}?
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = str_replace('Controller', "", $this->argument("name"));
        $name = Str::studly($name);

        $className = Str::studly($name);
        $arr = explode("/", $className);
        $className = end($arr);
        $path = $this->getControllerPath($className, $name);

        if (!$this->files->exists($path)) {
            $this->makeDirectory(dirname($path));
            $this->createController($className, $name);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }

        if ($this->option('repo')) {
            $this->createRepo();
        }
        if ($this->option('model')) {
            $this->createModel();
        }
        if ($this->option('request')) {
            $this->createRequest();
        }
        if ($this->option('all')) {
            $this->createRequest();
            $this->createRepo();
            $this->createModel();
        }
    }

    /**
     * Create Controller
     *
     * @param string $className
     * @return void
     */
    public function createController(string $className, $name)
    {
        $data = explode("/", $name);
        $sliced = array_diff($data, [$className]);
        // $customNameSpace = ;
        if ($sliced == null) {
            $ControllerNamespace = "App\Http\Controllers";
        } else {
            $join = implode("\\", $sliced);
            $ControllerNamespace = "App\Http\Controllers" . "\\" . $join;
        }

        $ControllerName = $className . 'Controller';
        $stubProperties = [
            "{namespace}" => $ControllerNamespace,
            "{ControllerName}" => $ControllerName,
            "{ModelName}"   => $className,
            "{RepoName}" => lcfirst($className)
        ];

        $stubName = "controller.custom.stub";
        $ControllerPath = $this->getControllerPath($className, $name);
        new CreateFile(
            $stubProperties,
            $ControllerPath,
            __DIR__ . "/stubs/$stubName"
        );
        $this->line("<info>Created $className Controller :</info> " . $ControllerName);

        return $ControllerNamespace . "\\" . $className;
    }

    private function createRepo()
    {
        $name = str_replace('Controller', "", $this->argument("name"));
        $name = Str::studly($name);

        $className = Str::studly($name);
        $arr = explode("/", $className);
        $className = end($arr);

        $this->call("make:repoakm", [
            "name" => $className,
        ]);
    }
    private function createModel()
    {
        $name = str_replace('Controller', "", $this->argument("name"));
        $name = Str::studly($name);

        $className = Str::studly($name);
        $arr = explode("/", $className);
        $className = end($arr);

        if ($this->option('ws')) {
            $this->call("make:model", [
                "name" => $className,
                "--slug" => null
            ]);
        } else {
            $this->call("make:model", [
                "name" => $className,
                "--custom" => null
            ]);
        }
    }

    private function createRequest()
    {
        $name = str_replace('Controller', "", $this->argument("name"));
        $name = Str::studly($name);

        $className = Str::studly($name);
        $arr = explode("/", $className);
        $className = end($arr);

        $this->call("make:requestakm", [
            "name" => $className,
        ]);
    }

    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    private function getControllerPath($className, $name)
    {
        $data = explode("/", $name);
        $sliced = array_diff($data, [$className]);
        if ($sliced == null) {
            $path = "/" . "$className" . 'Controller' . ".php";
        } else {
            $join = implode("/", $sliced);
            $path = "/" . "$join" . "/" . "$className" . 'Controller' . ".php";
        }
        // $path = "/" . "$className" . 'Controller' . ".php";
        return app()->basePath() . "/app/Http/Controllers" . $path;
    }
}
