<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use Nette\Utils\JsonException;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('master.department.index');
    }

    /**
     * Get all Data format Json from departments
     *
     * @param Request $request
     * @return string
     * @throws JsonException
     */
    public function data(Request $request): string
    {
        $page           = $request->page ?? 1;
        $count          = $request->rows ?? 25;
        $query          = Department::query();
        $total          = $query->count();

        if(isset($request->sort) && isset($request->order)) {
            $sorts  = explode(',', $request->sort);
            $orders = explode(',', $request->order);

            foreach ($sorts as $index => $sort) {
                $query = $query->orderBy($sort, strtoupper($orders[$index]));
            }
        }

        $query->limit($count)->offset(($page * $count) - $count);
        return Json::encode([
            'total' => $total,
            'rows' => $query->get()->toArray(),
            'sql' => $query->toSql()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     * @throws JsonException
     */
    public function store(Request $request): string
    {
        $department = Department::create($request->all());
        if(!$department) {
            return Json::encode(['errorMsg' => 'Failed to save data']);
        }

        return Json::encode(['successMsg' => 'Success to save data']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Department $department
     * @return string
     * @throws JsonException
     */
    public function update(Request $request, Department $department): string
    {
        if(!$department->update($request->all())){
            return Json::encode(['errorMsg' => 'Failed to update data']);
        }

        return Json::encode(['successMsg' => 'Success to update data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return string
     * @throws JsonException
     */
    public function destroy(Department $department): string
    {
        if(!$department->delete()) {
            return Json::encode(['errorMsg' => 'Failed to delete data']);
        }

        return Json::encode(['successMsg' => 'Success to delete data']);
    }
}
