<?php
/*
 * This file is part of Translator
 *
 * (c) William Skates <will@stuffby.ws>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace WillSkates\Translator\Providers\Silex;

use WillSkates\Translator;
use Silex\ServiceProviderInterface;
use Silex\Application;

/**
 * Provides a Translator as a service for Silex applications.
 *
 * @author WillSkates <will@stuffby.ws>
 */
class Provider implements ServiceProviderInterface
{

	/**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {

        $app['translator'] = $app->share(function($app) {
            $translator = new Translator();
            return $translator;
        });

    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {

    }

}