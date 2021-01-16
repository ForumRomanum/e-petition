<?php

$routes = [
    [
        'route' => 'my-account',
        'name' => 'account.title'
    ],
    [
        'route' => 'my-petitions',
        'name' => 'account.my-petitions'
    ],
    [
        'route' => 'my-working-copies',
        'name' => 'account.my-working-copies'
    ],
];
?>
<aside>
    <ul>
        @foreach($routes as $link)
            <li>
                <a
                    @if(\Illuminate\Support\Facades\Route::currentRouteName() === $link['route'] ? 'active' : '')
                    class="active"
                    @else
                    href="{{ route($link['route']) }}"
                    @endif
                >@lang($link['name'])</a>
            </li>
        @endforeach
    </ul>
</aside>
<style>
    aside {
        width: 200px;
        border-right: 1px solid #f1f1f1;
    }

    aside ul {
        list-style: none;
    }

    aside ul li {
        height: 30px;
        line-height: 30px;
    }

    aside ul li a {
        text-decoration: none;
        color: #0099cc;
    }

    aside ul li a.active {
        color: #000;
    }

</style>

