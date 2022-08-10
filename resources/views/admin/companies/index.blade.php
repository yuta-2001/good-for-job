<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                企業一覧
            </h2>
            <button onclick="location.href='{{ route('admin.companies.create') }}'"
                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">企業新規作成</button>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <x-flash-message status='session("status")' />
                            <div class="w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap mb-2">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tl rounded-bl">
                                                ID
                                            </th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">
                                                企業名
                                            </th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">
                                                求人数
                                            </th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">
                                                作成日時
                                            </th>
                                            <th
                                                class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr rounded-br">
                                                アクション
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($companies as $company)
                                            <tr class="border-b even:bg-gray-50">
                                                <td class="px-3 py-3">{{ $company->id }}</td>
                                                <td class="px-3 py-3">
                                                    <p class="font-bold text-lg">{{ $company->name }}
                                                    <p>
                                                    <p>{{ $company->email }}</p>
                                                </td>
                                                <td class="px-3 py-3">0</td>
                                                <td class="px-3 py-3 text-lg text-gray-900">{{ $company->created_at }}
                                                </td>
                                                <td class="w-40 flex items-center p-4 pl-0">
                                                    <button class="text-white bg-indigo-500 border-0 py-2 px-3 focus:outline-none hover:bg-indigo-600 rounded text-lg mr-2">詳細</button>
                                                    <form id="delete_{{ $company->id }}" method="POST" action="{{ route('admin.companies.destroy', ['company' => $company->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="#" onclick="deletePost(this)" data-id="{{ $company->id }}" class="inline-block text-white bg-red-500 border-0 py-2 px-3 focus:outline-none hover:bg-red-600 rounded text-lg">削除</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $companies->links() }}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deletePost(e) {
            'use strict';
            if(confirm('本当に削除してよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
