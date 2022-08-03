<?php
namespace App\Services;



use App\Interfaces\AuthRepositoryInterface;
use http\Client\Curl\User;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(array $data)
    {
        $user = User::firstOrCreate([
            'id' => 'id'
        ], [
            'firstName' => 'Taylor',
            'lastName' => 'Otwell'
        ]);
    }

//    public function create(array $data)
//    {
//        $names = [];
//        if (isset($data['tags']))
//            $names = $this->getTags($data['tags']); // lưu các tag mới vào csdl
//        $post = $this->postRepository->create($data); // lưu post
//        $tagIds = $this->tagRepository->findByName($names)->pluck('id')->toArray();
//        $post->tags()->attach($tagIds);
//        return $post;
//    }
//
//    public function update($id,array $data)
//    {
//        $names = [];
//        if (isset($data['tags']))
//            $names = $this->getTags($data['tags']); // lưu các tag mới vào csdl
//        $post = $this->postRepository->update($id,$data); // lưu post
//        $tagIds = $this->tagRepository->findByName($names)->pluck('id')->toArray();
//        $post->tags()->sync($tagIds);
//        return $post;
//    }
//
//    public function getTags($tags1)
//    {
//        $names = $tags1;
//        $tags = $this->tagRepository->findByName($names); // lấy các tag dựa vào name
//        $duplicateNames = [];
//        for ($i = 0; $i < count($names); $i++) { // lấy các tag đã tồn tại trong csdl
//            foreach ($tags as $tag) {
//                if ($names[$i] === $tag->name) {
//                    $duplicateNames[] = $names[$i];
//                }
//            }
//        }
//        $newNames = array_diff($names, $duplicateNames); // loại bỏ các tag đã tồn tại
//        $this->tagRepository->create($newNames);
//        return $names;
//    }

}

