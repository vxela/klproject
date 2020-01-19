<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body {
        width: 650px;
    }    
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 70;
        height: 100;
    }
    .main {
        width: 650px;
        style="overflow: hidden;
    }
    .tab {
        width: 200px;
        display: inline-block;
        border: #000 1px solid;
        /* float: left; */
    }
    .bx {
        width: 50%;
    }
    </style>
</head>
<body>
    <div class="main">
        @php
            $n = 1;
        @endphp
        @foreach ($data_stc as $stc)
            <div class="tab">
                <div class="img bx">
                    <img src="{{substr($stc->fish_picture, 1)}}">
                </div>
                <div class="bx">
                    <div>
                        <div>d</div>
                        <div>s</div>
                    </div>
                    <div>
                        <div>x</div>
                        <div>y</div>
                    </div>
                </div>
                    {{-- <table width="100%" class="tab_item">
                        <tr>
                            <td rowspan="2">
                            <img src="{{substr($stc->fish_picture, 1)}}">
                            </td>
                            <td>ID</td>
                            <td>{{Mush::no_reg($stc->id)}}</td>
                        </tr>
                        <tr>
                            <td>Size</td>
                            <td>{{$stc->fish_size}}</td>
                        </tr>
                    </table> --}}
            </div>
        @endforeach
    </div>
</body>
</html>