<h2>{{ $job->title }}</h2>
<p>
    The body of your message.
</p>
<P>
    <a href="{{ url('/jobs/' . $job->id) }}">View Job</a>
</P>
