<?php

    namespace Dez;

    use Dez\Di\DiInterface;
    use Dez\Di\Exception;
    use Dez\Di\Service;

    /**
     * Class Di
     * @package Dez
     */
    class Di implements DiInterface {

        /**
         * @var array
         */
        protected $services     = [];

        /**
         * @var array
         */
        protected $instances    = [];

        /**
         * @param $name
         * @param $definition
         * @return Service
         */
        public function set( $name, $definition ) {

            $service                = new Service( $name, $definition );
            $this->services[$name]  = $service;

            return $service;
        }

        /**
         * @param $name
         * @param array $parameters
         * @return mixed
         */
        public function get( $name, array $parameters = [] ) {

            if( ! isset( $this->instances[$name] ) ) {
                $this->instances[$name] = $this->getNew( $name, $parameters );
            }

            return $this->instances[$name];

        }

        /**
         * @param $name
         * @param array $parameters
         * @return mixed|null|object
         * @throws Exception
         */
        public function getNew( $name, array $parameters = [] ) {

            $service    = $this->getService( $name );
            $instance   = $service->resolve( $parameters );

            return $instance;
        }

        /**
         * @param $name
         * @return Service $service
         * @throws Exception
         */
        public function getService( $name ) {

            if( ! $this->has( $name ) )
                throw new Exception( "Service not registered '{$name}'" );

            return $this->services[$name];
        }

        /**
         * @param $name
         * @return bool
         */
        public function has( $name ) {
            return isset( $this[$name] );
        }

        /**
         * @return int
         */
        public function count() {
            return count( $this->services );
        }

        /**
         * @param mixed $index
         * @return bool
         */
        public function offsetExists( $index ) {
            return $this->has( $index );
        }

        /**
         * @param mixed $index
         * @return bool
         */
        public function offsetUnset( $index ) {
            return false;
        }

        /**
         * @param mixed $index
         * @return mixed
         */
        public function offsetGet( $index ) {
            return $this->get( $index );
        }

        /**
         * @param mixed $name
         * @param mixed $definition
         * @return $this|void
         */
        public function offsetSet( $name, $definition ) {
            return $this->set( $name, $definition );
        }

        /**
         * @return \ArrayIterator
         */
        public function getIterator() {
            return new \ArrayIterator( $this->services );
        }


    }