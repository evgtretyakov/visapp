<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5 Chart example using Charts Package</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

	<div class="container">

		<h1>Laravel 5 Chart example using Charts Package</h1>

    <div id="chart-div"></div>
      {!! Lava::render('DonutChart', 'IMDB', 'chart-div') !!}

	</div>

</body>

</html>
