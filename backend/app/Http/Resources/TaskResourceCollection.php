<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskResourceCollection extends ResourceCollection
{
/**
     * @var
     */
    private $completedTasksCount;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource,$completedTasksCount)
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        $this->completedTasksCount = $completedTasksCount;
    }


    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $dd = parent::toArray($request);
        return [
            'data' => $this->collection,
            'completedTasksCount'=>$this->completedTasksCount,
            // 'pagination' => [
            //     'total' => $this->total(),
            //     'count' => $this->count(),
            //     'per_page' => $this->perPage(),
            //     'current_page' => $this->currentPage(),
            //     'total_pages' => $this->lastPage()
            // ],
        ];
        // return [
        //     'request'=>$request,
        //     'completedTasksCount'=>$this->completedTasksCount
        // ];
    }
}
