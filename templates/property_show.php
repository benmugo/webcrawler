<?php include("agent/include/connection.php"); ?>
<?php
$id=$_GET['id'];
$selectproperty=mysql_fetch_array(mysql_query("select * from `properties` where
 `property_id`='$id'"));
  $agent_id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Real State</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Your styles -->
    <link href="css/style.css" rel="stylesheet" media="screen">
	<link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">


  

  </head>
  <body>
        <!-- Login Client -->



        <!-- End Login Client -->

        <!-- Info Head -->

        <!-- Info Head -->

        <!-- Nav-->
        <?php include("include/header.php"); ?>
        <!-- End Nav-->

           <!-- Section Title -->
        <div class="section_title properties">
            <div class="container">
                <div class="row-fluid">
                    <div class="span9">
                        <h1>
                            <span><?php echo $selectproperty['property_title']; ?></span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Section Title -->

        <!-- End content info -->
        <section class="container content_info">
            <div class="row-fluid padding_top">
                <div class="span8">
                    <!-- Slide News-->
                    <div class="camera_wrap" id="slide_details">
                        <!-- Item Slide -->

                        <?php

			$selectphoto=mysql_query("select * from `property_photo` where `property_id`='$id'");
			while($selectarrayphoto=mysql_fetch_array($selectphoto))
			{
						?>
                <div  data-src="agent/propertypic/<?php echo $selectarrayphoto['photo']; ?>">
                            <div class="camera_property fadeFromBottom">
               <a href="#"><h4><?php echo $selectproperty['property_title']; ?></h4></a>
                                <h1><span>Ksh </span>  <?php echo $selectproperty['price']; ?></h1> <p>
                                <?php echo $selectproperty['short_description']; ?>
                                </p>
                            </div>
                        </div>
                        <?php
			}
						?>

                    </div>
                    <!-- End Slide-->
                </div>
                <div class="span4">
                    <div class="description">
                        <h4><?php echo $selectproperty['property_title']; ?></h4>
                        <p><?php echo $selectproperty['short_description']; ?></p>

                        <h4><?php echo $selectproperty['address']; ?></h4>
                        <ul class="info_details">
             <li><strong>Price:</strong><span> Ksh <?php echo $selectproperty['price']; ?> </span></li>
             <li><strong>Location:</strong><span><?php echo $selectproperty['location']; ?> </span></li>
               <li><strong>Area:</strong><span><?php echo $selectproperty['area']; ?></span></li>
                <li><strong>Address:</strong><span><?php echo $selectproperty['address']; ?></span></li>
              <li><strong>Bathrooms:</strong><span><?php echo $selectproperty['bathrooms']; ?></span></li>
                   <li><strong>Bedrooms:</strong><span><?php echo $selectproperty['bedrooms']; ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row-fluid padding_top">
                <!--NAV TABS-->
                <ul class="tabs">
                    <li><a href="#tab1">More Details</a></li>
                    <li><a href="#tab2">Contact Agent</a></li>
                    <li><a href="#tab3">Map Location</a></li>
                </ul>
                <?php
	$selectfeature=mysql_fetch_array(mysql_query("select * from `general_features` where `property_id`='$id'"));
				?>
                <!--CONTAINER TABS-->
                <div class="tab_container">
                    <!--Tab1 Genral info-->
                    <div id="tab1" class="tab_content">
                        <div class="row-fluid">
                            <div class="span6">
                                <h4>General Features</h4>
                                <div class="row-fluid">
                                    <div class="span4">
                                        <ul class="general_info">
                                        <?php
										if($selectfeature['conditioning'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> Air conditioning</li>
                                            <?php
										}
										else
										{
										?>
										 <li><i class="icon-remove"></i> Air conditioning</li>
										 <?php
										}
											?>
											<?php
										if($selectfeature['balcony'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> Balcony</li>
											   <?php
										}
										else
										{
										?>
										<li><i class="icon-remove"></i> Balcony</li>
										<?php
										}
										?>

                                            <?php
										if($selectfeature['bedding'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> Bedding</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i> Bedding</li>
										<?php
										}
										?>
										<?php
										if($selectfeature['cabletv'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> Cable TV</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i> Cable TV</li>
										<?php
										}
										?>


                                        </ul>
                                    </div>
                                    <div class="span4">
                                        <ul class="general_info">
										<?php
										if($selectfeature['wifi'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> Wifi</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i> Wifi</li>
										<?php
										}
										?>
										<?php
										if($selectfeature['dvd'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> DVD</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i> DVD</li>
										<?php
										}
										?>

                                            <?php
										if($selectfeature['parking'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> Parking</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i> Parking</li>
										<?php
										}
										?>
                                            <?php
										if($selectfeature['computer'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> Computer</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i> Computer</li>
										<?php
										}
										?>

                                        </ul>
                                    </div>
                                    <div class="span4">
                                        <ul class="general_info">
										 <?php
										if($selectfeature['radio'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> Radio</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i> Radio</li>
										<?php
										}
										?>
                                            <?php
										if($selectfeature['terrace'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i> Terrace</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i> Terrace</li>
										<?php
										}
										?>
                                            <?php
										if($selectfeature['useofpool'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i>Use of pool</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i>Use of pool</li>
										<?php
										}
										?>
                                            <?php
										if($selectfeature['microwave'] == 1)
										{

										?>
                                            <li><i class="icon-ok"></i>Microwave</li>
											<?php
											}
										else
										{
											?>
											<li><i class="icon-remove"></i>Microwave</li>
										<?php
										}
										?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                               <?php echo $selectproperty['long_description']; ?>
                            </div>
                        </div>
                    </div>
                    <!--End Tab1 Genral info-->

                    <!--Tab2 Contact Agent-->
                    <div id="tab2" class="tab_content">
                       <div class="row-fluid">

                            <div class="span7">
                                <h4>Contact Agent</h4>
                               <form action="#" method="post" id="formemail"  >
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <input type="text" placeholder="Name" name="name" required>
                                        </div>
                                        <div class="span6">
                                            <input type="email" id="exampleInputEmail1" placeholder="Email"  name="email" >
                                        </div>
                                    </div>
                                    <textarea placeholder="Your Message" name="message" style="width: 95%;
height: 130px;" required></textarea>
                                    <input type="submit" name="submitemail" value="Send Message" class="button">
                                </form>

                                <div class="result"></div>
                            </div>

							<?php
							$agentde=$selectproperty['agent_id'];
							if($agentde == 0)
							{
							$selectuser=mysql_fetch_array(mysql_query("select * from `user`"));
							$adminemail=$selectuser['email'];
							?>
							<div class="span5">
                                 <div class="row-fluid item_agent">
                                    <div class="span4 image_agent">

                                        <img src="admin/logo/<?php echo $selectuser['photo']; ?>" style="height:100px;" alt="Image">


                                    </div>
                                    <div class="span7 info_agent">
                                        <h5><?php echo $selectuser['fullname']; ?></h5>
                                        <ul>
                                            <li><i class="icon-envelope"></i><a href="#"><?php echo $selectuser['email']; ?></a></li>

                                            <li><i class="icon-mobile-phone"></i><a href="#"><?php echo $selectuser['mobile']; ?></a></li>
                                        </ul>
                                    </div>
                                 </div>
                                <p>
								<b>Added by admin site</b>
								</p>
                            </div>
							<?php
							}
							else
							{
							$selectagent=mysql_fetch_array(mysql_query("select * from `agent` where `agent_id`='$agentde'"));
							?>
                            <div class="span5">
                                 <div class="row-fluid item_agent">
                                    <div class="span4 image_agent">
									<?php
									if($selectagent['photo'] == '')
									{
									?>
                                        <img src="img/team/1.jpg" alt="Image">
										<?php
										}
										else
										{
										?>
										<img src="agent/profilepic/<?php echo $selectagent['photo']; ?>" alt="Image">
										<?php
										}
										?>
                                    </div>
                                    <div class="span7 info_agent">
                                        <h5><?php echo $selectagent['fullname']; ?></h5>
                                        <ul>
                                            <li><i class="icon-envelope"></i><a href="#"><?php echo $selectagent['email']; ?></a></li>
                                            <li><i class="icon-phone"></i><a href="#"><?php echo $selectagent['telephone']; ?></a></li>
                                            <li><i class="icon-mobile-phone"></i><a href="#"><?php echo $selectagent['mobile']; ?></a></li>
                                        </ul>
                                    </div>
                                 </div>
                                <p>
								<?php echo $selectagent['description']; ?>
								</p>
                            </div>
							<?php
							}
							?>
                       </div>
                    </div>
                    <!--End Tab2 Contact Agent-->

                    <!--Tab3 Map-->
                    <div id="tab3" class="tab_content map_area">
                     <iframe width="370" height="350" frameborder="0" scrolling="no"
src="



http://maps.google.com/maps
?f=q
&amp;source=s_q
&amp;hl=en
&amp;geocode=
&amp;q=<?php echo $selectproperty['address']; ?>
&amp;near=<?php echo $selectproperty['location']; ?>
&amp;g=
&amp;aq=0
&amp;ie=UTF8
&amp;hq=
&amp;t=m
&amp;ll=<?php echo $selectproperty['longitude']; ?>,<?php echo $selectproperty['latitude']; ?>
&amp;z=12
&amp;iwloc=
&amp;output=embed"
					 ></iframe>
                    </div>
                    <!--End Tab3 Map-->
                </div>
                <!--END CONTAINER TABS-->
            </div>

        </section>
        <!-- End content info-->

        <!-- Footer area - footer_top -->
        <section class="full_info">
            <div class="container">

            <!-- End Title-->
            <div class="row-fluid padding_top_mini">
                  <!-- Item Property-->
				  <?Php
				 $selectproperties=mysql_query("select * from `properties` where  `active`='1' and `block`='0' and `agent_block`='0' ORDER BY RAND() limit 4");
				 while($selectarrayproperty=mysql_fetch_array($selectproperties))
				 {

				 $property_id=$selectarrayproperty['property_id'];
				 $selectphoto=mysql_fetch_array(mysql_query("select * from `property_photo` where `property_id`='$property_id'"));
				  ?>
                  <div class="span3">
                      <div class="item_property">
                          <div class="head_property">
						  <?php
						  if($selectarrayproperty['type'] == 1)
						  {
						  echo '<div class="title sale"></div>';
						  }
						  else
						  {
						  echo '<div class="title rent"></div>';
						  }
						  ?>

                              <img src="agent/propertypic/<?php echo $selectphoto['photo']; ?>" alt="Image">
                              <h5 ><a style="height:150px;" href="property_show.php?id=<?php echo $property_id; ?>"><span ><?php echo $selectarrayproperty['property_title']; ?></span></a></h5>
                          </div>
                          <div class="info_property">
                              <ul>
                                  <li class=""><strong>Place </strong><span><?php echo $selectarrayproperty['location']; ?></span></li>
                                  <li><strong>Price</strong><span>Ksh<?php echo $selectarrayproperty['price']; ?></span></li>
                              </ul>
                          </div>
                        </div>
                   </div>
				   <?php
				   }
				   ?>








                </div>
            </div>
        </section>
        <!-- End Footer area - footer_top -->




        <?php include("include/footer.php");?>


      <!-- ======================= JQuery libs =========================== -->
        <!-- Always latest version of jQuery-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <!--Nav-->
        <script type="text/javascript" src="js/nav/tinynav.js"></script>
        <script type="text/javascript" src="js/nav/superfish.js"></script>
        <!--efect_switcher-->
        <script type='text/javascript' src='js/efect_switcher/jquery.content-panel-switcher.js'></script>
        <!--Totop-->
        <script type="text/javascript" src="js/totop/jquery.ui.totop.js" ></script>
        <!--Slide-->
        <script type="text/javascript" src="js/slide/camera.js" ></script>
        <script type='text/javascript' src='js/slide/jquery.easing.1.3.min.js'></script>
        <!--Ligbox-->
        <script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.1.js"></script>
        <!-- Bootstrap.js-->
        <script src="js/bootstrap.js"></script>
        <!--fUNCTIONS-->
        <script type="text/javascript" src="js/jquery-func.js"></script>
		 <script src="jGrowl/jquery.jgrowl.js"></script>
        <!--Run Slide Home-->
        <script type="text/javascript">
            $('#slide_details').camera({
                height: '59%',
                 navigation: true
             });
        </script>
		<script>
  $(document).ready(function(e) {
    $("#formemail").submit(function (e) {
        var sEmail = $('#exampleInputEmail1').val();
        if ($.trim(sEmail).length == 0) {


$.jGrowl('Please enter valid email address', { header: 'Email' });

            e.preventDefault();
        }
        else if (validateEmail(sEmail) == false) {
            $.jGrowl('Invalid Email Address', { header: 'Email' });
			e.preventDefault();
        }

    });
});

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}
</script>
     <!-- ======================= End JQuery libs =========================== -->

  </body>
  <?php
								if(isset($_POST['submitemail']))
								{
								$name=$_POST['name'];
								$email=$_POST['email'];
								$message=$_POST['message'];
								if($agentde == 0)
								{
								$to=$adminemail;
								}
								else
								{
		$to=$selectagent['email'];
}
							$msg="Name :".$name."email :".$email."\n".$message;

  $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To:'.$to. "\r\n";
$headers .= 'From: '.$email.' <'.$email.'>' . "\r\n";
$headers .= 'Cc: '.$email.'' . "\r\n";
$headers .= 'Bcc: '.$email.'' . "\r\n";

  mail($to,'new message',$msg,$headers);
  echo"
<script>
$(function() {
$.jGrowl('Email has been sucessfully', { header: 'Email' });
});
</script>
";
echo "<script>
setTimeout(function(){
  window.location = 'property_show.php?id=".$id."';
}, 2000);
</script>";
								}
								?>

								<?php
if(isset($_POST['login']))
{

	$username=$_POST['username'];
	$password=$_POST['password'];

		$select=mysql_query("SELECT * FROM `agent` where `email`='$username' and `password`='$password'");
			$selectnum=mysql_num_rows($select);





			if ($selectnum > 0)
			{

			$row= mysql_fetch_array($select);

				$id = $row['agent_id'];
				$pass =$row['password'];
				$name =$row['email'];
				$fullname=$row['fullname'];
				if(isset($_POST['remember']))
				{
				    setcookie('cookie','',time()-3600);
					$_SESSION['agentid']= $id;
					$_SESSION['agentname']=$fullname;


					echo "<script>
setTimeout(function(){
  window.location = 'agent/dashboard.php';
}, 0);
</script>";


			}
			else
			{
				$_SESSION['agentid']= $id;
				$_SESSION['agentname']= $fullname;


				echo "<script>
setTimeout(function(){
  window.location = 'agent/dashboard.php';
}, 0);
</script>";



			}
			}

			else
			{
			echo"
<script>
$(function() {
$.jGrowl('Please enter email and password correctly', { header: 'Login' });
});
</script>
";
				echo'
				<script>
				$(document).ready(function() {


setTimeout(function(){
  window.location = "index.php";
}, 2000);

				});
				</script>
				';


			}






}
?>
</html>
