<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>

    <style>
        body {
            font-family: Arial;
            background: #f2f3f7;
            margin: 40px;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 { margin-top: 0; }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 6px 0 15px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }
        button {
            background: #2b6ef6;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background: #1e52c7; }
        ul { padding-left: 20px; }
        li { margin-bottom: 8px; }
    </style>
</head>
<body>

<div class="container">
    <h1>To-Do List</h1>

    <form action="/store" method="POST">
        @csrf

        <label>Judul:</label>
        <input type="text" name="judul" required>

        <label>Keterangan:</label>
        <textarea name="keterangan"></textarea>

        <button type="submit">Simpan</button>
    </form>

    <hr>

    <!-- DAFTAR TODO -->
    <h3>Daftar To-Do:</h3>

    <ul>
    @foreach ($todos as $todo)
        <li>
            <strong>{{ $todo->judul }}</strong> – {{ $todo->keterangan }}

            @if ($todo->selesai)
                ✓ <i>(Selesai: {{ $todo->tanggal_selesai }})</i>
            @endif

            <!-- TOMBOL SELESAI -->
            @if (!$todo->selesai)
                <form action="/todo/{{ $todo->id }}/selesai" method="POST" style="display:inline">
                    @csrf
                    @method('PUT')
                    <button type="submit">Selesai</button>
                </form>
            @endif

            <!-- TOMBOL HAPUS -->
            <form action="/todo/{{ $todo->id }}/hapus" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>

</div>

</body>
</html>
