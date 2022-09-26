<p>Share This Sponsor Post To Earn:</p>
@auth
    @if (\Carbon\Carbon::parse($post->post_date)->format('Y-m-d') == \Carbon\Carbon::now()->format('Y-m-d') &&
        !$is_shared)
        <div class="btn-container">
            <p><span class="shareable-btn" data-platform="fb">Facebook Share</span>
            </p>
            <p><span class="shareable-btn" data-platform="wa">Whatsapp Share</span>
            </p>
        </div>
    @endif
@endauth
