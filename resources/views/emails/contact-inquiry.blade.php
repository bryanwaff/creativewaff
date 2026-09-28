<h1>New project inquiry</h1>

<p><strong>Name:</strong> {{ $inquiry->full_name }}</p>
<p><strong>Email:</strong> {{ $inquiry->email }}</p>
<p><strong>Project type:</strong> {{ $projectTypeLabel }}</p>
<p><strong>Estimated timeline &amp; budget:</strong> {{ $inquiry->timeline_budget ?: 'Not provided' }}</p>

<h2>Project details</h2>
<p>{!! nl2br(e($inquiry->message)) !!}</p>
