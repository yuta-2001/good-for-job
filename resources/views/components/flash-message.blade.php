@props(['status' => 'info'])

@php
	if($status ==='info'){$bgColor = 'bg-blue-300';}
	if($status === 'alert'){$bgColor = 'bg-red-500';}
@endphp

@if(session('message'))
<div class="{{ $bgColor }} w-1/2 mx-auto p-2 text-white mb-4">
	{{ session('message') }}
</div>
@endif