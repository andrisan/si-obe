<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway:500,800" rel="stylesheet">
    <style>
        * {
            margin:0;
            padding: 0;
        }
        body{
            background: #233142;

        }
        .sign{
            width: 20%;
            fill: #f95959;
            margin: 100px 40%;
            text-align: left;
            animation: move 3s infinite ease-in-out;
        }

        @keyframes move {
            0% {
                transform: rotateY(0deg);
            }

            10% {
                transform: rotateY(180deg);
            }

            20% {
                transform: rotateY(0deg);
            }

            30% {
                transform: rotateY(180deg);
            }

            /* Finish changes by here */
            50% {
                transform: rotateY(0deg);
            }

            /* Between 20% and 100%, nothing changes */
            100% {
                transform: rotateY(0deg);
            }
        }

        h1{
            margin-top: -100px;
            margin-bottom: 20px;
            color: #facf5a;
            text-align: center;
            font-family: 'Raleway';
            font-size: 90px;
            font-weight: 800;
        }
        h2{
            color: #455d7a;
            text-align: center;
            font-family: 'Raleway';
            font-size: 30px;
            text-transform: uppercase;
        }
    </style>
    <title>
        Not Found | {{ config('app.name') }}
    </title>
</head>
<body>
<use>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000"
         xml:space="preserve" class="sign">
<g><g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)">
        <path d="M4484.3,110v-4339.7h520.2h520.2V110v4339.7h-520.2h-520.2V110z"/>
        <path d="M5821.9,3008.1V1863.7l1569.4,3h1566.5l401.3,475.6c220,258.6,433.9,511.2,469.6,561.8l71.3,86.2l-472.6,579.6l-469.6,582.6H7391.3H5821.9V3008.1z M9222.3,3510.4c208.1-255.6,386.4-481.5,392.3-502.3c8.9-20.8-154.5-240.8-365.6-487.5l-380.5-445.9l-1432.7-3H6000.2v930.4c0,514.2,8.9,942.3,20.8,951.2c8.9,11.9,650.9,20.8,1420.8,20.8h1403L9222.3,3510.4z"/><path d="M560.7,2484.9C308.1,2187.7,100,1935,100,1917.2c0-14.9,208.1-288.3,460.7-603.4l460.7-576.6l1569.4-3h1566.5v1144.4v1144.4H2590.9H1021.4L560.7,2484.9z M3973,1887.5l6-945.2H2546.3H1110.6l-380.5,478.6c-211,261.6-374.5,493.4-368.6,511.2c8.9,20.8,184.3,231.9,392.4,475.6l377.5,437l1414.9-6l1417.8-8.9L3973,1887.5z"/><path d="M5818.9,1492.2c0-74.3-3-434-3-802.5s3-734.2,3-817.4l3-148.6h992.8h992.8l437,475.6l436.9,475.6l-436.9,475.6l-439.9,475.6h-989.8h-992.8L5818.9,1492.2z"/>
    </g></g>
</svg>
</use>
<h1>404</h1>
<h2>
    Page not found
</h2>
</body>
</html>
