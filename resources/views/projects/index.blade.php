<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Список
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead class="thead-dark">

                            <tr>
                                <th>id <a href="/project/list/id/asc">&#9650</a><a href="/project/list/id/desc">&#9660</a></th>
                                <th>Name <a href="/project/list/name/asc">&#9650</a><a href="/project/list/name/desc">&#9660</a></th>
                                <th>URL <a href="/project/list/url/asc">&#9650</a><a href="/project/list/url/desc">&#9660</a></th>
                                <th>Project_key <a href="/project/list/project_key/asc">&#9650</a><a href="/project/list/project_key/desc">&#9660</a></th>
                                <th>Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($projects as $project) {
                                    ?>
                                    <tr>
                                        <td><?=$project->id?></td>
                                        <td><?=$project->name?></td>
                                        <td><?=$project->url?></td>
                                        <td><?=$project->project_key?></td>
                                        <td><a href="/project/delete/<?=$project->id?>" class="btn btn-danger">Удалить</a></td>
                                    </tr>
                                <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
