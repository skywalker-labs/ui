<?php

namespace Skywalker\Ui\Tests;

use PHPUnit\Framework\Attributes\Test;

class UiCommandTest extends TestCase
{
    #[Test]
    public function it_can_install_bootstrap_scaffolding()
    {
        $this->artisan('ui bootstrap')
            ->assertExitCode(0);

        $packageJson = json_decode(file_get_contents(base_path('package.json')), true);

        $this->assertArrayHasKey('bootstrap', $packageJson['devDependencies'] ?? []);
        $this->assertArrayHasKey('sass', $packageJson['devDependencies'] ?? []);
        $this->assertFileExists(base_path('vite.config.js'));
        $this->assertFileExists(resource_path('sass/app.scss'));
        $this->assertFileExists(resource_path('js/bootstrap.js'));
    }

    #[Test]
    public function it_can_install_vue_scaffolding()
    {
        $this->artisan('ui vue')
            ->assertExitCode(0);

        $packageJson = json_decode(file_get_contents(base_path('package.json')), true);

        $this->assertArrayHasKey('vue', $packageJson['devDependencies'] ?? []);
        $this->assertArrayHasKey('@vitejs/plugin-vue', $packageJson['devDependencies'] ?? []);
        $this->assertFileExists(resource_path('js/components/ExampleComponent.vue'));
        $this->assertFileExists(resource_path('js/app.js'));
    }

    #[Test]
    public function it_can_install_react_scaffolding()
    {
        $this->artisan('ui react')
            ->assertExitCode(0);

        $packageJson = json_decode(file_get_contents(base_path('package.json')), true);

        $this->assertArrayHasKey('react', $packageJson['devDependencies'] ?? []);
        $this->assertArrayHasKey('react-dom', $packageJson['devDependencies'] ?? []);
        $this->assertArrayHasKey('@vitejs/plugin-react', $packageJson['devDependencies'] ?? []);
        $this->assertFileExists(resource_path('js/components/Example.jsx'));
        $this->assertFileExists(resource_path('js/app.js'));
    }

    #[Test]
    public function it_can_scaffold_auth_with_bootstrap()
    {
        $this->artisan('ui bootstrap --auth')
            ->assertExitCode(0);

        // Core Layout and Auth Views should be placed in `resources/views`
        $this->assertFileExists(resource_path('views/layouts/app.blade.php'));
        $this->assertFileExists(resource_path('views/auth/login.blade.php'));
        $this->assertFileExists(resource_path('views/auth/register.blade.php'));

        // Controllers should be published
        $this->assertFileExists(app_path('Http/Controllers/HomeController.php'));
    }
}
