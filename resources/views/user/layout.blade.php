<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>User Information - VUROT Shop</title>
        <meta name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description"
            content="This is an example dashboard (CodeLean) created using build-in elements and components.">

        <!-- Disable tap highlight on IE -->
        <meta name="msapplication-tap-highlight" content="no">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <link href="{{ asset('admin_style/main.css') }}" rel="stylesheet">
        <link href="{{ asset('admin_style/my_style.css') }}" rel="stylesheet">
        <style>
            .error-text {
                color: red;
                font-style: italic;
                font-size: 13px;
            }
        </style>
    </head>
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
            
            <div class="app-header header-shadow">
                <div class="app-header__logo">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                <div class="header__pane ml-auto">
                    <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                            </button>
                    </div>
                </div>
                </div>
                <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
                </div>
                <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                    </button>
                </span>
                </div>
                <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                            <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                            </div>
                            <button class="close"></button>
                    </div>
                </div>
                <div class="app-header-right">
                    <div class="header-dots">
                            <div class="dropdown">
                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
                                class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                        <span class="icon-wrapper-bg bg-primary"></span>
                                        <i class="icon text-primary ion-android-apps"></i>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-plum-plate">
                                        <div class="menu-header-image"
                                            style="background-image: url('assets/images/dropdown-header/abstract4.jpg');">
                                        </div>
                                        <div class="menu-header-content text-white">
                                            <h5 class="menu-header-title">Grid Dashboard</h5>
                                            <h6 class="menu-header-subtitle">Easy grid navigation inside dropdowns</h6>
                                        </div>
                                        </div>
                                </div>
                                <div class="grid-menu grid-menu-xl grid-menu-3col">
                                        <div class="no-gutters row">
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i>
                                                    Automation
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-piggy icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                    </i> Reports
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-config icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                    </i> Settings
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-browser icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                    </i> Content
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-hourglass icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i>
                                                    Activity
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                    class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                    <i
                                                    class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                    </i> Contacts
                                            </button>
                                        </div>
                                        </div>
                                </div>
                                <ul class="nav flex-column">
                                        <li class="nav-item-divider nav-item"></li>
                                        <li class="nav-item-btn text-center nav-item">
                                        <button class="btn-shadow btn btn-primary btn-sm">Follow-ups</button>
                                        </li>
                                </ul>
                            </div>
                            </div>
                    </div>
                    <div class="header-btn-lg pr-0">
                            <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                        <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="{{ asset('admin_style/assets/images/_default-user.png') }}"
                                                    alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                    <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2"
                                                        style="background-image: url('assets/images/dropdown-header/city3.jpg');">
                                                    </div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle"
                                                                            src="{{ asset('admin_style/assets/images/_default-user.png') }}" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">{{ get_data_user('web', 'name') }}</div>
                                                                    {{-- <div class="widget-subheading opacity-8">Something</div> --}}
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <button class="btn-pill btn-shadow btn-shine btn btn-focus"><a href="{{ route('get.logout.user') }}">Logout</a></button>
                                                                </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="scroll-area-x">
                                                    <div class="scrollbar-container ps">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">{{ get_data_user('web', 'about') }}</li>
                                                    </ul>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                        <div class="widget-heading"> {{ get_data_user('web', 'name') }} </div>
                                        <div class="widget-subheading"> User </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
                </div>
            </div>

            {{-- <div class="ui-theme-settings">
                <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                    <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
                </button>
                <div class="theme-settings__inner">
                    <div class="scrollbar-container">
                        <div class="theme-settings__options-wrapper">
                            <h3 class="themeoptions-heading">Layout Options</h3>
                            <div class="p-3">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="switch has-switch switch-container-class"
                                                        data-class="fixed-header">
                                                        <div class="switch-animate switch-on">
                                                            <input type="checkbox" checked data-toggle="toggle"
                                                                data-onstyle="success">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Fixed Header</div>
                                                    <div class="widget-subheading">Makes the header top fixed, always
                                                        visible!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="switch has-switch switch-container-class"
                                                        data-class="fixed-sidebar">
                                                        <div class="switch-animate switch-on">
                                                            <input type="checkbox" checked data-toggle="toggle"
                                                                data-onstyle="success">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Fixed Sidebar</div>
                                                    <div class="widget-subheading">Makes the sidebar left fixed, always
                                                        visible!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="switch has-switch switch-container-class"
                                                        data-class="fixed-footer">
                                                        <div class="switch-animate switch-off">
                                                            <input type="checkbox" data-toggle="toggle"
                                                                data-onstyle="success">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Fixed Footer</div>
                                                    <div class="widget-subheading">Makes the app footer bottom fixed, always
                                                        visible!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="themeoptions-heading">
                                <div> Header Options </div>
                                <button type="button"
                                    class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class"
                                    data-class="">
                                    Restore Default
                                </button>
                            </h3>
                            <div class="p-3">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h5 class="pb-2">Choose Color Scheme</h5>
                                        <div class="theme-settings-swatches">
                                            <div class="swatch-holder bg-primary switch-header-cs-class"
                                                data-class="bg-primary header-text-light"></div>
                                            <div class="swatch-holder bg-secondary switch-header-cs-class"
                                                data-class="bg-secondary header-text-light"></div>
                                            <div class="swatch-holder bg-success switch-header-cs-class"
                                                data-class="bg-success header-text-light"></div>
                                            <div class="swatch-holder bg-info switch-header-cs-class"
                                                data-class="bg-info header-text-light"></div>
                                            <div class="swatch-holder bg-warning switch-header-cs-class"
                                                data-class="bg-warning header-text-dark"></div>
                                            <div class="swatch-holder bg-danger switch-header-cs-class"
                                                data-class="bg-danger header-text-light"></div>
                                            <div class="swatch-holder bg-light switch-header-cs-class"
                                                data-class="bg-light header-text-dark"></div>
                                            <div class="swatch-holder bg-dark switch-header-cs-class"
                                                data-class="bg-dark header-text-light"></div>
                                            <div class="swatch-holder bg-focus switch-header-cs-class"
                                                data-class="bg-focus header-text-light"></div>
                                            <div class="swatch-holder bg-alternate switch-header-cs-class"
                                                data-class="bg-alternate header-text-light"></div>
                                            <div class="divider"></div>
                                            <div class="swatch-holder bg-vicious-stance switch-header-cs-class"
                                                data-class="bg-vicious-stance header-text-light"></div>
                                            <div class="swatch-holder bg-midnight-bloom switch-header-cs-class"
                                                data-class="bg-midnight-bloom header-text-light"></div>
                                            <div class="swatch-holder bg-night-sky switch-header-cs-class"
                                                data-class="bg-night-sky header-text-light"></div>
                                            <div class="swatch-holder bg-slick-carbon switch-header-cs-class"
                                                data-class="bg-slick-carbon header-text-light"></div>
                                            <div class="swatch-holder bg-asteroid switch-header-cs-class"
                                                data-class="bg-asteroid header-text-light"></div>
                                            <div class="swatch-holder bg-royal switch-header-cs-class"
                                                data-class="bg-royal header-text-light"></div>
                                            <div class="swatch-holder bg-warm-flame switch-header-cs-class"
                                                data-class="bg-warm-flame header-text-dark"></div>
                                            <div class="swatch-holder bg-night-fade switch-header-cs-class"
                                                data-class="bg-night-fade header-text-dark"></div>
                                            <div class="swatch-holder bg-sunny-morning switch-header-cs-class"
                                                data-class="bg-sunny-morning header-text-dark"></div>
                                            <div class="swatch-holder bg-tempting-azure switch-header-cs-class"
                                                data-class="bg-tempting-azure header-text-dark"></div>
                                            <div class="swatch-holder bg-amy-crisp switch-header-cs-class"
                                                data-class="bg-amy-crisp header-text-dark"></div>
                                            <div class="swatch-holder bg-heavy-rain switch-header-cs-class"
                                                data-class="bg-heavy-rain header-text-dark"></div>
                                            <div class="swatch-holder bg-mean-fruit switch-header-cs-class"
                                                data-class="bg-mean-fruit header-text-dark"></div>
                                            <div class="swatch-holder bg-malibu-beach switch-header-cs-class"
                                                data-class="bg-malibu-beach header-text-light"></div>
                                            <div class="swatch-holder bg-deep-blue switch-header-cs-class"
                                                data-class="bg-deep-blue header-text-dark"></div>
                                            <div class="swatch-holder bg-ripe-malin switch-header-cs-class"
                                                data-class="bg-ripe-malin header-text-light"></div>
                                            <div class="swatch-holder bg-arielle-smile switch-header-cs-class"
                                                data-class="bg-arielle-smile header-text-light"></div>
                                            <div class="swatch-holder bg-plum-plate switch-header-cs-class"
                                                data-class="bg-plum-plate header-text-light"></div>
                                            <div class="swatch-holder bg-happy-fisher switch-header-cs-class"
                                                data-class="bg-happy-fisher header-text-dark"></div>
                                            <div class="swatch-holder bg-happy-itmeo switch-header-cs-class"
                                                data-class="bg-happy-itmeo header-text-light"></div>
                                            <div class="swatch-holder bg-mixed-hopes switch-header-cs-class"
                                                data-class="bg-mixed-hopes header-text-light"></div>
                                            <div class="swatch-holder bg-strong-bliss switch-header-cs-class"
                                                data-class="bg-strong-bliss header-text-light"></div>
                                            <div class="swatch-holder bg-grow-early switch-header-cs-class"
                                                data-class="bg-grow-early header-text-light"></div>
                                            <div class="swatch-holder bg-love-kiss switch-header-cs-class"
                                                data-class="bg-love-kiss header-text-light"></div>
                                            <div class="swatch-holder bg-premium-dark switch-header-cs-class"
                                                data-class="bg-premium-dark header-text-light"></div>
                                            <div class="swatch-holder bg-happy-green switch-header-cs-class"
                                                data-class="bg-happy-green header-text-light"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="themeoptions-heading">
                                <div>Sidebar Options</div>
                                <button type="button"
                                    class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class"
                                    data-class="">
                                    Restore Default
                                </button>
                            </h3>
                            <div class="p-3">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h5 class="pb-2">Choose Color Scheme</h5>
                                        <div class="theme-settings-swatches">
                                            <div class="swatch-holder bg-primary switch-sidebar-cs-class"
                                                data-class="bg-primary sidebar-text-light"></div>
                                            <div class="swatch-holder bg-secondary switch-sidebar-cs-class"
                                                data-class="bg-secondary sidebar-text-light"></div>
                                            <div class="swatch-holder bg-success switch-sidebar-cs-class"
                                                data-class="bg-success sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-info switch-sidebar-cs-class"
                                                data-class="bg-info sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-warning switch-sidebar-cs-class"
                                                data-class="bg-warning sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-danger switch-sidebar-cs-class"
                                                data-class="bg-danger sidebar-text-light"></div>
                                            <div class="swatch-holder bg-light switch-sidebar-cs-class"
                                                data-class="bg-light sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-dark switch-sidebar-cs-class"
                                                data-class="bg-dark sidebar-text-light"></div>
                                            <div class="swatch-holder bg-focus switch-sidebar-cs-class"
                                                data-class="bg-focus sidebar-text-light"></div>
                                            <div class="swatch-holder bg-alternate switch-sidebar-cs-class"
                                                data-class="bg-alternate sidebar-text-light"></div>
                                            <div class="divider"></div>
                                            <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class"
                                                data-class="bg-vicious-stance sidebar-text-light"></div>
                                            <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class"
                                                data-class="bg-midnight-bloom sidebar-text-light"></div>
                                            <div class="swatch-holder bg-night-sky switch-sidebar-cs-class"
                                                data-class="bg-night-sky sidebar-text-light"></div>
                                            <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class"
                                                data-class="bg-slick-carbon sidebar-text-light"></div>
                                            <div class="swatch-holder bg-asteroid switch-sidebar-cs-class"
                                                data-class="bg-asteroid sidebar-text-light"></div>
                                            <div class="swatch-holder bg-royal switch-sidebar-cs-class"
                                                data-class="bg-royal sidebar-text-light"></div>
                                            <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class"
                                                data-class="bg-warm-flame sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-night-fade switch-sidebar-cs-class"
                                                data-class="bg-night-fade sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class"
                                                data-class="bg-sunny-morning sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class"
                                                data-class="bg-tempting-azure sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class"
                                                data-class="bg-amy-crisp sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class"
                                                data-class="bg-heavy-rain sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class"
                                                data-class="bg-mean-fruit sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class"
                                                data-class="bg-malibu-beach sidebar-text-light"></div>
                                            <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class"
                                                data-class="bg-deep-blue sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class"
                                                data-class="bg-ripe-malin sidebar-text-light"></div>
                                            <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class"
                                                data-class="bg-arielle-smile sidebar-text-light"></div>
                                            <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class"
                                                data-class="bg-plum-plate sidebar-text-light"></div>
                                            <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class"
                                                data-class="bg-happy-fisher sidebar-text-dark"></div>
                                            <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class"
                                                data-class="bg-happy-itmeo sidebar-text-light"></div>
                                            <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class"
                                                data-class="bg-mixed-hopes sidebar-text-light"></div>
                                            <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class"
                                                data-class="bg-strong-bliss sidebar-text-light"></div>
                                            <div class="swatch-holder bg-grow-early switch-sidebar-cs-class"
                                                data-class="bg-grow-early sidebar-text-light"></div>
                                            <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class"
                                                data-class="bg-love-kiss sidebar-text-light"></div>
                                            <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class"
                                                data-class="bg-premium-dark sidebar-text-light"></div>
                                            <div class="swatch-holder bg-happy-green switch-sidebar-cs-class"
                                                data-class="bg-happy-green sidebar-text-light"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu"><br>
                                <li class="{{ \Request::route()->getName() == 'user.dashboard' ? 'mm-active' : '' }}">
                                    <a href="{{ route('user.dashboard') }}">
                                        <i class="metismenu-icon pe-7s-home"></i>Home
                                    </a>
                                </li>
                                <li class="{{ \Request::route()->getName() == 'user.update.info' ? 'mm-active' : '' }}">
                                    <a href="{{ route('user.update.info') }}">
                                        <i class="metismenu-icon pe-7s-user"></i>Your information
                                    </a>
                                </li>
                                <li class="{{ \Request::route()->getName() == 'user.update.password' ? 'mm-active' : '' }}">
                                    <a href="{{ route('user.update.password') }}">
                                        <i class="metismenu-icon pe-7s-key"></i>Update Password
                                    </a>
                                </li>
                                <li class="{{ \Request::route()->getName() == 'user.product' ? 'mm-active' : '' }}">
                                    <a href="{{ route('user.product') }}">
                                        <i class="metismenu-icon pe-7s-cart"></i>Selling products
                                    </a>
                                </li>
                                 {{-- <ul>
                                       <li>
                                             <a href="{{ route('user.dashboard') }}" class="{{ \Request::route()->getName() == 'user.dashboard' ? 'mm-active' : '' }}">
                                             <i class="metismenu-icon"></i>Home
                                             </a>
                                       </li>
                                       <li>
                                             <a href="{{ route('user.update.info') }}" class="{{ \Request::route()->getName() == 'user.update.info' ? 'mm-active' : '' }}">
                                             <i class="metismenu-icon"></i>Your information
                                             </a>
                                       </li>
                                       <li>
                                             <a href="{{ route('user.update.password') }}" class="{{ \Request::route()->getName() == 'user.update.password' ? 'mm-active' : '' }}">
                                             <i class="metismenu-icon"></i>Update Password
                                             </a>
                                       </li>
                                       <li>
                                             <a href="{{ route('user.product') }}" class="{{ \Request::route()->getName() == 'user.product' ? 'mm-active' : '' }}">
                                             <i class="metismenu-icon"></i>Selling products
                                             </a>
                                       </li>
                                 </ul> --}}
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="margin-top: 20px">
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible" style="position: fixed; right: 20px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-bottom: 8px">&times;</a>
                        <strong>Success!</strong> {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('danger'))
                    <div class="alert alert-danger alert-dismissible" style="position: fixed; right: 20px">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-bottom: 2px">&times;</a>
                        <strong>Error!</strong> {{ Session::get('danger') }}
                    </div>
                    @endif
   
                    @yield('content')
               </main>
            </div>
        </div>
        
        
        <script src="{{ asset('admin_style/assets/scripts/jquery-3.2.1.min.js') }}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="{{ asset('admin_style/assets/scripts/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin_style/assets/scripts/my_script.js') }}"></script>
        @yield('script')
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) 
                {
                var reader = new FileReader();
                reader.onload = function (e) {
                        $('#out_img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                }
            }
            $('#input_img').change(function(){
                readURL(this);
            });
        </script>
        
    </body>
</html>