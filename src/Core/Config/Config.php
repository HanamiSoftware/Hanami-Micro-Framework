<?php

namespace Hanami\Core\Config 
{
    /**
     * Config short summary.
     *
     * Config description.
     *
     * @version 1.0
     * @author Francesco
     */
    use Dotenv\Dotenv;

    class Config
    {
        private static $instance = null;
        private $env;

        private function _construct()
        {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
            $dotenv->load();
            $this->env = $_ENV;
        }


        public static function getlnstance()
        {
            if (self::$instance === null) {
                self::$instance = new Config();
            }
            return self::$instance;
        }


        public function get($key)
        {
            return $this->env[$key] ?? null;

        }
    }

}