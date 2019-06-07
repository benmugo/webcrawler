<?php include("admin/include/connection.php");?>

<?php
include_once ('function.php');


if($_POST['type'] != '')
{
$propertyname=$_POST['propertyname'];
$type=$_POST['type'];
$location=$_POST['location'];
$pricing=$_POST['pricing'];
$area=$_POST['area'];
}
else
{
$propertyname=$_GET['propertyname'];
$type=$_GET['type'];
$location=$_GET['location'];
$pricing=$_GET['pricing'];
$area=$_GET['area'];
$search=$_GET['search'];
}
$urlid='propertyname='.$propertyname.'&type='.$type.'&location='.$location.'&pricing='.$pricing.'&area='.$area.'';
if($propertyname == '')
{
$namestatement=null;
}
else
{
$namestatement="and  `property_title` like '%$propertyname%' ";
}
if($location == '')
{
$locationstatement=null;
}
else
{
$locationstatement="and `location`='$location'";
}
//// start allprice
if($pricing == 'allprice')
{
$pricestatement=null;
}
else if($pricing == 'smallerthan300000')
{
$pricestatement="and `price` between '0' and '300000'";
}
else if($pricing == 'between300000and500000')
{
$pricestatement="and `price` between '300000' and '500000'";
}
else if($pricing == 'between500000and800000')
{
$pricestatement="and `price` between '500000' and '800000'";
}
else if($pricing == 'between800000and1000000')
{
$pricestatement="and `price` between '800000' and '1000000'";
}
else
{
$pricestatement="and `price` > '1000000'";
}
////end pricing
if($area == 'allarea')
{
$pricearea=null;
}
else if($area == 'smallerthan60')
{
$pricearea="and `area` between '0' and '60'";
}
else if($area == 'between60and90')
{
$pricearea="and `area` between '60' and '90'";
}
else if($area == 'between90and150')
{
$pricearea="and `area` between '90' and '150'";
}
else if($area == 'between150and240')
{
$pricearea="and `area` between '150' and '240'";
}
else if($area == 'between240and360')
{
$pricearea="and `area` between '240' and '360'";
}
else if($area == 'between360and480')
{
$pricearea="and `area` between '360' and '480'";
}
else if($area == 'between480and600')
{
$pricearea="and `area` between '480' and '600'";
}
else
{
$pricearea="and `area` > '600'";
}



$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;

        //to make pagination
       $statement="`properties` where `active`='1' and `block`='0' and `agent_block`='0' ".$namestatement." and `type`='$type' ".$locationstatement." ".$pricestatement." ".$pricearea."";
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
<link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5.js"></script>
    <![endif]-->

    <!-- styles for IE -->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />
    <![endif]-->

  </head>
  <body>

<?php include("include/header.php");?>
        <!-- Section Title -->
        <div class="section_title properties">
            <div class="container">
                <div class="row-fluid">
                    <div class="span6">
					<?php
					if($search == 1)
					{
					echo '<h1>For Sale

                        </h1>';
					}
					else if($search == 2)
					{
					echo '<h1>For Rent

                        </h1>';
					}
					else
					{
					echo '<h1>Search Porperty

                        </h1>';
					}
					?>

                    </div>
                </div>
            </div>
        </div>
            <!-- End Section Title -->


        <!-- End content info -->
        <section class="container content_info">



            <section class="row-fluid padding_top">
                <!-- Aside -->
                <aside class="span4">
                    <!-- Search Advance -->
                    <div class="search_advance">
                            <div class="row-fluid">
                                <ul class="tabs_services">
                                   <li><a id="1" class="switcher set2">For Sale</a></li>
                                    <li><a id="2" class="switcher set2">For Rent</a></li>
                                </ul>

                                <div class="clearfix"></div>
                                <div class="switcher-panel"></div>

                                <!-- 1-content -->
                                <div id="1-content" class="switcher-content set2 show">
                                    <div class="search_box">
                                         <form action="property_search.php" method="post">
                                            <div class="">
                                                <label>Search</label>
                                                <input type="text" name="propertyname"  size="20">
												<input type="hidden" name="type" value="1">
                                            </div>
                                            <div class="">
                                                <label>Location</label>
                                                 <select name="location">
												<option value="">View all</option>
												<?php
								$selectlocation=mysql_query("select DISTINCT location from `properties` where `type`='1' and `active`='1' and `block`='0' and `agent_block`='0'");
												while($selectarraylocation=mysql_fetch_array($selectlocation))
												{


                  echo '<option value='.$selectarraylocation['location'].'>'.$selectarraylocation['location'].'</option>';


}
?>
                                                 </select>
                                            </div>
                                            <div class="">
                                                <label>Price Range</label>
                                                <select name="pricing">
                                                      <option value="allprice">View all</option>
                                                      <option value="smallerthan300000">0 - 30000</option>
                                                      <option value="between300000and500000">30001 - 50000</option>
                                                      <option value="between500000and800000">50001 - 80000</option>
                                                      <option value="between800000and1000000">80000 - 100000</option>
                                                      <option value="biggerthan100000">100000 +</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <label>Area</label>
                                                <select name="area">
                                                    <option value="allarea">View all</option>
                                                    <option value="smallerthan60">0 - 60 m²</option>
                                                    <option value="between60and90">60 m² - 90 m²</option>
                                                    <option value="between90and150">90 m² - 150 m²</option>
                                                    <option value="between150and240">150 m² - 240 m²</option>
                                                    <option value="between240and360">240 m² - 360 m²</option>
                                                    <option value="between360and480">360 m² - 480 m²</option>
                                                    <option value="between480and600">480 m² - 600 m²</option>
                                                    <option value="biggerthan600">More 600 m²</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <input type="submit" class="button" value="Search">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End 1-content -->

                                <!-- 2-content -->
                                <div id="2-content" class="switcher-content set2">
                                   <div class="search_box">
                                       <form action="property_search.php" method="post">
                                            <div class="">
                                                <label>Search</label>
                                               <input type="text" name="propertyname"  size="20">
												<input type="hidden" name="type" value="2">
                                            </div>
                                            <div class="">
                                                <label>Location</label>
                                                <select name="location">
												<option value="">View all</option>
												<?php
												$selectlocation=mysql_query("select DISTINCT location from `properties` where `type`='2' and `active`='1' and `block`='0' and `agent_block`='0'");
												while($selectarraylocation=mysql_fetch_array($selectlocation))
												{


                  echo '<option value='.$selectarraylocation['location'].'>'.$selectarraylocation['location'].'</option>';


}
?>
                                                 </select>
                                            </div>
                                            <div class="">
                                                <label>Price Range</label>
                                               <select name="pricing">
                                                      <option value="allprice">View all</option>
                                                    <option value="smallerthan300000">0 - 300.000</option>
                                                    <option value="between300000and500000">300.000 - 500.000</option>
                                                    <option value="between500000and800000">500.000 - 800.000</option>
                                                    <option value="between800000and1000000">800.000 - 1.000.000</option>
                                                    <option value="biggerthan1000000">10.000.000 +</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <label>Area</label>
                                                <select name="area">
                                                    <option value="allarea">View all</option>
                                                    <option value="smallerthan60">0 - 60 m²</option>
                                                    <option value="between60and90">60 m² - 90 m²</option>
                                                    <option value="between90and150">90 m² - 150 m²</option>
                                                    <option value="between150and240">150 m² - 240 m²</option>
                                                    <option value="between240and360">240 m² - 360 m²</option>
                                                    <option value="between360and480">360 m² - 480 m²</option>
                                                    <option value="between480and600">480 m² - 600 m²</option>
                                                    <option value="biggerthan600">More 600 m²</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <input type="submit" class="button" value="Search">
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End Search Advance -->


