<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Abir Zaman Portfolio</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=cancel,crown,enterprise,experiment,keyboard_double_arrow_left,keyboard_double_arrow_right,menu,school,trophy,work" />
    @vite(['resources/css/main.css', 'resources/css/main.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Top Navigation Bar -->
    <nav class="w-full bg-black text-white shadow-lg z-50 fixed top-0 left-0">
        <div class="flex items-center px-4 sm:px-6 py-4 border-b border-white">
            <span class="home-logo text-4xl font-mono tracking-widest">AZ</span>
            <!-- Desktop Menu (visible on md and up) -->
            <div class="flex flex-1 justify-center">
                <ul class="hidden md:flex flex-row gap-6 text-lg font-semibold">
                    <li><a href="#home" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Home</a></li>
                    <li><a href="#about" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Gallery</a></li>
                    <li><a href="#experience" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Experience</a></li>
                    <li><a href="#academics" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Academics</a></li>
                    <li><a href="#achievements" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Achievements</a></li>
                    <li><a href="#research" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Research</a></li>
                    <li><a href="#test-scores" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Test Scores</a></li>
                    <li><a href="#skills" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Skills</a></li>
                    <li><a href="#projects" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Projects</a></li>
                    <li><a href="#contact" class="px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Contact</a></li>
                </ul>
            </div>
            <!-- Mobile Menu Button (visible on md and below) -->
            <button id="mobile-menu-toggle" class="block md:hidden text-white focus:outline-none ml-2">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>
        <!-- Mobile Menu (hidden by default, toggled by button, only on md and below) -->
        <div id="mobile-menu" class="md:hidden hidden w-full bg-black text-white border-t border-white">
            <ul class="flex flex-col gap-2 py-2 px-4 text-lg font-semibold">
                <li><a href="#home" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Home</a></li>
                <li><a href="#about" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Gallery</a></li>
                <li><a href="#experience" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Experience</a></li>
                <li><a href="#academics" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Academics</a></li>
                <li><a href="#achievements" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Achievements</a></li>
                <li><a href="#research" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Research</a></li>
                <li><a href="#test-scores" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Test Scores</a></li>
                <li><a href="#skills" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Skills</a></li>
                <li><a href="#projects" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Projects</a></li>
                <li><a href="#contact" class="block px-4 py-2 rounded hover:bg-white hover:text-black transition-colors duration-200">Contact</a></li>
            </ul>
        </div>
        
    </nav>
    <div id="main-content" class="transition-all duration-300 border-white border-solid border-0 mt-0" style="padding-top:80px;">
        <div id="home"
            class="min-h-screen bg-gray-50 px-4 sm:px-8 py-12 sm:py-16 border-b border-white flex items-center justify-center">
            <div
                class="w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-0 items-stretch h-full min-h-[400px]">
                <!-- Left column: image -->
                <div class="flex items-center justify-center bg-transparent h-full md:col-span-1"
                    style="min-height:400px;">
                    <img src="{{ asset('Abir-Zaman.jpg') }}" alt="Profile Image"
                        class="object-cover rounded-lg w-full h-full max-h-[500px] max-w-[350px]"
                        style="background: #fff;" />
                </div>
                <!-- Right column: text -->
                <div class="flex flex-col items-center justify-center text-center px-8 py-4 md:col-span-2 h-full"
                    style="min-height:400px;">
                    <div class="flex flex-col justify-center items-center w-full h-full">
                        <h1 class="text-4xl sm:text-5xl font-bold mb-6 w-full">Abir Zaman</h1>
                        <h2 class="text-3xl sm:text-4xl font-semibold mb-6 w-full text-gray-600">আবির জামান</h2>
                        @php
                            $latestAcademic = $academics->first();
                            $latestExperience = $experiences->first();
                        @endphp
                        @if ($latestAcademic)
                            <div class="mb-4 w-full">
                                <h2 class="text-2xl font-semibold text-gray-700">{{ $latestAcademic->degree }} in
                                    {{ $latestAcademic->subject }}</h2>
                                <p class="text-lg text-gray-500 mt-1 italic">{{ $latestAcademic->institution }}</p>
                            </div>
                        @endif
                        @if ($latestExperience)
                            <div class="mb-4 w-full">
                                <h2 class="text-2xl font-semibold text-gray-700">{{ $latestExperience->designation }}
                                </h2>
                                <p class="text-lg text-gray-500 mt-1 italic">{{ $latestExperience->company }}</p>
                            </div>
                        @endif
                        @if (!empty($researchInterests))
                            <div class="mb-4 w-full">
                                <h2 class="text-xl font-semibold text-gray-700">Research Interests</h2>
                                <p class="text-lg text-gray-500 mt-1 italic">
                                    {{ implode(', ', $researchInterests) }}
                                </p>
                            </div>
                        @endif
                        {{-- <h3 id="home-blink" class="text-lg sm:text-xl font-semibold mt-2 text-red-700 blink">Click on
                            Menu to Get Started!</h3> --}}
                    </div>
                </div>
            </div>
        </div>
        <div id="about"
            class="min-h-screen flex flex-col items-center bg-gray-100 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Photo Gallery</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <div class="w-full max-w-5xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <!-- Left: Image carousel -->
                        <div class="w-full flex flex-col items-center">
                            @if ($abouts->count())
                                <div id="about-carousel" class="w-full relative flex items-center justify-center"
                                    style="min-height: 400px; padding: 2rem 0;">
                                    @foreach ($abouts as $i => $about)
                                        <div class="about-slide transition-opacity duration-700 ease-in-out flex items-center justify-center"
                                            style="opacity: {{ $i === 0 ? '1' : '0' }}; position: absolute; top:0; left:0; width:100%; height:100%; padding: 1rem; box-sizing: border-box;">
                                            <img src="{{ asset($about->image) }}" alt="About Image" class="rounded-lg"
                                                style="display: block; margin: 0 auto; height: auto; max-height: 100%; width: auto; max-width: 100%; background: #fff;" />
                                            <button type="button" id="about-prev"
                                                class="absolute left-2 top-1/2 -translate-y-1/2 text-black rounded-full p-2 flex items-center justify-center bg-black bg-opacity-30"
                                                style="z-index:2;">
                                                <span
                                                    class="material-symbols-outlined text-6xl">keyboard_double_arrow_left</span>
                                            </button>
                                            <button type="button" id="about-next"
                                                class="absolute right-2 top-1/2 -translate-y-1/2 text-black rounded-full p-2 flex items-center justify-center bg-black bg-opacity-30"
                                                style="z-index:2;">
                                                <span
                                                    class="material-symbols-outlined text-6xl">keyboard_double_arrow_right</span>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-gray-400 italic">No about images found.</div>
                            @endif
                        </div>
                        <!-- Right: Title and Description -->
                        <div class="w-full flex flex-col justify-center">
                            @if ($abouts->count())
                                @foreach ($abouts as $i => $about)
                                    <div class="about-info" style="display: {{ $i === 0 ? 'block' : 'none' }};">
                                        @if ($about->title)
                                            <h2 class="text-3xl font-bold mb-4">{{ $about->title }}</h2>
                                        @endif
                                        @if ($about->description)
                                            <p class="text-2xl text-gray-700 text-justify">{{ $about->description }}
                                            </p>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="text-gray-400 italic">No about info found.</div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="experience"
            class="min-h-screen flex flex-col items-center bg-gray-50 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Experience</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <div class="w-full max-w-4xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                        @foreach ($experiences as $experience)
                            <div class="relative flex items-center mb-8 cursor-pointer group h-full"
                                onclick="showExperienceModal({{ $experience->id }})">
                                <div
                                    class="w-12 h-12 flex items-center justify-center bg-black text-white rounded-full z-10">
                                    <span class="material-symbols-outlined">
                                        work
                                    </span>
                                </div>
                                <div
                                    class="ml-8 bg-white rounded-lg shadow p-4 flex-1 group-hover:ring-2 group-hover:ring-black h-full flex flex-col justify-between">
                                    <h3 class="text-lg font-semibold mb-1">{{ $experience->company }}</h3>
                                    <p class="text-gray-600 mb-1">{{ $experience->designation }}</p>
                                    <p class="text-gray-500 text-sm">
                                        {{ date('F j, Y', strtotime($experience->start_date)) }} -
                                        @if ($experience->current)
                                            {{ 'Present' }}
                                        @else
                                            {{ date('F j, Y', strtotime($experience->end_date)) }}
                                        @endif
                                    </p>
                                    <p class="text-gray-600 text-sm text-right font-thin italic mt-auto">Click to
                                        expand
                                    </p>
                                </div>
                            </div>
                            <!-- Modal starts -->
                            <div id="experience-modal-{{ $experience->id }}"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300 opacity-0 pointer-events-none">
                                <div
                                    class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative transform transition-transform duration-300 scale-95">
                                    <button onclick="closeExperienceModal({{ $experience->id }})"
                                        class="absolute top-2 right-2 text-red-600 hover:text-red-700 text-3xl">
                                        <span class="material-symbols-outlined text-3xl">cancel</span>
                                    </button>
                                    <h2 class="text-2xl font-bold mb-2">{{ $experience->company }}</h2>
                                    <p class="text-gray-600 mb-2">{{ $experience->designation }}</p>
                                    <p class="text-gray-500 mb-2">
                                        {{ date('F j, Y', strtotime($experience->start_date)) }} -
                                        @if ($experience->current)
                                            Present
                                        @else
                                            {{ date('F j, Y', strtotime($experience->end_date)) }}
                                        @endif
                                    </p>
                                    <p class="mb-2"><span class="font-semibold">Description:</span>
                                        {{ $experience->description }}</p>
                                    <p class="mb-2"><span class="font-semibold">Link:</span> <a
                                            href="{{ $experience->link }}" target="_blank"
                                            class="text-blue-500 underline">{{ $experience->link }}</a></p>
                                    <p class="mb-2"><span class="font-semibold">Responsibilities:</span>
                                        {{ $experience->responsibilities }}</p>
                                    @if ($experience->achievements)
                                        <p class="mb-2"><span class="font-semibold">Achievements:</span>
                                            {{ $experience->achievements }}</p>
                                    @endif

                                </div>
                            </div>
                            <!-- Modal ends -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="academics"
            class="min-h-screen flex flex-col items-center bg-gray-100 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Academics</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <div class="w-full max-w-4xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                        @foreach ($academics as $academic)
                            <div class="relative flex items-center mb-8 cursor-pointer group h-full"
                                onclick="showAcademicModal({{ $academic->id }})">
                                <div
                                    class="w-12 h-12 flex items-center justify-center bg-black text-white rounded-full z-10">
                                    <span class="material-symbols-outlined">
                                        school
                                    </span>
                                </div>
                                <div
                                    class="ml-8 bg-white rounded-lg shadow p-4 flex-1 group-hover:ring-2 group-hover:ring-black h-full flex flex-col justify-between">
                                    <h3 class="text-lg font-semibold mb-1">{{ $academic->institution }}</h3>
                                    <p class="text-gray-600 mb-1">{{ $academic->degree }} in {{ $academic->subject }}
                                    </p>
                                    <p class="text-gray-500 text-sm">
                                        @if ($academic->graduation_date)
                                            {{ is_object($academic->graduation_date) ? $academic->graduation_date->format('F Y') : date('F Y', strtotime($academic->graduation_date)) }}
                                        @else
                                            {{ $academic->current ? 'Ongoing' : 'N/A' }}
                                        @endif
                                    </p>
                                    <p class="text-gray-600 text-sm text-right font-thin italic mt-auto">Click to
                                        expand
                                    </p>
                                </div>
                            </div>
                            <!-- Modal for academic details -->
                            <div id="academic-modal-{{ $academic->id }}"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300 opacity-0 pointer-events-none">
                                <div
                                    class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative transform transition-transform duration-300 scale-95">
                                    <button onclick="closeAcademicModal({{ $academic->id }})"
                                        class="absolute top-2 right-2 text-red-600 hover:text-red-700 text-3xl">
                                        <span class="material-symbols-outlined">cancel</span>
                                    </button>
                                    <h2 class="text-2xl font-bold mb-2">{{ $academic->institution }}</h2>
                                    <p class="text-gray-600 mb-2">{{ $academic->degree }}</p>
                                    <p class="text-gray-800 italic mb-2">in {{ $academic->subject }}</p>
                                    <p class="text-gray-500 mb-2">
                                        @if ($academic->major)
                                            <span class="font-semibold">Major:</span> {{ $academic->major }}<br>
                                        @endif
                                        @if ($academic->syllabus)
                                            <span class="font-semibold">Syllabus:</span> <a
                                                href="{{ $academic->syllabus }}" target="_blank"
                                                class="text-blue-500 underline">{{ $academic->syllabus }}</a><br>
                                        @endif
                                        @if ($academic->gpa)
                                            <span class="font-semibold">GPA:</span> {{ $academic->gpa }} /
                                            {{ $academic->scale }}<br>
                                        @endif

                                        <span class="font-semibold">Session:</span> {{ $academic->session }}<br>
                                        <span class="font-semibold">Graduation Date:</span>
                                        @if ($academic->graduation_date)
                                            {{ is_object($academic->graduation_date) ? $academic->graduation_date->format('F j, Y') : date('F j, Y', strtotime($academic->graduation_date)) }}
                                        @else
                                            {{ $academic->current ? 'Ongoing' : 'N/A' }}
                                        @endif
                                        <br>
                                        <span class="font-semibold">City:</span> {{ $academic->city }}<br>
                                        <span class="font-semibold">Country:</span> {{ $academic->country }}<br>
                                    </p>
                                    <p class="mb-2"><span class="font-semibold">Institution Link:</span> <a
                                            href="{{ $academic->link }}" target="_blank"
                                            class="text-blue-500 underline">{{ $academic->link }}</a></p>
                                    @if ($academic->accolades)
                                        <p class="mb-2"><span class="font-semibold">Accolades:</span>
                                            {{ $academic->accolades }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- <div id="activities"
            class="min-h-screen flex flex-col items-center bg-gray-50 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Competitive Programming</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <div class="max-w-3xl w-full mx-auto">
                    <table class="w-full text-left border-t border-b border-black">
                        <thead>
                            <tr class="bg-gray-100 border-b border-black">
                                <th class="py-3 px-4 font-semibold">Online Judge</th>
                                <th class="py-3 px-4 font-semibold">Profile Link</th>
                                <th class="py-3 px-4 font-semibold">Solve Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalSolved = 0; @endphp
                            @foreach ($activities as $activity)
                                @php $totalSolved += $activity->solve_count; @endphp
                                <tr class="bg-white">
                                    <td class="py-3 px-4">{{ $activity->online_judge }}</td>
                                    <td class="py-3 px-4">
                                        @if ($activity->profile_link)
                                            <a href="{{ $activity->profile_link }}" target="_blank"
                                                class="text-blue-500 underline break-all">{{ $activity->online_judge }}
                                            </a>
                                        @else
                                            <span class="text-gray-400 italic">N/A</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">{{ $activity->solve_count }}</td>
                                </tr>
                            @endforeach
                            <tr class="bg-gray-100 font-bold border-t border-black">
                                <td class="py-3 px-4 text-right font-bold" colspan="2">Total Solved</td>
                                <td class="py-3 px-4 text-lg font-bold">{{ $totalSolved }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
        <div id="achievements"
            class="min-h-screen flex flex-col items-center bg-gray-100 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Achievements</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <div class="max-w-7xl w-full mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                        @foreach ($achievements as $achievement)
                            <div
                                class="bg-white rounded-lg shadow p-6 transition-transform duration-300 hover:scale-105 hover:rotate-1 hover:shadow-2xl flex flex-col justify-between relative">
                                <span
                                    class="material-symbols-outlined text-yellow-500 text-2xl absolute top-4 right-4">crown</span>
                                <h3 class="text-xl font-semibold mb-2 text-black">{{ $achievement->name }}</h3>
                                <p class="text-gray-600 mb-2">{{ $achievement->description }}</p>
                                <span class="text-md text-gray-400">{{ $achievement->year }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="research"
            class="min-h-screen flex flex-col items-center bg-gray-50 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Research</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <div class="w-full max-w-4xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                        @foreach ($researchWorks as $research)
                            <div class="relative flex items-center mb-8 cursor-pointer group h-full"
                                onclick="showResearchModal({{ $research->id }})">
                                <div
                                    class="w-12 h-12 flex items-center justify-center bg-black text-white rounded-full z-10">
                                    <span class="material-symbols-outlined">experiment</span>
                                </div>
                                <div
                                    class="ml-8 bg-white rounded-lg shadow p-4 flex-1 group-hover:ring-2 group-hover:ring-black h-full flex flex-col justify-between">
                                    <h3 class="text-lg font-semibold mb-1">{{ $research->title }}</h3>
                                    @if ($research->keywords)
                                        <p class="text-gray-500 text-sm mb-1">{{ $research->keywords }}</p>
                                    @endif
                                    <p class="text-gray-600 text-sm text-right font-thin italic mt-auto">Click to
                                        expand
                                    </p>
                                </div>
                            </div>
                            <!-- Modal for research details -->
                            <div id="research-modal-{{ $research->id }}"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300 opacity-0 pointer-events-none">
                                <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative transform transition-transform duration-300 scale-95"
                                    style="height: 500px; overflow-y: auto;">
                                    <button onclick="closeResearchModal({{ $research->id }})"
                                        class="absolute top-2 right-2 text-red-600 hover:text-red-700 text-3xl">
                                        <span class="material-symbols-outlined">cancel</span>
                                    </button>
                                    <h2 class="text-2xl font-bold mb-2">{{ $research->title }}</h2>
                                    <br>
                                    @if ($research->abstract)
                                        <p class="mb-2 text-justify"><span class="font-semibold">Abstract:</span><br>
                                            {{ $research->abstract }}</p>
                                    @endif
                                    @if ($research->keywords)
                                        <p class="mb-2 italic"><span class="font-semibold">Keywords:</span>
                                            {{ $research->keywords }}</p>
                                    @endif
                                    @if ($research->role)
                                        <p class="mb-2"><span class="font-semibold">Role:</span>
                                            {{ $research->role }}
                                        </p>
                                    @endif
                                    <p class="mb-2"><span class="font-semibold">Status:</span>
                                        {{ $research->status }}
                                    </p>
                                    @if ($research->start_date)
                                        <p class="mb-2"><span class="font-semibold">Start Date:</span>
                                            {{ date('F j, Y', strtotime($research->start_date)) }}</p>
                                    @endif
                                    @if ($research->end_date)
                                        <p class="mb-2"><span class="font-semibold">End Date:</span>
                                            {{ date('F j, Y', strtotime($research->end_date)) }}</p>
                                    @endif
                                    @if ($research->link)
                                        <p class="mb-2"><span class="font-semibold">Link:</span> <a
                                                href="{{ $research->link }}" target="_blank"
                                                class="text-blue-500 underline">{{ $research->link }}</a></p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="test-scores"
            class="min-h-screen flex flex-col items-center bg-gray-100 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Test Scores</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <div class="max-w-4xl w-full mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach ($testScores as $testScore)
                            <div
                                class="bg-white rounded-lg shadow p-6 transition-transform duration-300 hover:scale-105 hover:rotate-1 hover:shadow-2xl flex flex-col justify-between">
                                <h3 class="text-xl font-semibold mb-2 text-black">{{ $testScore->name }}</h3>
                                <span class="text-md text-gray-400 mb-2">
                                    @if ($testScore->test_taken)
                                        {{ date('F j, Y', strtotime($testScore->test_taken)) }}
                                    @else
                                        N/A
                                    @endif
                                </span>
                                @php $scores = array_filter(array_map('trim', explode(',', $testScore->score))); @endphp
                                @if (count($scores))
                                    <ul class="list-disc list-inside text-gray-700 mt-2">
                                        @foreach ($scores as $score)
                                            <li>{{ $score }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="skills"
            class="min-h-screen flex flex-col items-center bg-gray-50 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Skills</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <div class="max-w-7xl w-full mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                        @foreach ($skillTypes as $type)
                            @php $typeSkills = $skills->where('skill_type_id', $type->id); @endphp
                            @if ($typeSkills->count())
                                <div class="bg-white rounded-lg shadow p-6 flex flex-col">
                                    <h2 class="text-xl font-semibold mb-4 text-black text-center">{{ $type->name }}
                                    </h2>
                                    <div class="flex flex-col gap-4">
                                        @foreach ($typeSkills as $skill)
                                            <div
                                                class="bg-gray-200 rounded-lg px-4 py-3 shadow transition-transform duration-300 hover:scale-105 hover:rotate-1 hover:shadow-xl">
                                                <h3 class="text-lg font-semibold text-gray-800">{{ $skill->name }}
                                                </h3>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="projects"
            class="min-h-screen flex flex-col items-center bg-gray-100 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Projects</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <div class="max-w-7xl w-full mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                        @foreach ($projects as $project)
                            <div class="relative flex items-center cursor-pointer group bg-white rounded-lg shadow p-6 hover:ring-2 hover:ring-black transition-all duration-300"
                                onclick="showProjectModal({{ $project->id }})">
                                <div
                                    class="w-12 h-12 flex items-center justify-center bg-black text-white rounded-full z-10">
                                    <span class="material-symbols-outlined">enterprise</span>
                                </div>
                                <div class="ml-8 flex-1">
                                    <h3 class="text-lg font-semibold mb-1">{{ $project->title }}</h3>
                                    @if ($project->experience && $project->type === 'Professional')
                                        <p class="text-gray-500 text-sm mb-1">{{ $project->experience->company }}</p>
                                    @else
                                        <p class="text-gray-500 text-sm mb-1">{{ ucfirst($project->type) }}</p>
                                    @endif
                                    <p class="text-gray-600 text-sm text-right font-thin italic">Click to expand</p>
                                </div>
                            </div>
                            <!-- Modal for project details -->
                            <div id="project-modal-{{ $project->id }}"
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300 opacity-0 pointer-events-none">
                                <div
                                    class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative transform transition-transform duration-300 scale-95">
                                    <button onclick="closeProjectModal({{ $project->id }})"
                                        class="absolute top-2 right-2 text-red-600 hover:text-red-700 text-3xl">
                                        <span class="material-symbols-outlined">cancel</span>
                                    </button>
                                    <h2 class="text-2xl font-bold mb-2">{{ $project->title }}</h2>
                                    @if ($project->experience && $project->type === 'Professional')
                                        <p class="mb-2"><span class="font-semibold">For:</span>
                                            {{ $project->experience->company }}</p>
                                    @else
                                        <p class="mb-2"><span class="font-semibold">Type:</span>
                                            {{ ucfirst($project->type) }}</p>
                                    @endif
                                    @if ($project->description)
                                        <p class="mb-2 text-justify italic"><span class="font-semibold"></span>
                                            {{ $project->description }}</p>
                                    @endif
                                    @if ($project->role)
                                        <p class="mb-2"><span class="font-semibold">Role:</span>
                                            {{ $project->role }}
                                        </p>
                                    @endif
                                    @if ($project->technologies)
                                        <p class="mb-2"><span class="font-semibold">Technologies:</span>
                                            {{ $project->technologies }}</p>
                                    @endif
                                    @if ($project->link)
                                        <p class="mb-2 break-words"><span class="font-semibold">Link:</span> <a
                                                href="{{ $project->link }}" target="_blank"
                                                class="text-blue-500 underline break-all">{{ $project->link }}</a></p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="contact"
            class="min-h-screen flex flex-col items-center bg-gray-50 px-4 sm:px-8 pt-2 pb-8 border-b border-white">
            <h1 class="text-3xl sm:text-4xl font-bold mt-2 mb-2 text-center bg-slate-200 p-2 rounded-md">Contact</h1>
            <div class="flex-1 w-full flex flex-col items-center justify-center">
                <p class="max-w-2xl text-base sm:text-lg text-center">Under Development!</p>
            </div>
        </div>
    </div>
    <footer class="w-full bg-black text-white py-6 mt-0 text-center">
        <div class="container mx-auto px-4">
            <span class="text-lg">Copyright Abir Zaman &copy; 2025</span>
        </div>
    </footer>
    <script>
        
    </script>
</body>

</html>
