<?php

namespace App\Repositories;

use App\Interfaces\SoftwareRepositoryInterface;
use App\User;
use App\Software;
use Exception;
use Illuminate\Support\Facades\Storage;


class  SoftwareRepository implements SoftwareRepositoryInterface
{
    public function index()
    {
        $softwares = Software::all()->makeHidden(['user_last_modified_id', 'user', 'software_versions']);
        for ($i = 0; $i < count($softwares); $i++) {
            $softwares[$i]['user_last_modified'] = $softwares[$i]->user->makeHidden('access_token');
            $softwares[$i]['last_version'] = $softwares[$i]->software_versions->last();
        }
        return $softwares;
    }

    public function store(array $data)
    {
        $user = User::find(1);
        auth()->login($user);
        $software = Software::create(array_merge($data, ['user_last_modified_id' => auth()->user()->id]))->makeHidden('user_last_modified_id');
        return $software;
    }

    public function update(array $data, $id)
    {
        $user = User::find(1);
        auth()->login($user);
        $software = Software::find($id);
        if ($software) {
            $software->update(array_merge($data, ['user_last_modified_id' => auth()->user()->id]));
            $software->makeHidden('user_last_modified_id');
        }
        return $software;
    }

    public function show($id)
    {
        $software = Software::find($id);
        if ($software) {
            $software['software_versions'] = $software->software_versions;
            for ($i = 0; $i < count($software['software_versions']); $i++) {
                $software['software_versions'][$i]['user'] = $software['software_versions'][$i]->user->makeHidden('access_token');
            }
            return $software;
        } else {
            return response()->json(['error' => 'cant find software']);
        }
    }

    public function delete($id)
    {
        $software = Software::find($id);
        if ($software)
        {
            $software->delete();
            return response()->json(['success' => 'true']);
        }
        else
        {
            return response()->json(['error' => 'cant find software']);
        }
    }
}
