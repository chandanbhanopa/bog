<?php
include "../includes/config.php";

if(isset($_POST['login'])) {
	$userName = $conn->real_escape_string($_POST['username']);
	$password = $conn->real_escape_string($_POST['password']);
	$validationMessage = [];
	$validationMessage['username'] = "";
	$validationMessage['password'] = "";
	$validationMessage['isValid'] = 1;
	$validationMessage['pageerror'] = "";

	if($userName == "") {
		$validationMessage['isValid'] = 0;
		$validationMessage['username'] = "Please enter username";
	}

	if($password == "") {
		$validationMessage['isValid'] = 0;
		$validationMessage['password'] = "Please enter your password";
	}

	if($validationMessage['isValid']) {
		/* Redirect browser */

		$sql = "SELECT * FROM admin_accounts WHERE user_name= '".$userName."' AND password = '".md5($password)."' ";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$user = $result->fetch_assoc();
			if($user['id'] > 0) {
				$_SESSION['user_data'] = $user;
				header("Location: dashboard.php"); 
				exit();
			} else {
				$validationMessage['pageerror'] = "Invalid Username or password";
			}
		} else {
			$validationMessage['pageerror'] = "Invalid Username or password";
		}
		$conn->close();
	}
} else {
	if(isset($_SESSION['user_data'])){
		header("Location: dashboard.php"); 
		exit();	
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/page_title.php";?>
</head>
<body>
    <!-- END nav -->
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-30 w-36" src="../images/logo.jpg" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Admin Login</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
		<div class="bg-red-200 rounded-lg flex justify-center text-xl" >
			<?php echo isset($validationMessage['pageerror']) ? $validationMessage['pageerror'] : ""; ?>
		</div>
    <form class="space-y-6 needs-validation" novalidate action="<?=$_SERVER['PHP_SELF'];?>" 
    	method="POST">
      <div>
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        <div class="mt-2">
          <input id="username" name="username" type="text" autocomplete="username"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          <span class="text-pink-700"><?php echo isset($validationMessage['password']) ? $validationMessage['password'] : '' ?></span>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          <span class="text-pink-700"><?php echo isset($validationMessage['password']) ? $validationMessage['password'] : '' ?></span>
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" name="login">Sign in</button>
      </div>
    </form>
  </div>
</div>
</body>
</html>