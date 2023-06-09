<?php

namespace App\classes\purchase;

use App\classes\general\GeneralFunctionsClass;
use App\Models\brand;
use App\Models\purchase;

class PurchaseClass extends GeneralFunctionsClass
{

    /**
     * @throws \Exception
     */
    public static function store(array $params)
    {
        try {
            return purchase::create($params);
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
            return purchase::update($params);
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
            $purchase=purchase::find($id);
            $purchase->delete();
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
            $purchase=purchase::all()->delete();
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
            return purchase::with(['user','supplement'])->find($id);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public static function getAll(int $pagination = 15)
    {
        try {
            return purchase::with(['user','supplement'])->paginate($pagination);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
