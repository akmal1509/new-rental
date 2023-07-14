<?php

namespace App\Console\Commands;

use App\Console\CreateFile;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class RequestAkmCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:requestakm
    {name : The name of the repository }
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
        $name = str_replace('Request', "", $this->argument("name"));
        $name = Str::studly($name);

        $className = Str::studly($name);
        $arr = explode("/", $className);
        $className = end($arr);
        $type = [
            'Update',
            'Store'
        ];

        foreach ($type as $type) {
            $path = $this->getRequestPath($className, $type);
            if (!$this->files->exists($path)) {
                $this->makeDirectory(dirname($path));
                $this->createRequest($className, $type);
            } else {
                $this->info("File : {$path} already exits");
            }
        }
        // $path2 = $this->getRequestPath($className, 'Store');

    }

    /**
     * Create Request
     *
     * @param string $className
     * @return void
     */
    public function createRequest(string $className, $type)
    {
        $RequestNamespace = "App\Http\Requests" . "\\" . $className;

        $RequestName = $type . $className . 'Request';
        $stubProperties = [
            "{namespace}" => $RequestNamespace,
            "{RequestName}" => $RequestName,
        ];

        $stubName = "request-akm.stub";
        $RequestPath = $this->getRequestPath($className, $type);
        new CreateFile(
            $stubProperties,
            $RequestPath,
            __DIR__ . "/stubs/$stubName"
        );
        $this->line("<info>Created $className Request :</info> " . $RequestName);

        return $RequestNamespace . "\\" . $className;
    }
    /**
     * Create Request
     *
     * @param string $className
     * @return void
     */
    public function createStoreRequest(string $className, $type)
    {
        $RequestNamespace = "App\Http\Requests" . "\\" . $className;

        $RequestName = $type . $className . 'Request';
        $stubProperties = [
            "{namespace}" => $RequestNamespace,
            "{RequestName}" => $RequestName,
            "{ModelName}"   => $className,
        ];

        $stubName = "request.stub";
        $RequestPath = $this->getRequestPath($className, $type);
        new CreateFile(
            $stubProperties,
            $RequestPath,
            __DIR__ . "/stubs/$stubName"
        );
        $this->line("<info>Created $className Request :</info> " . $RequestName);

        return $RequestNamespace . "\\" . $className;
    }

    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    private function getRequestPath($className, $type)
    {
        $path = "/" . "$className" . "/" . "$type" . "$className" . "Request" . ".php";
        // $path = "/" . "$className";
        return app()->basePath() . "/app/Http/Requests" . $path;
    }
}
