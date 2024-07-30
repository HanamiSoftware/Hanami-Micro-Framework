<?php

namespace Hanami\Core\Entity {
    /**
     * User short summary.
     *
     * User description.
     *
     * @version 1.0
     * @author Francesco
     */
    use Doctrine\ORM\Mapping as ORM;

    /**
     *	@ORM\Entity
     *	@ORM\Table(name="users")
     */
    class User
    {
        /**
         *@ORM\ld
         *	@ORM\Column(type="integer")
         *	@ORM\GeneratedValue
         */
        private $id;

        /**
         *	@ORM\Column(type="string")
         */
        private $username;

        /**
        *	@ORM\Column(type="string")

        */
        private $password;


        // getters and setters...
    }

}