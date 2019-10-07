<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $_ENV["APPSETTING_AppName"] ?></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>

  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Azure - <?php echo $_ENV["APPSETTING_AppName"] ?></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a>
      </nav>
      <a class="btn btn-outline-primary" href="#">
<?php
// LOGIN
if ( isset($_ENV["WEBSITE_AUTH_ENABLED"]) )
{
	if ( isset($_SERVER["HTTP_X_MS_CLIENT_PRINCIPAL_ID"]) )
	{
		echo "<a href='/.auth/logout?post_logout_redirect_uri=/'>Sign out</a>";
	}
	else
	{
		echo "<a href='/.auth/login/facebook'>Log in with Facebook</a>";
	}
}
?>
      </a>
    </div>

    <div class="container">
      <h1 class="cover-heading">Welcome <?=$_SERVER["HTTP_X_MS_CLIENT_PRINCIPAL_NAME"]?></h1>

<?php
// GET PROFILE
if( isset($_SERVER["HTTP_X_MS_CLIENT_PRINCIPAL_ID"]) && $_SERVER["HTTP_X_MS_CLIENT_PRINCIPAL_IDP"]=="facebook" )
{
	$fb_profile_image = file_get_contents("https://graph.facebook.com/me/picture?width=378&height=378&access_token=" . $_SERVER["HTTP_X_MS_TOKEN_FACEBOOK_ACCESS_TOKEN"]);
?>

        <p class="lead">
          <img class="rounded mx-auto d-block" style='width:378px;height:378px;' id='base64image' src='data:image/jpeg;base64, <?=base64_encode($fb_profile_image)?>' /><br>
        </p>

<?php
}
?>
      </div>
    </div>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
      <div class="row">
        <div class="col-6 col-md">
          <h5>Learning</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://docs.microsoft.com/pl-pl/learn/azure/">Wprowadzenie do platformy Azure</a></li>
            <li><a class="text-muted" href="https://docs.microsoft.com/en-us/learn/paths/azure-fundamentals/">Azure fundamentals</a></li>
            <li><a class="text-muted" href="https://www.pluralsight.com/partners/microsoft/azure/">Pluralsight - Rock Your Azure role</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Documentation</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://docs.microsoft.com/pl-pl/azure/">Documentation Index</a></li>
            <li><a class="text-muted" href="https://docs.microsoft.com/pl-pl/azure/app-service/">App Service</a></li>
            <li><a class="text-muted" href="https://docs.microsoft.com/pl-pl/dotnet/azure/?view=azure-dotnet">Azure for .NET developers</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Try for free</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://azure.microsoft.com/pl-pl/free/">Start for Free</a></li>
            <li><a class="text-muted" href="https://azure.microsoft.com/pl-pl/free/students/">Azure for Students</a></li>
            <li><a class="text-muted" href="https://azure.microsoft.com/pl-pl/free/free-account-faq/">Free Services</a></li>
          </ul>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
