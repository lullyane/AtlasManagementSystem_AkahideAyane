<x-sidebar>
<div class="d-flex mt-5">
    <div class="w-50">
        <div class="mx-3 detail_container">
            <div class="p-3">
                @if ($errors->has('post_title'))
                @foreach ($errors->get('post_title') as $error)
                <li class="text-danger auth_font_size">{{ $error }}</li>
                @endforeach
                @endif
                @if ($errors->has('post_body'))
                @foreach ($errors->get('post_body') as $error)
                <li class="text-danger auth_font_size">{{ $error }}</li>
                @endforeach
                @endif
                <div class="d-flex align-items-center justify-content-between detail_font">
                    <div>
                        @if(Auth::check() && Auth::id() === $post->user_id)
                        <p class="category_layout m-0">{{ $post->subCategories->first()->sub_category }}</p>
                    </div>
                    <div class="d-flex">
                        <span class="edit_modal_open btn btn-primary d-block mr-2 detail_font" post_title="{{ $post->post_title }}" post_body="{{ $post->post }}" post_id="{{ $post->id }}">編集</span>
                        <a href="{{ route('post.delete', ['id' => $post->id]) }}" onclick="return confirm('削除してよろしいですか？');" class="btn btn-danger d-block detail_font">削除</a>
                        @endif
                    </div>
                </div>
                <div class="post_name_weight text-black-50 d-flex mt-3">
                    <p>
                        <span>{{ $post->user->over_name }}</span>
                        <span>{{ $post->user->under_name }}</span>
                        さん
                    </p>
                </div>
                <div class="detail_post_title">{{ $post->post_title }}
                </div>
                <div class="mt-3 detail_post">{{ $post->post }}</div>
            </div>
            <div class="p-3">
                <div class="comment_container">
                    <span class="">コメント</span>
                    @foreach($post->postComments as $comment)
                    <div class="comment_area border-top">
                        <p>
                            <span>{{ $comment->commentUser($comment->user_id)->over_name }}</span>
                            <span>{{ $comment->commentUser($comment->user_id)->under_name }}</span>さん
                        </p>
                        <p>{{ $comment->comment }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="w-50">
        <div class="comment_container border mx-5">
            <div class="comment_area p-3">
                @if($errors->first('comment'))
                <span class="error_message">{{ $errors->first('comment') }}</span>
                @endif
                <p class="m-0">コメントする</p>
                <textarea class="w-100 detail_border" name="comment" form="commentRequest"></textarea>
                <input type="hidden" name="post_id" form="commentRequest" value="{{ $post->id }}">
                <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-primary" form="commentRequest" value="投稿">
                </div>
                <form action="{{ route('comment.create') }}" method="post" id="commentRequest">{{ csrf_field() }}</form>
            </div>
        </div>
    </div>
</div>
<div class="modal js-modal">
    <div class="modal_bg js-modal-close">
    </div>
    <div class="modal_content">
        <form action="{{ route('post.edit') }}" method="post">
            <div class="w-100">
                <div class="modal-inner-title w-50 m-auto">
                    <input type="text" name="post_title" placeholder="タイトル" class="w-100 detail_border">
                </div>
                <div class="modal_inner_body w-50 m-auto py-2">
                    <textarea placeholder="投稿内容" name="post_body" class="w-100 detail_border"></textarea>
                </div>
                <div class="w-50 m-auto edit_modal_btn d-flex">
                    <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
                    <input type="hidden" class="edit-modal-hidden" name="post_id" value="">
                    <input type="submit" class="btn btn-primary d-block" value="編集">
                </div>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>
</x-sidebar>
