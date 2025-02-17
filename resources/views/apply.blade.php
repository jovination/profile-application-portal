<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <style>
        .delete-btn {
            transition: all 0.2s ease;
        }
        .delete-btn:hover {
            transform: scale(1.1);
        }
        .form-section {
            transition: all 0.3s ease;
        }
        .loader {
            border: 3px solid #f3f3f3;
            border-radius: 50%;
            border-top: 3px solid #015eff;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
            display: inline-block;
            vertical-align: middle;
            margin-left: 8px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .success-message {
            animation: fadeInOut 2s ease;
        }
        @keyframes fadeInOut {
            0% { opacity: 0; }
            20% { opacity: 1; }
            80% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <section class="w-full lg:h-screen justify-between flex h-screen">
        <!-- Left Sidebar -->
        <div class="w-[500px] hidden fixed h-full bg-[#015eff] p-12 lg:flex flex-col justify-between">
            <div>
                <h1 class="text-white text-4xl font-medium leading-[50px]">
                    Join the Next Chapter<br /> of Your Career
                </h1>
                <p class="text-[#e7f4ff] font-[300] mt-6">
                    Discover new opportunities, connect with top employers, and take your career to the next level.
                </p>
            </div>
            
            <div class="w-full bg-[#074CDF] p-6 rounded-xl">
                <p class="text-[#e7f4ff] text-italic mb-4">
                    "I found my dream job through this platform. The process was smooth and professional."
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-[#015eff] mr-3"></div>
                    <div>
                        <p class="text-white font-medium">Jovin Shija</p>
                        <div class="flex text-yellow-400">★★★★★</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-full lg:ml-[500px] flex-1 p-12 overflow-y-auto">
            <div class="max-w-2xl">
                <h2 class="text-2xl font-semibold mb-8">Apply Now</h2>
                
                <form id="application-form" class="space-y-6">
                    <!-- Personal Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="full_name" id="name" required 
                                class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                        </div>
                        <div class="flex flex-col">
                            <label for="phone" class="text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="tel" name="phone_number" id="phone" required
                                class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="email" class="text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" required
                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                    </div>

                    <!-- Education Section -->
                    <div class="flex flex-col col-span-2 space-y-4">
                        <label class="text-sm font-medium text-gray-700">Education History</label>
                        <div id="education-container" class="space-y-4">
                            <div class="education-entry form-section">
                                <div class="flex items-center gap-4">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 flex-grow">
                                        <input type="text" name="education[0][institution]" placeholder="Institution" required
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                        <input type="text" name="education[0][degree]" placeholder="Degree" required
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                        <input type="text" name="education[0][year]" placeholder="Year" required
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addEducation()" 
                            class="w-fit px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            + Add Education
                        </button>
                    </div>

                    <!-- Work Experience Section -->
                    <div class="flex flex-col col-span-2 space-y-4">
                        <label class="text-sm font-medium text-gray-700">Work Experience</label>
                        <div id="work-container" class="space-y-4">
                            <div class="work-entry form-section">
                                <div class="flex items-center gap-4">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 flex-grow">
                                        <input type="text" name="work[0][company]" placeholder="Company"
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                        <input type="text" name="work[0][role]" placeholder="Role"
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                        <input type="text" name="work[0][duration]" placeholder="Duration"
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addWork()" 
                            class="w-fit px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            + Add Work Experience
                        </button>
                    </div>

                    <!-- Skills Section -->
                    <div class="flex flex-col col-span-2 space-y-4">
                        <label class="text-sm font-medium text-gray-700">Skills</label>
                        <div id="skills-container" class="space-y-4">
                            <div class="skill-entry form-section">
                                <div class="flex items-center gap-4">
                                    <input type="text" name="skills[]" placeholder="Enter a skill"
                                        class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="addSkill()" 
                            class="w-fit px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            + Add Skill
                        </button>
                    </div>

                    <button type="submit" id="submit-btn" 
                        class="w-full bg-[#015eff] text-white py-3 rounded-lg font-medium hover:bg-[#074CDF] transition-colors">
                        Submit Application
                    </button>
                </form>
            </div>
        </div>
    </section>

    <script>
        let educationCount = 1;
        let workCount = 1;
        let skillCount = 1;

        function createDeleteButton() {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'delete-btn text-red-500 hover:text-red-700 p-2';
            button.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            `;
            return button;
        }

        function addEducation() {
            const container = document.getElementById('education-container');
            const div = document.createElement('div');
            div.className = 'education-entry form-section';
            
            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-center gap-4';
            
            const inputsDiv = document.createElement('div');
            inputsDiv.className = 'grid grid-cols-1 md:grid-cols-3 gap-4 flex-grow';
            inputsDiv.innerHTML = `
                <input type="text" name="education[${educationCount}][institution]" placeholder="Institution" required
                    class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                <input type="text" name="education[${educationCount}][degree]" placeholder="Degree" required
                    class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                <input type="text" name="education[${educationCount}][year]" placeholder="Year" required
                    class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
            `;
            
            const deleteButton = createDeleteButton();
            deleteButton.onclick = () => div.remove();
            
            wrapper.appendChild(inputsDiv);
            wrapper.appendChild(deleteButton);
            div.appendChild(wrapper);
            container.appendChild(div);
            educationCount++;
        }

        function addWork() {
            const container = document.getElementById('work-container');
            const div = document.createElement('div');
            div.className = 'work-entry form-section';
            
            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-center gap-4';
            
            const inputsDiv = document.createElement('div');
            inputsDiv.className = 'grid grid-cols-1 md:grid-cols-3 gap-4 flex-grow';
            inputsDiv.innerHTML = `
                <input type="text" name="work[${workCount}][company]" placeholder="Company"
                    class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                <input type="text" name="work[${workCount}][role]" placeholder="Role"
                    class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                <input type="text" name="work[${workCount}][duration]" placeholder="Duration"
                    class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
            `;
            
            const deleteButton = createDeleteButton();
            deleteButton.onclick = () => div.remove();
            
            wrapper.appendChild(inputsDiv);
            wrapper.appendChild(deleteButton);
            div.appendChild(wrapper);
            container.appendChild(div);
            workCount++;
        }

        function addSkill() {
            const container = document.getElementById('skills-container');
            const div = document.createElement('div');
            div.className = 'skill-entry form-section';
            
            const wrapper = document.createElement('div');
            wrapper.className = 'flex items-center gap-4';
            
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'skills[]';
            input.placeholder = 'Enter a skill';
            input.className = 'w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent';
            
            const deleteButton = createDeleteButton();
            deleteButton.onclick = () => div.remove();
            
            wrapper.appendChild(input);
            wrapper.appendChild(deleteButton);
            div.appendChild(wrapper);
            container.appendChild(div);
            skillCount++;
        }

        document.getElementById('application-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submit-btn');
            submitBtn.innerHTML = 'Submitting... <span class="loader"></span>';
            submitBtn.disabled = true;

            const formData = new FormData(this);
            
            fetch("{{ route('apply') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: formData,
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Show success message
                    submitBtn.innerHTML = `
                        <span class="flex items-center justify-center">
                            <svg class="w-6 h-6 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Application Submitted Successfully!
                        </span>
                    `;
                    submitBtn.classList.remove('bg-[#015eff]');
                    submitBtn.classList.add('bg-green-500');

                    // Create floating success message
                    const successMessage = document.createElement('div');
                    successMessage.className = 'success-message fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg';
                    successMessage.innerHTML = 'Your application has been submitted successfully!';
                    document.body.appendChild(successMessage);

                    // Remove success message after animation
                    setTimeout(() => {
                        successMessage.remove();
                    }, 2000);

                    // Reset form and button after delay
                    setTimeout(() => {
                        this.reset();
                        submitBtn.innerHTML = 'Submit Application';
                        submitBtn.classList.remove('bg-green-500');
                        submitBtn.classList.add('bg-[#015eff]');
                        submitBtn.disabled = false;
                        
                        // Reset all dynamic fields
                        document.getElementById('education-container').innerHTML = `
                            <div class="education-entry form-section">
                                <div class="flex items-center gap-4">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 flex-grow">
                                        <input type="text" name="education[0][institution]" placeholder="Institution" required
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                        <input type="text" name="education[0][degree]" placeholder="Degree" required
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                        <input type="text" name="education[0][year]" placeholder="Year" required
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                    </div>
                                </div>
                            </div>
                        `;
                        document.getElementById('work-container').innerHTML = `
                            <div class="work-entry form-section">
                                <div class="flex items-center gap-4">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 flex-grow">
                                        <input type="text" name="work[0][company]" placeholder="Company"
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                        <input type="text" name="work[0][role]" placeholder="Role"
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                        <input type="text" name="work[0][duration]" placeholder="Duration"
                                            class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                    </div>
                                </div>
                            </div>
                        `;
                        document.getElementById('skills-container').innerHTML = `
                            <div class="skill-entry form-section">
                                <div class="flex items-center gap-4">
                                    <input type="text" name="skills[]" placeholder="Enter a skill"
                                        class="w-full px-4 py-2 border border-[#015eff] rounded-lg focus:ring-2 focus:ring-[#015eff] focus:border-transparent">
                                </div>
                            </div>
                        `;
                        
                        // Reset counters
                        educationCount = 1;
                        workCount = 1;
                        skillCount = 1;
                    }, 2000);

                    if (data.redirect) {
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 2000);
                    }
                } else {
                    // Handle validation errors
                    if (data.errors) {
                        const errorMessage = document.createElement('div');
                        errorMessage.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg';
                        errorMessage.innerHTML = Object.values(data.errors).flat().join('<br>');
                        document.body.appendChild(errorMessage);
                        
                        setTimeout(() => {
                            errorMessage.remove();
                        }, 5000);
                    } else {
                        alert('Error submitting application.');
                    }
                    submitBtn.innerHTML = 'Submit Application';
                    submitBtn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const errorMessage = document.createElement('div');
                errorMessage.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg';
                errorMessage.innerHTML = error.message || 'An error occurred while submitting the form.';
                document.body.appendChild(errorMessage);
                
                setTimeout(() => {
                    errorMessage.remove();
                }, 5000);
                
                submitBtn.innerHTML = 'Submit Application';
                submitBtn.disabled = false;
            });
        });
    </script>
</body>
</html>