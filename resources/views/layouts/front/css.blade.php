<!-- ============================================================== -->
<!-- All CSS AND LINKS BELOW  -->
<!-- ============================================================== -->

<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/user-account.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700,800,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;1,400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,600;1,400;1,500&display=swap" rel="stylesheet">
<!-- Compulsory CSS -->
<link href="{{ asset('plugins/vendors/toast-master/css/jquery.toast.css') }}" rel="stylesheet"> 
<style>
.goog-logo-link {
 display:none !important;
} 
 .goog-te-gadget{
     color: transparent !important;
 } 
select.goog-te-combo {
    color: black;
    line-height: 20px;
}
select.goog-te-combo {
    padding-left: 20px;
}
@if(Auth::user()->role == 1)
.story-info.wow.fadeInUp.animated {
    border: solid;
    border-color: #86bc41;
}
.editor-sec {
    border: solid;
    border-color: #86bc41;
}
.btn-xs {
    padding: 10px 15px;
    border-radius: 34px;
    background-color: #86bc41;
    border-color: #86bc41;
    z-index: 999999999;
}
@endif

</style>

