<?php
namespace vendor\framework;
/**
 * Class Container
 */
class Container
{
	/**
	 * @var array
	 */
	public  $instances = [];
	
	/**
	 * @param      $abstract
	 * @param null $concrete
	 */
	public function set($abstract, $concrete = NULL)
	{
		if ($concrete === NULL) {
			$concrete = $abstract;
		}
		$this->instances[$abstract] = $concrete;

		
	}
	/**
	 * @param       $abstract
	 * @param array $parameters
	 *
	 * @return mixed|null|object
	 * @throws Exception
	 */
	public function get($abstract, $parameters = [])
	{
		// if we don't have it, just register it
		if (!isset($this->instances[$abstract])) {
			//throw new \Exception('Instance');
			$instance = $abstract;
			//$this->set($abstract);
		}else{
			$instance = $this->instances[$abstract];
		}
		return $this->resolve($instance, $parameters);
	}
	/**
	 * resolve single
	 *
	 * @param $concrete
	 * @param $parameters
	 *
	 * @return mixed|object
	 * @throws Exception
	 */
	public function resolve($concrete, $parameters)
	{
		if ($concrete instanceof Closure) {
           
			return $concrete($this, $parameters);
		}

		$reflector = $this->getReflector($concrete);
		// get class constructor
		$constructor = $reflector->getConstructor();
		if (is_null($constructor)) {
			// get new instance from class
			return $reflector->newInstance();
        }
		// get constructor params
		$parameters   = $constructor->getParameters();
        
		$dependencies = $this->getDependencies($parameters);

		// get new instance with dependencies resolved
		return $reflector->newInstanceArgs($dependencies);
	}
	public function method($concrete,$method,$parameter=[])
	{
		$method  = $this->getReflector($concrete)->getMethod($method);
		
		$notClassParameter = 0;
		$parameters = [];
		foreach($method->getParameters() as $key=>$param){
			
            if($param->getClass()){
                $parameters[$key] = $this->get($param->getClass()->name);
            }else{
                $parameters[$key] =null;
                if(isset($parameter[$notClassParameter])){
                    $parameters[$key] = $parameter[$notClassParameter];
                    $notClassParameter++;
                }
            }
          
		}
        $method->invokeArgs($this->get($concrete),$parameters);
	}

	public function getReflector($concrete)
	{
		$reflector = new \ReflectionClass($concrete);
		// check if class is instantiable
		if (!$reflector->isInstantiable()) {
			throw new \Exception("Class {$concrete} is not instantiable");
		}
		return $reflector;
	}
	/**
	 * get all dependencies resolved
	 *
	 * @param $parameters
	 *
	 * @return array
	 * @throws Exception
	 */
	public function getDependencies($parameters)
	{
		$dependencies = [];
		foreach ($parameters as $parameter) {
          
			// get the type hinted class
			$dependency = $parameter->getClass();
			if ($dependency === NULL) {
				// check if default value for a parameter is available
				if ($parameter->isDefaultValueAvailable()) {
					// get default value of parameter
					$dependencies[] = $parameter->getDefaultValue();
				} else {
					throw new \Exception("Can not resolve class dependency {$parameter->name}");
				}
			} else {
				// get dependency resolved
				$dependencies[] = $this->get($dependency->name);
			}
		}
		return $dependencies;
	}

	public function getInstance($instanceName)
	{
		return $this->instances[$instanceName];
	}
	public static function getContainer()
	{
		return new self;
	}

	

}
