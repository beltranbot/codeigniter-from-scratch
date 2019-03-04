<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #container {
            width: 600px;
            margin: auto;
        }

        table {
            width: 600px;
            margin-bottom: 10px;
        }

        td {
            border-right: 1px solid #aaaaaa;
            padding: 1em;
        }

        td:last-child {
            border-right: none;
        }

        th {
            text-align: left;
            padding-left: 1em;
            background: #cac9c9;
            border-bottom: 1px solid white;
            border-right: 1px solid #aaaaa;
        }

        #pagination a, #pagination strong {
            background: #e3e3e3;
            padding: 3px 7px;
            text-decoration: none;
            border: 1px solid #cac9c9;
            color: #292929;
            font-size: 13px;
        }

        #pagination strong, #pagination a:hover {
            font-weight: normal;
            background: #cac9c9;
        }

    </style>
</head>
<body>

    <div id="container">
        <h1>Super Pagination with Codeigniter</h1>
        <?= $this->table->generate($records) ?>
        <?= $this->pagination->create_links() ?>
    </div>    
</body>
</html>