<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Email Checker</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

<body>

<div class="container" id="app">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">

                <router-link to="/" tag="li" exact>
                    <a href="">Home</a>
                </router-link>

                <router-link to="/about" tag="li">
                    <a href="">About</a>
                </router-link>

                <router-link to="/contact" tag="li">
                    <a href="">Contact</a>
                </router-link>

            </ul>
        </nav>
        <h3 class="text-muted">Email Checker</h3>
    </div>

    <router-view></router-view>

    <footer class="footer">
        <p>&copy; {{ Carbon\Carbon::now()->year }} <a href="http://www.tintnaingwin.com">amigo</a>
            <a href="https://www.facebook.com/tintnaingwinn" style="color: #3b5998" target="_blank"><i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i></a>
            <a href="https://twitter.com/tintngwin" target="_blank"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a>
            <a href="https://github.com/tintnaingwinn/email-checker-demo" style="color: #5e5e5e"><i class="fa fa-github fa-lg" aria-hidden="true"></i></a>
        </p>

    </footer>

</div> <!-- /container -->

<script src="{{ mix('js/app.js') }}"></script>

@stack('scripts')

</body>
</html>
