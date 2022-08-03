<?php
namespace App\Services;


use App\Interfaces\SoftwareRepositoryInterface;
use App\User;

class SoftwareService
{
    protected $softwareRepository;

    public function __construct(SoftwareRepositoryInterface $softwareRepository)
    {
        $this->softwareRepository = $softwareRepository;
    }

    public function index()
    {
        $this->softwareRepository->index();
    }


}

