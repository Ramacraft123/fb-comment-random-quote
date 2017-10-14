<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Batch Quote</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Buat Quote Batch</h1>
            </div>
            <div class="col-md-12">
                <form action="/quote/batch-create" method="POST">
                    <div class="form-group">
                        <label for="">Masukan data dalam format json</label>
                        <textarea class="form-control" name="quotes" id="" cols="30" rows="10">
[
   {"title": "Kak Seto Berkata", "content":"{nama} jangan kebanyakan micin", "picture_url": "http://www.wowkeren.com/images/photo/kak_seto.jpg"},
   {"title": "Kak Seto Berkata", "content": "hai {nama}, jangan kebanyakan micin", "picture_url": "http://www.wowkeren.com/images/photo/kak_seto.jpg"}
]
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Buat Quote</button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
</body>
</html>