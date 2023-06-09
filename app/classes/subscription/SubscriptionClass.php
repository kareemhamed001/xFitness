<?php

namespace App\classes\subscription;

use App\classes\general\GeneralFunctionsClass;
use App\Models\purchase;
use App\Models\subscription;

class SubscriptionClass extends GeneralFunctionsClass
{

    /**
     * @throws \Exception
     */
    public static function store(array $params)
    {
        try {
            return subscription::create($params);
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
            return subscription::update($params);
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
            $subscription=subscription::find($id);
            $subscription->delete();
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
            $subscription=subscription::all()->delete();
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
            return subscription::with(['user','course'])->find($id);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function getAll(int $pagination = 15)
    {
        try {
            return subscription::with(['user','course'])->paginate($pagination);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
