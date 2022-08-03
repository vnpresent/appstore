<?php

namespace App\Repositories;

use App\Interfaces\Software_versionRepositoryInterface;
use App\Software_version;
use App\User;
use Exception;


class  Software_versionRepository implements Software_versionRepositoryInterface
{

    public function store(array $data)
    {
        $user = User::find(1);
        auth()->login($user);
        $software_version = Software_version::create(array_merge($data, ['user_last_modified_id' => auth()->user()->id]))->makeHidden('user_last_modified_id');
        return $software_version;
    }

    public function update(array $data, $id)
    {
        $user = User::find(1);
        auth()->login($user);
        $software_version = Software_version::find($id);
        if ($software_version) {
            $software_version->update(array_merge($data, ['user_last_modified_id' => auth()->user()->id]));
            $software_version->makeHidden('user_last_modified_id');
        }
        return $software_version;
    }

    public function delete($id)
    {
        $software_version = Software_version::find($id);
        if ($software_version)
        {
            $software_version->delete();
            return response()->json(['success' => 'true']);
        }
        else
        {
            return response()->json(['error' => 'cant find software']);
        }
    }
}
