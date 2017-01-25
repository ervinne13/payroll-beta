<html class="chrome"><head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>{{$pageTitle or config("app.name")}}</title>
        <!-- Favicon-->
        <link rel="icon" href="../../favicon.ico" type="image/x-icon">

        @include("layouts.parts.css")

        @yield("css")

        <script type="text/javascript">
            var baseUrl = '{{url("/")}}';
            
            var globals = {
                reloadRedirectWaitTime: 1200    //  1.2s
            };
        </script>

    </head>

    <body class="theme-light-green ls-closed">

        <!--Page loader displays a loading icon when the page is loading-->
        @include('layouts.parts.page-loader')

        <!-- Overlay is responsible for "darkening" the content view once a sidebar is opened-->
        <div class="overlay"></div>

        @include('layouts.parts.static-topnav')

        <section>            
            @include('layouts.parts.static-sidebar')

            @include('layouts.parts.static-sidebar-right')
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="block-header">                   
                    @yield("content-header")
                </div>

                @yield("content")
            </div>
        </section>        

        @include("layouts.parts.js")

        @yield("js")

    </body>
</html>