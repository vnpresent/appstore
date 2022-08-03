<?php
namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function register();
    public function login();
    public function logout();
    public function refresh();
}
