<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$mainCategory = $_POST['mainCategory'] ?? '';
    // $subCategory = $_POST['subCategory'] ?? '';
    // $subSubCategory = $_POST['subSubCategory'] ?? '';

    // $plantdivison=$_POST['plant-division']??'';
    // $planttype=$_POST['plant-type']??'';
    // $plantinam=$_POST['thavarainam']??'';

    $mainCategory = $_POST['plant-division'] ?? '';
    $subCategory = $_POST['plant-type2'] ?? '';
    $subSubCategory = $_POST['thavarainam'] ?? '';

    $mainCategory = $_POST['plant-division'] ?? '';

    // $plantdivision = $_POST['plant-division'] ?? '';

    $plantdivision1 = $_POST['plant-division1'] ?? '';

    $planttype = $_POST['plant-type'] ?? '';

    $planttype1 = $_POST['plant-type1'] ?? '';

    $subCategory = $_POST['plant-type2'] ?? '';

    //$planttype2=$_POST['plant-type2']??'';

    $subSubCategory = $_POST['thavarainam'] ?? '';

    //$thavarainam = $_POST['thavarainam'] ?? '';

    $thavarainam1 = $_POST['thavarainam1'] ?? '';

    $verupeyarkal = $_POST['verupeyarkal'] ?? '';

    $thavarairuppidam = $_POST['thavarairuppidam'] ?? '';

    $thavaraamaippu = $_POST['thavaraamaippu'] ?? '';

    $thavaravilakkam = $_POST['thavaravilakkam'] ?? '';

    $noolkal = $_POST['noolkal'] ?? '';






    // Read existing data from file
    $dataFile = 'categories.txt';
    $existingData = file_get_contents($dataFile);
    $existingArray = json_decode($existingData, true);



    // Specify the path to your text file
    $filePath = 'head.php';

    // Read the content of the file and store it in a variable
    $fileContent = file_get_contents($filePath);

    // Display or use the content as needed

    // Specify the path to your text file
    $filePath1 = 'footer.php';

    // Read the content of the file and store it in a variable
    $fileContent1 = file_get_contents($filePath1);

    // Display or use the content as needed


    // If the existing array is empty, initialize it as an empty array
    if (empty($existingArray)) {
        $existingArray = array();
    }

    // If the main category is not empty, proceed to process subcategories
    if (!empty($mainCategory)) {
        // If the main category doesn't exist, create it as an empty array
        if (!isset($existingArray[$mainCategory])) {
            $existingArray[$mainCategory] = array();
        }

        // If the sub category is not empty, proceed to process sub-subcategories
        if (!empty($subCategory)) {
            // If the sub category doesn't exist, create it as an empty array
            if (!isset($existingArray[$mainCategory][$subCategory])) {
                $existingArray[$mainCategory][$subCategory] = array();
            }

            // Add the sub-sub category under the main and sub categories if it doesn't already exist
            if (!empty($subSubCategory) && !in_array($subSubCategory, $existingArray[$mainCategory][$subCategory])) {
                $existingArray[$mainCategory][$subCategory][] = $subSubCategory;
            }
        }
    }


    // Write updated data back to the file
    $jsonData = json_encode($existingArray);
    file_put_contents($dataFile, $jsonData);

    // Generate HTML file to display the content of categories.txt
    $htmlContent = "$fileContent<div class=\"side_bar container-fluid\"><ul id=\"mainList\"><li><a href=\"#\" class=\"highlight\"> தாவர பிரிவு   </a></li>";

    foreach ($existingArray as $mainCat => $subCats) {
        $htmlContent .= "<li class=\"dropdown\"><a href=\"#\"> $mainCat </a><ul>";

        // "Addmore" link at the top
        $htmlContent .= '<li><a href="#" class="highlight"> தாவர வகை  </a></li>';

        foreach ($subCats as $subCat => $subSubCats) {
            $htmlContent .= "<li class=\"dropdown_two\"><a href=\"#\"> $subCat </a><ul>";

            // "Addmore" link at the top
            $htmlContent .= '<li><a href="" class="highlight"> தாவர இனம் </a></li>';

            foreach ($subSubCats as $subSubCat) {
                $htmlContent .= "<li><a href=\"../content/content/$subSubCat/$subSubCat.html\"> $subSubCat </a></li>";
            }

            // "Addmore" link at the bottom
            $htmlContent .= '<li><a href="../form/index.html" class="bck"> மேலும் சேர்க்க  </a></li>';

            $htmlContent .= '</ul></li>';
        }
        //../form/index.html
        // "Addmore" link at the bottom
        $htmlContent .= '<li><a href="../form/index.html" class="bck"> மேலும் சேர்க்க  </a></li>';

        $htmlContent .= '</ul></li>';
    }

    $htmlContent .= "<li><a href=\"../form/index.html\" class=\"bck\"> மேலும் சேர்க்க  </a></li></ul></div>$fileContent1";

    // Write HTML content to a file
    //../plant-type/index.html
    $htmlFile = 'index.html';
    file_put_contents($htmlFile, $htmlContent);
    //  $htmlFile2 = 'index.html';






    // Define the folder path
    $folder_path1 = '../content/content';

    // Create folder name using the current date and herb name
    $folder_name1 = $folder_path1 . '/' . $subSubCategory;


    // Construct the HTML file name
    $html_file_name1 = $subSubCategory  . '.html';


    // Create folder if it doesn't exist
    if (file_exists($folder_name1)) {
        echo 'already user content available if you wish you can add more by add option in the content ';
    } elseif (!file_exists($folder_name1)) {
        mkdir($folder_name1, 0777, true); // Set permissions as needed (0777 for example)

    }
    // Handle file uploads
    if (!empty($_FILES['formFile'])) {
        $file_count = count($_FILES['formFile']['name']);

        for ($i = 0; $i < $file_count; $i++) {
            $temp_file = $_FILES['formFile']['tmp_name'][$i];
            $file_extension = pathinfo($_FILES['formFile']['name'][$i], PATHINFO_EXTENSION);
            $file_name = 'img' . $i . '.' . $file_extension;
            move_uploaded_file($temp_file, $folder_name1 . '/' . $file_name);
        }
    }




    $image1 = 'img0.' . pathinfo($_FILES['formFile']['name'][0], PATHINFO_EXTENSION);
    $image2 = 'img1.' . pathinfo($_FILES['formFile']['name'][1], PATHINFO_EXTENSION);
    $image3 = 'img2.' . pathinfo($_FILES['formFile']['name'][2], PATHINFO_EXTENSION);
    $image4 = 'img3.' . pathinfo($_FILES['formFile']['name'][3], PATHINFO_EXTENSION);
    $image5 = 'img4.' . pathinfo($_FILES['formFile']['name'][4], PATHINFO_EXTENSION);
    $image6 = 'img5.' . pathinfo($_FILES['formFile']['name'][5], PATHINFO_EXTENSION);

    // $image1='hi';
    // $image2='hi';
    // $image3='hi';
    // $imae4='hi';
    // $image5='hi';
    // $image6='hi';

    $pathjs = $subSubCat . '/img${index}.jpg';

    $htmlfile2 = "<!DOCTYPE html>
       <html lang=\"en\">
        
        <head>
            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <title>Document</title>
        
            <link rel=\"icon\" href=\"image/5.png\" type=\"image/png\">
            <link rel=\"stylesheet\" href=\"../../style-index.css\">
        
        
            <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
            <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">
            <link href=\"https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap\" rel=\"stylesheet\">
            <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">
            <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
            <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
            <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
            <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
            <link
                href=\"https://fonts.googleapis.com/css2?family=Noto+Sans+Tamil:wght@100;500&family=Roboto:wght@100&family=Tiro+Tamil:ital@1&display=swap\"
                rel=\"stylesheet\">
            <style>
                .en {
                    display: none;
                }
            </style>
        
        
        </head>
        
        <body>
        
            <!--Header-->
        
            <header class=\"header \">
                <div class=\"bg-success container-fluid text-end \">
                    <a href=\"#\" class=\"text-white\" onclick=\"switchLanguage('en')\">English</a>
                    <a href=\"#\" class=\"text-white\" onclick=\"switchLanguage('ta')\">தமிழ்</a>
        
                </div>
        
                <div class=\"container-fluid p-0 \">
        
        
                    <!-- English -->
                    <div class=\"container-fluid p-1 en hd\">
                        <!-- <h1 class=\" text-success text-center m-0 fs-1 \">Tamil Ecosystem Online</h1>
                       <p class=\" text-success text-center m-0 p-2 fs-sm-1 \">Tamil Herbal Dictionary - Annual Report - Cyber World    <P>-->
                        <h1 class=\" text-success text-center m-0 \">தமிழ்த்தேச தாவரவியல் இணையம்</h1>
                        <h4 class=\" text-success text-center m-0 p-2 \">தமிழ்த்தேச மூலிகை விளக்க இணைய அகராதி - ஆவணக்காப்பகம்
                            - மின்னுலகம்</h4>
        
                    </div>
                    <!-- Tamil -->
                    <div class=\" container-fluid p-1 ta hd\">
                        <!-- Add class \"ta\" to elements containing Tamil content -->
                        <h1 class=\"text-success text-center m-0 \">தமிழ்த்தேச தாவரவியல் இணையம்</h1>
                        <h4 class=\"text-success text-center m-0 p-2 \">தமிழ்த்தேச மூலிகை விளக்க இணைய அகராதி - ஆவணக்காப்பகம்
                            - மின்னுலகம்</h4>
                    </div>
                </div>
        
        
                <!-- English -->
                <nav class=\"navbar navbar-expand-md navbar-dark bg-success p-0 en \">
                    <div class=\"container-fluid en\">
                        <a href=\"#\" class=\"navbar-brand\">
                            <img src=\"https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg\" alt=\"Bootstrap\"
                                width=\"30\" height=\"24\" class=\"d-inline-block align-top en\">
        
                        </a>
        
                        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#myNavBar\"
                            aria-controls=\"myNavBar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                            <span class=\"navbar-toggler-icon\"></span>
                        </button>
        
                        <div class=\"collapse navbar-collapse\" id=\"myNavBar\">
                            <ul class=\"navbar-nav \">
                                <li class=\"nav-item\"><a href=\"#\" class=\"nav-link fs-10\">Home</a></li>
                                <li class=\"nav-item\"><a href=\"Herb-type/index.html\" class=\"nav-link\">Botanical
                                        Classification</a></li>
                                <li class=\"nav-item\"><a href=\"about.html\" class=\"nav-link\">Herbal Enlightenment Books</a></li>
                                <li class=\"nav-item\"><a href=\"about.html\" class=\"nav-link\">Tamil Siddhars</a></li>
                                <li class=\"nav-item\"><a href=\"about.html\" class=\"nav-link\">Tamil Siddha Medicine</a></li>
        
                                <li class=\"nav-item dropdown\">
                                    <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\"
                                        aria-expanded=\"false\">
                                        About
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li><a class=\"dropdown-item\" href=\"#\">Git Hub</a></li>
                                        <li><a class=\"dropdown-item\" href=\"#\">Facebook</a></li>
                                        <li><a class=\"dropdown-item\" href=\"#\">Linkedin</a></li>
                                    </ul>
                                </li>
        
        
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Tamil -->
                <nav class=\"navbar navbar-expand-md navbar-dark bg-success p-0 ta \">
                    <div class=\"container-fluid ta\">
                        <a href=\"#\" class=\"navbar-brand\">
                            <img src=\"https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg\" alt=\"Bootstrap\"
                                width=\"30\" height=\"24\" class=\"d-inline-block align-text-top ta\">
        
                        </a>
        
                        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#myNavBar\"
                            aria-controls=\"myNavBar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                            <span class=\"navbar-toggler-icon\"></span>
                        </button>
        
                        <div class=\"collapse navbar-collapse\" id=\"myNavBar\">
                            <ul class=\"navbar-nav \">
                                <li class=\"nav-item  \"><a href=\"#\" class=\"nav-link fs-10  \">முகப்பு </a></li>
                                <li class=\"nav-item\"><a href=\"Herb-type/index.html\" class=\"nav-link\"> தாவரவியல் வகைப்பாடு </a>
                                </li>
                                <li class=\"nav-item\"><a href=\"about.html\" class=\"nav-link\">மூலிகை விளக்க நூல்கள் </a></li>
                                <li class=\"nav-item\"><a href=\"about.html\" class=\"nav-link\">தமிழ் சித்தர்கள் </a></li>
                                <li class=\"nav-item\"><a href=\"about.html\" class=\"nav-link\">தமிழ் சித்த மருத்துவம் </a></li>
                                <li class=\"nav-item dropdown\">
                                    <a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-bs-toggle=\"dropdown\"
                                        aria-expanded=\"false\">
                                        எங்களைப்பற்றி
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li><a class=\"dropdown-item\" href=\"#\">Git Hub</a></li>
                                        <li><a class=\"dropdown-item\" href=\"#\">Facebook</a></li>
                                        <li><a class=\"dropdown-item\" href=\"#\">Linkedin</a></li>
                                    </ul>
                                </li>
        
        
                            </ul>
                        </div>
                    </div>
                </nav>
        
        
        
        
        
        
                <!-- English -->
                <nav class=\"navbar bg-body-tertiary en\">
                    <div class=\"container-fluid\">
                        <span class=\"navbar-text\">Search for herb name</span>
        
                        <form class=\"d-flex\" role=\"search\">
                            <input class=\"form-control me-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\">
                            <button class=\"btn btn-outline-success\" type=\"submit\">Search</button>
                        </form>
                    </div>
                </nav>
                <!-- Tamil -->
                <nav class=\"navbar bg-body-tertiary row\">
                    <div class=\"container-fluid row\">
        
                        <div class=\"col-sm-12 text-end\">
        
                            <span class=\"navbar-text \">
                                இந்த தாவரத்தை ஆவணப்படுத்தியவர்:
                            </span>
                            <a class=\"navbar-brand\" href=\"#\">
        
                                <img src=\"images/1.png\" alt=\"Circular Image\" class=\"rounded-circle\" width=\"60\" height=\"60\">
                            </a>
                            <span class=\"navbar-text \">
                                சித்தா சங்கரன் சித்த மருத்துவர்
                            </span>
        
                        </div>
        
                    </div>
        
                    </div>
        
                </nav>
        
                <!--Jumbotron-->
        
                <!--English-->
        
                <div class=\"jumbotron en\">
                    <div class=\"container\">
        
                        <nav>
                            <ol class=\"breadcrumb\">
                                <li class=\"breadcrumb-item\">
                                    <a href=\"/\">Home</a>
                                </li>
                                <li class=\"breadcrumb-item\">
                                    <a href=\"\">Blog</a>
                                </li>
                            </ol>
        
                        </nav>
                    </div>
                </div>
        
                <!--English-->
        
                <!--Tamil-->
        
                <div class=\"jumbotron ta\">
                    <div class=\"container\">
        
                        <nav>
                            <ol class=\"breadcrumb\">
                                <li class=\"breadcrumb-item\">
                                    <a href=\"/\">முகப்பு</a>
                                </li>
                                <li class=\"breadcrumb-item\">
                                    <a href=\"\">வலைப்பதிவு </a>
                                </li>
                            </ol>
        
                        </nav>
                    </div>
                </div>
                <!--Tamil-->
                <!--End Jumbotron-->
        
            </header>
            <!--End header-->
        
        
            <!--End-Header-->
        
        
        
            <!--content-->
        
            <div class=\"container-fluid cnt\">
                <div class=\"row pt-md-3 pt-3\">
                    <div class=\"col-3 col-sm-4 d-flex justify-content-end d-flex align-items-center\">
                        <button type=\"button\" class=\"btn btn-success btn-sm \" id=\"likeButton\">ஆம் <i class=\"fa fa-thumbs-o-up\"
                                aria-hidden=\"true\"></i></button>
                    </div>
                    <div class=\"col-5 col-sm-3 d-flex justify-content-center d-flex align-items-center \">
                        <h5 class=\" text-center    headingh5 \"> தாவர விபரம் </h5>
                    </div>
                    <div class=\"col-4 col-sm-4 d-flex justify-content-start d-flex align-items-center\">
                        <button type=\"button\" class=\"btn btn-danger btn-sm\" id=\"dislikeButton\">இல்லை <i
                                class=\"fa fa-thumbs-down\" aria-hidden=\"true\"></i></button>
                    </div>
                </div>
                <div class=\"row \">
                    <div class=\"col-3 col-sm-4 d-flex justify-content-end\">
                        <p>ஆதரவு <span>45</span></p>
                    </div>
                    <div class=\"col-5 col-sm-3  d-flex justify-content-center\">
                    </div>
                    <div class=\"col-4 col-sm-4 d-flex justify-content-start\">
                        <p>மறுப்பு<span>10</span></p>
                    </div>
                </div>
            </div>
        
        
             <div class=\"container-fluid cnt formdata \">

                <div class=\"card p-2 \">
        
                <div class=\"card-body cnt\">
        
                    <div class=\"formm cnt \">
                        <form action=\"\">
        
                            <!--தாவரத்தின் பிரிவு -->
        
                            <div class=\"form-group\">
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
                                        <label for=\"plant-division\" class=\"form-label\">தாவரத்தின் பிரிவு </label>
        
                                    </div>
        
                                    <div class=\"col-9\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-6\">
                                                <p class=\"p-3 mb-2 bg-white text-dark\">$mainCategory</p>
                                            </div>
        
                                            <div class=\"col-sm-6\">
        
                                                <p class=\"p-3 mb-2 bg-white text-dark\"> $plantdivision1 </p>
        
        
                                            </div>
        
                                        </div>
        
                                    </div>
        
        
                                </div>
        
                            </div>
                            <!--தாவரத்தின் பிரிவு -->
        
                            <hr>
        
                            <!--தாவரத்தின் வகை -->
                            <div class=\"form-group\">
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
                                        <label for=\"plant-division\" class=\"form-label\">தாவரத்த்தின் வகை<span
                                                class=\"text-danger\">*</span> </label>
                                    </div>
        
                                    <div class=\"col-sm-9\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-6\">
        
        
                                                <p class=\"p-3 mb-2 bg-white text-dark\"> $planttype </p>
        
                                            </div>
        
                                            <div class=\"col-sm-6\">
        
                                                <p class=\"p-3 mb-2 bg-white text-dark\">$planttype1</p>
                                            </div>
        
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col\">
                                                <p class=\"p-3 mb-2 bg-white text-dark\"> $subCategory </p>
        
                                            </div>
                                        </div>
        
        
        
        
                                    </div>
                                </div>
                            </div>
                            <!--தாவரத்தின் வகை -->
        
                            <hr>
                            <!--தாவர இனம் பெயர் -->
                            <div class=\"form-group\">
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
                                        <label for=\"plant-division\" class=\"form-label\">தாவர இனம் /பெயர் <span
                                                class=\"text-danger\">*</span> </label>
        
                                    </div>
                                    <div class=\"col-sm-9\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-6\">
                                                <p class=\"p-3 mb-2 bg-white text-dark\"> $subSubCategory </p>
                                                <a class=\"\" href=\"\">(Edit)</a>
                                                <a class=\"\" href=\"\">(Add)</a>
                                                <br> <br>
                                            </div>
                                            <div class=\"col-sm-6\">
                                                <p class=\"p-3 mb-2 bg-white text-dark\">$thavarainam1 </p>
                                                <a class=\"\" href=\"\">(Edit)</a>
                                                <a class=\"\" href=\"\">(Add)</a>
                                            </div>
        
                                        </div>
        
                                    </div>
        
                                </div>
                            </div>
        
                            <!--தாவர இனம் பெயர் -->
        
                            <hr>
        
                            <!--வேறு பெயர்கள்-->
                            <div class=\"form-group\">
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
                                        <label for=\"plant-division\" class=\"form-label\">வேறு பெயர்கள் </label>
        
                                    </div>
        
                                    <div class=\"col-sm-9\">
                                        <p class=\"p-3 mb-2 bg-white text-dark\">$verupeyarkal</p>
                                    </div>
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
        
                                    </div>
                                    <div class=\"col-sm-9\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-12\">
                                                <a class=\"\" href=\"\">(Edit)</a>
                                                <a class=\"\" href=\"\">(Add)</a>
        
                                                <br>
                                            </div>
        
        
                                        </div>
        
                                    </div>
        
                                </div>
                            </div>
                            <!--வேறு பெயர்கள்-->
        
                            <hr>
        
                            <!--தாவர இருப்பிடம்-->
                            <div class=\"form-group\">
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
                                        <label for=\"plant-division\" class=\"form-label\"> தாவர இருப்பிடம் </label>
                                    </div>
        
                                    <div class=\"col-sm-9\">
                                        <p class=\"p-3 mb-2 bg-white text-dark\">$thavarairuppidam</p>
                                    </div>
                                </div>
        
        
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
        
                                    </div>
                                    <div class=\"col-sm-9\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-12\">
                                                <a class=\"\" href=\"\">(Edit)</a>
                                                <a class=\"\" href=\"\">(Add)</a>
        
                                                <br>
                                            </div>
        
        
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <!--தாவர இருப்பிடம்-->
        
                            <hr>
        
                            <!-- தாவர அமைப்பு-->
                            <div class=\"form-group\">
                                <div class=\"form-group\">
                                    <div class=\"row mb-3\">
                                        <div class=\"col-sm-3\">
                                            <label for=\"exampleFormControlTextarea1\" class=\"form-label\">தாவர
                                                அமைப்பு
                                                <span class=\"text-danger\">*</span> </label>
        
                                            <label for=\"exampleFormControlTextarea1\" class=\"form-label form-text\">இலை/
                                                முள்/
                                                சுனை
                                                தண்டு/ பட்டை/ மொட்டு/ பூ/ காய்/ கனி/ வேர்/ கிழங்கு/ விதை/
                                                பிசின்/
                                                பால் மற்ற
                                                பாகங்கள்</label>
        
                                        </div>
                                        <div class=\"col-9\">
                                            <p class=\"p-3 mb-2 bg-white text-dark\">$thavaraamaippu </p>
                                        </div>
                                    </div>
        
                                    <div class=\"row\">
                                        <div class=\"col-sm-3\">
        
                                        </div>
                                        <div class=\"col-sm-9\">
                                            <div class=\"row\">
                                                <div class=\"col-sm-12\">
                                                    <a class=\"\" href=\"\">(Edit)</a>
                                                    <a class=\"\" href=\"\">(Add)</a>
        
                                                    <br>
                                                </div>
        
        
                                            </div>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- தாவர அமைப்பு-->
        
                            <hr>
                            <!-- தாவர விளக்கம்  -->
                            <div class=\"form-group\">
        
                                <div class=\"row mb-3\">
                                    <div class=\"col-sm-3\">
                                        <label for=\"exampleFormControlTextarea1\" class=\"form-label\"> தாவர
                                            விளக்கம் <span class=\"text-danger\">*</span> </label>
                                        <label for=\"exampleFormControlTextarea1\" class=\"form-label form-text\">
                                            தாயகம்/பூர்விகம்/தாவரத்தின்/சுவை தாவரத்தின்/ சிறப்பு குணங்கள்/
                                            அதிசயங்கள் பெயர்க்காரணம்
                                        </label>
        
                                    </div>
                                    <div class=\"col-9\">
                                        <p class=\"p-3 mb-2 bg-white text-dark\">$thavaravilakkam </p>
                                    </div>
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
        
                                    </div>
                                    <div class=\"col-sm-9\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-12\">
                                                <a class=\"\" href=\"\">(Edit)</a>
                                                <a class=\"\" href=\"\">(Add)</a>
        
                                                <br>
                                            </div>
        
        
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <!-- தாவர விளக்கம்  -->
                            <hr>
        
                            <!-- மேற்கோள்  நூல்கள்  -->
        
                            <div class=\"form-group\">
        
                                <div class=\"row mb-3\">
                                    <div class=\"col-sm-3\">
                                        <label for=\"exampleFormControlTextarea1\" class=\"form-label form-label\">மேற்கோள்
                                            நூல்கள்
                                        </label>
        
                                        <label for=\"exampleFormControlTextarea1\" class=\"form-label form-text\">தாவரம்
                                            இடம்பெற்றுள்ள
                                            சித்தர்
                                            நூல்கள்/ பாடல்கள்/ பள்ளு/ கவிகள்</label>
        
        
                                    </div>
                                    <div class=\"col-9\">
                                        <p class=\"p-3 mb-2 bg-white text-dark\">$noolkal</p>
                                    </div>
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
        
                                    </div>
                                    <div class=\"col-sm-9\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-12\">
                                                <a class=\"\" href=\"\">(Edit)</a>
                                                <a class=\"\" href=\"\">(Add)</a>
        
                                                <br>
                                            </div>
        
        
                                        </div>
        
                                    </div>
                                </div>
        
                            </div>
                            <!-- மேற்கோள்  நூல்கள்  -->
        
                            <hr>
                            <!-- ஒளிப்படம்-->
                            <div class=\"form-group\">
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
                                        <label for=\"\" class=\"form-label\">ஒளிப்படம் <span class=\"text-danger\">*</span>
                                        </label>
                                        <label for=\"\" class=\"form-label form-text\">இலை பூ என தனித்தனியான படங்களை
                                            பதிவேற்றுக</label>
        
        
                                    </div>
        
                                    <div class=\"col-sm-9\">
                                        <p class=\"p-3 mb-2 bg-white text-dark\">hello</p>
                                    </div>
                                </div>
        
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
        
                                    </div>
                                    <div class=\"col-sm-9\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-12\">
                                                <a class=\"\" href=\"\">(Edit)</a>
                                                <a class=\"\" href=\"\">(Add)</a>
        
                                                <br>
                                            </div>
        
        
                                        </div>
        
                                    </div>
                                </div>
        
                            </div>
                            <!-- ஒளிப்படம்-->
                            <hr>
                            <!--images-->
                            <div class=\"imageWrapper\" id=\"wrapper\">
                                <img src=\"\" alt=\"\" id=\"fullImg\">
                                <span>X</span>
        
                            </div>
                            
                            <div class=\"card-container \">
                                <div class=\"card x \" style=\"background-color: rgb(255, 239, 207);\">
                                    <div class=\"img-gallery\">
        
                                        <div class=\"row\">
                                            <div class=\"col-sm-6\">
        
                                                <img src=\" $image1\" class=\" img-fluid img-thumbnail\" alt=\"...\">
        
                                            </div>
        
                                            <div class=\"col-sm-6\">
        
                                                <div class=\"row \">
                                                    <div class=\"col-sm-6\">
                                                        <div class=\"row\">
                                                            <img src=\" $image2\" class=\" img-fluid img-thumbnail\"
                                                                alt=\"...\">
                                                           
                                                        </div>
                                                        <div class=\"row\">
                                                            <img src=\" $image3\" class=\" img-fluid img-thumbnail\"
                                                                alt=\"...\">
                                                            
                                                        </div>
                                                    </div>
        
                                                    <div class=\"col-sm-6\">
        
                                                        <img src=\" $image4\" class=\" img-fluid img-thumbnail\" alt=\"...\">
                                                        
                                                        <!-- Adjust margin as needed -->
        
                                                    </div>
                                                </div>
        
        
                                                <div class=\"row\">
                                                    <div class=\"col-sm-6\">
                                                        <img src=\" $image5\" class=\" img-fluid img-thumbnail\" alt=\"...\">
                                                    </div>
                                                    <div class=\"col-sm-6\">
                                                        <img src=\"$image6\" class=\"img-fluid img-thumbnail\" alt=\"\">
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>
        
        
                                    </div>
        
                                </div>
        
                            </div>
        
        
                            <br>
        
                            <!--images-->
        
        
                            <hr>
                            <!--input-->
                            <div class=\"form-group\">
                                <div class=\"row\">
                                    <div class=\"col-sm-12\">
                                        <label for=\"\" class=\"form-label form-text\">கருத்துக்கள்:</label>
        
                                    </div>
                                </div>
                                <div class=\"row\">
                                    <p class=\"p-3 mb-2 bg-white text-dark\">hello</p>
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-sm-3\">
                                        <label for=\"\" class=\"form-label form-text\">கருத்து பதிவிடுக:</label>
                                    </div>
                                    <div class=\"col-sm-9\">
                                        <input type=\"text\" class=\"form-control\" id=\"floatingInput\">
                                    </div>
        
                                </div>
        
        
        
                            </div>
                            <!--input-->
                        </form>
                    </div>
                </div>
                </div>
            </div>




            <audio id=\"clickSound\" src=\"../../ping-82822.mp3\"></audio>
        
            <!--End-content-->
        
            <!--footer-->
        
            <!--English-->
        
            <footer class=\"en\" style=\"transition: background-color 3s ease 0s;\">
                <div class=\"container-fluid\">
                    <div class=\"roww\">
        
                        <div class=\"container-fluid text-center col-lg-12 col-md-12 p-2\">
                            <ul class=\"list-unstyled text-white row  \" style=\"font-size: 13px;\">
                                <li class=\"col-6 col-md   p-0\"><a href=\"\" class=\"nav-link\"> Disclaimer</a></li>
                                <li class=\"col-6 col-md   p-0\"><a href=\"\" class=\"nav-link\">Other Webaites</a></li>
                                <li class=\"col-6 col-md   p-0\"><a href=\"\" class=\"nav-link\">For Contact</a></li>
                                <li class=\"col-6 col-md   p-0\"><a href=\"\" class=\"nav-link\">Sitemap</a></li>
                                <li class=\"col-6 col-md   p-0\"><a href=\"\" class=\"nav-link\">Archives</a></li>
                                <li class=\"col-6 col-md  p-0\"><a href=\"#\" class=\"nav-link\">Feedback</a></li>
                                <li class=\"col-12 col-md   p-0\"><a href=\"\" class=\"nav-link\">Visitors : ABCD</a></li>
                            </ul>
                        </div>
        
                    </div>
        
                    <div class=\"divider light\">
                        <hr>
                    </div>
        
                    <div class=\"row  \">
                        <div class=\"col-lg-3 col-sm-12\">
                            <div class=\"\">
                                <ul class=\"list-inline text-white d-inline-block\">
        
                                    <li class=\"list-inline-item\"><a href=\"\" target=\"_blank\" class=\"nav-link\"><i
                                                class=\"fa fa-facebook\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"\" target=\"_blank\" class=\"nav-link\"><i
                                                class=\"fa fa-twitter\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"\" target=\"_blank\" class=\"nav-link\"><i
                                                class=\"fa fa-google-plus\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"\" target=\"_blank\" class=\"nav-link\"><i
                                                class=\"fa fa-youtube\"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=\"col-lg-6 col-sm-12\">
                            <p class=\"text-center text-white\">Copyright @ 2024,
                                <a href=\"\" class=\"text-center text-white text-decoration-none\" target=\"_blank\">Siddha
                                    Medicine</a>
                            </p>
                        </div>
                        <div class=\"col-lg-3 text-right\">
                            <p class=\"text-white\">Developed By :
                                <a href=\" \" class=\"text-white text-decoration-none\" target=\"_blank\">Siddha Medicine</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        
            <!--Tamil-->
        
            <footer class=\"ta\" style=\"transition: background-color 3s ease 0s;\">
                <div class=\"container-fluid\">
                    <div class=\"roww\">
        
                        <div class=\"container-fluid text-center col-lg-12 col-md-12 p-2\">
                            <ul class=\"list-unstyled text-white row  \" style=\"font-size: 13px;\">
                                <li class=\"col-6 col-md  p-0\"><a href=\"\" class=\"nav-link\">பொறுப்பு அறிவிக்கை</a></li>
                                <li class=\"col-6 col-md  p-0\"><a href=\"\" class=\"nav-link\">பிற இணையத் தளங்கள்</a></li>
                                <li class=\"col-6 col-md  p-0\"><a href=\"\" class=\"nav-link\">தொடர்பு கொள்ள</a></li>
                                <li class=\"col-6 col-md  p-0\"><a href=\"\" class=\"nav-link\">தள உள்ளடக்கம்</a></li>
                                <li class=\"col-6 col-md  p-0\"><a href=\"\" class=\"nav-link\">தொகுப்பாற்றுப்படை</a></li>
                                <li class=\"col-6 col-md  p-0\"><a href=\"#\" class=\"nav-link\">கருத்து தெரிவிக்க</a></li>
                                <li class=\"col-12 col-md p-0\"><a href=\"\" class=\"nav-link\">பார்வையாளர் : ABCD</a></li>
                            </ul>
                        </div>
        
                    </div>
        
                    <div class=\"divider light\">
                        <hr>
                    </div>
        
                    <div class=\"row  \">
                        <div class=\"col-lg-3 col-sm-12\">
                            <div class=\"\">
                                <ul class=\"list-inline text-white d-inline-block\">
        
                                    <li class=\"list-inline-item\"><a href=\"\" target=\"_blank\" class=\"nav-link\"><i
                                                class=\"fa fa-facebook\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"\" target=\"_blank\" class=\"nav-link\"><i
                                                class=\"fa fa-twitter\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"\" target=\"_blank\" class=\"nav-link\"><i
                                                class=\"fa fa-google-plus\"></i></a></li>
                                    <li class=\"list-inline-item\"><a href=\"\" target=\"_blank\" class=\"nav-link\"><i
                                                class=\"fa fa-youtube\"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class=\"col-lg-6 col-sm-12\">
                            <p class=\"text-center text-white\">பதிப்புரிமை @ 2024,
                                <a href=\"\" class=\"text-center text-white text-decoration-none\" target=\"_blank\">சித்த
                                    மருத்துவம்</a>
                            </p>
                        </div>
                        <div class=\"col-lg-3 text-right\">
                            <p class=\"text-white\">Developed By :
                                <a href=\" \" class=\"text-white text-decoration-none\" target=\"_blank\">சித்த மருத்துவம்</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!--footer-->
        
            <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>
            <script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js\"></script>
        
            <script>
                function switchLanguage(lang) {
                    if (lang === 'en') {
                        document.querySelectorAll('.en').forEach(el => {
                            el.style.display = 'block';
                        });
                        document.querySelectorAll('.ta').forEach(el => {
                            el.style.display = 'none';
                        });
                    } else if (lang === 'ta') {
                        document.querySelectorAll('.ta').forEach(el => {
                            el.style.display = 'block';
                        });
                        document.querySelectorAll('.en').forEach(el => {
                            el.style.display = 'none';
                        });
                    }
                }
        
            </script>
        
            <script>
                document.getElementById('likeButton').addEventListener('click', function () {
                    var clickSound = document.getElementById('clickSound');
                    clickSound.play();
                });
            </script>
            <script>
                document.getElementById('dislikeButton').addEventListener('click', function () {
                    var clickSound = document.getElementById('clickSound');
                    clickSound.play();
                });
            </script>
        
        <script>
        let images = document.querySelectorAll(\".img-gallery img\");
        let wrapper = document.querySelector(\".imageWrapper\");
        let imgWrapper = document.getElementById(\"fullImg\");
        let close = document.querySelector(\".imageWrapper span\");
        
        images.forEach((img, index) => {
          img.addEventListener(\"click\", () => {
            let imgSrc = img.getAttribute(\"src\");
            openModal(imgSrc);
          });
        });
        
        close.addEventListener(\"click\", () => (wrapper.style.display = \"none\"));
        
        function openModal(pic) {
          console.log(\"Opening modal with image:\", pic);
        
          wrapper.style.display = \"flex\";
          imgWrapper.src = pic;
        
          console.log(\"Image source set to:\", imgWrapper.src);
        }
        

        </script>
        
        </body>
        
    </html>";

    // Write the HTML content to a file
    file_put_contents($folder_name1 . '/' . $html_file_name1,  $htmlfile2);

    // Redirect to the generated HTML file
    header("Location: $htmlFile");
    exit();
}