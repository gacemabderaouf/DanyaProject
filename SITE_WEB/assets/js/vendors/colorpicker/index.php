<?php

require "../config/db.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="This is a test for project n°3 team 26">
    <meta name="author" content="0m3ga-K0d3r">
    <link rel="icon" href="">

    <!-- Normalize CSS :D -->
    <link rel="stylesheet" href="../assets/css/vendors/normalize.css">
    

    <script src="codeMirror/lib/codemirror.js"></script>
    <link rel="stylesheet" href="codeMirror/lib/codemirror.css">
    <link rel="stylesheet" href="codeMirror/theme/base16-dark.css">

    <script src="codeMirror/addon/edit/matchbrackets.js"></script>
    <script src="codeMirror/addon/edit/closebrackets.js"></script>
    <script src="codeMirror/addon/display/fullscreen.js"></script>
    <script src="codeMirror/addon/mode/simple.js"></script>
    
    
    <!-- Un Mode Pour le Language D -->
    <script src="codeMirror/mode/dlang/dlang.js"></script>
    <!-- JS File to handle Editor Operations -->
    <!-- Necessary to implement the Editor Full Screen Effect -->
    <link rel="stylesheet" href="codeMirror/addon/display/fullscreen.css">
    <!-- Bootstrap & FontAwesome Stylesheets -->
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap-select.min.css">
    <link rel="stylesheet" href="../assets/css/vendors/font-awesome.min.css">
    
    
    <!-- For Icons -->
    <!-- Custom CSS File -->
    <!-- Animation CSS -->
    <link rel="stylesheet" href="../assets/css/vendors/animate.min.css">
    <link rel="stylesheet" href="../assets/css/resources/style.css">
    <link rel="stylesheet" type="text/css" href="colorpicker/css/bootstrap-colorpicker.min.css">
    

    <script src="../assets/js/vendors/jquery-3.1.1.min.js"></script>
    <script src="colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <style>
    
        .img__SectionS{
              margin-bottom: 20px;
           
          }
          
         #sectionSpecialesInsertionModal .modal-dialog{
            
              width: 1110px;!important;
              height: auto;!important;
              max-height: 100%;!important;
          }
        .img__SectionS:hover{
            cursor: pointer;
        }
        #titleInsertion {
    position: relative;!important;
    
}
        #titleInsertion .fa-angle-right{
            display: inline-block;
            margin-left: 85px;
            font-weight: bold;
            
        }
.titlesubmenu {
    top: 0;!important;
    left: 100%;!important;
    margin-top: -1px;!important;
}
        #cp2{
            width: 130px;
            height: 10px;
           display: inline-table;
           vertical-align: bottom;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 8px;
        }
    </style>

    
    <title>DANYA PRJECT | 0m3ga-k0d3r</title>

