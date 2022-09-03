<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once dirname(__FILE__) . '/utils/db.php';

// create table
$conn->query(
    "
    CREATE TABLE IF NOT EXISTS prices
    (
        id INT NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL UNIQUE,
        price int NOT NULL,
        PRIMARY KEY (id)
    )
");

// insert data
$conn->query(
    "
        INSERT INTO 
            prices 
                (name, price) 
        VALUES
            (
                'Apples',
                27
            ),
            (
                'Oranges',
                83
            ),
            (
                'Bananas',
                12
            )
    "
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
    
    <section>
        <table id="table">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Price
                    </th>
                </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>
    </section>

</body>

<style>

    * {
        margin: 0;
        padding: 0;
    }

    section {
        display: flex;
        justify-content: center;
        background-color: whitesmoke;
        height: 100vh;
        overflow: auto;
    }

    table {
        width: 50%;
        margin: 4rem 0 4rem 0;
        border: 1px solid black;
        border-radius: 5px;
    }

    th {
        padding: 1rem;
        background-color: darkgray;
        color: black;
    }

    td {
        text-align: center;
    }

    .even {
        background-color: white;
    }

    .odd {
        background-color: lightgray;
    }

</style>



<script type="text/javascript">

    $(document).ready(function() {


        var data = {
            endpoint: "fetchPrices"
        };

        $.post('https://enistic.loc/api/', data, function(res) {
            
            var data = JSON.parse(res).data;

            var tableBody = document.getElementById('tbody');
            $.each(data, function(i) {

                var name = data[i].name;
                var price = data[i].price;

                var row = document.createElement('tr');
                var nameCol = $('<td />', { text: name }).appendTo(row);
                var priceCol = $('<td />', { text: price }).appendTo(row);

                if (i % 2 > 0) {
                    row.classList.add('odd')
                } else {
                    row.classList.add('even')
                }

                tableBody.append(row);
            })
        })
    })
    
</script>

</html>


