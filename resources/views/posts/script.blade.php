<script>
    var tags = [
            @foreach ($posts as $post)
            {tag: "{{$post->tags}}" },
        @endforeach
    ];
</script>