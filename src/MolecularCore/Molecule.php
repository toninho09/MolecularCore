<?php

namespace MolecularCore;

use MolecularCore\Interfaces\MoleculeInterface as MoleculeInterface;

    class Molecule implements MoleculeInterface
    {
        protected static $instance;
        protected $class = __CLASS__;

        public static function __callStatic($name, $arguments)
        {
            return call_user_func_array([self::getInstance(), $name], $arguments);
        }

        public function __call($name, $arguments)
        {
            return call_user_func_array([self::getInstance(), $name], $arguments);
        }

        public function register(\MolecularCore\Core &$app)
        {
            if (!isset(self::$instance)) {
                self::$instance = new $this->class($app);
            }
        }

        public function run()
        {
            self::$instance->run();
        }

        public static function getInstance()
        {
            return self::$instance;
        }
    }
