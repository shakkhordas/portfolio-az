<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Academic History') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <form action="{{ route('academics.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="institution" class="block text-sm font-medium mb-1">Institution</label>
                <input type="text" id="institution" name="institution"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
            </div>
            <div class="mb-4 flex gap-4">
                <div class="flex-1">
                    <label for="country" class="block text-sm font-medium mb-1">Country</label>
                    <select id="country" name="country"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required>
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country['country'] }}">{{ $country['country'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="city" class="block text-sm font-medium mb-1">City</label>
                    <select id="city" name="city"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" disabled required>
                        <option value="">Select City</option>
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label for="link" class="block text-sm font-medium mb-1">Institution Link</label>
                <input type="url" id="link" name="link"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
            </div>
            <div class="mb-4 flex gap-4">
                <div class="flex-1">
                    <label for="degree" class="block text-sm font-medium mb-1">Degree</label>
                    <input type="text" id="degree" name="degree"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
                </div>
                <div class="flex-1">
                    <label for="subject" class="block text-sm font-medium mb-1">Subject</label>
                    <input type="text" id="subject" name="subject"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
                </div>
            </div>
            <div class="mb-4 flex gap-4">
                <div class="flex-1">
                    <label for="major" class="block text-sm font-medium mb-1">Major</label>
                    <input type="text" id="major" name="major"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
                </div>
                <div class="flex-1">
                    <label for="syllabus" class="block text-sm font-medium mb-1">Syllabus</label>
                    <input type="text" id="syllabus" name="syllabus"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
                </div>
            </div>
            <div class="mb-4 flex gap-4">
                <div class="flex-1">
                    <label for="gpa" class="block text-sm font-medium mb-1">GPA</label>
                    <input type="number" step="0.01" id="gpa" name="gpa"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
                </div>
                <div class="flex-1">
                    <label for="scale" class="block text-sm font-medium mb-1">Scale</label>
                    <input type="number" step="0.01" id="scale" name="scale"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
                </div>
            </div>
            <div class="mb-4">
                <label for="session" class="block text-sm font-medium mb-1">Session</label>
                <input type="text" id="session" name="session"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
            </div>
            <div class="mb-4">
                <span class="block text-sm font-medium mb-1">Current</span>
                <label class="inline-flex items-center mr-4">
                    <input type="radio" name="current" value="1" class="form-radio" />
                    <span class="ml-2">Yes</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="current" value="0" class="form-radio" />
                    <span class="ml-2">No</span>
                </label>
            </div>
            <div class="mb-4">
                <label for="graduation_date" class="block text-sm font-medium mb-1">Graduation Date</label>
                <input type="date" id="graduation_date" name="graduation_date"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
            </div>
            <div class="mb-4">
                <label for="accolades" class="block text-sm font-medium mb-1">Accolades</label>
                <textarea id="accolades" name="accolades" rows="2"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"></textarea>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('academics.index') }}"
                    class="flex-1 bg-red-500 text-white py-2 rounded text-center hover:bg-red-600 transition">Back</a>
                <button type="submit"
                    class="flex-1 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            const countries = @json($countries);
            const countrySelect = document.getElementById('country');
            const citySelect = document.getElementById('city');
            const graduationDateInput = document.getElementById('graduation_date');
            const currentRadios = document.getElementsByName('current');

            countrySelect.addEventListener('change', function() {
                const selectedCountry = countrySelect.value;
                citySelect.innerHTML = '<option value="">Select City</option>';
                citySelect.disabled = true;
                if (!selectedCountry) return;
                const countryObj = countries.find(c => c.country === selectedCountry);
                if (countryObj && countryObj.cities && countryObj.cities.length > 0) {
                    countryObj.cities.forEach(function(city) {
                        const option = document.createElement('option');
                        option.value = city;
                        option.textContent = city;
                        citySelect.appendChild(option);
                    });
                    citySelect.disabled = false;
                }
            });

            // Graduation date toggle logic
            function toggleGraduationDate() {
                let selected = Array.from(currentRadios).find(r => r.checked);
                if (selected && selected.value === '1') {
                    graduationDateInput.value = '';
                    graduationDateInput.disabled = true;
                } else {
                    graduationDateInput.disabled = false;
                }
            }
            currentRadios.forEach(function(radio) {
                radio.addEventListener('change', toggleGraduationDate);
            });
            // Initial state
            toggleGraduationDate();
        </script>
    @endpush

</x-app-layout>
