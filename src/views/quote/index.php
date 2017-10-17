<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Quote</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Buat Quote</h1>
                <p><strong><a href="/quote/batch-create">Klik sini untuk membuat quote banyak secara bersamaan</a></strong></p>
            </div>
            <div class="col-md-12">
                <form action="/quote/create" method="POST">
                    <div class="form-group">
                        <label for="">Judul Quote</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Isi Quote</label>
                        <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Picture Url</label>
                        <input class="form-control" type="text" name="picture_url">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Buat Quote</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-default table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Picture Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($quotes as $quote): ?>
                        <tr>
                            <td><?= $quote['title'] ?></td>
                            <td><?= $quote['content'] ?></td>
                            <td><?= $quote['picture_url'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>   
</body>
</html>
