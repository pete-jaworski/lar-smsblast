<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware(array('auth','isAdmin'));        
    }
    
    
    /**
     * Displays Listing of Tasks
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index')->with('tasks', \App\Task::all());
    }
    


    /**
     * Displays Edit Form
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $task = new \App\Task();
      $datasources = \App\Datasource::all();
      $task->schedule = 'd-m';
      $task->date = '01-01';
      $task->datasource_id = 1;      
      return view('tasks.create', compact('task','datasources'));
    }
    
    

    /**
     * Displays Edit Form
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, \App\Helpers\RecipientCollector $recipientsCollector)
    {
      $task         = \App\Task::find($id);
      $datasources  = \App\Datasource::all();
      $recipients   = $recipientsCollector->getRecipients(array($task), 10);
      
      return view('tasks.edit', compact('task','datasources','recipients'));
    }    
    
    
    

    /**
     * Saves new Task
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [
                'name'          => 'required',
                'status'        => 'required',
                'datasource_id' => 'required',
                'schedule'      => 'required',
                'date'          => 'required',
                'message'       => 'required',
            ]);

            $task = new \App\Task([
                'name'          => $request->input('name'),
                'type'          => 'sms',
                'user_id'       => \Auth::user()->id,      
                'params'        => json_encode(array()),                   
                'status'        => $request->input('status'),
                'datasource_id' => $request->input('datasource_id'),
                'schedule'      => $request->input('schedule'),
                'sql'           => $request->input('sql') ? $request->input('sql') : '',
                'date'          => $request->input('date'),
                'message'       => $request->input('message'),
            ]);

            $task->save();
            return redirect()->route('tasks.index')->with("status", "Zadanie zostało zapisane");
    }
    

    
    
    
    /**
     * Updates Task
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
                'name'          => 'required',
                'status'        => 'required',
                'datasource_id' => 'required',
                'schedule'      => 'required',
                'date'          => 'required',
                'message'       => 'required',
            ]);
            
            if($request->input('params')){
                $request->merge(array('params' => json_encode($request->input('params'))));
            } else {
                $request->merge(array('params' => json_encode(array())));
            }
            
            $task = \App\Task::find($id);
            $task->update($request->all());
             
            return redirect()->route('tasks.index')->with("status", "Zadanie zostało zaktualizowane");
    }    
    
    
    
    
    
    /**
     * Displays current Tasks
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function current(
            \App\Helpers\TaskCollector $taskCollector,
            \App\Helpers\RecipientCollector $recipientsCollector
    )
    {
        $tasks =  $recipientsCollector->getRecipients($taskCollector->getTasks(array()));
        return view('tasks.current')->with('tasks', $tasks);
    }       
     
    
    
    
    
    
    
    
    
    
    

    /**
     * Removes Task by id
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Task::find($id)->delete();
        return redirect()->route('tasks.index')->with('status','Zadanie zostało usunięte');        
    }      
    
}
