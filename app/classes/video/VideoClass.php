<?php

namespace App\classes\video;

use App\classes\general\GeneralFunctionsClass;
use App\Models\User;
use App\Models\video;

class VideoClass extends GeneralFunctionsClass
{
    /**
     * @throws \Exception
     */
    public static function store(array $params)
    {
        try {
            return video::create($params);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public static function update(array $params)
    {
        try {
            return video::update($params);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public static function destroy(int $id)
    {
        try {
            $video=video::find($id);
            $video->delete();
            return true;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public static function destroyAll()
    {
        try {
            $video=video::all()->delete();
            return true;
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public static function get(int $id)
    {
        try {
            return video::with(['coach','courses'])->find($id);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    public static function getAll(int $pagination = 15)
    {
        try {
            return video::paginate($pagination);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
