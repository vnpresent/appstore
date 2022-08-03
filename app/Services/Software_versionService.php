<?php

namespace App\Services;


use App\Interfaces\Software_versionRepositoryInterface;
use App\User;

class Software_versionService
{
    protected $software_versionRepository;

    public function __construct(Software_versionRepositoryInterface $software_versionRepository)
    {
        $this->software_versionRepository = $software_versionRepository;
    }

    public function store(array $data)
    {
        $this->software_versionRepository->store($data);
    }

    public function update(array $data,$id)
    {
        $this->software_versionRepository->update($data,$id);
    }
    public function delete($id)
    {
        $this->software_versionRepository->delete($id);
    }

}

