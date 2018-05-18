<?php

namespace App\Http\Controllers\Rest;

use App\Expense;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use RobinMarechal\RestApi\Rest\QueryBuilder;
use RobinMarechal\RestApi\Rest\RestResponse;

class ExpensesController extends Controller
{
    public function expenses($phone, $roomId, $id = null)
    {
        switch ($this->request->getMethod()){
            case 'GET': return $this->getExpenses($phone, $roomId, $id);
        }

        return JsonResponse::create(['data' => 'Not implemented yet'], Response::HTTP_NOT_IMPLEMENTED);
    }


    public function rooms_expenses($roomId, $phone, $id = null)
    {
        return $this->expenses($phone, $roomId, $id);
    }


    public function concerningExpenses($phone, $roomId, $id = null)
    {
        switch ($this->request->getMethod()){
            case 'GET': return $this->getConcerning($phone, $roomId, $id);
        }
        return JsonResponse::create(['data' => 'Not implemented yet'], Response::HTTP_NOT_IMPLEMENTED);
    }


    public function rooms_concerningExpenses($roomId, $phone, $id = null)
    {
        return $this->concerningExpenses($phone, $roomId, $id);
    }


    public function getExpenses($phone, $roomId, $id = null)
    {
        $expenses = [];
        if (!is_null($id)) {
            // all
            $query = QueryBuilder::getPreparedQuery(Expense::class);
            $expenses = $query->ofUserAndRoom($phone, $roomId)->get();
        }
        else {
            $query = QueryBuilder::prepareQueryOnlyRelationAndFieldsSelection(Expense::class);
            $expenses = $query->ofUserAndRoom($phone, $roomId)->find($id);
        }

        return RestResponse::make($expenses, 200)->toJsonResponse();
    }


    public function getConcerning($phone, $roomId, $id = null)
    {
        $data = User::with(['concerningExpenses' => function($query) use ($id, $roomId){
            $qeury = QueryBuilder::buildQuery($query, Expense::class);
            $query = $query->where('room_id', $roomId);
            if(!is_null($id)){
                $query->where('id', $id);
            }
        }])->find($phone);

        if(!is_null($data)){
            $data = $data->concerningExpenses;
        }

        return RestResponse::make($data, 200)->toJsonResponse();
    }
}