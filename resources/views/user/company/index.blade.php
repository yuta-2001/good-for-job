<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
					企業一覧
			</h2>
	</x-slot>

	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
					<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
						<x-flash-message status='session("status")' />
							<div class="p-6 bg-white border-b border-gray-200">
								<section class="text-gray-600 body-font">
									<div class="container px-5 mx-auto">
										<div class="flex flex-wrap -m-4">
											@foreach ($companies as $company)
												<a href="{{ route('user.companies.show', ['company' => $company->id]) }}" class="p-4 md:w-1/3 hover:opacity-50 cursor-pointer block">
													<div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
														<img class="lg:h-48 md:h-36 w-full object-cover object-center h-auto" src="{{ Storage::url($company->img) }}" alt="blog">
														<div class="p-6">
															<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{ $company->industory->name }}</h2>
															<h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $company->name }}</h1>
															<p class="leading-relaxed">所在地：{{ $company->prefecture->name }}</p>
														</div>
													</div>
												</a>
											@endforeach
										</div>
									</div>
								</section>
							</div>
					</div>
			</div>
	</div>
</x-app-layout>
