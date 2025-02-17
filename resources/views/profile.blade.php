<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>{{ $profile->full_name ?? 'Dashboard' }}</title>
    <style>
        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
        }
        .nav-item.active {
            background-color: rgb(243 244 246);
            color: rgb(55 65 81);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-white border-r border-gray-200 h-screen">
            <div class="p-6">
                <h2 class="text-xl font-bold text-[#015eff]">Application Portal</h2>
            </div>
            <nav class="mt-6">
                <a href="#" data-section="profile-section" class="nav-item flex items-center px-6 py-3 text-gray-700 bg-gray-100">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Profile
                </a>
                <a href="#" data-section="education-section" class="nav-item flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    </svg>
                    Education
                </a>
                <a href="#" data-section="experience-section" class="nav-item flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Experience
                </a>
                <a href="#" data-section="skills-section" class="nav-item flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Skills
                </a>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="bg-white border-b border-gray-200">
                <div class="flex justify-between items-center px-8 py-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-semibold text-gray-900">Welcome, {{ $profile->full_name }}</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">{{ $profile->email }}</span>
                        <div class="w-10 h-10 bg-[#015eff] rounded-full flex items-center justify-center text-white">
                            {{ substr($profile->full_name, 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-8">
                <section id="profile-section" class="content-section active">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex items-center">
                                <div class="p-3 bg-[#015eff] bg-opacity-10 rounded-lg">
                                    <svg class="w-6 h-6 text-[#015eff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-gray-500 text-sm">Work Experience</h3>
                                    <p class="text-2xl font-semibold text-gray-900">{{ count($profile->workExperiences) }} Years</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex items-center">
                                <div class="p-3 bg-[#015eff] bg-opacity-10 rounded-lg">
                                    <svg class="w-6 h-6 text-[#015eff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-gray-500 text-sm">Education</h3>
                                    <p class="text-2xl font-semibold text-gray-900">{{ count($profile->educations) }} Degrees</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="flex items-center">
                                <div class="p-3 bg-[#015eff] bg-opacity-10 rounded-lg">
                                    <svg class="w-6 h-6 text-[#015eff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-gray-500 text-sm">Skills</h3>
                                    <p class="text-2xl font-semibold text-gray-900">{{ count($profile->skills) }} Skills</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="education-section" class="content-section">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Education History</h3>
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <div class="space-y-6">
                            @if(isset($profile->educations) && count($profile->educations) > 0)
                                @foreach($profile->educations as $education)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-12 h-12 bg-[#015eff] bg-opacity-10 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-[#015eff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">{{ $education->institution }}</h4>
                                        <p class="text-gray-500">{{ $education->degree }}</p>
                                        <span class="text-sm text-gray-400">{{ $education->year }}</span>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p class="text-gray-500">No education history available.</p>
                            @endif
                        </div>
                    </div>
                </section>

                <section id="experience-section" class="content-section">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Work Experience</h3>
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <div class="space-y-6">
                            @if(isset($profile->workExperiences) && count($profile->workExperiences) > 0)
                                @foreach($profile->workExperiences as $work)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-12 h-12 bg-[#015eff] bg-opacity-10 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-[#015eff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-semibold text-gray-900">{{ $work->role }}</h4>
                                        <p class="text-gray-500">{{ $work->company }}</p>
                                        <span class="text-sm text-gray-400">{{ $work->duration }} year(s)</span>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p class="text-gray-500">No work experience available.</p>
                            @endif
                        </div>
                    </div>
                </section>

                <section id="skills-section" class="content-section">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Skills Overview</h3>
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <div class="flex flex-wrap gap-3">
                            @if(isset($profile->skills) && count($profile->skills) > 0)
                                @foreach($profile->skills as $skill)
                                <span class="px-4 py-2 bg-[#015eff] bg-opacity-10 text-[#015eff] rounded-lg text-sm font-medium">
                                    {{ $skill }}
                                </span>
                                @endforeach
                            @else
                                <p class="text-gray-500">No skills available.</p>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script>
        const navItems = document.querySelectorAll('.nav-item');
        const contentSections = document.querySelectorAll('.content-section');

        navItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                
                navItems.forEach(nav => nav.classList.remove('active', 'bg-gray-100', 'text-gray-700'));
                contentSections.forEach(section => section.classList.remove('active'));
                
                item.classList.add('active', 'bg-gray-100', 'text-gray-700');
                
                const sectionId = item.getAttribute('data-section');
                document.getElementById(sectionId).classList.add('active');
            });
        });
    </script>
</body>
</html>
