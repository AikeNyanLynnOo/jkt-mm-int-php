<?php
session_start();
$response = isset($_SESSION["response"]) ? $_SESSION["response"] : null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../assets/images/logo.jpg" />
  <title>JKT Myanmar International - JAPANESE SCHOOL</title>
  <meta name="description" content="We offer entry-level to business-level Japanese and we also offer conversation courses for those who wish to go to Japan for study or work purposes, or to work in a local Japanese company." />
  <meta name="keywords" content="jkt myanmar, jkt, JKT mm, JKT mm international, Business Counseling, IT, training, language school, Overseas Employment, JKT Myanmar International Co., Ltd., JKT Myanmar International" />
  <meta name="author" content="JKT IT Team" />
  <meta name="title" content="JKT Myanmar International Co., Ltd." />
  <meta name="copyright" content="JKT Myanmar International" />
  <meta name="robots" content="japanese school, follow" />
  <meta name="googlebot" content="jkt myanmar, jkt, JKT mm, JKT mm international, Business Counseling, IT, training, language school, Overseas Employment" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="English" />
  <meta name="revisit-after" content="1 days" />

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>

  <!-- css -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/owl.carousel.css" />
  <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
  <nav class="navbar navbar-light navbar-expand-lg gray-dark float-panel" data-top="0" data-scroll="300">
    <div class="container-fluid mynav">
      <a href="index.html" class="navbar-brand">
        <img src="../assets/images/logo.jpg" alt="" height="50px" width="50px" />
        <span style="font-weight: bolder; font-size: larger; color: #029eff">JKT</span>
        Myanmar International
      </a>
      <a href="index.html" class="small-brand">
        <img src="../assets/images/logo.jpg" alt="" height="50px" width="50px" />
        <span style="font-weight: bolder; font-size: larger; color: #029eff">JKT</span>
        Myanmar International
      </a>
      <a href="index.html" class="icon-brand">
        <img src="../assets/images/logo.jpg" alt="" height="50px" width="50px" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon toggler-icon-color"></span>
      </button>
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto text-sm-start">
          <li class="nav-item">
            <a href="index.html" class="nav-link active"> ホーム </a>
          </li>
          <li class="nav-item">
            <a href="./about.html" class="nav-link active"> 会社情報 </a>
          </li>
          <li class="nav-item">
            <a href="./activities.html" class="nav-link active">
              活動
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./services.html" class="nav-link active" id="serviceNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              サービス <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="serviceNavbarDropdown">
              <a class="dropdown-item" href="./overseas.html">海外での雇用</a>
              <a class="dropdown-item" href="./business.html">ビジネスコンサルタント</a>
              <a class="dropdown-item" href="./announcement.html">ITサービス</a>
              <a class="dropdown-item" href="./announcement.html">旅行サービス</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="./trainings.html" class="nav-link" id="trainingNavbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
              トレーニング <i class="fas fa-angle-down"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="trainingNavbarDropdown">
              <a class="dropdown-item" href="./jp-school.php">日本語学校</a>
              <a class="dropdown-item" href="./announcement.html">職業訓練</a>
              <a class="dropdown-item" href="./announcement.html">人材トレーニング</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="./contact.html" class="nav-link active"> お問い合わせ </a>
          </li>
          <li class="lang">
            <div class="btn-group" role="group" aria-label="First group">
              <a href="../classEnroll.php"><button type="button" class="btn btn1">
                  <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
              <a href="../mm/classEnroll.php"><button type="button" class="btn btn2">
                  <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
              <a href="./classEnroll.php"><button type="button" class="btn btn3" style="background-color: rgba(91, 175, 231, 0.5)">
                  <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
            </div>
          </li>
        </ul>
      </div>
      <div class="btn-group lang-xl" role="group" aria-label="First group">
        <a href="../classEnroll.php"><button type="button" class="btn btn1">
            <img src="../assets/images/icon/ukFlag.png" height="20px" width="25px" /></button></a>
        <a href="../mm/classEnroll.php"><button type="button" class="btn btn2">
            <img src="../assets/images/icon/mmFlag.svg" height="20px" width="25px" /></button></a>
        <a href="./classEnroll.php"><button type="button" class="btn btn3" style="background-color: rgba(91, 175, 231, 0.5)">
            <img src="../assets/images/icon/japanFlag.jpg" height="20px" width="25px" /></button></a>
      </div>
    </div>
  </nav>

  <!-- JP School header start -->
  <section>
    <div class="header">
      <h3>日本語学校 - 登録フォーム</h3>
      <div class="bg-cover"></div>
      <img src="../assets/images/cover/cover.jpg" alt="jpschool-cover" />
    </div>
  </section>
  <!-- JP School header end -->

  <nav aria-label="breadcrumb" class="breadcrumb-nav">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.html">ホーム</a></li>
      <li class="breadcrumb-item"><a href="./trainings.html">トレーニング</a></li>
      <li class="breadcrumb-item"><a href="./jp-school.php">日本語学校</a></li>
      <li class="breadcrumb-item active" aria-current="page">登録フォーム</li>
    </ol>
  </nav>

  <!-- Enrollment Form start -->
  <section>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-8 col-xl-6 text-center p-0 mt-3 mb-2">
          <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <!-- <h2 id="heading">Sign Up Your User Account</h2> -->
            <p class="enroll-description">すべてのフォームフィールドに入力して、次の手順に進みます</p>
            <?php
            if (!empty($response)) {
            ?>
              <form id="enrollmentForm" action="../backend/classEnroll.php" method="POST" enctype="multipart/form-data">
                <!-- progressbar -->
                <ul id="progressbar">
                  <li class="active" id="personal"></li>
                  <li id="payment"></li>
                  <li id="confirm"></li>
                </ul>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div> <br> <!-- fieldsets -->
                <fieldset id="userInformation">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">ユーザー情報:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">ステップ 1 - 3</h2>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">
                        <img id="image-preview" src="../assets/images/default-profile-icon.jpg" alt="user image" />
                      </div>
                      <div class="col-13 col-sm-12 col-md-6 col-lg-7 col-xl-8 file-input">
                        <label class="fieldlabels">写真をアップロードする: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="file" name="photo" class="form-input" id="file-input" />
                      </div>
                      <p class="alert col-12 pb-0"><?php if($response["type"] === "error") echo $response["message"]; ?></p>
                    </div>
                    <input type="hidden" name="courseId" value="<?php if (isset($_SESSION['courseId'])) echo $_SESSION['courseId'] ?>" />
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">名前: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="text" class="form-input" name="uname" id="uname" value="<?php echo $response["data"]["uname"] ?>" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">生年月日: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="date" class="form-input" name="dob" id="dob" required />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">父の名前: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="text" class="form-input" name="fname" id="fname" placeholder="e.g. U Aye" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">全国登録カード: <span class="required-tag">必要 &nbsp; *</span></label>
                        <div class="row">
                          <?php $stateNumberArr = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14"] ?>
                          <!-- <input type="text" class="form-input" name="nrc" id="nrc" placeholder="e.g. Please Enter NRC" required />  -->
                          <div class="col-12 col-sm-10 col-md-10 col-lg-2 col-xl-2">
                            <select name="nrcCode" id="nrcCode" class="form-input nrc">
                              <option value="" selected disabled>State</option>
                              <?php
                              for ($i = 0; $i < count($stateNumberArr); $i++) {
                                echo "<option value='" . $stateNumberArr[$i] . "'>";
                                echo $stateNumberArr[$i];
                                echo "</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-12 col-sm-10 col-md-10 col-lg-5 col-xl-5">
                            <select name="township" id="township" class="form-input nrc">
                              <option value="" selected disabled>Township</option>
                            </select>
                          </div>
                          <div class="col-12 col-sm-10 col-md-10 col-lg-3 col-xl-3">
                            <select name="type" id="type" class="form-input nrc">
                              <option value="" selected disabled>Type</option>
                              <option value="(C)">(C) - (နိုင်)</option>
                              <option value="(AC)">(AC) - (ဧည့်)</option>
                              <option value="(NC)">(NC) - (ပြု)</option>
                              <option value="(V)">(V) - (စ)</option>
                              <option value="(M)">(M) - (သ)</option>
                              <option value="(N)">(N) - (သီ)</option>
                            </select>
                          </div>
                          <div class="col-12 col-sm-10 col-md-10 col-lg-2 col-xl-2">
                            <input type="text" class="form-input nrc" name="nrcNumber" id="nrcNumber" placeholder="123456" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">メール:</label>
                        <input type="email" class="form-input" name="email" id="email" placeholder="abc@gmail.com" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">電話番号: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="text" class="form-input" name="phone" id="phone" placeholder="09..." />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">住所: <span class="required-tag">必要 &nbsp; *</span></label>
                        <textarea name="address" class="form-input" id="address" placeholder="e.g. No.(), (...) Road, (...) City."></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">教育: <span class="required-tag">必要 &nbsp; *</span></label>
                        <textarea name="edu" class="form-input" id="edu" placeholder="e.g. University"></textarea>
                      </div>
                    </div>
                    <input type="button" name="next" id="userInfo" class="next action-button" value="次" />
                </fieldset>
                <!-- <fieldset id="classInformation">
                <div class="form-card">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="enrollForm-title">Class:</h2>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-12">
                      <?php
                      // include_once("../../admin/confs/config.php"); 
                      // $course = "SELECT course_id, c.title AS course_title, c.level as course_level, t.title AS type_title, 
                      //             ct.title AS category_title, sections FROM courses c, types t, categories ct 
                      //             WHERE c.type_id = t.type_id AND c.category_id = ct.category_id";
                      // $course_result = mysqli_query($conn, $course);
                      ?>
                      <span id="selected_option"></span>
                      <label class="fieldlabels">Class Category: <span class="required-tag">required &nbsp; *</span></label>
                      <select name="classId" id="className" class="form-input">
                        <option value="" selected disabled>Choose class</option>
                        <?php
                        // while($row = mysqli_fetch_array($course_result)) { 
                        ?>
                          <option value="<?php // echo $row['course_id'] 
                                          ?>"><?php // echo $row['course_title'] . ' ' . $row['course_level'] . ' (' . $row['type_title'] . ')' 
                                              ?></option>
                        <?php //} 
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-12">
                      <label class="fieldlabels">Class Time: <span class="required-tag">required &nbsp; *</span></label>
                      <select name="classTime" id="classTime" class="form-input">
                        <option value="" selected disabled>Choose class time</option>
                        <option value="12:00~2:00pm">12:00~2:00pm</option>
                        <option value="10:00~12:00pm">10:00~12:00pm</option>
                      </select>
                    </div>
                  </div>
                </div>
                <input type="button" name="next" class="next action-button" value="Next" />
                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
              </fieldset> -->
                <fieldset id="paymentMethod">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">支払い:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">ステップ 2 - 3</h2>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-12">
                        <label class="fieldlabels">お支払い方法を1つ選択してください: <span class="required-tag">必要 &nbsp; *</span></label>
                      </div>
                    </div>
                    <div class="row bank-container">
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="CB banking" />
                          <div class="bank-image" style="background-image: url(../assets/images/banks/CB.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="KBZ banking" />
                          <div class="bank-image" style="background-image: url(../assets/images/banks/kbz.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="AYA banking" />
                          <div class="bank-image" style="background-image: url(../assets/images/banks/AYA.png)"></div>
                        </label>
                      </div>
                    </div>
                    <div class="row bank-container">
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="Kpay" />
                          <div class="bank-image" style="background-image: url(../assets/images/banks/KPAY.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="Cash" />
                          <div class="bank-image in-cash">In Cash <i class="fas fa-money-check"></i></div>
                        </label>
                      </div>
                      <span id="radioMsg"></span>
                    </div>
                  </div>
                  <input type="button" name="next" class="next action-button" value="Next" />
                  <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                </fieldset>
                <fieldset id="success">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">終了:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">ステップ 3 - 3</h2>
                      </div>
                    </div> <br><br>
                    <h2 class="blue-text text-center"><strong>正常に送信されました!</strong></h2> <br>
                    <div class="row justify-content-center">
                      <div class="col-3">
                        <img src="../assets/images/blue-tick.png" class="fit-image">
                      </div>
                    </div> <br><br>
                    <div class="row justify-content-center">
                      <div class="col-7 text-center">
                        <h5 class="blue-text text-center">メールは営業時間内（9：00〜17：00）に送信されます。お支払い情報についてはメールを確認してください。 </h5>
                      </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                      <a href="classEnroll.php" class="back-to-courses">コースを閲覧する</a>
                    </div>
                  </div>
                </fieldset>
              </form>
            <?php } else { ?>

              <form id="enrollmentForm" action="../backend/classEnroll.php" method="POST" enctype="multipart/form-data">
                <!-- progressbar -->
                <ul id="progressbar">
                  <li class="active" id="personal"></li>
                  <li id="payment"></li>
                  <li id="confirm"></li>
                </ul>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div> <br> <!-- fieldsets -->
                <fieldset id="userInformation">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">ユーザー情報:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">ステップ 1 - 3</h2>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">
                        <img id="image-preview" src="../assets/images/default-profile-icon.jpg" alt="user image" />
                      </div>
                      <div class="col-13 col-sm-12 col-md-6 col-lg-7 col-xl-8 file-input">
                        <label class="fieldlabels">写真をアップロードする: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="file" name="photo" class="form-input" id="file-input" />
                      </div>
                      
                    </div>
                    <input type="hidden" name="courseId" value="<?php if (isset($_SESSION['courseId'])) echo $_SESSION['courseId'] ?>" />
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">名前: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="text" class="form-input" name="uname" id="uname" placeholder="eg. Win Win" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">生年月日: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="date" class="form-input" name="dob" id="dob" required />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">父の名前: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="text" class="form-input" name="fname" id="fname" placeholder="e.g. U Aye" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">全国登録カード: <span class="required-tag">必要 &nbsp; *</span></label>
                        <div class="row">
                          <?php $stateNumberArr = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14"] ?>
                          <!-- <input type="text" class="form-input" name="nrc" id="nrc" placeholder="e.g. Please Enter NRC" required />  -->
                          <div class="col-12 col-sm-10 col-md-10 col-lg-2 col-xl-2">
                            <select name="nrcCode" id="nrcCode" class="form-input nrc">
                              <option value="" selected disabled>State</option>
                              <?php
                              for ($i = 0; $i < count($stateNumberArr); $i++) {
                                echo "<option value='" . $stateNumberArr[$i] . "'>";
                                echo $stateNumberArr[$i];
                                echo "</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-12 col-sm-10 col-md-10 col-lg-5 col-xl-5">
                            <select name="township" id="township" class="form-input nrc">
                              <option value="" selected disabled>Township</option>
                            </select>
                          </div>
                          <div class="col-12 col-sm-10 col-md-10 col-lg-3 col-xl-3">
                            <select name="type" id="type" class="form-input nrc">
                              <option value="" selected disabled>Type</option>
                              <option value="(C)">(C) - (နိုင်)</option>
                              <option value="(AC)">(AC) - (ဧည့်)</option>
                              <option value="(NC)">(NC) - (ပြု)</option>
                              <option value="(V)">(V) - (စ)</option>
                              <option value="(M)">(M) - (သ)</option>
                              <option value="(N)">(N) - (သီ)</option>
                            </select>
                          </div>
                          <div class="col-12 col-sm-10 col-md-10 col-lg-2 col-xl-2">
                            <input type="text" class="form-input nrc" name="nrcNumber" id="nrcNumber" placeholder="123456" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">メール:</label>
                        <input type="email" class="form-input" name="email" id="email" placeholder="abc@gmail.com" />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">電話番号: <span class="required-tag">必要 &nbsp; *</span></label>
                        <input type="text" class="form-input" name="phone" id="phone" placeholder="09..." />
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">住所: <span class="required-tag">必要 &nbsp; *</span></label>
                        <textarea name="address" class="form-input" id="address" placeholder="e.g. No.(), (...) Road, (...) City."></textarea>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-12 col-sm-12 col-md-12">
                        <label class="fieldlabels">教育: <span class="required-tag">必要 &nbsp; *</span></label>
                        <textarea name="edu" class="form-input" id="edu" placeholder="e.g. University"></textarea>
                      </div>
                    </div>
                    <input type="button" name="next" id="userInfo" class="next action-button" value="次" />
                </fieldset>
                <fieldset id="paymentMethod">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">支払い:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">ステップ 2 - 3</h2>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-12">
                        <label class="fieldlabels">お支払い方法を1つ選択してください: <span class="required-tag">必要 &nbsp; *</span></label>
                      </div>
                    </div>
                    <div class="row bank-container">
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="CB banking" />
                          <div class="bank-image" style="background-image: url(../assets/images/banks/CB.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="KBZ banking" />
                          <div class="bank-image" style="background-image: url(../assets/images/banks/kbz.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="AYA banking" />
                          <div class="bank-image" style="background-image: url(../assets/images/banks/AYA.png)"></div>
                        </label>
                      </div>
                    </div>
                    <div class="row bank-container">
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="Kpay" />
                          <div class="bank-image" style="background-image: url(../assets/images/banks/KPAY.png)"></div>
                        </label>
                      </div>
                      <div class="col-12 col-sm-11 col-md-4 col-lg-4 col-xl-4 text-center">
                        <label class="bank">
                          <input type="radio" name="payment_method" value="Cash" />
                          <div class="bank-image in-cash">In Cash <i class="fas fa-money-check"></i></div>
                        </label>
                      </div>
                      <span id="radioMsg"></span>
                    </div>
                  </div>
                  <input type="button" name="next" class="next action-button" value="次" />
                  <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                </fieldset>
                <fieldset id="success">
                  <div class="form-card">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="enrollForm-title">終了:</h2>
                      </div>
                      <div class="col-5">
                        <h2 class="steps">ステップ 3 - 3</h2>
                      </div>
                    </div> <br><br>
                    <h2 class="blue-text text-center"><strong>正常に送信されました!</strong></h2> <br>
                    <div class="row justify-content-center">
                      <div class="col-3">
                        <img src="../assets/images/blue-tick.png" class="fit-image">
                      </div>
                    </div> <br><br>
                    <div class="row justify-content-center">
                      <div class="col-7 text-center">
                        <h5 class="blue-text text-center">メールは営業時間内（9：00〜17：00）に送信されます。お支払い情報についてはメールを確認してください。</h5>
                      </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                      <a href="classEnroll.php" class="back-to-courses">コースを閲覧する</a>
                    </div>
                  </div>
                </fieldset>
              </form>


            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Enrollment Form end -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmationModal">
    Launch demo modal
  </button> -->

  <!-- The Confirmation Modal -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-box">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">登録確認</h4>
          <button class="btn-close" data-dismiss="modal">
            <i class='fas fa-times' style='font-size:24px; color: grey'></i>
          </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body confirm-modal-body">
          <span style="color: #001c69">このコース の 登録 を 送信しても </span>よろしいですか?
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn-cancel" data-dismiss="modal">キャンセル</button>
          <button type="button" class="btn-submit" id="submitConfirm" data-dismiss="modal">送信</button>
        </div>

      </div>
    </div>
  </div>

  <!-- footer start -->
  <footer class="footer">
    <div class="left">
      <a href="index.html"><span>JKT</span> Myanmar International </a>
      <div>
        <a href="https://www.facebook.com/JKT-Myanmar-International-CoLtd-2508681849366709">
          <i class="fab fa-facebook-f"></i>
        </a>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
      </div>
    </div>
    <div class="right">
      <div class="footer-flex">
        <div>
          <header>ご連絡ください。</header>
          <p>私たちはあなたと一緒に働く準備ができています。</p>
        </div>
        <a href="./contact.html"><button id="btn-contact" class="primary-btn">お問い合わせ</button></a>
      </div>
      <div class="footer-flex-nav">
        <div class="nav">
          <header>サービス</header>
          <ul class="footer-list" id="first">
            <li>
              <span><a href="./overseas.html">海外雇用サービス（日本のみ）</a></span>
            </li>
            <li>
              <span><a href="./business.html">ビジネスコンサルタント</a></span>
            </li>
            <li>
              <span><a href="./announcement.html">ITサービス</a></span>
            </li>
            <li>
              <span><a href="./announcement.html">旅行サービス</a></span>
            </li>
          </ul>
        </div>
        <div class="nav">
          <header>トレーニング</header>
          <ul class="footer-list" id="second">
            <li>
              <span><a href="./jp-school.php">日本語学校</a></span>
            </li>
            <li>
              <span><a href="./announcement.html">職業訓練</a></span>
            </li>
            <li>
              <span><a href="./announcement.html">人材トレーニング</a></span>
            </li>
          </ul>
        </div>
        <div class="nav">
          <header>お問い合わせ</header>
          <ul class="footer-list" id="last">
            <li>
              <i class="fa fa-phone"></i><a href="tel:+959269564339">+959 269 564 339</a>
            </li>
            <li>
              <i class="fa fa-phone"></i><a href="tel:+959770411708">+959 770 411 708</a>
            </li>
            <li>
              <i class="fas fa-map-marker-alt"></i>No.86, 3A, Shinsawpu Road,
              Near Myaynigone Citymart, Sanchaung Township, Yangon, Myanmar
            </li>
            <li>
              <i class="fa fa-envelope"></i>
              <a href="mailto:jkt.mm.int@gmail.com">jkt.mm.int@gmail.com</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- script -->
  <script src="../assets/js/jquery-3.6.0.js"></script>
  <script src="../assets/js/validation.js"></script>
  <script src="../assets/js/additional-methods"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/float-panel.js"></script>
  <script src="../assets/js/multistepForm.js"></script>
  <script src="../assets/js/userImgPreview.js"></script>
</body>
<html>