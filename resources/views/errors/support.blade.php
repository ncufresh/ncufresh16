<!DOCTYPE html>
<html>
    <head>
        <title>瀏覽器不支援</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }

            /* QQ */
            .box {
                margin-bottom: 3em;
            }
            a:link, a:visited, a:hover, a:active {
        			  text-decoration:none;
                color:#212121;
            }
        		a.btn {
          			background: #34414a;
          			border-radius: 5px;
          			border: 2px solid;
          			border-top-color: #eee;
          			border-left-color: #eee;
          			border-right-color: #949596;
          			border-bottom-color: #949596;
          			color: #ffffff;
          			font-size: 1.5em;
          			padding: 0.5em 1em 0.5em 1em;
        		}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">我們不支援您的瀏覽器.....</div>
                <div class="box">
                    <a class="btn" href="https://www.google.com.tw/chrome/browser/desktop/">下載Google Chrome</a>
                    <a class="btn" href="http://mozilla.com.tw/firefox/new/">下載Mozilla Firefox</a>
                    <a class="btn" href="http://www.opera.com/zh-tw">下載Opera</a>
                </div>
                <div class="box">
                    <h3>您的瀏覽器：{{ $browser = \Agent::browser() }}</h3>
                    <h3>版本為：{{ $version = \Agent::version($browser) }}</h3>
                    <a href="https://www.microsoft.com/zh-tw/download/internet-explorer.aspx">下載Internet Explorer(請下載IE10以上之版本)</a>
                    <h2>如果有任何問題， 歡迎向我們反應</h2>
                    <h2>Email: ncufreshweb@gmail.com</h2>
                    <h2>
                        Facebook: <a href="https://www.facebook.com/groups/NCUgroup/">2016 嶄．望 中央大學</a>私訊管理員
                    </h2>
                </div>
            </div>
        </div>
    </body>
</html>
