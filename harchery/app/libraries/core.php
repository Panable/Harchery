<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class core
{
    // Default controller
    public $currentController = 'pages';
    
    // Default method
    protected $currentMethod = 'index';
    
    // Parameters extracted from the URL
    protected $params = [];

    // Function to handle routing based on the URL
    public function routeUrl()
    {
        $url = $this->getUrl();

        if (!is_null($url)) {
            if (file_exists(__DIR__. '/../controllers/' . $url[0] . '.php')) {
                // Set as the current controller
                $this->currentController = $url[0];
                unset($url[0]);

                // Require the controller file
                require_once __DIR__ . '/../controllers/' . $this->currentController . '.php';

                // Instantiate the controller
                $this->currentController = new $this->currentController;

                // Check if a specific method is requested
                if (isset($url[1])) {
                    if (method_exists($this->currentController, $url[1])) {
                        $this->currentMethod = $url[1];
                        unset($url[1]);
                    }
                }

                // Set parameters, if any
                $this->params = $url ? array_values($url) : [];

                // Call the controller method with parameters
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            } else {
                // Redirect to default controller if the specified one doesn't exist
                goto noController;
            }
        } else {
            noController:
            // Require the default controller file
            require_once __DIR__ . '/../controllers/' . $this->currentController . '.php';
            
            // Instantiate the default controller
            $this->currentController = new $this->currentController;
            
            // Call the default controller method with parameters
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
    }

    // Constructor to initiate routing when the class is instantiated
    public function __construct()
    {
        $this->routeUrl();
    }

    // Function to get and process the URL
    public function getUrl()
    {
        // Check if the URL is not null
        if (isset($_GET['url'])) {
            // Trim the URL of trailing '/' (e.g., /bing/chilling/ -> /bing/chilling)
            $url = rtrim($_GET['url'], '/');

            // Sanitize the URL of any unsafe characters
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // Split the URL into an array using the '/' delimiter
            $url = explode('/', $url);
            return $url;
        }
    }
}
