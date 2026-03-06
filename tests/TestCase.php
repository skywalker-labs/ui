<?php

namespace Skywalker\Ui\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Skywalker\Ui\Providers\UiServiceProvider;
use Illuminate\Support\Facades\File;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app)
    {
        return [
            UiServiceProvider::class,
        ];
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Stub the package.json so we can test appending to it
        file_put_contents(
            base_path('package.json'),
            json_encode(['devDependencies' => new \stdClass()])
        );

        // Ensure resources directories exist for copy() commands
        @mkdir(resource_path('js/components'), 0777, true);
        @mkdir(resource_path('sass'), 0777, true);
        @mkdir(resource_path('views/layouts'), 0777, true);
        @mkdir(resource_path('views/auth'), 0777, true);

        // Ensure routes directory exists for Auth scaffolding command
        @mkdir(base_path('routes'), 0777, true);
        file_put_contents(base_path('routes/web.php'), "<?php\n");

        // Ensure Controllers directory exists
        @mkdir(app_path('Http/Controllers'), 0777, true);
    }

    /**
     * Clean up the testing environment before the next test.
     */
    protected function tearDown(): void
    {
        if (file_exists(base_path('package.json'))) {
            unlink(base_path('package.json'));
        }
        
        if (file_exists(base_path('vite.config.js'))) {
            unlink(base_path('vite.config.js'));
        }

        \Illuminate\Support\Facades\File::deleteDirectory(resource_path('js'));
        \Illuminate\Support\Facades\File::deleteDirectory(resource_path('sass'));
        \Illuminate\Support\Facades\File::deleteDirectory(resource_path('views'));
        \Illuminate\Support\Facades\File::deleteDirectory(base_path('routes'));
        \Illuminate\Support\Facades\File::deleteDirectory(app_path('Http'));

        parent::tearDown();
    }
}
