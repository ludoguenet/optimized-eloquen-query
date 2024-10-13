<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <a
                                        href="{{ route('dashboard', ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                                        {{ __('Name') }}
                                    </a>
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <a
                                        href="{{ route('dashboard', ['sort' => 'email', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                                        {{ __('Email') }}
                                    </a>
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <a
                                        href="{{ route('dashboard', ['sort' => 'start_at', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">
                                        {{ __('Project Start Date') }}
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $employee->name }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $employee->email }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{-- {{ $employee->start_month_day }} --}}
                                        {{ $employee->start_at->format('d/m') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{-- {{ $employees->appends(request()->input())->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
