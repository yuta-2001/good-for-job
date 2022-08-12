<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
					{{ $company->name }}<span class="text-md ml-2">詳細</span>
			</h2>
	</x-slot>

	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-20">
					<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
						<section class="text-gray-600 body-font overflow-hidden">
							<div class="container px-20 py-24 mx-auto">
								<div class="-my-8 divide-y-2 divide-gray-100 mb-4">
									<div class="w-full h-auto">
										<img src="{{ Storage::url($company->img) }}" alt="">
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">企業名</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $company->name }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">メールアドレス</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $company->email }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">業界</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $company->industory->name }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">所在地</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $company->prefecture->name }}{{ $company->city->name }}{{ $company->address }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">代表者名</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $company->president }}</p>
										</div>
									</div>
									<div class="py-8 flex flex-wrap md:flex-nowrap">
										<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
											<span class="font-semibold title-font text-gray-700">従業員数</span>
										</div>
										<div class="md:flex-grow">
											<p class="text-md font-medium text-gray-900 title-font mb-2">{{ $company->count_of_employee }}</p>
										</div>
									</div>
								</div>
								<button type="button" onclick="location.href='{{ route('admin.companies.index') }}'" class="flex mx-auto text-white bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg mb-3">戻る</button>
							</div>
						</section>
					</div>
			</div>
	</div>
</x-app-layout>
