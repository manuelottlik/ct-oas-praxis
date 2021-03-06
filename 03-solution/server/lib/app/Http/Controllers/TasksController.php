<?php

/**
 * c't Task API
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0.0
 *
 *
 * NOTE: This class is auto generated by OpenAPI-Generator
 * https://openapi-generator.tech
 * Do not edit the class manually.
 *
 * Source files are located at:
 *
 * > https://github.com/OpenAPITools/openapi-generator/blob/master/modules/openapi-generator/src/main/resources/php-laravel/
 */

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Request;

class TasksController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Operation createTask
     *
     * Create a task.
     *
     *
     * @return Http response
     */
    public function createTask()
    {
        $input = Request::all();

        return Task::create($input);
    }
    /**
     * Operation getTasks
     *
     * Get all tasks.
     *
     *
     * @return Http response
     */
    public function getTasks()
    {
        return Task::all();
    }
    /**
     * Operation deleteTask
     *
     * delete a task.
     *
     * @param string $taskId id of the task to delete (required)
     *
     * @return Http response
     */
    public function deleteTask($taskId)
    {
        $input = Request::all();

        Task::find($taskId)->delete();

        return null;

        return response('How about implementing deleteTask as a delete method ?');
    }
    /**
     * Operation getTaskById
     *
     * Info for a specific Task.
     *
     * @param string $taskId The id of the Task to retrieve (required)
     *
     * @return Http response
     */
    public function getTaskById($taskId)
    {
        return Task::find($taskId);
    }
    /**
     * Operation updateTask
     *
     * update a specific task.
     *
     * @param string $taskId id of the task to update (required)
     *
     * @return Http response
     */
    public function updateTask($taskId)
    {
        $input = Request::all();

        $task = Task::find($taskId);

        $task->update($input);
        return $task;
    }
}
