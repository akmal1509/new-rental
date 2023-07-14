<?php

namespace App\Console\Commands;

use App\Console\CreateFile;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class RepoAkmCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repoakm
    {name : The name of the repository }
    {--other : If not put, it will create an eloquent repository}?';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Repository Pattern';

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
        $name = str_replace('Repository', "", $this->argument("name"));
        $name = Str::studly($name);

        $other = $this->option("other");

        $className = Str::studly($name);
        $arr = explode("/", $className);
        $className = end($arr);
        $path = $this->getRepositoryPath($className, true);

        if (!$this->files->exists($path)) {
            $this->makeDirectory(dirname($path));
            $this->createRepository($className, !$other);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }

        // This will be implement by the interface class

    }

    /**
     * Create repository
     *
     * @param string $className
     * @return void
     */
    public function createRepository(string $className, $isDefault = true)
    {
        $repositoryNamespace = "App\Repositories";

        $repositoryName = $className . 'Repository';
        $stubProperties = [
            "{namespace}" => $repositoryNamespace,
            "{repositoryName}" => $repositoryName,
            "{ModelName}"   => $className
        ];

        $stubName = $isDefault ? "eloquent-repository.stub" : "custom-repository.stub";
        $repositoryPath = $this->getRepositoryPath($className, $isDefault);
        new CreateFile(
            $stubProperties,
            $repositoryPath,
            __DIR__ . "/stubs/$stubName"
        );
        $this->line("<info>Created $className repository :</info> " . $repositoryName);

        return $repositoryNamespace . "\\" . $className;
    }

    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    private function getRepositoryPath($className, $isDefault)
    {
        $path = $isDefault
            ? "/" . "$className" . 'Repository' . ".php"
            : "/Other/$className" .  'Repository' . ".php";

        return app()->basePath() . "/app/Repositories" . $path;
    }
}
