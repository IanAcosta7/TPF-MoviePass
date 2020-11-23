<?php 
    namespace config;

    use config\Request as Request;
    use business\exceptions\WebsiteException;

    class Router
    {
        public static function Route(Request $request)
        {
            $controllerName = $request->getcontroller() . 'Controller';

            $methodName = $request->getmethod();

            $methodParameters = $request->getparameters();          

            $controllerClassName = "business\\controllers\\". $controllerName;            

            Router::checkSignIn($methodName, $methodParameters, $controllerName, $controllerClassName);
        }

        private static function checkSignIn($methodName, $methodParameters, $controllerName, $controllerClassName){
            if($controllerName != 'HomeController' && !isset($_SESSION['user']))
                header('Location: ' . ROOT_CLIENT);
          
            try {
                if (!file_exists($controllerClassName . '.php'))
                    throw new WebsiteException("Página no encontrada.", "PAGE_NOT_FOUND", 404);

                $controller = new $controllerClassName;

                if(!isset($methodParameters))    
                    call_user_func(array($controller, $methodName));
                else
                    call_user_func_array(array($controller, $methodName), $methodParameters);  
            } catch (\Throwable $e) {
                include(ROOT . 'presentation/error.php');
            }
        }
    }
?>