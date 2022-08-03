<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Components\API\BaseApiTrait;
use App\Http\Resources\TaskResource;

class TaskApiController extends Controller
{

    use BaseApiTrait;

    private $item_name  = 'Task';

    // public function index()
    // {
    //     $tasks = Task::all();
    //     return $this->handleResponse(TaskResource::collection($tasks), 'Tasks have been retrieved!');
    // }

    public function index(){
        $tasks = Task::all();

        return $this->handleResponse(TaskResource::collection($tasks), $this->apiDataListed($this->item_name));
    }
    
    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     $validator = Validator::make($input, [
    //         'name' => 'required',
    //         'details' => 'required'
    //     ]);
    //     if($validator->fails()){
    //         return $this->handleError($validator->errors());       
    //     }
    //     $task = Task::create($input);
    //     return $this->handleResponse(new TaskResource($task), 'Task created!');
    // }

   
    // public function show($id)
    // {
    //     $task = Task::find($id);
    //     if (is_null($task)) {
    //         return $this->handleError('Task not found!');
    //     }
    //     return $this->handleResponse(new TaskResource($task), 'Task retrieved.');
    // }
    

    // public function update(Request $request, Task $task)
    // {
    //     $input = $request->all();

    //     $validator = Validator::make($input, [
    //         'name' => 'required',
    //         'details' => 'required'
    //     ]);

    //     if($validator->fails()){
    //         return $this->handleError($validator->errors());       
    //     }

    //     $task->name = $input['name'];
    //     $task->details = $input['details'];
    //     $task->save();
        
    //     return $this->handleResponse(new TaskResource($task), 'Task successfully updated!');
    // }
   
    // public function destroy(Task $task)
    // {
    //     $task->delete();
    //     return $this->handleResponse([], 'Task deleted!');
    // }
}
