{{-- resources/views/landing.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Études-Maroc</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>
<body>

  @include('partials.nav')
  <main id="top">
    @include('components.hero')
    @include('components.features')
    @include('components.steps')
    @include('components.testimonials')
    @include('components.faq')
  
    @include('components.contact')
    @include('partials.footer')

   
  </main>

</body>
</html>
