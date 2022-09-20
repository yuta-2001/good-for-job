<p class="mb-4">{{ $entry->user->name }}　様</p>

<p class="mb-4">以下内容の求人へのご応募が完了いたしました。</p>

<ul>
<li class="mb-2">
求人名：{{ $entry->job->name }}
</li>
<li class="mb-2">
会社名：{{ $entry->job->company->name }}
</li>
<li class="mb-2">
職種：{{ $entry->job->occupation->name }}
</li>
<li class="mb-2">
雇用形態：{{ $entry->job->employment_type->name }}
</li>
<li class="mb-2">
勤務地：{{ $entry->job->prefecture->name }}{{ $entry->job->city->name }}{{ $entry->job->address }}
</li>
<li class="mb-2">
アクセス：{{ $entry->job->access }}
</li>
<li class="mb-2">
給与：{{ $entry->job->payment }}
</li>
<li>
仕事内容：{{ $entry->job->content }}
</li>
</ul>