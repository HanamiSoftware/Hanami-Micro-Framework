<?php

namespace Hanami\Auth
{
	/**
	 * AuthService short summary.
	 *
	 * AuthService description.
	 *
	 * @version 1.0
	 * @author Francesco
	 */
	use Hanami\Database\Database;
	use Hanami\Entity\User;
	use Doctrine\ORM\EntityManager;
	use Firebase\JWT\JWT;

	class AuthService
	{
		private $entityManager; private $jwt;

		public function _construct()
		{
			$this->entityManager = (new Database())->getEntityManager();
			$this->jwt = new JWT();
		}


		public function authenticate($username, $password)
		{
			$user= $this->entityManager->getRepository(User::class)­->findOneBy(['username' => $username]);

			if ($user && password_verify($password, $user->getPassword())) { 
				return $this->jwt->generateToken(['id' => $user->getld(), 'username'=> $user->getUsername()]);
			}

			throw new \Exception('lnvalid credentials');
	}


		public function register($username, $password)
		{
			$user = new User();
			$user->setUsername($username);
			$user->setPassword(password_hash($password,PASSWORD _BCRYPT));

			$this->entityManager->persist($user);
			$this->entityManager->flush();
			return $user;
		}
	}

}