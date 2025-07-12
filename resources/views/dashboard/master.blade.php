@include('dashboard.partials.head')
@include('dashboard.partials.nav-header')
@include('dashboard.partials.chatbox')
 @include('dashboard.partials.header')
@include('dashboard.partials.sidebar')
        <div class="content-body">
			
			@yield('content')
		</div><!-- content-body -->
@include('dashboard.partials.footer')
