<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
					企業新規作成
			</h2>
	</x-slot>

	<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
					<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
							<div class="p-6 bg-white border-b border-gray-200">
								<section class="text-gray-600 body-font relative">
									<div class="container px-5 mx-auto">
										<div class="lg:w-4/5 md:w-2/3 mx-auto">
											<x-auth-validation-errors class="mb-4" :errors="$errors" />
											<form method="POST" action="{{ route('admin.companies.store') }}">
												@csrf
												<div class="-m-2">
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="name" class="leading-7 text-sm text-gray-600 font-bold">企業名</label>
															<input value="{{ old('name') }}" type="text" id="name" name="name" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="email" class="leading-7 text-sm text-gray-600 font-bold">メールアドレス</label>
															<input value="{{ old('email') }}" type="email" id="email" name="email" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="password" class="leading-7 text-sm text-gray-600 font-bold">パスワード</label>
															<input type="password" id="password" name="password" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="password_confirmation" class="leading-7 text-sm text-gray-600 font-bold">パスワード確認</label>
															<input type="password" id="password_confirmation" name="password_confirmation" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-full">
														<button type="button" onclick="location.href='{{ route('admin.companies.index') }}'" class="flex mx-auto text-white bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg mb-3">戻る</button>
														<button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規作成</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</section>
							</div>
					</div>
			</div>
	</div>
</x-app-layout>
