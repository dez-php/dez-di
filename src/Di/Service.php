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