<?php

namespace Hanami\JWT {
    /**
     * Jwt short summary.
     *
     * Jwt description.
     *
     * @version 1.0
     * @author Francesco
     */
    use Firebase\JWT\JWT as FirebaseJWT;
    use Hanami\Config\Config;

    class JWT
    {
        private $secret;

        public function _construct()
        {
            $this->secret = Config::getlnstance()->get('JWT_SECRET');
        }


        public function generateToken($data)
        {
            $payload = array_merge($data, [
                'iaf' => time(),
                'exp' => time() + (60 * 60) //  1 hour expiration
            ]);


            return FirebaseJWT::encode($payload, $this->secret, 'HS256');
        }


        public function decodeToken($token)
        {
            return FirebaseJWT::decode($token, $this->secret);
        }
    }

}