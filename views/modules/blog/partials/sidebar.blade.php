<aside class="sidebar-right">
    @blogCategories()
    @blogLatestPosts(4, 'sidebar-latest-posts')
    @blogArchive()
    @isset($share)
        @include('blog::widgets.share')
    @endisset
    @isset($post)
        @blogTags($post, 10)
    @endisset
    @isset($posts)
        @blogTags($posts, 2)
    @endisset
</aside>