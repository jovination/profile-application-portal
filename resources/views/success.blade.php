<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#E5E8ED]">
    <section class="flex items-center justify-center h-screen">
        <div class="bg-white w-[500px] h-[550px] shadow-lg rounded-2xl p-10 flex flex-col items-center justify-center">
            <div class="w-32 h-32 rounded-full bg-[#015eff]/10 flex items-center justify-center mb-8">
                <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 6L9 17L4 12" stroke="#015eff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <h2 class="text-2xl font-semibold text-gray-900 mb-2 text-center">
                Application Submitted<br/>  Successfully!
            </h2>
            
            <p class="text-gray-600 text-sm text-center mb-4 max-w-md">
                Thank you for taking the time to apply. We have received your application and our team will review it shortly.
            </p>

            <div class="w-full bg-[#015eff]/5 rounded-xl px-6 py-4 mb-8">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-medium text-gray-600">Application Status</span>
                    <span class="px-3 py-1 bg-[#015eff]/10 text-[#015eff] text-sm font-medium rounded-full">
                        Under Review
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-600">Reference Number</span>
                    <span class="text-sm font-medium text-gray-900">#APP-2024-{{ session('profile_id') }}</span>
                </div>
            </div>

            <div class="flex w-full">
                <a href="{{ url('/profile/' . session('profile_id')) }}" 
                   class="flex-1 bg-[#015eff] text-white py-2 rounded-lg font-medium text-center hover:bg-[#074CDF] transition-colors">
                    View Application Details
                </a>
            </div>
        </div>
    </section>
</body>
</html>