</head>
<body class="dark">

    <!-- Preloader Start  -->
    <div id="preloader">

    </div>
    <!-- Preloader End -->

    <!-- Navbar Start -->
    <nav class="navbar dark-theme">
        <div class="container-fluid">
            <!-- Logo and Toggle Are grouped for better mobile Display -->
            <div class="navbar-header"> <!-- Navbar Header -->
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigationLinks"
                aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- - Logo Start -->
                <a href="index.php" class="navbar-brand">0m3ga<strong>K0d3r.</strong></a>
                <!-- - Logo End -->
            </div> <!-- End Navbar Header -->
            <!-- Begin Navigation Links -->
            <!-- Collecting nav links,forms and other content for toggling -->
            <div class="collapse navbar-collapse" id="navigationLinks">
                <ul class="nav navbar-nav">
                    <li><a href="#"><i class="fa fa-play" aria-hidden="true"></i> Run</a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><i class="fa fa-gear"></i> Settings <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Show Line Numbers</a></li>
                            <li><a href="#">Show Line Numbers</a></li>
                            <li class="divider"></li>
                            <li><a href="" data-target="#changeWebsiteThemeModal" data-toggle="modal">Change Website Theme</a></li>
                        </ul>
                    </li>
                    <li><a href="">Stats <i class="fa fa-area-chart"></i></a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="search Here" id="navSearch">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">More <i class="fa fa-plus"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Our team</a></li>
                            <li><a href="#">Latest Saved</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About Projet</a></li>
                        </ul>
                    </li>

                </ul>

            </div>


            <!-- End Navigation Links -->

        </div>
    </nav>
    <!-- Navbar End -->



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="codeEditor">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <div class="menu-bar">

                            <ul class="menu-items">
                                <li><a href="javascript:void(0);" class="editorIcon"><i class="fa fa-circle" id="close"></a></i></li>
                                <li><a href="javascript:void(0);" class="editorIcon"><i class="fa fa-circle" id="magnify"></a></i></li>
                                <li><a href="javascript:void(0);" class="editorIcon"><i class="fa fa-circle" id="reduce"></a></i></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button">
                                        Code <i class="fa fa-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);" onclick="handleUpload()"><i class="fa fa-upload"></i> &nbsp;Upload ...</a></li>
                                        <li><a href="javascript:void(0);" onclick="emptyEditor()"><i class="fa fa-trash"></i> &nbsp;Empty Editor</a></li>
                                        <li><a href="javascript:void(0);" onclick="saveToDB()"><i class="fa fa-save"></i> &nbsp;Save To Database ...</a></li>
                                        <li><a href="javascript:void(0);" onclick="saveAsTemplate()"><i class="fa fa-file-code-o"></i> &nbsp;Save As Template ...</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button">Insertion
                                     <i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);" onclick="handleImageInsertion()"><i class="fa fa-picture-o"></i>&nbsp; Image</a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-video-camera"></i>&nbsp; Media</a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-table"></i>&nbsp; Table</a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-columns"></i>&nbsp; Columns</a></li>
                                        <li id="titleInsertion" class="dropdown-submenu"><a href="javascript:void(0);" tabindex="0"><i class="fa fa-header"></i>&nbsp; Titles <i class="fa fa-angle-right"></i></a>
                                            <ul class="dropdown-menu titlesubmenu">
                                                <li> <a tabindex="0" href="#" onclick="handleTitle(1);">Title1</a></li>
                                                <li> <a tabindex="0" href="#" onclick="handleTitle(2);">Title2</a></li>
                                                <li> <a tabindex="0" href="#" onclick="handleTitle(3);">Title3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);"  onclick="handlePanel()"><i class="fa fa-tags"></i>&nbsp; Sections Spéciales</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true">
                                        Format <i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);" onclick="handleBoldOp()"><i class="fa fa-bold custom-color-icon"></i> Bold</a></li>
                                        <li><a href="javascript:void(0);" onclick="handleItalicOp()"><i class="fa fa-italic custom-color-icon"></i>  Italic</a></li>
                                        <li><a href="javascript:void(0);" onclick="handleUnderlinOp()"><i class="fa fa-underline custom-color-icon"></i>  Underlined</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-gears"></i> Editor Settings <i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Show Line Numbers</a></li>
                                        <li><a href="javascript:void(0);">Full Screen <i class="fa fa-desktop"></i></a></li>
                                    </ul>
                                </li>

                            </ul>
                            <ul class="menu-items" id="most-used-operations" style="margin-left: 120px; margin-top: 0;">
                                <li><a href="javascript:void(0);" onclick="handleBoldOp()"><i class="fa fa-bold"></i></a></li>
                                <li><a href="javascript:void(0);" onclick="handleUnderlinOp()"><i class="fa fa-underline"></i></a></li>
                                <li><a href="javascript:void(0);" onclick="handleItalicOp()"><i class="fa fa-italic"></i></a></li>
                                <li style="color: #fefefe;">|</li>	
                                <li><a href="" class="cpl"><i class="fa fa-eyedropper"></i></a>
                                <div id="cp2" class="input-group colorpicker-component">
                                 <input type="text" value="#00AABB" id="cp" class="form-control" />
                                    <span class="input-group-addon"><i style="background-color:rgb(0, 170, 187);display:block;height:16px;width:16px;"></i></span>
                                      </div>
                                </li>                             
                                <li><a href=""><i class="fa fa-table"></i></a></li>
                                <li><a href=""><i class="fa fa-columns"></i></a></li>
                                <li><a href=""><i class="fa fa-video-camera"></i></a></li>
                                <li><a href=""><i class="fa fa-image"></i></a></li>
                                <li><a href=""><i class="fa fa-search"></i></a></li>
                                <li><a href="javascript:void(0);"  onclick="handleUpload()"><i class="fa fa-upload"></i></a></li>
                                <li><a href=""><i class="fa fa-link"></i></a></li>
                                <li><a href=""><i class="fa fa-file-o"></i></a></li>
                                <li><a href=""><i class="fa fa-save"></i></a></li>

                            </ul>

                        </div>

                    </div>
                    <div class="panel-body">
                        <form>
                            <textarea name="code" id="codeArea">/* Ceci est un editeur du Language D*/</textarea>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12" id="visualisationArea">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center">OMEGA</h4>
                    </div>
                    <div class="panel-body">
                        <iframe src="" frameborder="0" id="codeResult"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <!-- Nothing is Selected Modal -->
    <div class="modal fade" id="nothingSelectedModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="text-center bounce"><i class="fa fa-warning fa-2x" style="vertical-align: middle;"   ></i> Selection Error </h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Make Sure Something is <strong>selected</strong> and try again !</p>
                </div>
            </div>
        </div>

    </div>
    <!-- Nothing Selected Modal END -->



    <div class="autoComplete">
        <div class="selectedAutoComplete">p</div>
        <div>getp</div>
        <div>titre</div>
        <div>titre2</div>
        <div>titre3</div>
        <div>ruban</div>
        <div>g</div>
        <div>i</div>
        <div>s</div>
        <div>couleur</div>
        <div>taille</div>
        <div>puce</div>
        <div>getpuce</div>
        <div>num</div>
        <div>getnum</div>
        <div>image</div>
        <div>getimage</div>
        <div>lvm</div>
        <div>lvs</div>
        <div>lvu</div>
        <div>colonnes</div><div>getcolonnes</div>
        <div>entetetable</div>
        <div>lignetable</div>
        <div>affichertable</div>
        <div>gettable</div>
        <div>note</div><div>alerte</div><div>observation</div><div>regle</div><div>definition</div><div>form</div>
        <div>youtube</div><div>getyoutube</div><div>iframe</div><div>getiframe</div><div>video</div><div>getvideo</div>
        <div>telecharger</div>
        <div>slide</div><div>afficherslide</div>
        <div>post</div><div>afficherpost</div>
        <div>tabs</div><div>affichertabs1</div><div>affichertabs2</div>
    </div>





    <!-- Insert Image Modal -->

    <div class="modal fade-scale" id="imageInsertionModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h3 class="text-center"><i class="fa fa-image fa-2x" style="vertical-align: middle;"></i> Image Insertion </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <form class="form-inline">
                                <div class="form-group">
                                    <select name="images" id="images" class="selectpicker">
                                        <option value="none" selected>None</option>
                                        <?php
                                        $imgSelectQuery = "SELECT * FROM images ORDER BY date_uploaded DESC";
                                        $selectionResult = mysqli_query($conn, $imgSelectQuery);
                                        while ($row = mysqli_fetch_assoc($selectionResult)) {
                                            echo '<option value="'.$row["name"].'">'.substr($row["name"], 0, strpos($row["name"], ".")).'</option>';
                                        }
                                        ?>
                                    </select>
                                    Or from PC
                                    <input type="file" id="uploadImg" name="files[]">
                                </div>

                            </form>
                            <div class="alert alert-success" id="uploadSuccess"></div>
                            <div class="alert alert-danger" id="uploadFailure"></div>

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <h5 class="text-center">Image Thumbnail</h5>
                            <img src="aliens.jpg" alt="Preview Of Image" class="img-responsive thumbnail" id="previewImage">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"> Cancel </button>
                    <button type="button" class="btn btn-success" id="addImageToEditor"> Add </button>
                </div>
            </div>
        </div>
    </div>




    <!-- Insert Image Modal End -->
     <!-- Insert Panels Modal -->

    <div class="modal fade-scale" id="sectionSpecialesInsertionModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h3 class="text-center"><i class="fa fa-info fa-2x" style="vertical-align: middle;"></i> Section Spéciale Insertion </h3>
                </div>
                <div class="modal-body" id="sSpecialesModalBody">
                   
                        
                          <img  onclick="handlePanel(event)" src="../uploads/images/imgSectionS/Observation.png" id="observation" class="img__SectionS">
                           <img src="../uploads/images/imgSectionS/note.png" id="note"class="img__SectionS" onclick="handlePanel(event)">
                          <img src="../uploads/images/imgSectionS/alerte.png" id="alerte"class="img__SectionS" onclick="handlePanel(event)">
                            <img src="../uploads/images/imgSectionS/regle.png" id="regle"class="img__SectionS"onclick="handlePanel(event)">
                           <img src="../uploads/images/imgSectionS/definition.png" id="definition"class="img__SectionS"onclick="handlePanel(event)">
                          <img src="../uploads/images/imgSectionS/sommaire.png" id="forme" class="img__SectionS"onclick="handlePanel(event)">

                        
                        
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"> Cancel </button>
                    <button type="button" class="btn btn-success" id="addImageToEditor"> Add </button>
                </div>
            </div>
        </div>
    </div>




    <!-- Insert Panels Modal End -->


    <!-- Full Screen Search -->
    <div id="fullSearch">
        <button type="button" class="closeSearch"><i class="fa fa-close"></i></button>
        <form action="../search/search.php" method="GET">
            <input type="search" value="" placeholder="Type KeyWord Here" name="searchQuery" autocomplete="off">
            <input type="submit" class="btn btn-block btn-primary" name="searchSubmit">
        </form>
        <p id="searchNote">This Will Redirect You To Another Page :D (i'm Not USING AJAX, Sorry)</p>
    </div>
    <!-- End FullScreen Search -->



    <!-- Upload  Code Modal -->
    <div class="modal fade-scale" id="uploadCodeModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal Content -->
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>

                    <h4 class="text-center"><i class="fa fa-upload"></i> Upload A File To Editor </h4>
                </div>
                <!-- Modal Header End -->

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- DRag n Drop Zone -->
                    <div class="row text-center" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <input type="file" id="codeUploadBrowser" name="files[]" class="hide">
                            <p class="text-muted text-center">Click The Upload Button to Upload Your Own Code </p>
                            <button class="btn btn-custom" type="button" id="uploadCode"> <i class="fa fa-cloud-upload"></i> &nbsp;Upload Code</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="text-center"><i class="fa fa-code icon-big"></i> Code Preview</h5>
                                </div>
                                <div class="panel-body">
                                    <textarea id="uploadCodePreview">/* This is The Preview Of your Uploaded Code and you can not edit this*/</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="text-center"><i class="fa fa-info-circle icon-big"></i> File Informations</h5>
                                </div>
                                <div class="panel-body" style="height: 200px;">
                                    <div class="row text-center hide" id="fileInfos">
                                        <div class="col-md-4">
                                            <p><span class="label label-primary">File Name: </span></p>
                                            <p><span class="label label-primary">File Size:     </span></p>
                                            <p><span class="label label-primary">Last Modified: </span></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p><i class="fa fa-arrow-right"></i></p>
                                            <p><i class="fa fa-arrow-right"></i></p>
                                            <p><i class="fa fa-arrow-right"></i></p>

                                        </div>
                                        <div class="col-md-6">
                                            <p><span id="fileNamePreview">Miaw</span></p>
                                            <p><span id="fileSizePreview">Miaw</span></p>
                                            <p><span id="LastModifiedPreview">Miaw</span></p>
                                        </div>
                                    </div>

                                        <div class="hide" id="fileTypeError">
                                            <div class="alert alert-danger animated shake">
                                                Sorry, File <strong>Not Supported</strong> !
                                            </div>
                                        </div>


                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- Modal Body End -->

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom" id="addCodeToEditor">Add To Editor</button>
                </div>
                <!-- Modal Footer Ends -->
            </div>
            <!-- Modal Content End -->
        </div>
    </div>

    <!-- Upload Code Modal End -->


    <div class="modal fade-scale" id="saveCodeResponseModal" role="dialog">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    <h4 id="response"></h4>
                </div>
            </div>
        </div>
    </div>


    <!-- Save Code To DB Start -->
    <div class="modal fade-scale" id="saveCodeModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" class="close">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4><i class="fa fa-save"></i> Save Code To Database</h4>
                </div>
                <div class="modal-body">
                    <p class="text-faded text-center"> Enter The Following Infos. And Press The Save Button</p>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="addon-name"> &nbsp;&nbsp;&nbsp;&nbsp;Name &nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <input type="text" class="form-control" placeholder="Website Name Here" aria-describedby="addon-name" id="websiteName">
                                </div>
                                <p id="websiteNameError" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="addon-description"> Description </span>
                                    <textarea type="text" class="form-control" placeholder="Website Descritption Here" aria-describedby="addon-desciption" id="websiteDescription"></textarea>
                                </div>
                                <p id="websiteDescriptionError" class="text-danger"></p>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" id="addon-category"> &nbsp;&nbsp;Category &nbsp;</span>
                                    <input type="text" class="form-control" placeholder="Website Category Here" aria-describedby="addon-category" id="websiteCategory">
                                </div>
                                <p id="websiteCategoryError" class="text-danger"></p>
                            </div>
                            <button type="button" class="btn btn-custom btn-block" id="addToDB">Add To Database</button>
                    </div>
                </div>


            </div>

        </div>
    </div>
    </div>
    <!-- Save Code To DB ENd -->
    <div class="SnackBar" id="websiteSavedSuccessSnackbar">
        <i class="fa fa-check-circle"></i> Website Saved Successfully to Database.
    </div>
    <div class="SnackBar" id="canNotAddToDB">
        <i class="fa fa-check-circle"></i> Couldn't Save Website
    </div>







    <script src="../assets/js/vendors/tether.min.js"></script>
    <script src="../assets/js/vendors/bootstrap.min.js"></script>
    <script src="../assets/js/vendors/bootstrap-select.min.js"></script>

    <script>
    

        var myTextArea = document.querySelector("#codeArea");
        var Omega = CodeMirror.fromTextArea(myTextArea, {
        lineNumbers: true,
        mode: "dlang",
        theme: "base16-dark",
        lineWrapping: true,
        matchBrackets: true,
        autoCloseBrackets: true,
        extraKeys: {
            "F11": function (cm) { // FullScreen Key
                cm.setOption("fullScreen", !cm.getOption("fullScreen"));
            },
            "Esc": function (cm) { // Escape Key
                if (cm.getOption("fullScreen")) {
                    cm.setOption("fullScreen", false);
                }
            }
            }
        });

        var previewCode = document.querySelector("#uploadCodePreview");
        var Previewer = CodeMirror.fromTextArea(previewCode, {
        mode: "dlang",
        theme: "base16-dark",
        lineWrapping: true,
        readOnly: "nocursor"
        });

    $("#images").on("change", function (event) {
        var newImagePath = $("#images").val();
        $("img#previewImage").attr("src", newImagePath);
    });


    $('.selectpicker').selectpicker({
        style: 'btn-danger',
        size: 4
    });



    

    /*
    


    */

    // Bold Text Operation
    // Replace Selection or Selections



    function handleImageChange(event) {
        var newImagePath = $("#images").val();
        $("img#previewImage").attr("src", newImagePath);
    }




    function setDarkTheme() {
        Omega.setOption("theme", "base16-dark");
    }


    function setLightTheme() {
        if (Omega.theme == "mdn-like") {

        } else {
            Omega.setOption("theme", "mdn-like");
            Omega.refresh();
        }
    }


    /* Empty Editor */
    function emptyEditor(event) {
        Omega.setValue("");
        Omega.refresh();
    }
    /* Empty Editor End  */



    /* Save To DB */

    function saveToDB(event) {
        $("#saveCodeModal").modal("show");


        $("#addToDB").on("click", function (event) {
            var websiteName = $("#websiteName").val();
            var websiteDescription = $("#websiteDescription").val();
            var websiteCategory = $("#websiteCategory").val();
            if (websiteName == "" || websiteDescription == "" || websiteCategory == "") {
                if (websiteName == "") {
                    $("#websiteNameError").html("Website Name is <strong>Empty</strong> !");
                }
                if (websiteDescription == "") {
                    $("#websiteDescriptionError").html("Website Description is <strong>Empty</strong> !");
                }

                if (websiteCategory == "") {
                    $("#websiteCategoryError").html("Website Category is <strong>Empty</strong> !");
                }
            } else {
                var uri = "savecode.php";
                var xhr = new XMLHttpRequest();
                var fd = new FormData();
                xhr.open("POST", uri, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var json = JSON.parse(xhr.responseText);
                        if (json.status == "success") {

                            $("#websiteName").val("");
                            $("#websiteDescription").val("");
                            $("#websiteCategory").val("");
                            /* empty input fiels */
                            $("#websiteCategoryError").html("");
                            $("#websiteDescriptionError").html("");
                            $("#websiteNameError").html("");
                            /* Hide the Modal */
                            $("#saveCodeModal").modal("hide");
                            /* Showing the SnackBar */
                            /* Get the Snackbar Div */
                            $("#websiteSavedSuccessSnackbar").addClass("show");

                            /*Adding the Show class to the div */

                            /*Remove the show class After 3.5 seconds */
                            /* khaterch fadeOut dernalha delay nta3 3s w hiya déja tedi 0.5s bach trou7 */
                            /* 3s + 0.5s = 3.5s , if my Math is correct */
                            /* l paremetre lawal nta3 setTimeout ndirouh Anonymous Function */
                            setTimeout(function() {
                                $("#websiteSavedSuccessSnackbar").removeClass("show");
                            }, 3500);
                        } else if (json.status == "error") {
                            $("#websiteName").val("");
                            $("#websiteDescription").val("");
                            $("#websiteCategory").val("");

                            $("#websiteCategoryError").html("");
                            $("#websiteDescriptionError").html("");
                            $("#websiteNameError").html("");

                            /* Hide the modal */
                            $("#saveCodeModal").modal("hide");

                            $("#canNotAddToDB").addClass("show");
                            setTimeout(function () {
                                $("#canNotAddToDB").removeClass("show");
                            }, 3500);
                        }
                    }
                };

                fd.append("websiteName", websiteName);
                fd.append("websiteDescription", websiteDescription);
                fd.append("websiteCategory", websiteCategory);
                fd.append("websiteContent", Omega.getValue());

                xhr.send(fd);

            }

        })

    }


    /* Save To DB END */




    /* Handle Upload Code */

    function handleUpload() {

        $("#uploadCodeModal").modal("show");
        Previewer.refresh();

        $("#uploadCode").click(function(event) {
            $("#codeUploadBrowser").click();
        });
        $("#codeUploadBrowser").on("change", function () {
            // only one file is considered for upload
            var file = document.getElementById("codeUploadBrowser").files[0];
            var txtType = /text.*/;


            if (file.type.match(txtType)) {
                $("#fileInfos").removeClass("hide");
                $("#fileTypeError").addClass("hide");
                var txtFileReader = new FileReader();
                txtFileReader.onload = function (e) {
                    var resultText = txtFileReader.result;
                    Previewer.setValue(resultText);
                    $("#fileNamePreview").html(file.name);
                    $("#fileSizePreview").html(file.size + " Bytes");
                    var lastModified = file.lastModifiedDate.toDateString().substr(0, 15);
                    $("#LastModifiedPreview").html(lastModified);
                };
                txtFileReader.readAsText(file, "utf-8");
            } else {
                $("#fileInfos").addClass("hide");
                $("#fileTypeError").removeClass("hide");
            }

            $("#addCodeToEditor").on("click", function(event) {
            	console.log(event.target);
                Omega.setValue(Previewer.getValue());
                $("#uploadCodeModal").modal("hide");
            });


        });
    }





    function handleBoldOp(event) {

        if (!Omega.somethingSelected()) {
            $("#nothingSelectedModal").modal("show");
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-g["+Omega.getSelections()[i]+"]");
            }
            Omega.replaceSelections(replacements);
        }
    }

    // Italic Text Operation
    // Replace Selectio or Selections

    function handleItalicOp(event) {

        if (!Omega.somethingSelected()) {
            $("#nothingSelectedModal").modal("show");
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-i["+Omega.getSelections()[i]+"]");
            }
            Omega.replaceSelections(replacements);
        }
    }

    // Underline Text Operation
    // Replace Selectio or Selections

    function handleUnderlinOp(event) {

        if (!Omega.somethingSelected()) {
            $("#nothingSelectedModal").modal("show");
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-s["+Omega.getSelections()[i]+"]");
            }
            Omega.replaceSelections(replacements);
        }
    }

    /* Handle Upload Code and Addto Editor */


    function handleTableOp (nlines,mColumns,columnsWidths,printIt){
        var result="-entetetable[";
        for (var i=0;i<mColumns-1;i++){
            result+="/*Nom colonne "+(i+1)+"*/";
            if (columnsWidths[i]!="") result+=":"+columnsWidths[i];
            result+='|';
        }
        result+="/*Nom colonne "+(i+1)+"*/";
        if (columnsWidths[i]!="") result+=":"+columnsWidths[i];
        result+="]";
        if (nlines>0){
            result+="\n";
            for (var i=0;i<nlines;i++){
                result+="-lignetable[";
                for (var j=0;j<mColumns-1;j++){
                    result+="/*Col "+(j+1)+" line "+(i+1)+"*/";
                    result+='|';
                }
                result+="/*Col "+(j+1)+" line "+(i+1)+"*/]\n";
            }
            if (printIt) result+="-affichertable\n";
        }
        return result;
    }



    /* This is a function to handle Image insertion */

    function handleImageInsertion(event) {
        $("#imageInsertionModal").modal("show");

        // Handle uplaod
        $("#uploadImg").on("change", function (event) {
            var uri = 'upload.php';
            var xhr = new XMLHttpRequest();
            var fd = new FormData();
            var file = document.getElementById("uploadImg").files[0];
            $("#uploadFailure").html("Loading");

            xhr.open("POST", uri, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if(xhr.status == 200) {

                        var json = JSON.parse(xhr.responseText);
                        if (json.status == "success") {
                            $("#uploadSuccess").html("Upload Success");
                            $("#images").append('<option>gggggg</option>');
                            $("#uploadFailure").html("").css("display", "none");
                            var tobeApprended = " -Image[" + json.path + "]";
                            Omega.replaceRange(tobeApprended, CodeMirror.Pos(Omega.lastLine()));
                        }
                    }
                }
            };

            fd.append('myFile', file);

            // initiate a multipart/form-data upload
            xhr.send(fd);
        });

    }
        /* This is a function to handle Panel insertion */

        function handlePanel(event) {
        $("#sectionSpecialesInsertionModal").modal("show");
         var panelType=event.target.id;   
      
          
        if (!Omega.somethingSelected()) {
            $("#nothingSelectedModal").modal("show");
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-"+panelType+"["+Omega.getSelections()[i]+"]");
            }
            Omega.replaceSelections(replacements);
        }
         
          $("#sectionSpecialesInsertionModal").modal("hide");
                 
    }
         function handleTitle(titleType) {
            var type=titleType;
            if(titleType==1)
                {
                    type="";
                }
          
        if (!Omega.somethingSelected()) {
            $("#nothingSelectedModal").modal("show");
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-titre"+type+"["+Omega.getSelections()[i]+"]");
            }
            Omega.replaceSelections(replacements);
        }
         
                 $(this).preventDefault();
    }
        

    $("#titleInsertion").on('mouseover',function(){
        $(this).addClass("open");
    });
     $("#titleInsertion").on('mouseout',function(){
        $(this).removeClass("open");
    });    
    $("#cp2").hide();
        $(".cpl").on('click',function(){
            $("#cp2").toggle(function(){
                if($("#cp2").css("display")=="none"){
                   alert($("#cp").val());
                    return false;
                }
                
            });
            return false;
        });


    $(document).ready(function () {

        $("#preloader").fadeOut(500);


        $("#navSearch").on("focus", function(event) {
            event.preventDefault();
            $("#fullSearch").addClass("open");
            $('#fullSearch > form > input[type="search"]').focus();
            $("body").css("overflow", "hidden");
        });

        $("#fullSearch, #fullSearch button.close").on("click keyup", function (event) {
            if (event.target == this || event.target.className == "closeSearch" || event.keyCode == 27) {
                $(this).removeClass("open");
                $('#fullSearch > form > input[type="search"]').val("");
                $("body").css("overflow", "auto");
            }
        });


        if (window.File && window.FileReader && window.FileList && window.Blob) {
            // pass
        }
        else
        {
            alert("File API's are not fully supported in this browser");
        }

    });


    var codeDiv=$("#codeEditor div.CodeMirror");
    var autoDiv=$(".autoComplete");
    var divs=autoDiv.find("div");
    var waiting=false;
    var oldPos=null,posInChange=null;
    var selected=null;
    var sibling=null;
    var scrollingHandler=1;
    codeDiv.append(autoDiv);
    Omega.on("keydown",function(instance,event){
        if (event.keyCode=='109' || event.keyCode=="54")
        {
            waiting=true;
            oldPos=Omega.getCursor();
            showAuto();
        }
        else if(waiting && (event.keyCode=='37' || event.keyCode=='39' || event.keyCode=='27')){
            hideAuto();
        }
        else if (waiting && (event.keyCode=="38" || event.keyCode=="40")){
            event.preventDefault();
            selected=autoDiv.find($(".selectedAutoComplete"));
            /****************************************/
            
            if (event.keyCode=="40"){
                sibling=selected.next();
                while (sibling.css("display")=="none") sibling=sibling.next();
                if (sibling.length){
                    if (scrollingHandler<8) scrollingHandler++;
                    else autoDiv.scrollTop(autoDiv.scrollTop()+22);
                    selected.removeClass("selectedAutoComplete");
                    sibling.addClass("selectedAutoComplete");
                }
                else
                {
                    selected.removeClass("selectedAutoComplete");
                    var tempo=autoDiv.find(":first-child");
                    while (tempo.css("display")=="none") tempo=tempo.next();
                    tempo.addClass("selectedAutoComplete");
                    autoDiv.scrollTop(0);
                    scrollingHandler=1;
                }
            }
            else
            {
                sibling=selected.prev();
                while (sibling.css("display")=="none") sibling=sibling.prev();
                if (sibling.length){
                    if (scrollingHandler>1) scrollingHandler--;
                    else autoDiv.scrollTop(autoDiv.scrollTop()-22);
                    selected.removeClass("selectedAutoComplete");
                    sibling.addClass("selectedAutoComplete");
                } else{
                    selected.removeClass("selectedAutoComplete");
                    var tempo=autoDiv.find(":last-child");
                    while (tempo.css("display")=="none") tempo=tempo.prev();
                    tempo.addClass("selectedAutoComplete");
                    autoDiv.scrollTop(1000);
                    scrollingHandler=8;
                }
            }
            /**************************************************************************/
        
        }

        


        else if(waiting && event.keyCode=="13"){
            event.preventDefault();
            selected=autoDiv.find($(".selectedAutoComplete"));
            Omega.replaceRange(returnCommand(selected.html()),oldPos,Omega.getCursor());
            hideAuto();
        }
        else if (waiting && (event.keyCode=="8" || (event.keyCode>=65 && event.keyCode<=90) || (event.keyCode>=96 && event.keyCode<=105))){
            divs.css("display","block");
            divs.removeClass("selectedAutoComplete");
            divs[0].className+="selectedAutoComplete";
            posInChange=Omega.getCursor();
            if (event.keyCode!=8) posInChange.ch=posInChange.ch;
            else posInChange.ch=posInChange.ch-1;
            res=Omega.getRange(oldPos,posInChange);
            if (event.keyCode!=8){
                if (event.keyCode<96 || event.keyCode>105) res+=String.fromCharCode(event.keyCode).toLowerCase();
                else res+=String.fromCharCode(event.keyCode-48);
            }
            if (res=="") hideAuto();
            else{
                res=res.slice(1,res.length);
                var found=false;
                scrollingHandler=1;
                $.each(divs,function(index,divElem){
                    if((divElem.innerHTML).indexOf(res)!=0){
                        divElem.style.display="none";
                        divElem.className="";
                    } else{
                        if (!found) {
                            divElem.className="selectedAutoComplete";
                            found=true;
                        }
                    }
                });
                if (!found){
                    hideAuto();
                }
            }
        }

    });

    function showAuto(){
        var curs=codeDiv.find(".CodeMirror-cursor");
        autoDiv.css("display","block")
        autoDiv.css("top",(curs.css("top").replace("px",""))*1+25+"px");
        autoDiv.css("left",curs.css("left").replace("px","")*1+38+"px");
        autoDiv.scrollTop(0);
        divs.css("display","block");
        divs.removeClass("selectedAutoComplete");
        divs[0].className="selectedAutoComplete";
        scrollingHandler=1;
    }
    function hideAuto(){
        autoDiv.css("display","none");
        waiting=false;
        oldPos=null;
        found=true;
    }
    $(document).on("click",function(event){
        if (event.target.parentElement==autoDiv[0]){
            Omega.replaceRange(returnCommand(event.target.innerHTML),oldPos,Omega.getCursor());
            hideAuto();
            Omega.focus();
        }
        else{
            hideAuto();
        }
    });
    function returnCommand(input) {
        var output="-"+input;
        if (input!="affichertable" &&
            input!="getable"       &&
            input!="afficherslide" &&
            input!="affichertabs1" &&
            input!="affichertabs2"
        ) output+="[]";
        return output;
    }


</script>
</body>
</html>