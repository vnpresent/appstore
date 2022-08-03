<?php

namespace App\Services;


use App\Interfaces\SoftwareRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Storage;

class SoftwareService
{
    protected $softwareRepository;

    public function __construct(SoftwareRepositoryInterface $softwareRepository)
    {
        $this->softwareRepository = $softwareRepository;
    }

    public function index()
    {
        return $this->softwareRepository->index();
    }

    public function store(array $data)
    {
        $software = $this->softwareRepository->store($data);
        $path = $data['software_img']->storeAs('public/img', $software->id.'.'.$data['software_img']->extension());
        $software->update(['software_img'=>'/'.str_replace('public','storage',$path)]);
        $software['user_last_modified'] = auth()->user()->makeHidden('access_token');
        return $software;
    }

    public function update(array $data,$id)
    {
        $software = $this->softwareRepository->update($data,$id);
        if ($software)
        {
            $data['software_img']->storeAs('public/img', $software->id.'.'.$data['software_img']->extension());
            $software['user_last_modified'] = auth()->user()->makeHidden('access_token');
            return $software;
        }
        else
        {
            return response()->json(['error' => 'cant find software']);
        }
    }

    public function show($id)
    {
        return $this->softwareRepository->show($id);
    }

    public function delete($id)
    {
        return $this->softwareRepository->delete($id);
    }
}

