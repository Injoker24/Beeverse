<nav class="navbar navbar-dark sticky-top" style="background-color: var(--blue);">
    <div class="container-fluid pt-2 pb-2">
        <a class="navbar-brand fs-3 fw-bold" href="/">Beeverse</a>
        <div class="d-flex">
            <div class="navbar-nav d-flex flex-row">
                <select name="language" id="language" class="form-control mr-4 p-2">
                    <?php $lang = request()->session()->get('locale'); ?>
                    <option value="/lang/en"
                        {{ $lang != null && $lang == 'en' ? 'selected' : '' }}>English
                    </option>
                    <option value="/lang/id"
                        {{ $lang != null && $lang == 'id' ? 'selected' : '' }}>Bahasa Indonesia
                    </option>
                </select>
                <a class="nav-link pr-4" href="/">@lang('navbar.home')</a>
                @if(Auth::check())
                    <a class="nav-link pr-4" href="/wishlist">@lang('navbar.wishlist')</a>
                    <a class="nav-link pr-4" href="/friend">@lang('navbar.friends')</a>
                    <a class="nav-link pr-4" href="/inventory">@lang('navbar.inventory')</a>
                    <a class="nav-link pr-4" href="/shop">@lang('navbar.shop')</a>
                    <a class="nav-link pr-4" href="/setting">@lang('navbar.settings')</a>
                    <a class="nav-link" href="/logout">@lang('navbar.logout')</a>
                @else
                    <a class="nav-link pr-4" href="/login">@lang('navbar.login')</a>
                    <a class="nav-link" href="/register">@lang('navbar.register')</a>
                @endif
            </div>
        </div>
    </div>
</nav>
