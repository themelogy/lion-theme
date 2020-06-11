<aside class="sidebar-right">
    @newsCategories('categories')
    @newsLatestPosts(4, 'sidebar-latest-posts')
    @newsArchive()
    @isset($share)
        @include('news::widgets.share')
    @endisset
    @isset($post)
        @newsTags($post, 10)
    @endisset
    @isset($posts)
        @newsTags($posts, 2)
    @endisset
</aside>
