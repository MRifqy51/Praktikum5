<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <title>@yield('title', 'Laravel App')</title>
  
  <!-- Tailwind CSS CDN (pastikan versi dan sumber sesuai kebutuhan) -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  
  <!-- Vite JS -->
  @vite('resources/js/app.js')
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body>
  <!-- Navbar atau komponen lain bisa ditempatkan di sini jika perlu -->
  
  <!-- Konten utama akan ditampilkan di sini -->
  @yield('content')

  <!-- Tambahkan JS tambahan jika perlu -->
</body>

</html>
