<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            $tags = $data['tags'];
            unset($data['tags']);
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tags);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            Db::beginTransaction();
            $tags = $data['tags'];
            unset($data['tags']);

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $post->update($data);
            $post->tags()->sync($tags);
            DB::commit();
        } catch (Exception $exception) {
            abort(500);
            DB::rollBack();
        }

        return $post;
    }
}
