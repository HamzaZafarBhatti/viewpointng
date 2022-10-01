<p>Share This VIRAL SHARE Post To Earn:</p>
@auth
    @if (\Carbon\Carbon::parse($post->post_date)->format('Y-m-d') == \Carbon\Carbon::now()->format('Y-m-d') &&
        !$is_shared)
        <div class="btn-container">
            <p><span class="shareable-btn" data-platform="fb">Share To Facebook To Earn</span>
            </p>
            <p><span class="shareable-btn" data-platform="wa">Share To WhatsApp To Earn</span>
            </p>
        </div>
    @endif
@endauth
