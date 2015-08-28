<?php

    namespace Dez;

    use Dez\Di\DiInterface;
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


        public function set( $name, $definition ) {
            $service                = new Service( $name, $definition );
            $this->services[$name]  = $service;
            return $service;
        }

        /**
         * @param $name
         * @return mixed
         */
        public function get( $name ) {
            return $this->services[$name];
        }

        /**
         * @param $name
         * @return mixed
         */
        public function getService( $name ) {
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
            return isset( $this->services[$index] );
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
            return $this->services[$index];
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