<?php

namespace App\Http\Middleware;

use App;
use Auth;
use Config;
use Closure;

use App\Repositories\Contracts\Admin\CaiDatRepository;

class ConfigureMailerMiddleware
{
    protected $caiDat;

    public function __construct(CaiDatRepository $caiDat)
    {
        $this->caiDat = $caiDat;
    }

    private function setEnvironmentValue($environmentName, $configKey, $newValue)
    {
        // dd(App::environmentFilePath());
        file_put_contents('/Users/macbookpro/projects/msm-project/msm_server/.env', str_replace(
            $environmentName . '=' . Config::get($configKey),
            $environmentName . '=' . $newValue,
            file_get_contents(App::environmentFilePath())
        ));

        Config::set($configKey, $newValue);

        // Reload the cached config
        if (file_exists(App::getCachedConfigPath())) {
            Artisan::call("config:cache");
        }
    }

    public function handle($request, Closure $next)
    {
        $caiDat = $this->caiDat->getConfig();
        $email = $caiDat->email;
        $password = $caiDat->email_password;

        // $this->setEnvironmentValue('MAIL_USERNAME', 'app.username', $email);
        // $this->setEnvironmentValue('MAIL_PASSWORD', 'app.password', $password);
        // setEnvironmentValue('MAIL_USERNAME', $username);
        // setEnvironmentValue('MAIL_PASSWORD', $password);
        // Config::set('mail.username', $username);
        // Config::set('mail.password', $password);

        // putenv ("MAIL_USERNAME=" . $username);
        // putenv ("MAIL_USERNAME=" . $password);

        // dump(Config::get('mail'));
        // config()->set('mail', array_merge(config('mail'), [
        //     'username' => $username,
        //     'password' => $password,
        // ]));
        // dump(Config::get('mail'));

        // App::getInstance()->register(\Illuminate\Mail\MailServiceProvider::class);

        return $next($request);
    }
}
