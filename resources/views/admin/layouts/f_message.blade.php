@if(Session::has('flash_message'))

<script>
    
    swal({
  title: " {{Session::get('flash_message')}}",
  text: "This message will close after 4 seconds",
  timer: 4000,
  showConfirmButton: false
});
    
</script>
@endif