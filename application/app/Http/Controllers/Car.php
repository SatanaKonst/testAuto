<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;

class Car extends Controller
{
    /** Получить список автомобилей
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        $filter = $request->get('filter');
        $query = \App\Models\Car::query();
        if (!empty($filter)) {
            foreach ($filter as $key => $value) {
                $query->where($key, '=', $value);
            }
        }
        return response()->json($query->get()->toArray());
    }

    /** Добавление новой машины
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        try {
            $request->validate([
                'mark_id' => 'required|integer',
                'model_id' => 'required|integer'
            ]);
            $newCarInstance = new \App\Models\Car();
            $newCarInstance->mark_id = $request->get('mark_id');
            $newCarInstance->model_id = $request->get('model_id');
            if ($request->has('year')) {
                $newCarInstance->year = $request->get('year');
            }
            if ($request->has('color')) {
                $newCarInstance->color = $request->get('color');
            }
            if ($newCarInstance->save()) {
                return response()->json($newCarInstance->id);
            }
            throw new \Exception('Error add new car');
        } catch (\Throwable $exception) {
            return response()->json($exception->getMessage());
        }
    }

    /** Обновление
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer',
            ]);
            $car = \App\Models\Car::query()->where('id', '=', $request->get('id'))->first();
            if (is_null($car)) {
                throw new Exception('Car not found');
            }

            $car->mark_id = ($request->has('mark_id')) ? $request->get('mark_id') : $car->mark_id;
            $car->model_id = ($request->has('model_id')) ? $request->get('model_id') : $car->model_id;
            $car->year = ($request->has('year')) ? $request->get('year') : $car->year;
            $car->color = ($request->has('color')) ? $request->get('color') : $car->color;

            return response()->json($car->save());
        } catch (\Throwable $exception) {
            return response()->json($exception->getMessage());
        }
    }

    /** Удаление
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request){
        try {
            $request->validate([
                'id' => 'required|integer',
            ]);
            $car = \App\Models\Car::query()->where('id', '=', $request->get('id'))->first();
            if (is_null($car)) {
                throw new Exception('Car not found');
            }

            return response()->json($car->delete());
        } catch (\Throwable $exception) {
            return response()->json($exception->getMessage());
        }
    }
}
