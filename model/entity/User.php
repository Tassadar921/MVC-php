<?php
    class User {
        private string $id;
        private string $username;
        private string $password;

        public function __construct(int $id, string $username, string $password)
        {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
        }

        public function getId(): string
        {
            return $this->id;
        }

        public function getUsername(): string
        {
            return $this->username;
        }

        public function getPassword(): string
        {
            return $this->password;
        }
    }
