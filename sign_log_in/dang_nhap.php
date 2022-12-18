
<?php include '../header.php';
?>
<div class="container" style="margin-left: 450px;">    
    <div  class="col-md-4">
    <form name="register" class="form-horizontal" id="registration" 
            onsubmit="return checkForm()" method='post' action='thuc_hien_dang_nhap.php'>
    		<fieldset>
    			<legend style="text-align: center;">Đăng nhập</legend>
    			<div class="control-group">
    				<label class="control-label">Tên đăng nhập:</label>
    				<div class="controls">
    					<input class="form-control" type="text" id="username" name="ten_nguoi_dung">
    				</div>
    			</div>
    			<div class="control-group">
    				<label class="control-label">Mật khẩu:</label>
    				<div class="controls">
    					<input class="form-control" type="password" id="password" name="mat_khau">
    				</div>
    			</div>
    			
    			<div class="control-group">
    				<label class="control-label"></label>
    				<div class="controls">
    					<button  type="submit" class="btn btn-success" >Đăng nhập</button>
    				</div>
    			</div>
    		</fieldset>
    	</form>
    </div>
</div>

<script>
function checkForm()
{
     var username = document.forms['register']["username"].value;
     var password = document.forms['register']["password"].value;
     
     if(username == '')
     {
        alert('Bạn phải nhập đầy đủ thông tin người dùng');
        document.forms["register"]["username"].focus();
        return false;
     }
     else if(password == '')
     {
        alert('Bạn phải nhập mật khẩu');
        document.forms["register"]["password"].focus();
        return false;
     }
}
</script>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>
