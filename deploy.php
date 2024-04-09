<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@gitlab.com:iam00/ideskapp.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('103.144.42.246')
    ->set('ssh_multiplexing', false)
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '/www/wwwroot/deployops.deslogy.com');

desc('Execute deploye success notification command');

task('horizon:terminate', function () {
    run('{{bin/php}} {{release_path}}/artisan horizon:terminate');
});

task('artisan:newdeploy', function () {
    run('{{bin/php}} {{release_path}}/artisan newdeploy');
})->once();

task('tenants_migrate', function () {
    run('{{bin/php}} {{release_path}}/artisan tenants:migrate');
})->once();

// Hooks
after('deploy:success', 'tenants_migrate');
after('deploy:success', 'horizon:terminate');
after('deploy:success', 'artisan:newdeploy');
after('deploy:failed', 'deploy:unlock');
