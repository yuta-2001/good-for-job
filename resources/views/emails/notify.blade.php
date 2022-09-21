<p class="mb-4">{{ $entry->job->company->name }}　様</p>

<p class="mb-4">求人への応募がありました。</p>

<ul>
<li class="mb-2">
求人名：{{ $entry->job->name }}
</li>
<li class="mb-2">
求職者名：{{ $entry->user->name }}
</li>
<li class="mb-2">
求職者メールアドレス：{{ $entry->user->email }}
</li>
</ul>