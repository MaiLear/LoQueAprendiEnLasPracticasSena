<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fetch</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <h1>Hola</h1>
    <br>
    <table id="mi-table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>username</th>
                <th>address</th>
                <th>company</th>
                <th>phone</th>
                <th>website</th>
            </tr>
        </thead>
        <tbody id="t-body">
          
        </tbody>
    </table>
    <template id="template-table">
  <tr>
      <td class="template-table-item1"></td>
      <td class="template-table-item2"></td>
      <td class="template-table-item3"></td>
      <td class="template-table-item4"></td>
    
  </tr>
    </template>

    <script src="{{ asset('/js/fetch.js') }}"></script>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
    let table = new DataTable('#mi-table');
    </script>
</body>

</html>
