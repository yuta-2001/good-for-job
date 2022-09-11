<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
					募集中求人一覧
			</h2>
			<form method="get" action="{{ route('user.jobs.index') }}">
				<div class="lg:flex lg:justify-around">
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
	</x-slot>

	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
					<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
						<x-flash-message status='session("status")' />
							<div class="p-6 bg-white border-b border-gray-200">
								<section class="text-gray-600 body-font">
									<div class="container px-5 mx-auto">
										<div class="flex flex-wrap -m-4">
											@foreach ($jobs as $job)
												<a href="{{ route('user.jobs.show', ['job' => $job->id]) }}" class="p-4 md:w-1/3 hover:opacity-50 cursor-pointer block">
													<div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
														<img class="lg:h-48 md:h-36 w-full object-cover object-center h-auto" src="{{ Storage::url($job->img) }}" alt="blog">
														<div class="p-6">
															<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{ $job->occupation->name }}</h2>
															<h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $job->name }}</h1>
															<p class="leading-relaxed mb-2">{{ $job->message }}</p>
															<p class="leading-relaxed">会社名：{{ $job->company->name }}</p>
														</div>
													</div>
												</a>
											@endforeach
										</div>
										{{ $jobs->appends([
											'keyword' => \Request::get('keyword'),
											'prefecture' => \Request::get('prefecture'),
											'occupation' => \Request::get('occupation'),
											'employment_type' => \Request::get('employment_type'),
											'pagination' => \Request::get('pagination'),
										])->links() }}
									</div>
								</section>
							</div>
					</div>
			</div>
	</div>
</x-app-layout>
