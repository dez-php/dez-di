<?php

    namespace Dez\Di;

    /**
     * Interface InjectableInterface
     * @package Dez\Di
     */
    interface InjectableInterface {

        /**
         * @param DiInterface $di
         * @return boolean
         */
        public function setDi( DiInterface $di );

        /**
         * @return DiInterface
         */
        public function getDi();

    }