<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Experience') }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <form action="{{ route('experiences.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="company" class="block text-sm font-medium mb-1">Company</label>
                <input type="text" id="company" name="company"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required/>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium mb-1">Description</label>
                <textarea id="description" name="description" rows="2"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"></textarea>
            </div>
            <div class="mb-4">
                <label for="link" class="block text-sm font-medium mb-1">Link</label>
                <input type="url" id="link" name="link"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
            </div>
            <div class="mb-4">
                <label for="designation" class="block text-sm font-medium mb-1">Designation</label>
                <input type="text" id="designation" name="designation"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
            </div>
            <div class="mb-4 flex gap-4">
                <div class="flex-1">
                    <label for="start_date" class="block text-sm font-medium mb-1">Start Date</label>
                    <input type="date" id="start_date" name="start_date"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
                </div>
                <div class="flex-1">
                    <label for="end_date" class="block text-sm font-medium mb-1">End Date</label>
                    <input type="date" id="end_date" name="end_date"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" required />
                </div>
            </div>
            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium mb-1">Duration</label>
                <input type="text" id="duration" name="duration"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" readonly />
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
                <label for="responsibilities" class="block text-sm font-medium mb-1">Responsibilities (comma
                    separated)</label>
                <input type="text" id="responsibilities" name="responsibilities"
                    placeholder="e.g. coding, testing, deployment"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring" />
            </div>
            <div class="mb-4">
                <label for="achievements" class="block text-sm font-medium mb-1">Achievements</label>
                <textarea id="achievements" name="achievements" rows="2"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"></textarea>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('experiences.index') }}" class="flex-1 bg-red-500 text-white py-2 rounded text-center hover:bg-red-600 transition">Back</a>
                <button type="submit" class="flex-1 bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const startDateInput = document.getElementById('start_date');
                const endDateInput = document.getElementById('end_date');
                const durationInput = document.getElementById('duration');
                const currentRadios = document.getElementsByName('current');
                let previousEndDate = endDateInput.value;

                function calculateDuration() {
                    const startDate = startDateInput.value ? new Date(startDateInput.value) : null;
                    const endDate = endDateInput.value ? new Date(endDateInput.value) : null;
                    if (!startDate || !endDate || endDate < startDate) {
                        durationInput.value = '';
                        return;
                    }
                    let years = endDate.getFullYear() - startDate.getFullYear();
                    let months = endDate.getMonth() - startDate.getMonth();
                    let days = endDate.getDate() - startDate.getDate();
                    if (days < 0) {
                        months--;
                        const prevMonth = new Date(endDate.getFullYear(), endDate.getMonth(), 0);
                        days += prevMonth.getDate();
                    }
                    if (months < 0) {
                        years--;
                        months += 12;
                    }
                    let result = '';
                    if (years > 0) result += years + ' year(s) ';
                    if (months > 0) result += months + ' month(s) ';
                    if (days > 0) result += days + ' day(s)';
                    if (!result) result = '0 day(s)';
                    durationInput.value = result.trim();
                }

                startDateInput.addEventListener('change', calculateDuration);
                endDateInput.addEventListener('change', calculateDuration);

                // Listen for change on current radio buttons
                currentRadios.forEach(function(radio) {
                    radio.addEventListener('change', function() {
                        if (radio.value === '1' && radio.checked) {
                            // Save previous end date
                            previousEndDate = endDateInput.value;
                            // Set end date to today
                            const today = new Date();
                            const yyyy = today.getFullYear();
                            const mm = String(today.getMonth() + 1).padStart(2, '0');
                            const dd = String(today.getDate()).padStart(2, '0');
                            endDateInput.value = `${yyyy}-${mm}-${dd}`;
                            calculateDuration();
                        } else if (radio.value === '0' && radio.checked) {
                            // Revert end date to previous value
                            if (previousEndDate) {
                                endDateInput.value = previousEndDate;
                                calculateDuration();
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
