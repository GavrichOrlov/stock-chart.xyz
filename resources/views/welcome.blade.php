<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="無料の見やすい株チャートリアルタイム分析サイト。これから何倍にも上がる可能性がある銘柄が見つかります。今仕込んでおけば、短期間で10、20倍も！" />
        
        <meta name="keywords" content="株ガイド,株チャート,チャート,無料,分析,リアルタイム,サイト,上がる,銘柄" />
        <title>【株ガイド】| 株チャート無料リアルタイム分析サイト</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <script src="https://d3js.org/d3.v5.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!-- Styles -->

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .line {
                fill: none;
                stroke: #ffab00;
                stroke-width: 3;
            }
              
            .overlay {
              fill: none;
              pointer-events: all;
            }

            /* Style the dots by assigning a fill and stroke */
            .dot {
                fill: #ffab00;
                stroke: #fff;
            }
              
              .focus circle {
              fill: none;
              stroke: steelblue;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
            @yield('content')
            </div>
        </div>
    </body>
    
</html>
