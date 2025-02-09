<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>File Upload</title>
</head>

<body>
    <div class="container mt-3">
        <h2>File Upload</h2>
        <hr>

        <form action="{{ url('/file-upload-rename') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="file-name" class="form-label">Nama Gambar</label>
                <input type="text" id="file-name" name="file-name" class="form-control" placeholder="Masukkan Nama File">
                @error('file-name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="berkas" class="form-label">Gambar Profile</label>
                <input type="file" id="berkas" name="berkas" class="form-control">
                @error('berkas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary my-2" type="submit">Upload</button>
        </form>
    </div>
</body>

</html>
