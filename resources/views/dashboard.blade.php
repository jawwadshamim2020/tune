@extends('adminlte::page')

@section('title', 'User Dashboard')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content_header')
    <h1>User Dashboard</h1>
@stop

@section('content')
<style>
.i-circle {
    color: #fff;
    padding: 5px 20px;
    border-radius: 50%;
    font-size: 35px;
    border: 2px solid #fff;
}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">		
		$(document).ready(function () {
      

        // $('.inlinesparkline').sparkline('html', {type: 'line', height: '3.5em', width: '20em'}); 

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            
            postData = {
                '_token': CSRF_TOKEN
            };
		      	var url = "{{ URL::to('/getAllUsers') }}";
			
		
            $('.content-grid-loader').show();
            $.ajax({
              url: url,
              type: 'POST',
              data: postData,
              dataType: 'JSON',
              success: function (response) 
              {
                $("#Users").html(response.html);
                //$('.content-grid-loader').hide();
              }
            });
       

    });
</script>      

<div id="Users">Please wait....</div>    
    
     

     

     

    









     

@stop