<?php

    namespace Dez\Di;

    /**
     * Class Service
     * @package Dez\Di
     */
    class Service implements ServiceInterface {

        /**
         * @var
         */
        protected $name;

        /**
         * @var
         */
        protected $definition;

        /**
         * @var bool
         */
        protected $resolved = false;

        /**
         * @param $name
         * @param $definition
         */
        public function __construct( $name, $definition ) {
            $this->name         = $name;
            $this->definition   = $definition;
        }

        /**
         * @return mixed
         */
        public function getDefinition() {
            return $this->definition;
        }

        /**
         * @param mixed $definition
         * @return static
         */
        public function setDefinition($definition) {
            $this->definition = $definition;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getName() {
            return $this->name;
        }

        /**
         *
         */
        public function resolve() {

        }

        /**
         * @return bool
         */
        public function isResolved() {
            return $this->resolved;
        }

    }