<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
					企業新規作成<span class="ml-2 text-red-400 text-sm">*全て必須項目です。</span>
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
											<form method="POST" action="{{ route('admin.companies.store') }}" enctype="multipart/form-data">
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
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="industory" class="leading-7 text-sm text-gray-600 font-bold">業界選択</label>
															<select id="industory" name="industory_id" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" aria-label="Default select example">
																	<option>業界を選択してください</option>
																	@foreach ($industories as $industory)
																		<option @if (old('industory_id') == $industory->id)
																			selected
																		@endif value="{{ $industory->id }}">{{ $industory->name }}</option>
																	@endforeach
															</select>
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="prefecture" class="leading-7 text-sm text-gray-600 font-bold">都道府県選択</label>
															<select id="prefecture" name="prefecture_id" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" aria-label="Default select example">
																	<option>都道府県を選択してください</option>
																	@foreach ($prefectures as $prefecture)
																		<option @if (old('prefecture_id') == $prefecture->id)
																			selected
																		@endif value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
																	@endforeach
															</select>
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="city" class="leading-7 text-sm text-gray-600 font-bold">市町村選択</label>
															<select id="city" name="city_id" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" aria-label="Default select example">
																	<option>市町村を選択してください</option>
															</select>
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="address" class="leading-7 text-sm text-gray-600 font-bold">番地以下</label>
															<input value="{{ old('address') }}" type="text" id="address" name="address" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="president" class="leading-7 text-sm text-gray-600 font-bold">代表者名</label>
															<input value="{{ old('president') }}" type="text" id="president" name="president" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="count_of_employee" class="leading-7 text-sm text-gray-600 font-bold">従業員数</label>
															<input value="{{ old('count_of_employee') }}" type="text" id="count_of_employee" name="count_of_employee" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="img" class="leading-7 text-sm text-gray-600 font-bold">画像</label>
															<input type="file" id="img" name="img" onchange="imgPreView(event)" accept="image/png,image/jpeg,image/jpg" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto mb-4">
														<div class="relative">
															<div id="preview" class="h-auto"></div>  
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
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script>
		// セレクトボックスの連動
		// 親カテゴリのselect要素が変更になるとイベントが発生
		$('#prefecture').change(function () {
			let prefecture_val = $(this).val();

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: '/fetch/address',
				type: 'POST',
				data: {'pref_val' : prefecture_val},
				datatype: 'json',
			})
			.done(function(data) {
				// 子カテゴリのoptionを一旦削除
				$('#city option').remove();
				// DBから受け取ったデータを子カテゴリのoptionにセット
				$.each(data, function(key, value) {
					$('#city').append($('<option>').text(value.name).attr('value', value.id));
				})
			})
			.fail(function() {
				console.log('失敗');
			}); 
		});

		/*
		画像プレビュー機能
		**/
		function imgPreView(event) {
			let file = event.target.files[0];
			let reader = new FileReader();
			let preview = document.getElementById("preview");
			let previewImage = document.getElementById("previewImage");

			if(previewImage != null) {
				preview.removeChild(previewImage);
			}

			reader.onload = function(event) {
				let img = document.createElement("img");
				img.setAttribute("src", reader.result);
				img.setAttribute("id", "previewImage");
				preview.appendChild(img);
			}
			reader.readAsDataURL(file);
		}
	</script>
</x-app-layout>
