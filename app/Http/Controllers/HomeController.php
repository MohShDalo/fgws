<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Job;
use App\Models\Freelancer;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth')->only('cms');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
        $posts = Post::all();
        $jobs = Job::all();

		return view('home',['posts'=>$posts,'jobs'=>$jobs]);
	}

    public function showPost(Post $post)
	{
		return view('home.show-post',array('post'=>$post));
	}
    public function showJob(Job $job)
	{
		return view('home.show-job',array('job'=>$job));
	}
    public function showFreelancer(Freelancer $freelancer)
	{
		return view('home.show-freelancer',array('freelancer'=>$freelancer));
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function cms()
	{
		return view('cms.home');
	}


	public function test()
	{
		dd("Test function");
	}

}
