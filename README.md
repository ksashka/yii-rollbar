Rollbar
=========

Rollbar Component is the way to integrate [rollbar.com](http://rollbar.com/) service with your Yii application.
Rollbar aggregates and analyzes your application errors and deploys.

Installation
------------

1. Add "rollbar/rollbar" package to composer.json and make `php composer.phar update`

2. Add `rollbar` component to the `main.php` config:

    ```php
    // ...
    'components' => array(
        // ...
        'rollbar'=>array(
            'class' => 'vendor.extensions.rollbar.RollbarComponent', // adjust path if needed
            'accessToken' => 'your_serverside_rollbar_token',
        ),
    ),
    ```

3. Adjust `main.php` config to preload the component:

    ```php
    'preload'=>array('log', 'rollbar'),
    ```

4. Set `RollbarErrorHandler` as error handler:

    ```php
    'components' => array(
        // ...
        'errorHandler'=>array(
            'class'=>'vendor.extensions.rollbar.RollbarErrorHandler',
            // ...
        ),
    ),
    ```

    You can also pass some additional rollbar options in the component config:
    `environment`, `branch`, `maxErrno`, `baseApiUrl` etc.

    A good idea is to specify `environment` as:

    ```php
    'environment' => isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'cli_'.php_uname("n"),
    ```
    
    For YiiBooster template add
    
    ```php
    'environment' => $params['env.code'],
    ```

    You can specify alias of your project root directory for linking stack traces (`'application'` by default):
    ```php
    'rootAlias' => 'root',
    ```
