<?php 
    namespace config;

    use config\Request as Request;

    class Router
    {
        public static function Route(Request $request)
        {
            $controllerName = $request->getcontroller() . 'Controller';

            $methodName = $request->getmethod();

            $methodParameters = $request->getparameters();          

            $controllerClassName = "business\\controllers\\". $controllerName;            

            $controller = new $controllerClassName;
            
            Router::checkSignIn($controller, $methodName, $methodParameters, $controllerName);
        }

        private static function checkSignIn($controller, $methodName, $methodParameters, $controllerName){
            if($controllerName != 'HomeController')
                if(!$_SESSION['user'])
                    header('Location: ' . ROOT_CLIENT);
            
            if(!isset($methodParameters))    
                call_user_func(array($controller, $methodName));
            else
                call_user_func_array(array($controller, $methodName), $methodParameters);  
        }
    }
?>