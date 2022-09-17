<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
					求人新規作成<span class="ml-2 text-red-400 text-sm">*全て必須項目です。</span>
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
											<form method="POST" action="{{ route('company.jobs.store') }}" enctype="multipart/form-data">
												@csrf
												<div class="-m-2">
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="name" class="leading-7 text-sm text-gray-600 font-bold">求人名</label>
															<input value="{{ old('name') }}" type="text" id="name" name="name" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="message" class="leading-7 text-sm text-gray-600 font-bold">一覧表示メッセージ</label>
															<input value="{{ old('message') }}" type="text" id="message" name="message" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="occupation" class="leading-7 text-sm text-gray-600 font-bold">募集職種</label>
															<select id="occupation" name="occupation_id" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" aria-label="Default select example">
																<option>職種を選択してください</option>
																@foreach ($occupations as $occupation)
																	<option @if ($occupation->id === old('occpation_id'))
																		selected
																	@endif value="{{ $occupation->id }}">{{ $occupation->name }}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="employment_type" class="leading-7 text-sm text-gray-600 font-bold">雇用形態</label>
															<select id="employment_type" name="employment_type_id" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" aria-label="Default select example">
																<option>雇用形態を選択してください</option>
																@foreach ($employment_types as $type)
																	<option @if ($type->id === old('employment_type_id'))
																		selected
																	@endif value="{{ $type->id }}">{{ $type->name }}</option>
																@endforeach
															</select>
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
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="prefecture" class="leading-7 text-sm text-gray-600 font-bold">都道府県選択</label>
															<select id="prefecture" name="prefecture_id" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" aria-label="Default select example">
																	<option>都道府県を選択してください</option>
																	@foreach ($prefectures as $prefecture)
																		<option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
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
															<input type="text" value="{{ old('address') }}" id="address" name="address" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="access" class="leading-7 text-sm text-gray-600 font-bold">アクセス</label>
															<textarea name="access" value="{{ old('access') }}" id="access" name="access" required class="h-40 resize-none w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="payment" class="leading-7 text-sm text-gray-600 font-bold">給与</label>
															<textarea name="payment" value="{{ old('payment') }}" id="payment" name="payment" required class="h-40 resize-none w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="content" class="leading-7 text-sm text-gray-600 font-bold">仕事内容</label>
															<textarea name="content" value="{{ old('content') }}" id="content" name="content" required class="h-40 resize-none w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="" class="leading-7 text-sm text-gray-600 font-bold">特徴(複数選択可能)</label>
															@foreach ($features as $feature)
															<div class="form-check form-check-inline">
																<input class="form-check-input" @if (is_array(old('feature_ids', $feature->id)) && in_array($feature->id, old('feature_ids')))
																	checked
																@endif name="feature_ids[]" type="checkbox" id="feature_{{ $feature->id }}" value="{{ $feature->id }}">
																<label class="form-check-label" for="feature_{{ $feature->id }}">{{ $feature->name }}</label>
															</div>
															@endforeach
														</div>
													</div>
													<div class="p-2 w-1/2 mx-auto">
														<div class="relative">
															<label for="" class="leading-7 text-sm text-gray-600 font-bold">公開ステータス</label>
															<div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
																<input checked id="bordered-checkbox-1" type="checkbox" value="1" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
																<label for="bordered-checkbox-1" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">公開</label>
															</div>
															<div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
																	<input id="bordered-checkbox-2" type="checkbox" value="2" name="status" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
																	<label for="bordered-checkbox-2" class="py-4 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">非公開</label>
															</div>
															</div>
													</div>
													<div class="p-2 w-full">
														<button type="button" onclick="location.href='{{ route('company.jobs.index') }}'" class="flex mx-auto text-white bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg mb-3">戻る</button>
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

		/*
		チェックボックス一つのみ選択
		**/
		$("[name='status']").on("click", function(){
				if ($(this).prop('checked')){
						$("[name='status']").prop('checked', false);
						$(this).prop('checked', true);
				}
		});
	</script>
</x-app-layout>
