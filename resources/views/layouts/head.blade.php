<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                {{-- <a class="text-muted" href="#">Subscribe</a> --}}
                <!-- Authentication Links -->
                @guest
                <a class="2 nav-link btn btn-sm btn-outline-secondary d-inline"
                    href="{{ route('login') }}">{{ __('Login') }}</a>

                <a class="nav-link btn btn-sm btn-outline-secondary d-inline"
                    href="{{ route('register') }}">{{ __('Register') }}</a>

                @else
                {{-- <a  class="nav-link btn btn-sm btn-outline-secondary d-inline" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                </a> --}}
                <a class="nav-link btn btn-sm btn-outline-secondary d-inline" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
                <!-- Authentication Links -->

            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="{{ route('welcome') }}">Starlight</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                        viewBox="0 0 24 24" focusable="false">
                        <title>Search</title>
                        <circle cx="10.5" cy="10.5" r="7.5" />
                        <path d="M21 21l-5.2-5.2" />
                    </svg>
                </a>
                {{-- <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a> --}}

            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="{{ route('welcome') }}">Главная</a>
            <a class="p-2 text-muted" href="{{ route('article.index') }}">Все новости</a>
            <a class="p-2 text-muted" href="{{ route('page.about') }}">О нас</a>
            <a class="p-2 text-muted" href="{{ route('page.contacts') }}">Контакты feedback</a>
            @auth
            <a class="p-2 text-muted" href="{{ route('article.create') }}">Добавить статью</a>
            <a class="p-2 text-muted" href="{{ route('page.admin') }}">Админка</a>
            <a class="p-2 text-muted" href="{{ route('page.feedback') }}">Отзывы</a>
            @endauth

        </nav>
    </div>

    @if (Request::path() == 'login' || Request::path() == 'home' || Request::path() == 'register' || Request::path() ==
    'password/reset')

    @else
    <?php //print_r(Request::path()); ?>
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>
    @endif

    @if (Request::path() === '/')
    <h4 class="pb-4 mb-4 font-italic border-bottom">
        Последние новости
    </h4>
    <div class="row mb-2">
        @foreach ($topArticles as $article)
        <div class="col-md-6">
            <div
                class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">World</strong>
                    <h3 class="mb-0">{{ $article->title }}</h3>
                    <div class="mb-1 text-muted">{{ date('d.m.Y', time($article->created_at)) }}</div>
                    <p class="card-text mb-auto">{{ $article->excerpt }}</p>
                    <a href="{{ route('article.show', $article) }}" class="stretched-link">Читать ...</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img width="200" height="250" src='{{ asset("thumbnail/$article->thumbnail") }}' alt="" />
                </div>
            </div>
        </div>
        @endforeach
        @endif


    </div>
</div>