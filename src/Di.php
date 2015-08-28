<?php

    namespace Dez;

    use Dez\Di\DiInterface;
    use Dez\Di\Service;

    class Di implements DiInterface {

        protected $services     = [];

        public function set( $name, $definition ) {
            $this->services[$name]  = new Service( $name, $definition );
        }

        public function get( $name ) {
            return;
        }

        public function getService( $name ) {
            return;
        }

        public function has( $name ) {
            return isset( $this[$name] );
        }

        public function count() {
            return count( $this->services );
        }

        public function offsetExists( $index ) {
            return isset( $this->services[$index] );
        }

        public function offsetUnset( $index ) {
            return false;
        }

        public function offsetGet( $index ) {
            return $this->services[$index];
        }

        public function offsetSet( $index, $item ) {
            ! $index
                ? $this->services[]         = $item
                : $this->services[$index]   = $item;
        }

        public function getIterator() {
            return new \ArrayIterator( $this->services );
        }


    }