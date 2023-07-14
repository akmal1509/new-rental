<?php

namespace App\Console\Commands;

use Symfony\Component\Console\Input\InputOption;
use Illuminate\Foundation\Console\ModelMakeCommand;

class CustomModelCommand extends ModelMakeCommand
{
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('custom')) {
            return  __DIR__ . "/stubs/model.custom.stub";
        } elseif ($this->option('slug')) {
            return  __DIR__ . "/stubs/model.slug.stub";
        } else {
            return $this->option('pivot')
                ? __DIR__ . "/stubs/model.pivot.stub"
                : __DIR__ . "/stubs/model.stub";
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE, 'Generate a migration, seeder, factory, policy, and resource controller for the model'],
            ['controller', 'c', InputOption::VALUE_NONE, 'Create a new controller for the model'],
            ['factory', 'f', InputOption::VALUE_NONE, 'Create a new factory for the model'],
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the model already exists'],
            ['migration', 'm', InputOption::VALUE_NONE, 'Create a new migration file for the model'],
            ['policy', null, InputOption::VALUE_NONE, 'Create a new policy for the model'],
            ['seed', 's', InputOption::VALUE_NONE, 'Create a new seeder for the model'],
            ['pivot', 'p', InputOption::VALUE_NONE, 'Indicates if the generated model should be a custom intermediate table model'],
            ['resource', 'r', InputOption::VALUE_NONE, 'Indicates if the generated controller should be a resource controller'],
            ['api', null, InputOption::VALUE_NONE, 'Indicates if the generated controller should be an API controller'],
            ['requests', 'R', InputOption::VALUE_NONE, 'Create new form request classes and use them in the resource controller'],
            ['custom', null, InputOption::VALUE_NONE, 'Create new form request classes and use them in the resource controller'],
            ['slug', null, InputOption::VALUE_NONE, 'Create new form request classes and use them in the resource controller'],
        ];
    }
}
