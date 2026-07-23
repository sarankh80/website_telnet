<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{{ $metaDescription ?? \App\Models\Setting::get('seo_description_en', 'TELNET CO., LTD - High-speed fiber internet & ICT solutions in Cambodia.') }}">
<title>{{ $title ?? \App\Models\Setting::get('seo_title_km', 'TELNET CO., LTD. - អ្នកផ្តល់សេវាអ៉ីនធឺណិត (ISP)') }}</title>

<!-- Google Fonts: Inter & Kantumruy Pro -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Kantumruy+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">

@vite(['resources/css/app.css', 'resources/js/app.js'])
