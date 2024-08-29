<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Bordered Table</h2>
        <p>The .table-bordered class adds borders to a table:</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>mobile</th>
                    <th>rank</th>
                </tr>
            </thead>

            {{-- @php
                dd($data);
            @endphp --}}
            <tbody>

                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $value['id'] }}</td>
                        <td>{{ $value['name'] }}</td>
                        <td>{{ $value['mobile'] }}</td>
                        <td class="my-rank">{{ $value['rank'] }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            const myRank = $('.my-rank');
            $.each(myRank, function(key, value) {
                console.log('key', key);
                console.log('value', value);
                let tmpRank = Number($(this).text());
                console.log('tmpRank', tmpRank);
                if (tmpRank == 2) {
                    let tmpTr = $(this).parent();
                    console.log('tmpTr', tmpTr);
                    tmpTr.find('td').attr('class', 'text-danger');
                }
            });

            // const tr = $('tr');
            // tr.find('td').attr('class', 'text-danger');
            // console.log(tr.find('td'));



        });
    </script>

</body>

</html>
