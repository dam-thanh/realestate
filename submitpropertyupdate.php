<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
if (!isset($_SESSION['uemail'])) {
  header("location:login.php");
}
$error = "";
$msg = "";
if (isset($_POST['add'])) {
  $pid = $_GET['pid'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $bhk = $_POST['bhk'];
  $typehouse = $_POST['typehouse'];
  $bed = $_POST['bed'];
  $bath = $_POST['bath'];
  $balc = $_POST['balc'];
  $kitc = $_POST['kitc'];
  $hall = $_POST['hall'];
  $floor = $_POST['floor'];
  $asize = $_POST['asize'];
  $price = $_POST['price'];
  $feature = $_POST['feature'];
  $aimage = $_FILES['aimage']['name'];
  $aimage1 = $_FILES['aimage1']['name'];
  $aimage2 = $_FILES['aimage2']['name'];
  $aimage3 = $_FILES['aimage3']['name'];
  $aimage4 = $_FILES['aimage4']['name'];
  $category = $_POST['category'];
  $uid = $_SESSION['uid'];
  $status = $_POST['status'];
  $fimage = $_FILES['fimage']['name'];
  $fimage1 = $_FILES['fimage1']['name'];
  $fimage2 = $_FILES['fimage2']['name'];
  $totalfloor = $_POST['totalfl'];
  $isFeatured = $_POST['isFeatured'];
  $province = $_POST['province'];
  $wards = $_POST['wards'];
  $district = $_POST['district'];

  $fimage = $_FILES['fimage']['name'];
  $fimage1 = $_FILES['fimage1']['name'];
  $fimage2 = $_FILES['fimage2']['name'];
  $temp_name  = $_FILES['aimage']['tmp_name'];
  $temp_name1 = $_FILES['aimage1']['tmp_name'];
  $temp_name2 = $_FILES['aimage2']['tmp_name'];
  $temp_name3 = $_FILES['aimage3']['tmp_name'];
  $temp_name4 = $_FILES['aimage4']['tmp_name'];

  $temp_name5 = $_FILES['fimage']['tmp_name'];
  $temp_name6 = $_FILES['fimage1']['tmp_name'];
  $temp_name7 = $_FILES['fimage2']['tmp_name'];

  move_uploaded_file($temp_name, "admin/property/$aimage");
  move_uploaded_file($temp_name1, "admin/property/$aimage1");
  move_uploaded_file($temp_name2, "admin/property/$aimage2");
  move_uploaded_file($temp_name3, "admin/property/$aimage3");
  move_uploaded_file($temp_name4, "admin/property/$aimage4");

  move_uploaded_file($temp_name5, "admin/property/$fimage");
  move_uploaded_file($temp_name6, "admin/property/$fimage1");
  move_uploaded_file($temp_name7, "admin/property/$fimage2");
  $sql = "UPDATE property SET 
  title = :title,
  pcontent = :content,
  bhk = :bhk,
  type_id = :typehouse,
  bedroom = :bed,
  bathroom = :bath,
  balcony = :balc,
  kitchen = :kitc,
  hall = :hall,
  floor = :floor,
  size = :asize,
  price = :price,
  feature = :feature,
  pimage = :aimage,
  pimage1 = :aimage1,
  pimage2 = :aimage2,
  pimage3 = :aimage3,
  pimage4 = :aimage4,
  uid = :uid,
  status = :status,
  mapimage = :fimage,
  topmapimage = :fimage1,
  groundmapimage = :fimage2,
  totalfloor = :totalfloor,
  cate_id = :category,
  province_id = :province,
  district_id = :district,
  wards_id = :wards
  WHERE property.pid = $pid;";

  // Chuẩn bị truy vấn
  $stmt = $con->prepare($sql);

  // Gắn các giá trị vào truy vấn
  $stmt->bindParam(':title', $title);
  $stmt->bindParam(':content', $content);
  $stmt->bindParam(':bhk', $bhk);
  $stmt->bindParam(':typehouse', $typehouse);
  $stmt->bindParam(':bed', $bed);
  $stmt->bindParam(':bath', $bath);
  $stmt->bindParam(':balc', $balc);
  $stmt->bindParam(':kitc', $kitc);
  $stmt->bindParam(':hall', $hall);
  $stmt->bindParam(':floor', $floor);
  $stmt->bindParam(':asize', $asize);
  $stmt->bindParam(':price', $price);
  $stmt->bindParam(':feature', $feature);
  $stmt->bindParam(':aimage', $aimage);
  $stmt->bindParam(':aimage1', $aimage1);
  $stmt->bindParam(':aimage2', $aimage2);
  $stmt->bindParam(':aimage3', $aimage3);
  $stmt->bindParam(':aimage4', $aimage4);
  $stmt->bindParam(':uid', $uid);
  $stmt->bindParam(':status', $status);
  $stmt->bindParam(':fimage', $fimage);
  $stmt->bindParam(':fimage1', $fimage1);
  $stmt->bindParam(':fimage2', $fimage2);
  $stmt->bindParam(':totalfloor', $totalfloor);
  $stmt->bindParam(':category', $category);
  $stmt->bindParam(':province', $province);
  $stmt->bindParam(':district', $district);
  $stmt->bindParam(':wards', $wards);

  // Thực hiện truy vấn
  $result = $stmt->execute();

  if ($result) {
    $msg = "<p class='alert alert-success'>Property Inserted Successfully</p>";
  } else {
    $error = "<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta Tags -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="images/favicon.ico">

  <!--	Fonts
	========================================================-->
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

  <!--	Css Link
	========================================================-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/layerslider.css">
  <link rel="stylesheet" type="text/css" href="css/color.css">
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
  <script src="./js/app.js"></script>
  <!--	Title
	=========================================================-->
  <title>Real Estate PHP</title>
</head>

<body>

  <!-- Page Loader
============================================================= -->
  <div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
    <div class="d-flex justify-content-center y-middle position-relative">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>



  <div id="page-wrapper">
    <div class="row">
      <!--	Header start  -->
      <?php include("include/header.php"); ?>
      <!--	Header end  -->

      <!--	Banner   --->
      <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Update Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Update Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
      <!--	Banner   --->


      <!--	Submit property   -->
      <div class="full-row">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="text-secondary double-down-line text-center">Update Property</h2>
            </div>
          </div>
          <div class="row p-5 bg-white">
            <form method="post" enctype="multipart/form-data">

              <?php
              $pid = $_REQUEST['pid'];
              $sql = "SELECT * FROM property
    LEFT JOIN typehouse ON property.type_id = typehouse.type_id
    LEFT JOIN categories ON property.cate_id = categories.cate_id
    WHERE pid = :pid";


              $stmt = $con->prepare($sql);

              // Gắn giá trị cho tham số
              $stmt->bindParam(':pid', $pid, PDO::PARAM_INT);

              // Thực thi truy vấn
              $stmt->execute();

              // Lặp qua kết quả
              while ($row = $stmt->fetch()) {
              ?>

                <div class="description">
                  <h5 class="text-secondary">Basic Information</h5>
                  <hr>
                  <?php echo $error; ?>
                  <?php echo $msg; ?>

                  <div class="row">
                    <div class="col-xl-12">
                      <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Title</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" value="<?php echo $row['title'] ?>" name="title" required placeholder="Enter Title">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Content</label>
                        <div class="col-lg-9">
                          <textarea class="tinymce form-control" name="content" value="<?php echo $row['pcontent'] ?>" rows="10" cols="30"></textarea>
                        </div>
                      </div>

                    </div>
                    <div class="col-xl-6">
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Property Type</label>
                        <div class="col-lg-9">
                          <select class="form-control" name="category">
                            <option value="chọn loại" selected>Chọn loại</option>
                            <?php
                            $query = "SELECT * FROM categories";
                            $result = $con->query($query);

                            if ($result !== false) {
                              while ($category = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $category['cate_id'] . '">' . $category['cate_name'] . '</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Selling Type</label>
                        <div class="col-lg-9">
                          <select class="form-control" name="typehouse">
                            <option value="" selected>Kiểu nhà đất</option>
                            <?php
                            $query = "SELECT * FROM typehouse";
                            $result = $con->query($query);

                            if ($result !== false) {
                              while ($type = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $type['type_id'] . '">' . $type['type_name'] . '</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Bathroom</label>
                        <div class="col-lg-9">
                          <input type="text" value="<?php echo $row['bathroom'] ?>" class="form-control" name="bath" required placeholder="Enter Bathroom (only no 1 to 10)">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Kitchen</label>
                        <div class="col-lg-9">
                          <input type="text" value="<?php echo $row['kitchen'] ?>" class="form-control" name="kitc" required placeholder="Enter Kitchen (only no 1 to 10)">
                        </div>
                      </div>

                    </div>
                    <div class="col-xl-6">
                      <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label">BHK</label>
                        <div class="col-lg-9">
                          <select class="form-control" required name="bhk">
                            <option value="">Select BHK</option>
                            <option value="1 BHK">1 BHK</option>
                            <option value="2 BHK">2 BHK</option>
                            <option value="3 BHK">3 BHK</option>
                            <option value="4 BHK">4 BHK</option>
                            <option value="5 BHK">5 BHK</option>
                            <option value="1,2 BHK">1,2 BHK</option>
                            <option value="2,3 BHK">2,3 BHK</option>
                            <option value="2,3,4 BHK">2,3,4 BHK</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Bedroom</label>
                        <div class="col-lg-9">
                          <input value="<?php echo $row['bedroom'] ?>" type="text" class="form-control" name="bed" required placeholder="Enter Bedroom  (only no 1 to 10)">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Balcony</label>
                        <div class="col-lg-9">
                          <input value="<?php echo $row['balcony'] ?>" type="text" class="form-control" name="balc" required placeholder="Enter Balcony  (only no 1 to 10)">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Hall</label>
                        <div class="col-lg-9">
                          <input value="<?php echo $row['hall'] ?>" type="text" class="form-control" name="hall" required placeholder="Enter Hall  (only no 1 to 10)">
                        </div>
                      </div>

                    </div>
                  </div>
                  <h5 class="text-secondary">Price & Location</h5>
                  <hr>
                  <div class="row">
                    <div class="col-xl-6">
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Floor</label>
                        <div class="col-lg-9">
                          <select class="form-control" required name="floor">
                            <option value="">Select Floor</option>
                            <option value="1st Floor">1st Floor</option>
                            <option value="2nd Floor">2nd Floor</option>
                            <option value="3rd Floor">3rd Floor</option>
                            <option value="4th Floor">4th Floor</option>
                            <option value="5th Floor">5th Floor</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Price</label>
                        <div class="col-lg-9">
                          <input value="<?php echo $row['price'] ?>" type="text" class="form-control" name="price" required placeholder="Enter Price">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="province" class="col-lg-3 col-form-label">province</label>
                        <div class="col-lg-9">
                          <select class="form-control" id="province" name="province">
                            <option value="" selected>Chọn thành phố</option>
                            <?php
                            $query = "SELECT * FROM province";
                            $result = $con->query($query);

                            if ($result !== false) {
                              while ($type = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="' . $type['province_id'] . '">' . $type['province_name'] . '</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="wards" class="col-lg-3 col-form-label">Quận/huyện</label>
                        <div class="col-lg-9">
                          <select id="wards" class="form-control" name="wards">
                            <option value="" selected>Chọn Phường/xã</option>

                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Total Floor</label>
                        <div class="col-lg-9">
                          <select class="form-control" required name="totalfl">
                            <option value="">Select Floor</option>
                            <option value="1 Floor">1 Floor</option>
                            <option value="2 Floor">2 Floor</option>
                            <option value="3 Floor">3 Floor</option>
                            <option value="4 Floor">4 Floor</option>
                            <option value="5 Floor">5 Floor</option>
                            <option value="6 Floor">6 Floor</option>
                            <option value="7 Floor">7 Floor</option>
                            <option value="8 Floor">8 Floor</option>
                            <option value="9 Floor">9 Floor</option>
                            <option value="10 Floor">10 Floor</option>
                            <option value="11 Floor">11 Floor</option>
                            <option value="12 Floor">12 Floor</option>
                            <option value="13 Floor">13 Floor</option>
                            <option value="14 Floor">14 Floor</option>
                            <option value="15 Floor">15 Floor</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Area Size</label>
                        <div class="col-lg-9">
                          <input value="<?php echo $row['size'] ?>" type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="district" class="col-lg-3 col-form-label">Quận/huyện</label>
                        <div class="col-lg-9">
                          <select id="district" class="form-control" name="district">
                            <option value="" selected>Chọn quận/Huyện</option>

                          </select>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Feature</label>
                    <div class="col-lg-9">
                      <p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b>
                        Or <b>No</b> or Details and Do Not Add More Details</p>

                      <textarea class="tinymce form-control" name="feature" rows="10" cols="30">

<?php echo $row['feature']; ?>

</textarea>
                    </div>
                  </div>

                  <h5 class="text-secondary">Image & Status</h5>
                  <hr>
                  <div class="row">
                    <div class="col-xl-6">

                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Image</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage" type="file" required="">
                          <img src="admin/property/<?php echo $row['pimage']; ?>" alt="pimage" height="150" width="180">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Image 2</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage2" type="file" required="">
                          <img src="admin/property/<?php echo $row['pimage2']; ?>" alt="pimage" height="150" width="180">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Image 4</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage4" type="file" required="">
                          <img src="admin/property/<?php echo $row['pimage4']; ?>" alt="pimage" height="150" width="180">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Status</label>
                        <div class="col-lg-9">
                          <select class="form-control" required name="status">
                            <option value="">Select Status</option>
                            <option value="available">Available</option>
                            <option value="sold out">Sold Out</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="fimage1" type="file">
                          <img src="admin/property/<?php echo $row['groundmapimage']; ?>" alt="pimage" height="150" width="180">
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6">

                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Image 1</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage1" type="file" required="">
                          <img src="admin/property/<?php echo $row['pimage1']; ?>" alt="pimage" height="150" width="180">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">image 3</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage3" type="file" required="">
                          <img src="admin/property/<?php echo $row['pimage3']; ?>" alt="pimage" height="150" width="180">
                        </div>
                      </div><!-- FOR MORE PROJECTS visit: codeastro.com -->

                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Floor Plan Image</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="fimage" type="file">
                          <img src="admin/property/<?php echo $row['topmapimage']; ?>" alt="pimage" height="150" width="180">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="fimage2" type="file">
                          <img src="admin/property/<?php echo $row['mapimage']; ?>" alt="pimage" height="150" width="180">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label"><b>Is Featured?</b></label>
                        <div class="col-lg-9">
                          <select class="form-control" required name="isFeatured">
                            <option value="">Select...</option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <input type="submit" value="Submit" class="btn btn-success" name="add" style="margin-left:200px;">

                </div>
            </form>

          <?php
              }
          ?>
          </div>
        </div>
      </div>
      <!--	Submit property   -->

      <!-- FOR MORE PROJECTS visit: codeastro.com -->
      <!--	Footer   start-->
      <?php include("include/footer.php"); ?>
      <!--	Footer   start-->

      <!-- Scroll to top -->
      <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
      <!-- End Scroll To top -->
    </div>
  </div>
  <!-- Wrapper End -->
  <!-- FOR MORE PROJECTS visit: codeastro.com -->
  <!--	Js Link
============================================================-->
  <script src="js/jquery.min.js"></script>
  <script src="js/tinymce/tinymce.min.js"></script>
  <script src="js/tinymce/init-tinymce.min.js"></script>
  <!--jQuery Layer Slider -->
  <script src="js/greensock.js"></script>
  <script src="js/layerslider.transitions.js"></script>
  <script src="js/layerslider.kreaturamedia.jquery.js"></script>
  <!--jQuery Layer Slider -->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/tmpl.js"></script>
  <script src="js/jquery.dependClass-0.1.js"></script>
  <script src="js/draggable-0.1.js"></script>
  <script src="js/jquery.slider.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>