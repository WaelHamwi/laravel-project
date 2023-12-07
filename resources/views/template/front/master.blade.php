@include('template.front.header')
@include('template.front.navbar')
<div id="content" class="row">
    @yield("content")
</div>
@include('template.front.footer')