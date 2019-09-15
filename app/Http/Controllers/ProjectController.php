<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class ProjectController
 *
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * Authorization check
     *
     * @return redirect to /login
     */
    public function auth()
    {
        $is_auth = session() -> get('is_auth');

        if (!$is_auth) {
            return redirect('/login');
        }
    }

    /**
     * Sorted column
     *
     * @param $col
     * @param $dir
     * @return view project.index
     */
    public function sort($col, $dir)
    {
        echo self::auth();

        $query = Project::query();

        $query->orderBy($col, $dir);

        $projects = $query->get();

        return view('projects.index',[
            'projects' => $projects,
        ]);
    }

    /**
     * Show projects list
     *
     * @return view projects.index
    */
    public function index()
    {
        echo self::auth();

    	$projects = Project::all();

    	return view('projects.index',[
    		'projects' => $projects,
    	]);
    }

    /**
     * Add a new project
     *
     * @return view projects.add
    */
    public function add()
    {
        echo self::auth();

    	return view('projects.add');
    }

    /**
     * Store a new project
     *
     * @param Request $request
     * @return redirect to /project/list
     */
    public function store(Request $request)
    {

    	$project = new Project();
    	$project->name = $request->name;
    	$project->url = $request->url;
    	$project->project_key = Hash::make(microtime());
    	$project->save();

    	return redirect('/project/list');
    }

    /**
     * Update a project
     *
     * @return projects.update
     */
    public function update()
    {
        echo self::auth();

        $projects = Project::all();

        return view('projects.update',[
            'projects' => $projects,
        ]);
    }


    /**
     * Send new data
     *
     * @param Request $request
     * @return redirect to /project/list
     */
    public function send(Request $request)
    {

        $data = $request->only(['name', 'url']);

        $project = Project::findOrFail($request->id);
        $project->update($data);

        return redirect('/project/list');
    }

    public function delete($id)
    {
        $product = Project::find($id);
        $product->delete();

        return redirect('/project/list');
    }

    /**
     * Show all pages
     *
     * @return view project.main
     */
    public function main()
    {
        echo ProjectController::auth();

        return view('projects.main');

    }

}
