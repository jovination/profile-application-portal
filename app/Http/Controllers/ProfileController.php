<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showForm()
    {
        return view('apply');
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email',
            'education' => 'array',
            'education.*.institution' => 'required|string|max:255',
            'education.*.degree' => 'required|string|max:255',
            'education.*.year' => 'required|string|max:4',
            'work' => 'array',
            'work.*.company' => 'required|string|max:255',
            'work.*.role' => 'required|string|max:255',
            'work.*.duration' => 'required|string|max:255',
            'skills' => 'array',
            'skills.*' => 'required|string|max:255',
        ]);
    
        $profile = Profile::create([
            'full_name' => $validatedData['full_name'],
            'phone_number' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
            'education' => json_encode($validatedData['education']), // Encode as JSON
            'work' => json_encode($validatedData['work']), // Encode as JSON
            'skills' => json_encode($validatedData['skills']) // Encode as JSON
        ]);
        
    
        session(['profile_id' => $profile->id]);
    
        return response()->json([
            'success' => true,
            'redirect' => route('success')
        ]);
    }
    public function viewProfile()
    {
        $profileId = session('profile_id');
    
        if (!$profileId) {
            abort(404, 'Profile not found');
        }
    
        $profile = Profile::findOrFail($profileId);
    
        $profile->educations = is_string($profile->education) ? json_decode($profile->education) : $profile->education;
        $profile->workExperiences = is_string($profile->work) ? json_decode($profile->work) : $profile->work;
        $profile->skills = is_string($profile->skills) ? json_decode($profile->skills) : $profile->skills;
    
        return view('profile', compact('profile'));
    }
    
    
    
    }