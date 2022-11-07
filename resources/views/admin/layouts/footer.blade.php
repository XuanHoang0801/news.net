</div>
</div>
</div>
</div>

</div>
<div id="footer">
<div class="footer-body text-center bg-secondary">
<span>@2022 - </span><span>Design by Nguyễn Xuân Hoàng</span>
</div>
</div>
</body>
<script src="admin/js/ckeditor/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

{{-- dropdown sidebar --}}
<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
dropdown[i].addEventListener("click", function() {
this.classList.toggle("active");
var dropdownContent = this.nextElementSibling;
if (dropdownContent.style.display === "block") {
dropdownContent.style.display = "none";
} else {
dropdownContent.style.display = "block";
}
});
}
</script>

<script>
    function chooseFile(fileInput)
    {
      if(fileInput.files && fileInput.files[0])
      {
        var reader = new FileReader();
  
        reader.onload = function (e)
        {
          $('#image').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
  </script>


<script>
    $(document).ready(function(){
      
        $('#theloai').change(function(){
          var idTheLoai = $(this).val();
          $.get("dashboard/ajax/loaitin/" +idTheLoai, function(data){
            // alert(data);
            $("#loaitin").html(data);
          });
        });
    });
    
  </script>
</html>