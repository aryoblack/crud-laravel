<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tutorial Laravel 10 untuk Pemula</h3>
                    <h5 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('soals.create') }}" class="btn btn-md btn-success mb-3">TAMBAH SOAL</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Nama Soal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($soals as $soal)
                                <tr>
                                    <td>{{ $soal->nama_soal }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('soals.destroy', $soal->id) }}" method="POST">
                                            <a href="{{ route('soals.show', $soal->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('soals.edit', $soal->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Soal belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $soals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        if (session() - > has("success"))

            toastr.success('{{ session("success") }}', 'BERHASIL!');

        elseif(session() - > has("error"))

        toastr.error('{{ session("error") }}', 'GAGAL!');

        endif
    </script>

</body>

</html>