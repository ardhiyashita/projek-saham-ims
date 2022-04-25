<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title')</title>
    <!-- <link href="{{ asset('assets_edit/css/table-design1.css') }}" rel="stylesheet"/> -->
    <link href="{{ asset('assets_edit/css/table-design2.css') }}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link href="{{ asset('assets_edit/datatables/datatables.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets_edit/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"> -->
</head>
<body>
    @yield('content')
    <script type="text/javascript">
        $(function(){
            $('#keywords').tablesorter(); 
            });
    </script>
</body>
</html>