<?php

namespace App\Domain\User;

use Symfony\Component\HttpFoundation\Request;

class UserService implements UserServiceInterface
{

    public function __construct(
        private UserRepository $userRepository
    ){}

    public function getUsers(): array
    {
        return $this->userRepository->all();
    }

    public function createUser(Request $request): User
    {
        $user = (new User)
            ->setName($request->get('name'))
            ->setLastname($request->get('lastname'))
            ->setEmail($request->get('email'))
            ->setPassword($request->get('password'))
            ->setCreatedAt(new \DateTime)
            ->setUpdatedAt(new \DateTime);

        $this->userRepository->save($user);

        return $user;
    }

    public function getUser(string $id): ?User
    {
        return $this->userRepository->findOneById($id);
    }

    public function emailExist(string $email): bool
    {
        return $this->userRepository->findEmail($email);
    }
}