<?php
$selectadds=mysql_fetch_array(mysql_query("select * from `adds`"));
?>

                      <div style="width:300px; height:300px;">
                          <p><?php echo $selectadds['add_300_250']; ?></p>
                      </div>
					   <div class="clearfix"></div>








                </aside>
                <!-- End Aside -->

                <div class="span8 full_propertie padding_top">
                     <!-- item_property_h-->
					 <?php
					  $select = mysql_query( "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
						$numproperty=mysql_num_rows($select);

						if($numproperty > 0)
						{
						while(@$row = mysql_fetch_array($select))
						{
						$agent_id=$row['agent_id'];
						$selectagent=mysql_fetch_array(mysql_query("select * from `agent` where `agent_id`='$agent_id'"));
						if($row['active'] == 1 && $row['block'] == 0)
						{
						if($selectagent['active'] == 1 || $agent_id == 0 )
						{
						$property_id=$row['property_id'];
						$selectphoto=mysql_fetch_array(mysql_query("select * from `property_photo` where `property_id`='$property_id' order by `pro_photo_id` asc limit 1"));
						?>
                     <article class="item_property_h">
                        <div class="info_property_h">
                            <h4><a href="property_show.php?id=<?php echo $row['property_id']; ?>"><?php echo $row['property_title'];?></a><span><?php echo $row['location'];?></span></h4>
                            <p><?php echo $row['short_description']; ?>.</p>
                            <div class="line_property"><span>Ksh <?php echo $row['price'];?></span>
							<?php
								if($type == 1)
								{
                                    echo 'FOR SALE';
									}
									else
									{
									echo 'FOR RENT';
									}
									?>
							</div>
                        </div>
                        <div class="image_property_h">
                            <div class="hover_property_h">
                                 <img src="agent/propertypic/<?php echo $selectphoto['photo']; ?>" alt="Image">
                                <div class="info_hover_property_h">
                                    <p><?php echo $row['short_description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </article>
					<?php

					}
							}
							}
							}

					else
							{
							echo '<b> There is no property in your search </b>';

							}

					?>


                   <div><?php  echo pagination($statement,$limit,$page,$urlid);  ?>
      </div>

                </div>

            </section>
        </section>
        <!-- End content info-->

        <!-- sponsors-->
        <div class="sponsors">
              <div class="container">
                  <div class="row-fluid">
                      <div class="span2">

                        </div>
                  </div>
            </div>
        </div>
        <!-- End Sponsors-->



        <?php include("include/footer.php");?>

      <!-- ======================= JQuery libs =========================== -->
        <!-- Always latest version of jQuery-->
        <script src="js/jquery.min.js"></script>
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
            $('#slide').camera({
                height: '650px',
                 navigation: true
             });
        </script>
        </i></i></i>
     <!-- ======================= End JQuery libs =========================== -->

  </body>
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
