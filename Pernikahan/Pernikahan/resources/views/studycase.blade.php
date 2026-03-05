<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Case: Read Data - Wedding Organizations</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/studycase.css') }}">
</head>
<body>

    <div class="container">
        <a href="{{ route('dashboard') }}" class="back-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Kembali
        </a>

        <header>
            <h1>Read Data Study Case</h1>
        </header>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Venue</th>
                        <th>Pemilik</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($venues as $index => $venue)
                        <tr>
                            <td>{{ $venues->firstItem() + $index }}</td>
                            <td><strong>{{ $venue->name }}</strong></td>
                            <td>{{ $venue->owner }}</td>
                            <td>{{ $venue->location }}</td>
                            <td><span class="badge badge-category">{{ $venue->category }}</span></td>
                            <td>{{ $venue->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination-wrapper">
            {{ $venues->links() }}
        </div>
    </div>

</body>
</html>
