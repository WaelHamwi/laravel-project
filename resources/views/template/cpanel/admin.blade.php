@include('template.cpanel.header')
@include('template.cpanel.navbar')
<div id="content" class="row">
    @yield("content")
</div>
@include('template.cpanel.footer')