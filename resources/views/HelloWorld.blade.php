hello world
<h1>{{ $title }}</h1>
@foreach($articles as $article)
<p>This is the title: {{$article->title}}</p>
@endforeach
			