<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
					{{ $job->name }}<span class="text-md ml-2">求人詳細</span>
			</h2>
	</x-slot>

	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-20">
					<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
						<section class="text-gray-600 body-font overflow-hidden">
							<x-flash-message status='session("status")' />
							<div class="container px-20 py-24 mx-auto">
								<div class="-my-8 divide-y-2 divide-gray-100 mb-4">
									<div class="w-full h-auto">
										<img src="{{ Storage::url($job->img) }}" alt="">
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">求人名</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $job->name }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">企業名</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $job->company->name }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">職種</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $job->occupation->name }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">雇用形態</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $job->employment_type->name }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">所在地</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $job->prefecture->name }}{{ $job->city->name }}{{ $job->address }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">アクセス</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $job->access }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">給与</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $job->payment }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">仕事内容</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $job->content }}</p>
										</div>
									</div>
								</div>
								<div class="p-2 w-full">
									<button type="button" onclick="history.back();" class="flex mx-auto text-white bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg mb-3">戻る</button>
									<button type="button" onclick="location.href='{{ route('user.companies.show', ['company' => $job->company->id]) }}'" class="flex mx-auto text-white bg-green-400 border-0 py-2 px-8 focus:outline-none hover:bg-green-500 rounded text-lg mb-3">企業詳細</button>
									<form action="{{ route('user.jobs.apply', ['job' => $job->id]) }}">
										@csrf
										<button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">応募する</button>
									</form>
								</div>
							</div>
						</section>
					</div>
			</div>
	</div>
</x-app-layout>
