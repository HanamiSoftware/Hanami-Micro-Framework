<?php

namespace Hanami\Core\Database
{
    /**
     * Database short summary.
     *
     * Database description.
     *
     * @version 1.0
     * @author Francesco
     */
    use Doctrine\DBAL\DriverManager;
    use Doctrine\ORM\ORMSetup;
    use Doctrine\ORM\EntityManager;
    use Hanami\Core\Config\Config;

    class Database
    {
        private $entityManager;

        public function _construct()
        {
            $config = Config::getlnstance();

            $paths = array(__DIR__ . '/../Entity');
            $isDevMode = true;

            $dbParams = array(
                'driver' => 'pdo_mysql',
                'user' => $config->get('DB_USER'),
                'password' => $config->get('DB_PASS'),
                'dbname' => $config->get('DB_NAME'),
                'host' => $config->get('DB_HOST'),
                'port' => $config->get('DB_PORT'),
            );

            $setup = ORMSetup::createAttributeMetadataConfiguration($paths);
            $connection = DriverManager::getConnection($dbParams);

            $this->entityManager = new EntityManager($connection, $setup);
        }


        public function getEntityManager()
        {
            return $this->entityManager;
        }
    }

}