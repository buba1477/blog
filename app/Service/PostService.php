<?php


namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagId = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
            $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
            $post = Post::firstOrCreate($data);
            if (isset($tagId)) {
                $post->tags()->attach($tagId);
            }

            DB:: commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }

    public function update($data, $post)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagId = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (!empty($data['preview_img'])) {
                $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
            }

            if (!empty($data['main_img'])) {
                $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
            }

            $post->update($data);

            if (isset($tagId)) {
                $post->tags()->sync($tagId);
            }

            DB:: commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
}
