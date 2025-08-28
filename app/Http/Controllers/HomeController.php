<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Academic;
use App\Models\Activity;
use App\Models\Research;
use App\Models\SkillType;
use App\Models\TestScore;
use App\Models\Experience;
use App\Models\Achievement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $experiences = Experience::query()
            ->orderBy('created_at', 'desc')
            ->get();

        $academics = Academic::query()
            ->orderBy('created_at', 'desc')
            ->get();

        $skillTypes = SkillType::all();

        $skills = Skill::query()
            ->orderBy('created_at', 'desc')
            ->get();

        $researchWorks = Research::query()
            ->orderBy('created_at', 'desc')
            ->get();

        $projects = Project::query()
            ->with('experience')
            ->orderBy('created_at', 'desc')
            ->get();

        $activities = Activity::query()
            ->orderBy('solve_count', 'desc')
            ->get();

        $achievements = Achievement::query()
            ->orderBy('created_at', 'desc')
            ->get();

        $testScores = TestScore::query()
            ->orderBy('test_taken', 'desc')
            ->get();

        $abouts = About::query()
            ->orderBy('created_at', 'desc')
            ->get();

        $researchInterests = [
            'Network Security',
            'Cybersecurity',
            'Distributed Systems',
            'Blockchain Technology',
            'Data Science',
        ];

        return view('frontend.home', compact('experiences', 'academics', 'skillTypes', 'skills', 'researchWorks', 'projects', 'activities', 'achievements', 'testScores', 'abouts', 'researchInterests'));
    }
}
