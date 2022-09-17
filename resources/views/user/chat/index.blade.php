<x-app-layout>
	<x-slot name="header">
			<div class="flex items-center">
					<h2 class="font-semibold text-xl text-gray-800 leading-tight">
							承認済み応募一覧
					</h2>
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
																							class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">
																							求人名
																					</th>
																					<th
																							class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">
																							会社名
																					</th>
																					<th
																							class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">
																							職種名
																					</th>
																					<th
																							class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">
																							応募日時
																					</th>
																					<th
																							class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr rounded-br">
																							アクション
																					</th>
																			</tr>
																	</thead>
																	<tbody>
																			@foreach ($rooms as $room)
																				<tr class="border-b even:bg-gray-50">
																					<td class="px-3 py-3">{{ $room->job->name }}</td>
																					<td class="px-3 py-3">{{ $room->job->company->name }}</td>
																					<td class="px-3 py-3">{{ $room->job->occupation->name }}</td>
																					<td class="px-3 py-3 text-lg text-gray-900">
																						{{ $room->created_at }}
																					</td>
																					<td class="w-60 flex items-center p-4 pl-0">			
																						<a href="{{ route('user.chat.show', ['entry' => $room->id]) }}" class="text-white bg-green-500 border-0 py-2 px-3 focus:outline-none hover:bg-green-600 rounded text-lg mr-2">チャットルーム</a>
																					</td>
																				</tr>
																			@endforeach
																	</tbody>
															</table>
													</div>
											</div>
									</section>
							</div>
					</div>
			</div>
	</div>
</x-app-layout>
