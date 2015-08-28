<?php

    namespace Dez\Di;

    /**
     * Class Injectable
     * @package Dez\Di
     */
    abstract class Injectable implements InjectableInterface {

        /**
         * @var DiInterface
         */
        protected $dependencyInjector;

        /**
         * @param DiInterface $dependencyInjector
         * @return $this
         */
        public function setDi( DiInterface $dependencyInjector ) {
            $this->dependencyInjector   = $dependencyInjector;
            return $this;
        }

        /**
         * @return DiInterface
         */
        public function getDi() {
            return $this->dependencyInjector;
        }


        /**
         * @param $property
         * @return mixed|null
         * @throws Exception
         */
        public function __get( $property ) {
            if( ! is_object( $this->dependencyInjector ) || ! ( $this->dependencyInjector instanceOf DiInterface ) ) {
                throw new Exception( 'A dependency injection object is required' );
            }

            if( $this->dependencyInjector->has( $property ) ) {
                $service                = $this->dependencyInjector->get( $property );
                $this->{ $property }    = $service;
                return $service;
            }

            return null;
        }

    }