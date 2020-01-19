<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 90;
    }
    /* .main {
        width: 100%;
        overflow: hidden;
    }
    .tab_item {
        display: inline;
    } */
    </style>
</head>
<body>
    <div class="main">
        @foreach ($data_stc as $stc)
            <table width="200" class="tab_item">
                <tr>
                    <td rowspan="2">
                    <img src="{{substr($stc->fish_picture, 1)}}" alt="Paris" style="width:90px">                
                    </td>
                    <td>ID</td>
                    <td>{{Mush::no_reg($stc->id)}}</td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td>{{$stc->fish_size}}</td>
                </tr>
            </table>
        @endforeach
    </div>
</body>
</html>