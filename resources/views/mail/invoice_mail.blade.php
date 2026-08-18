<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'PayStubX') }}</title>
</head>
<style>
    table,
    td,
    th {
        border: 1px solid lightgrey;
        padding: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
</style>

<body>
    <p>Please find attached invoice. </p>
</body>

</html>
