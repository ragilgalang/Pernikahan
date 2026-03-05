<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Saran - Wedding Organizations</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --rose-dark: #8a3047;
            --rose-main: #d13d6a;
            --rose-light: #f9d8e4;
            --text-bastille: #2d2d2d;
        }
        body {
            font-family: 'DM Sans', sans-serif;
            background: #fff5f8;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .suggestion-card {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 500px;
            border: 1px solid var(--rose-light);
        }
        h1 {
            font-family: 'Playfair Display', serif;
            color: var(--rose-dark);
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-bastille);
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--rose-light);
            border-radius: 10px;
            font-family: inherit;
            box-sizing: border-box;
            outline: none;
        }
        textarea {
            resize: none;
        }
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: var(--rose-main);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-submit:hover {
            background: var(--rose-dark);
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            text-align: center;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: var(--rose-main);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="suggestion-card">
        <h1>Kirim Saran</h1>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('suggestions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Subjek (Opsional)</label>
                <input type="text" name="subject" placeholder="Misal: Fitur Baru, Bug, dll">
            </div>
            <div class="form-group">
                <label>Pesan Saran</label>
                <textarea name="message" rows="5" required placeholder="Tuliskan saran atau masukan Anda di sini..."></textarea>
            </div>
            <button type="submit" class="btn-submit">KIRIM SARAN</button>
        </form>
        
        <a href="{{ url()->previous() }}" class="back-link">← Kembali</a>
    </div>
</body>
</html>
