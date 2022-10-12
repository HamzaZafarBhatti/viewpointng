<p>EARNING From This VIRAL SHARE POST:</p>
@auth
    @if (\Carbon\Carbon::parse($post->post_date)->format('Y-m-d') == \Carbon\Carbon::now()->format('Y-m-d') &&
        !$is_shared)
        <div class="btn-container">
            <p><span class="shareable-btn" data-platform="fb">CLICK HERE TO EARN</span>
            </p>
           
        </div>
    @endif
@endauth
