<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
</head>
 
@include('elements/header')
 
     <div class="container">
             
            @yield('content')
     </div>
 

@include('elements/footer')

 