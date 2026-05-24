<x-sidebar>
<div class="board_area w-100 border m-auto d-flex align-items-start">
    <div class="post_view w-75 my-4">
        @foreach($posts as $post)
        <div class="post_area border m-auto p-3 m-0 w-75">
            <p class="post_name_weight text-black-50 mb-2"><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
            <p class="mb-2"><a href="{{ route('post.detail', ['id' => $post->id]) }}" class="text-dark post_title_weight">{{ $post->post_title }}</a></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-left">
                    <p class="category_layout m-0">{{ $post->subCategories->first()->sub_category }}</p>
                </div>
                <div class="text-right d-flex">
                    <div class="mr-5">
                        <i class="fa fa-comment text-black-50"></i>
                        <span class="">{{ $post->PostComments()->count() }}</span>
                    </div>
                    <div>
                        @if(Auth::user()->is_Like($post->id))
                        <p class="m-0">
                            <i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i>
                            <span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
                        @else
                        <p class="m-0">
                            <i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i>
                            <span class="like_counts{{ $post->id }}">{{ $like->likeCounts($post->id) }}</span></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="other_area w-25 my-4">
        <div class="w-75">
            <div class="mb-3">
                <a href="{{ route('post.input') }}" class="text-white post_btn_layout">投稿</a>
            </div>
            <div class="mb-3 d-flex">
                <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="w-75 keyword_input">
                <input type="submit" value="検索" form="postSearchRequest" class="w-25 keyword_search_btn">
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <input type="submit" name="like_posts" class="like_category_btn" value="いいねした投稿" form="postSearchRequest">
                <input type="submit" name="my_posts" class="my_category_btn" value="自分の投稿" form="postSearchRequest">
            </div>
            <div>
                <p class="mb-3">カテゴリー検索</p>
                <ul>
                    @foreach($categories as $category)
                    <li class="categories_wrapper">
                        <div class="mb-3 main_categories_wrapper d-flex justify-content-between">
                            <span class="main_categories" category_id="{{ $category->id }}">
                                {{ $category->main_category }}
                            </span>
                            <div class="chevron">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        @foreach($category->subCategories as $sub_category)
                        <ul class="sub_categories_wrapper">
                            <li class="mb-3 sub_categories" category_id="{{ $category->id }}">
                                <form action="{{ route('post.show') }}" method="get">
                                    <input type="hidden" name="category_word" value="{{ $sub_category->sub_category }}">
                                    <button type="submit" class="sub_category_btn">{{ $sub_category->sub_category }}</button>
                                </form>
                            </li>
                        </ul>
                        @endforeach
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
</x-sidebar>
