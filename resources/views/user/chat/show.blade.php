<x-app-layout>
	<x-slot name="header">
			<div class="flex items-center">
					<h2 class="font-semibold text-xl text-gray-800 leading-tight">
						チャットルーム
					</h2>
			</div>
	</x-slot>

	<div class="py-10">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
					<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
							<div class="p-6 bg-white border-b border-gray-200">
									<section class="text-gray-600 body-font">
											<div class="container px-5 mx-auto">
												<div class="w-full mx-auto overflow-auto">
														<div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
															<div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
																<div class="relative flex items-center space-x-4">
																		<div class="relative">
																			<img src="{{ Storage::url($entry->job->company->img) }}" alt="" class="w-10 sm:w-16 h-10 sm:h-16 rounded-full">
																		</div>
																		<div class="flex flex-col leading-tight">
																			<div class="text-2xl mt-1 flex items-center">
																					<span class="text-gray-700 mr-3">{{ $entry->job->company->name }}</span>
																			</div>
																		</div>
																</div>
															</div>
															<div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
																@foreach ($entry->messages as $message)
																	@if ($message->send_by === 2)
																		<div class="chat-message">
																			<div class="flex items-end">
																				<div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
																						<div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">{{ $message->content }}</span></div>
																				</div>
																				<img src="{{ Storage::url($entry->job->company->img) }}" alt="My profile" class="w-14 h-14 rounded-full order-1">
																			</div>
																		</div>
																	@endif
																	@if ($message->send_by === 1)
																		<div class="chat-message">
																			<div class="flex items-end justify-end">
																				<div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
																						<div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">{{ $message->content }}</span></div>
																				</div>
																				<img src="{{ Storage::url($entry->job->company->img) }}" alt="My profile" class="w-14 h-14 rounded-full order-2">
																			</div>
																		</div>
																	@endif
																@endforeach
																<div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
																	<form action="{{ route('user.chat.send', ['entry' => $entry->id]) }}" method="POST">
																	@csrf
																		<div class="relative flex">
																			<textarea name="content" id="" placeholder="メッセージを入力" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-6 bg-gray-200 rounded-md py-3"></textarea>
																			<div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
																				<button type="submit" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
																						<span class="font-bold">送信</span>
																						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
																							<path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
																						</svg>
																				</button>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
											</div>
									</section>
							</div>
					</div>
			</div>
	</div>
	<style>
		.scrollbar-w-2::-webkit-scrollbar {
			width: 0.25rem;
			height: 0.25rem;
		}
		
		.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
			--bg-opacity: 1;
			background-color: #f7fafc;
			background-color: rgba(247, 250, 252, var(--bg-opacity));
		}
		
		.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
			--bg-opacity: 1;
			background-color: #edf2f7;
			background-color: rgba(237, 242, 247, var(--bg-opacity));
		}
		
		.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
			border-radius: 0.25rem;
		}
		</style>
		
		<script>
			const el = document.getElementById('messages')
			el.scrollTop = el.scrollHeight
		</script>
</x-app-layout>