<?php

    namespace Dez\Di;

    /**
     * Interface ServiceInterface
     * @package De\Di
     */
    interface ServiceInterface {

        /**
         * @return mixed
         */
        public function getDefinition();

        /**
         * @param $definition
         * @return mixed
         */
        public function setDefinition( $definition );

        /**
         * @return mixed
         */
        public function getName();

        /**
         * @return mixed
         */
        public function resolve();

    }