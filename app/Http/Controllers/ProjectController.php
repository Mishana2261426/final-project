<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

    /**
     * ProjectController
     *
     * @package App\Http\Controllers\ProjectController
    */
class ProjectController extends Controller
{
    /**
     * Show projects list
     *
     * @return view projects.index
    */
    public function index()
    {
        $is_auth = session() -> get('is_auth');

        if (!$is_auth) {
            return redirect('/login');
        }

    	$projects = Project::all();

    	return view('projects.index',[
    		'projects' => $projects
    	]);
    }

    /**
     * Add a new project
     *
     * @return view projects.add
    */
    public function add()
    {
        $is_auth = session() -> get('is_auth');

        if (!$is_auth) {
            return redirect('/login');
        }

    	return view('projects.add');
    }

    /**
     * Store a new project
     *
     * @param Request $request
     * @return redirect to projects.index
     */
    public function store(Request $request)
    {

    	$project = new Project();
    	$project->name = $request->name;
    	$project->url = $request->url;
    	$project->project_key = Hash::make(microtime());
    	$project->save();

    	return redirect('/listProjects');
    }

    /**
     * Show all pages
     *
     * @return view project.main
     */
    public function main()
    {
        $is_auth = session() -> get('is_auth');

        if (!$is_auth) {
            return redirect('/login');
        }

        return view('projects.main');

    }
}
