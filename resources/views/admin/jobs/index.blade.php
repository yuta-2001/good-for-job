<x-app-layout>
	<x-slot name="header">
			<div class="flex items-center justify-around">
					<h2 class="font-semibold text-xl text-gray-800 leading-tight">
							求人一覧
					</h2>
					<form method="get" action="{{ route('admin.jobs.index') }}">
						<div>
							<div class="lg:flex justify-center">
									<div class="flex space-x-4 items-center">
											<div><input name="keyword" class="border border-gray-500 py-2 px-2" placeholder="キーワードを入力" value="{{ \Request::get('keyword') }}"></div>
											<div><button class="ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">検索する</button></div>
									</div>
							</div>
							<div class="flex">
									<div>
										<span class="text-sm">都道府県</span><br>
										<select id="prefecture" name="prefecture" class="mr-4">
											<option value="0"
											@if (\Request::get('prefecture') == 0)
												selected
											@endif
											>全て
											</option>
											@foreach ($prefectures as $prefecture)
												<option value="{{ $prefecture->id }}"
												@if (\Request::get('prefecture') == $prefecture->id)
													selected
												@endif
												>{{ $prefecture->name }}
												</option>		
											@endforeach
										</select>
									</div>
									<div>
										<span class="text-sm">職種</span><br>
										<select id="occupation" name="occupation" class="mr-4">
											<option value="0"
											@if (\Request::get('occupation') == 0)
												selected
											@endif
											>全て
											</option>
											@foreach ($occupations as $occupation)
												<option value="{{ $occupation->id }}"
												@if (\Request::get('occupation') == $occupation->id)
													selected
												@endif
												>{{ $occupation->name }}
												</option>					
											@endforeach
										</select>
									</div>
									<div>
										<span class="text-sm">雇用形態</span><br>
										<select id="employment_type" name="employment_type" class="mr-4">
											<option value="0"
											@if (\Request::get('employment_type') == 0)
												selected
											@endif
											>全て
											</option>
											@foreach ($employment_types as $employment_type)
												<option value="{{ $employment_type->id }}"
												@if (\Request::get('employment_type') == $employment_type->id)
													selected
												@endif
												>{{ $employment_type->name }}
												</option>					
											@endforeach
										</select>
									</div>
									<div>
										<span class="text-sm">表示件数</span><br>
										<select id="pagination" name="pagination">
											<option value="10"
											@if (\Request::get('pagination') === '10')
												selected
											@endif
											>
													10件
											</option>
											<option value="20"
											@if (\Request::get('pagination') === '20')
												selected
											@endif
											>
													20件
											</option>
											<option value="50"
											@if (\Request::get('pagination') === '50')
												selected
											@endif
											>
													50件
											</option>
											<option value="100"
											@if (\Request::get('pagination') === '100')
												selected
											@endif
											>
													100件
											</option>
										</select>
									</div>
							</div>
						</div>
					</form>
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
																							職種
																					</th>
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
																							作成日時
																					</th>
																					<th
																							class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr rounded-br">
																							アクション
																					</th>
																			</tr>
																	</thead>
																	<tbody>
																			@foreach ($jobs as $job)
																					<tr class="border-b even:bg-gray-50">
																							<td class="px-3 py-3">{{ $job->occupation->name }}</td>
																							<td class="px-3 py-3">
																								{{ $job->name }}
																							</td>
																							<td class="px-3 py-3">
																									{{ $job->company->name }}
																							</td>
																							<td class="px-3 py-3 text-lg text-gray-900">{{ $job->created_at }}
																							</td>
																							<td class="w-40 flex items-center p-4 pl-0">
																									<a href="{{ route('admin.jobs.show', ['job' => $job->id]) }}" class="text-white bg-indigo-500 border-0 py-2 px-3 focus:outline-none hover:bg-indigo-600 rounded text-lg mr-2">詳細</a>
																									<form id="delete_{{ $job->id }}" method="POST" action="{{ route('admin.jobs.destroy', ['job' => $job->id]) }}">
																											@csrf
																											@method('delete')
																											<a href="#" onclick="deletePost(this)" data-id="{{ $job->id }}" class="inline-block text-white bg-red-500 border-0 py-2 px-3 focus:outline-none hover:bg-red-600 rounded text-lg">削除</a>
																									</form>
																							</td>
																					</tr>
																			@endforeach
																	</tbody>
															</table>
															{{ $jobs->appends([
																'keyword' => \Request::get('keyword'),
																'prefecture' => \Request::get('prefecture'),
																'occupation' => \Request::get('occupation'),
																'employment_type' => \Request::get('employment_type'),
																'pagination' => \Request::get('pagination'),
															])->links() }}
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
