<?php
require_once "../config/db.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="This is a test for project n°3 team 26">
    <meta name="author" content="0m3ga-K0d3r">
    <link rel="icon" href="">

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="../assets/css/vendors/normalize.css">


    <script src="codeMirror/lib/codemirror.js"></script>
    <link rel="stylesheet" href="codeMirror/lib/codemirror.css">
    <link rel="stylesheet" href="codeMirror/theme/base16-dark.css">
    <link rel="stylesheet" href="codeMirror/theme/mdn-like.css">
    <!-- Intro CSS file -->
    <link rel="stylesheet" href="../assets/css/vendors/introjs.min.css">

    <script src="codeMirror/addon/edit/matchbrackets.js"></script>
    <script src="codeMirror/addon/edit/closebrackets.js"></script>
    <script src="codeMirror/addon/display/fullscreen.js"></script>
    <script src="codeMirror/addon/mode/simple.js"></script>
    <script src="codeMirror/addon/search/search.js"></script>
    <script src="codeMirror/addon/dialog/dialog.js"></script>
    <link rel="stylesheet" href="codeMirror/addon/dialog/dialog.css">
    <script src="../assets/css/resources/FileSaver.min.js"></script>

    <!-- Un Mode Pour le Language D -->
    <script src="codeMirror/mode/dlang/dlang.js?omega=<?php echo uniqid(); ?>"></script>
    <!-- JS File to handle Editor Operations -->
    <!-- Necessary to implement the Editor Full Screen Effect -->
    <link rel="stylesheet" href="codeMirror/addon/display/fullscreen.css">
    <!-- Bootstrap & FontAwesome Stylesheets -->
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap-select.min.css">
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap-slider.min.css">
    <link rel="stylesheet" href="../assets/css/vendors/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/js/vendors/colorpicker/css/colorpicker.css">
    <!-- For Icons -->
    <!-- Custom CSS File -->
    <!-- Animation CSS -->
    <link rel="stylesheet" href="../assets/css/vendors/animate.min.css">

    <link rel="stylesheet" href="../assets/css/resources/style.css?omega=<?php echo uniqid();?>">


    <script src="../assets/js/vendors/jquery-3.1.1.min.js"></script>
     <!--Script de l'autoComplete-->
     <script type="text/javascript" src="../assets/js/resources/autoComplete.js"></script>

      <!--The main library -->
      <script type="text/javascript" src="../assets/js/resources/libraryDanyaProject.js"></script>
    <script src="../assets/js/vendors/colorpicker/js/colorpicker.js"></script>

    <title>DANYA PRJECT EQUIPE26</title>

    <!-- THIS STYLE IS FOR CLOUMNS AND TABS USED BY NADIR -->
    <style>

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: -5px;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu>a:after {
         display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        }
        #display{
            overflow-y: visible;
        }
    </style>

    <!-- END OF THE STYLE NEEDED BY NADIR -->

</head>
<body class="dark">

    <!-- PRELOADER -->
    <div class="spn_hol">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <!-- END PRELOADER -->

    <!-- Navbar Start -->
    <nav class="navbar light-theme">
        <div class="container-fluid">
            <!-- Logo and Toggle Are grouped for better mobile Display -->
            <div class="navbar-header"> <!-- Navbar Header -->
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigationLinks"
                aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- - Logo Start -->
                <a href="../index.php" class="navbar-brand">Danya<strong>Project.</strong></a>
                <!-- - Logo End -->
            </div> <!-- End Navbar Header -->
            <!-- Begin Navigation Links -->
            <!-- Collecting nav links,forms and other content for toggling -->
            <div class="collapse navbar-collapse" id="navigationLinks">
                <ul class="nav navbar-nav">
                    <li><a href="#visualisationArea" onclick="handleRunButton()"> Run <i class="fa fa-play"></i></a></li>
                    <li id="settingsStep">
                        <a href="javascript:void(0)"> <i class="fa fa-gears"></i> Settings </a>
                    </li>
                    <li class="dropdown" id="themesStep">
                                    <a href="javascript:void(0);" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true">
                                        <i class="fa fa-adjust"></i> Theme
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);" onclick="setLightTheme();">Light Theme</a></li>
                                        <li><a href="javascript:void(0);" onclick="setDarkTheme();">Dark Theme</a></li>
                                    </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" action="../search/index.php" method="GET">
                        <div class="input-group">
                            <input type="hidden" name="category" value="all">
                            <input type="hidden" name="date" value="latest">
                            <input type="text" name="q" class="form-control" placeholder="search Here">
                            <span class="input-group-btn">
                                <input class="btn btn-custom" type="submit" id="searchIcon" value="Search">
                           </span>

                        </div>

                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-code"></i> Editor</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" onclick="startIntro()"> &nbsp;Take a tour <i class="fa fa-taxi" style=""></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">More &nbsp;<i class="fa  fa-chevron-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)" id="exportCode"><i class="fa fa-download"></i> &nbsp;Export Code</a></li>
                            <li><a href="../search/index.php"><i class="fa fa-clock-o"></i>  &nbsp;Latest Saved</a></li>
                            <li class="divider"></li>
                            <li><a href="../index.php#contact"><i class="fa fa-envelope"></i> &nbsp;Contact Us</a></li>
                            <li><a href="../index.php"><i class="fa fa-question-circle"></i> &nbsp;About Project</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="../help" target="_blank"> 
                        <i class="fa fa-question-circle" ></i></a>
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
                    <div class="panel-heading" id="toolbar">
                        <div class="menu-bar" style="padding-left:10px;">

                            <div class="row">
                                 <!--code-->
                                <div class="col-md-3 col-sm-3 text-center" id="codeIcons">
                                    <div class="menu-bar">
                                        <ul class="menu-items">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button">
                                                    Code <i class="fa fa-caret-down"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="javascript:void(0);" onclick="handleUpload()"><i class="fa fa-cloud-upload"></i> &nbsp;Upload ...</a></li>
                                                    <li><a href="javascript:void(0);" onclick="emptyEditor()"><i class="fa fa-trash"></i> &nbsp;Empty Editor</a></li>
                                                    <li><a href="javascript:void(0);" onclick="saveToDB()"><i class="fa fa-database"></i> &nbsp;Save To Database ...</a></li>
                                                    <li><a href="#displayArea" class="runButton"><i class="fa fa-play"></i> &nbsp;Run Code</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="javascript:void(0);" onclick="handleUndo()" ><i class="fa fa-reply" aria-hidden="true"></i>&nbsp; Undo</a></li>
                                                    <li><a href="javascript:void(0);" onclick="handleRedo()"><i class="fa fa-share" aria-hidden="true"></i>&nbsp; Redo</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="javascript:void(0);" onclick="handleCopy(Omega.getSelections())"><i class="fa fa-files-o" aria-hidden="true"></i>&nbsp; Copy</a></li>
                                                    <li><a href="javascript:void(0);" onclick="handleCut(Omega.getSelections())"><i class="fa fa-scissors" aria-hidden="true"></i>&nbsp; Cut</a></li>
                                                    <li><a href="javascript:void(0);" onclick="handlePaste()"><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp; Paste</a></li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="icon-group">
                                            <div class="icon" data-toggle="tooltip" title="Upload code to Editor" data-placement="bottom"><a href="javascript:void(0);" onclick="handleUpload()"><i class="fa fa-cloud-upload"></i></a></div>
                                            <div class="icon" data-toggle="tooltip" title="Empty Editors Content" data-placement="bottom"><a href="javascript:void(0);" onclick="emptyEditor()"><i class="fa fa-trash"></i></a></div>
                                            <div class="icon" data-toggle="tooltip" title="Save Website to Database" data-placement="bottom" ><a href="javascript:void(0);"onclick="saveToDB()" ><i class="fa fa-database"></i></a></div>
                                            <div class="icon" data-toggle="tooltip" title="Run Code" data-placement="bottom" style="border-right:solid rgba(247, 247, 247, 0.3) 1px ;"><a href="#displayArea" class="runButton"><i class="fa fa-play" aria-hidden="true"></i></a></div>
                                            <div class="icon" data-toggle="tooltip" title="Undo" data-placement="bottom" ><a href="javascript:void(0);" onclick="handleUndo()"><i class="fa fa-reply" aria-hidden="true"></i></a></div>
                                            <div class="icon" data-toggle="tooltip" title="Redo" data-placement="bottom"  style="border-right:solid rgba(247, 247, 247, 0.3) 1px ;"><a href="javascript:void(0);" onclick="handleRedo()"><i class="fa fa-share" aria-hidden="true"></i></a></div>
                                            <div class="icon" data-toggle="tooltip" title="Copy" data-placement="bottom"><a href="javascript:void(0);" onclick="handleCopy(Omega.getSelections())"><i class="fa fa-files-o" aria-hidden="true"></i></a></div>
                                            <div class="icon" data-toggle="tooltip" title="Cut" data-placement="bottom"><a href="javascript:void(0);" onclick="handleCut(Omega.getSelections())"><i class="fa fa-scissors" aria-hidden="true"></i></a></div>
                                            <div class="icon" data-toggle="tooltip" title="Paste" data-placement="bottom"><a href="javascript:void(0);" onclick="handlePaste()"><i class="fa fa-clipboard" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                                <!--code END-->
                                <!--format-->

                                <div id="format">
                                  <div class="col-md-4 col-sm-4 text-center" id="formatIcons" >
                                      <div class="menu-bar">
                                          <ul class="menu-items">
                                              <li class="dropdown">
                                                  <a href="javascript:void(0);" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true">
                                                      Format <i class="fa fa-caret-down"></i></a>
                                                  <ul class="dropdown-menu">
                                                      <li><a href="javascript:void(0);" onclick="handleBoldOp()"><i class="fa fa-bold "></i>&nbsp; Bold</a></li>
                                                      <li><a href="javascript:void(0);" onclick="handleItalicOp()"><i class="fa fa-italic "></i>&nbsp; Italic</a></li>
                                                      <li><a href="javascript:void(0);" onclick="handleUnderlinOp()"><i class="fa fa-underline "></i>&nbsp; Underlined</a></li>
                                                      <li><a href="javascript:void(0);" class="cpl"><i class="fa fa-eyedropper"></i>&nbsp; Text Color</a></li>
                                                      <li id="sizeIconInList">
                                                          <a href="javascript:void(0);"  >
                                                              <i class="fa fa-text-height"></i>&nbsp; Text Size
                                                              <div id="sizeBInList" style="position:absolute;   z-index:999; display:none;" >
                                                                  <input id="sizeSetterInList" type="text" data-slider-min="1" data-slider-max="7" data-slider-step="1" data-slider-value="3"/>
                                                                  <a href="#" style="position: relative; left:0px;  z-index:999;" id="sizeSetInList"><i class="fa fa-check-circle" ></i></a>
                                                              </div>
                                                          </a>
                                                      </li>
                                                      <li class="divider"></li>
                                                      <li id="titleInsertion" class="dropdown-submenu"><a href="javascript:void(0);" tabindex="0"><i class="fa fa-header"></i>&nbsp; Titles </a>
                                                          <ul class="dropdown-menu titlesubmenu">
                                                              <li> <a tabindex="0" href="#" onclick="handleTitle(1);">Title1</a></li>
                                                              <li> <a tabindex="0" href="#" onclick="handleTitle(2);">Title2</a></li>
                                                              <li> <a tabindex="0" href="#" onclick="handleTitle(3);">Title3</a></li>
                                                          </ul>
                                                      </li>
                                                      <li><a href="javascript:void(0);" onmouseover="handleNumHoveringIn()" onmouseleave="handleNumHoveringOut()"><i class="fa fa-list-ol" ></i>&nbsp; Num

                                                             <div class="numInserting" id="numDiv">
                                                                 <table>
                                                                     <tr>
                                                                         <td>Le type des puces:</td>
                                                                         <td><select id="pucesType">
                                                                              <option>Default</option>
                                                                             <option>Lower Alpha</option>
                                                                             <option>Lower Greek</option>
                                                                             <option>Lower Roman</option>
                                                                             <option>Upper Alpha</option>
                                                                             <option>Upper Roman</option>
                                                                         </select></td>
                                                                     </tr>
                                                                     <tr>
                                                                         <td>Nombre de puces:</td>
                                                                         <td><input type="number" min="1" id="nbPuces" value="1"></td>
                                                                     </tr>
                                                                 </table>
                                                                  <table style="width: 100%;">
                                                                      <tr>
                                                                         <td>
                                                                            <span style="display: none;color: red" id="invalidNum" >Le nombre est invalide!</span>
                                                                         </td>
                                                                         <td>
                                                                              <button type="button" class="btn btn-primary" id="numBtn">Valider</button>
                                                                         </td>
                                                                      </tr>
                                                                  </table>
                                                             </div>
                                                          </a>
                                                      </li>
                                                      <li id="MenuPuces" ><a href="javascript:void(0);" onclick="handlePucesOp()"><i class="fa fa-list"></i>&nbsp; Puces</a></li>
                                                      <li class="divider"></li>
                                                      <li><a href="javascript:void(0);" class="textJustify"><i class="fa fa-align-justify" aria-hidden="true"></i>&nbsp; Justify</a></li>
                                                      <li><a href="javascript:void(0);" class="textCenter"><i class="fa fa-align-center" aria-hidden="true"></i>&nbsp; Center</a></li>
                                                      <li><a href="javascript:void(0);" class="alignLeft"><i class="fa fa-align-left" aria-hidden="true"></i>&nbsp; Align Left</a></li>
                                                      <li><a href="javascript:void(0);" class="alignRight"><i class="fa fa-align-right" aria-hidden="true"></i>&nbsp; Align Right</a></li>
                                                  </ul>
                                              </li>
                                          </ul>
                                      </div>
                                      <div class="icon-group">
                                              <div class="icon" data-toggle="tooltip" title="Bold Text" data-placement="bottom"><a href="javascript:void(0);" onclick="handleBoldOp()"><i class="fa fa-bold"></i></a></div>
                                              <div class="icon" data-toggle="tooltip" title="Underlined Text" data-placement="bottom"><a href="javascript:void(0);" onclick="handleItalicOp()"><i class="fa fa-underline"></i></a></div>
                                              <div class="icon" data-toggle="tooltip" title="Italic Text" data-placement="bottom"><a href="javascript:void(0);" onclick="handleUnderlinOp()"><i class="fa fa-italic"></i></a></div>
                                              <div class="icon cpl"><a href="javascript:void(0);"><i class="fa fa-eyedropper "></i></a></div>
                                              <div id="sizeIcon" class="icon" style="border-right:solid rgba(247, 247, 247, 0.3) 1px ;">

                                                      <a href="javascript:void(0);" id="sizeIcn" >
                                                          <i class="fa fa-text-height"></i>
                                                          <div id="sizeB" style="position:absolute;   z-index:999; display:none;" >
                                                              <input id="sizeSetter" type="text" data-slider-min="1" data-slider-max="7" data-slider-step="1" data-slider-value="3"/>
                                                              <a href="#" style="position: relative; left:0px;  z-index:999;" id="sizeSet"><i class="fa fa-check-circle" ></i></a>
                                                          </div>
                                                      </a>

                                              </div>

                                              <div class="icon" id="titleIcon" onmouseover="handleTitleHoveringInHor();" onmouseout="handleTitleHoveringOutHor();">
                                                  <a href="javascript:void(0);">
                                                  <i class="fa fa-header"></i>

                                                       <ul class="dropdown-menu titleInsertingHor" id="titleDivHor"  style="display:none">
                                                              <li> <a tabindex="0" href="#" onclick="handleTitle(1);">Title1</a></li>
                                                              <li> <a tabindex="0" href="#" onclick="handleTitle(2);">Title2</a></li>
                                                              <li> <a tabindex="0" href="#" onclick="handleTitle(3);">Title3</a></li>
                                                      </ul>

                                                  </a>
                                              </div>
                                              <div class="icon" data-toggle="tooltip" title="add an unordrered list" data-placement="bottom"><a href="javascript:void(0);" onclick="handlePucesOp()"><i class="fa fa-list-ul"></i></a></div>
                                              <div class="icon" style="border-right:solid rgba(247, 247, 247, 0.3) 1px ;position: relative;" onmouseover="handleNumHoveringInHor();" onmouseout="handleNumHoveringOutHor();"><a href="javascript:void(0);"><i class="fa fa-list-ol" ></i>
                                                  <div class="numInsertingHor" id="numDivHor">
                                                                 <table>
                                                                     <tr>
                                                                         <td width="60%">Le type des puces:</td>
                                                                         <td><select id="pucesTypeHor">
                                                                              <option>Default</option>
                                                                             <option>Lower Alpha</option>
                                                                             <option>Lower Greek</option>
                                                                             <option>Lower Roman</option>
                                                                             <option>Upper Alpha</option>
                                                                             <option>Upper Roman</option>
                                                                         </select></td>
                                                                     </tr>
                                                                     <tr>
                                                                         <td>Nombre de puces:</td>
                                                                         <td><input type="number" min="1" id="nbPucesHor" value="1"></td>
                                                                     </tr>
                                                                 </table>
                                                                  <table style="width: 100%;">
                                                                      <tr>
                                                                         <td>
                                                                            <span style="display: none;color: red" id="invalidNumHor" >Le nombre est invalide!</span>
                                                                         </td>
                                                                         <td>
                                                                              <button type="button" class="btn btn-primary" id="numBtnHor">Valider</button>
                                                                         </td>
                                                                      </tr>
                                                                  </table>
                                                             </div>
                                              </a></div>

                                              <div class="icon" data-toggle="tooltip" title="justifty" data-placement="bottom"><a href="javascript:void(0);"><i class="textJustify fa fa-align-justify" aria-hidden="true"></i></a></div>
                                              <div class="icon" data-toggle="tooltip" title="center" data-placement="bottom"><a href="javascript:void(0);"><i class="textCenter fa fa-align-center" aria-hidden="true"></i></a></div>
                                              <div class="icon" data-toggle="tooltip" title="align-left" data-placement="bottom"><a href="javascript:void(0);"><i class="alignLeft fa fa-align-left" aria-hidden="true"></i></a></div>
                                              <div class="icon" data-toggle="tooltip" title="align-right" data-placement="bottom"><a href="javascript:void(0);"><i class="alignRight fa fa-align-right" aria-hidden="true"></i></a></div>


                                      </div>

                                  </div>
                                </div>

                                <!--format END-->
                                <!--insertion-->
                                <div class="col-md-4 col-sm-4 text-center" id="insertionIcons">
                                    <div class="menu-bar">
                                        <ul class="menu-items">
                                            <li class="dropdown" id="menuToClose">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button">Insertion
                                                    <i class="fa fa-caret-down"></i>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="javascript:void(0);" onclick="handleImage();"><i class="fa fa-picture-o"></i>&nbsp; Image</a></li>
                                                    <li><a href="javascript:void(0);" onclick="handleVideoOp()"><i class="fa fa-video-camera"></i>&nbsp; Media</a></li>
                                                    <li><a href="javascript:void(0);" onclick="handlePostInsertion();"><i class="fa fa-th" aria-hidden="true"></i>&nbsp; Posts</a></li>
                                                    <li><a href="javascript:void(0);" onclick="handleSlideInsertion();" style="padding-left:12px;" ><i class="fa fa-angle-left "  aria-hidden="true"></i><i class="fa fa-picture-o " aria-hidden="true" style="padding:2px;"></i><i class="fa fa-angle-right " aria-hidden="true"></i>&nbsp; Slides</a></li>
                                                    <li><a href="javascript:void(0);"  onclick="handlePanel()"><i class="fa fa-tags"></i>&nbsp; Sections Spéciales</a></li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="javascript:void(0);" onmouseover="handleLinkHoveringIn()" onmouseleave="handleLinkHoveringOut()" >
                                                            <i class="fa fa-link"></i>&nbsp; Link
                                                            <div class="linksDiv" id="linksDiv" style="display: none;">
                                                                <div class="linksType">
                                                                    <i class="fa fa-external-link typeClicked" data-toggle="tooltip" title="Lien externe" id="extLink"></i>
                                                                    <i class="fa fa-anchor" data-toggle="tooltip" title="Ancre" id="ancLink"></i>
                                                                    <i class="fa fa-files-o" data-toggle="tooltip" title="Lien interne" id="intLink"></i>
                                                                </div>
                                                                <hr>
                                                                <div>
                                                                    <table>
                                                                        <tr>
                                                                            <td>Entrer le lien:</td>
                                                                            <td><input type="url" style="width: 100px;"></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <button type="button" class="btn btn-primary" style="float: right;">Valider</button>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li style="height: 26px;"><a href="javascript:void(0);" onmouseover="handleTableHoveringIn();" onmouseleave="handleTableHoveringOut();" style="position: relative;"><i class="fa fa-table"></i>&nbsp; Table
                                                         <div id="spacingDivTable" style="position: absolute;left: 100%;background-color: red;height:  200px;top: -20px;background-color: transparent;display: none;">&nbsp;</div>
                                                         <div class="tableInserting" style="display: none" id="insertingTableDiv">
                                                               <table>
                                                                     <tr>
                                                                        <td class="hoveredSquare"></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                            </tr>
                                                              </table>
                                                                <span style="color: black;">1 x 1</span>
                                                        </div></a>
                                                    </li>
                                                    <li><a href="javascript:void(0);" id="ribbonModelShow" ><i class="fa fa-flag"></i>&nbsp; Ribbon</a></li>
                                                    <li class="divider"></li>
                                                    <li id="MenuColumns" class="dropdown-submenu" ><a href="javascript:void(0);"><i class="fa fa-columns"></i>&nbsp; Columns</a>
                                                         <ul class="dropdown-menu">
                                                            <li style="margin-left:5px;margin-right:5px; margin-top:3px;">
                                                                <div class="input-group" >
                                                                    <input type="number" class="form-control" id="inputColumns" placeholder="Columns" style="height:30px; margin-top:0px;margin-bottom:0px;">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-secondary" id="NbColumns" type="button"style="height:30px; margin-top:0px;margin-bottom:0px;" onclick="handleColonneOp()"><i class="fa fa-check" style="vertical-align: middle;"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>

                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li id="MenuTabs" class="dropdown-submenu" ><a href="javascript:void(0);"><i class="fa fa-clone"></i>&nbsp; Tabs</a>
                                                         <ul class="dropdown-menu">
                                                            <li style="margin-left:5px;margin-right:5px; margin-top:5px;">
                                                                <div class="input-group" >
                                                                    <input type="number" class="form-control" id="inputTabs" placeholder="Tabs" style="height:30px; margin-top:0px;margin-bottom:0px;">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-secondary" id="NbTabs" type="button"style="height:30px; margin-top:0px;margin-bottom:0px;" onclick="handleTabsOp()"><i class="fa fa-check" style="vertical-align: middle;"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                                <div class="checkbox" style="margin-top:5px; margin-left:10px; margin-bottom:5px;" id="divAnimation">
                                                                    <label>
                                                                        <input type="checkbox" name="Animation" id="Animation" value="Avec animation"> <b style="color:#333;">Avec animation</b>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);" id="iframFnct" ><i class="fa fa-file-video-o"></i>&nbsp; Iframe</a></li>
                                                    <li><a href="javascript:void(0);" onclick="handleDownload ()"><i class="fa fa-download" ></i>&nbsp; download</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="icon-group">
                                        <div class="icon" data-toggle="tooltip" title="Add Image" data-placement="bottom"><a href="javascript:void(0);" onclick="handleImage();"><i class="fa fa-image"></i></a></div>
                                        <div class="icon" data-toggle="tooltip" title="Add Video Locale/Youtube" data-placement="bottom"><a href="javascript:void(0);" onclick="handleVideoOp()"><i class="fa fa-video-camera"></i></a></div>
                                        <div class="icon" data-toggle="tooltip" title="Add posts" data-placement="bottom"><a href="javascript:void(0);" onclick="handlePostInsertion();"><i class="fa fa-th" aria-hidden="true"></i>
                                        </a></div>
                                        <div class="icon" data-toggle="tooltip" title="Add slides" data-placement="bottom"><a href="javascript:void(0);" onclick="handleSlideInsertion();"><i class="fa fa-angle-left "  aria-hidden="true"></i><i class="fa fa-picture-o " aria-hidden="true" style="padding:2px;" ></i><i class="fa fa-angle-right " aria-hidden="true"></i></a></div>
                                        <div class="icon" data-toggle="tooltip" title="Add panels" data-placement="bottom" style="border-right:solid rgba(247, 247, 247, 0.3) 1px ;"><a href="javascript:void(0);"  onclick="handlePanel()"><i class="fa fa-tags"></i></a></div>
                                        <div style="position: relative;" class="icon" onmouseover="handleLinkHoveringInHor();" onmouseout="handleLinkHoveringOutHor();"><a href="javascript:void(0);"><i class="fa fa-link"></i>
                                            <div class="linksDivHor" id="linksDivHor" style="display: none;">
                                                                <div class="linksType">
                                                                    <i class="fa fa-external-link typeClicked" title="Lien externe" id="extLink"></i>
                                                                    <i class="fa fa-anchor" title="Ancre" id="ancLink"></i>
                                                                    <i class="fa fa-files-o" title="Lien interne" id="intLink"></i>
                                                                </div>
                                                                <hr>
                                                                <div>
                                                                    <table>
                                                                        <tr>
                                                                            <td>Entrer le lien:</td>
                                                                            <td><input type="url" style="width: 100px;"></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <button type="button" class="btn btn-primary" style="float: right;">Valider</button>
                                                            </div>

                                        </a></div>




                                        <div style="position: relative;" class="icon" onmouseover="handleTableHoveringInHor();" onmouseout="handleTableHoveringOutHor();"><a href="javascript:void(0);"><i class="fa fa-table"></i>
                                        <div class="tableInsertinghorisontal" style="display: none;" id="insertingTableDivHor">
                                                               <table>
                                                                     <tr>
                                                                        <td class="hoveredSquare"></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                            </tr>
                                                              </table>
                                                                <span style="color: black;">1 x 1</span>
                                                        </div>
                                        </a></div>
                                        <div class="icon" data-toggle="tooltip" title="Add ribbon" data-placement="bottom" style="border-right:solid rgba(247, 247, 247, 0.3) 1px ;"><a href="javascript:void(0);" id="ribbonModelShow1" ><i class="fa fa-flag"></i></a></div>
                                         <div class="icon" style="position: relative;"  onmouseover="handleTabsHoveringInSho();" onmouseout="handleTabsHoveringOutSho();"><a href="javascript:void(0);"><i class="fa fa-clone"></i>

                                            <div id="TabsDiv" class="input-group" style=" background-color : white; border-radius: 2px; position: absolute; display:none; padding:10px; left: -200%; z-index: 999; ">
                                            <div class="input-group" style="width:140px;">
                                                <input type="number" class="form-control" id="inputTabsShort" placeholder="Tabs" style="height:30px;  margin-top:0px;margin-bottom:0px;" min="0">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-secondary" id="NbTabs" type="button"style="height:30px; margin-top:0px;margin-bottom:0px;" onclick="handleTabsShortOp()"><i class="fa fa-check" style="vertical-align: middle;"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <div class="checkbox" style="margin-top:5px; margin-left:10px; margin-bottom:5px;" id="divAnimationShort">
                                                <label>
                                                    <input type="checkbox" name="Animation" id="AnimationShort" value="Avec animation">
                                                    <b style="color:#333;">Avec animation</b>
                                                </label>
                                            </div>
                                        </div>
                                     </a></div>

                                        <div class="icon" style="position: relative;"  onmouseover="handleColumnsHoveringInSho();" onmouseout="handleColumnsHoveringOutSho();">
                                            <a href="javascript:void(0);"><i class="fa fa-columns"></i>
                                                <div id="ColumnsDiv" class="input-group" style=" position: absolute; display:none; padding:10px;
                                                left: -100%; z-index: 999; ">
                                                    <div class="input-group" style="width:120px;">
                                                        <input type="number" class="form-control" id="inputColumnsShort" placeholder="Columns" style="height:30px; width:100px; margin-top:0px;margin-bottom:0px;" min="0">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-secondary" id="NbColumnsShort" type="button"style="height:30px; margin-top:0px;margin-bottom:0px;" onclick="handleColonneShortOp()"><i class="fa fa-check" style="vertical-align: middle;"></i>
                                                        </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>


                                        <div class="icon" data-toggle="tooltip" title="Add iframe" data-placement="bottom"><a href="javascript:void(0);" id="iframFnct1" ><i class="fa fa-file-video-o"></i></a></div>
                                        <div class="icon" data-toggle="tooltip" title="Add download-link" data-placement="bottom"><a href="javascript:void(0);" onclick="handleDownload ()"><i class="fa fa-download" ></i></a></div>

                                    </div>

                                </div>
                                <!--insertion END-->
                            </div>


                        </div>

                    </div>
                    <div class="panel-body" id="Deditor">
                        <form>
                            <textarea name="code" id="codeArea"><?php if (isset($_GET["edit_id"])) {
                                    $website_id = $_GET["edit_id"];
                                    $sql = "SELECT * FROM savedwebsites WHERE website_id='$website_id'";
                                    $sqlResult = mysqli_query($conn, $sql);
                                    if ($sqlResult) {
                                        while ($row = mysqli_fetch_assoc($sqlResult)) {
                                            echo $row["website_content"];
                                        }
                                    }
                                } else {
                                    echo "/* Start Typing Here */";
                                }
                                ?></textarea>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="visualisationArea">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text-center" id="displayArea">Visualisation <i class="fa fa-eye"></i></h4>
                        <a href="#codeEditor" title="Return to code"><i class="fa fa-chevron-up animated pulse infinite fa-lg"></i></a>
                        <a href="javascript:void(0);" id="viewFullScreenButton"  class="btn btn-default" style="position:absolute; top:15px; right:50px;" title="Full Screen Visualisation"> <i class="fa fa-desktop fa-lg" aria-hidden="true"></i> </a>
                        <a  href="javascript:void(0);" id="fullIntern"  class="btn btn-default" style="position:absolute; top:15px; right:100px;" title="Full Screen Visualisation intern" onclick="handleFullIntern()"> <i class="fa fa-expand" aria-hidden="true" id="exp"></i> </a>
                    </div>
                    <div class="panel-body">
                        <iframe src="visualisationPage.html?omega=<?php echo uniqid(); ?>" frameborder="0" id="codeResult">
                            <base url="visualisationPage.html"></base>
                        </iframe>
                    </div>
                </div>

            </div>
        </div>


        <form method="POST" id="fullScreenForm" action="fullScreenVisualisationPage.php" target="_blank" style="display:none;" >
            <input type="hidden" value="" id="viewFullScreen" name="viewFullScreen">
        </form>
        <div class="row">
           <button type="button" id="upButton" class="btn btn-custom"><i class="fa fa-chevron-up animated infinite pulse"></i></button>
        </div>

    </div>



<!--/////////////////////////structures & functions needed/////////////////////////-->

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
    <!-- Settings Modal Start -->
    <div class="modal fade-scale" id="settingsModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="text-center animated bounce"><i class="fa fa-gears fa-2x" style="vertical-align: middle;"   ></i> Settings </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <p class="text-center text-faded">Choose your Settings from Below</p>
                        <h4 class="text-center"> General Settings </h4>
                        <hr>
                        <div class="col-md-4 col-md-offset-2">
                            <p>Language </p>
                            <br>
                            <p id="real-time-status">Real Time visualization</p>
                            <p> Line Numbers </p>
                            <p> Dark Theme </p>
                        </div>
                        <div class="col-md-6">
                            <select name="language" id="lang-select">
                                <option value="en">English</option>
                            </select>

                            <div id="real-time-on-off">
                                <br>
                                <i class="fa fa-toggle-off off fa-2x"></i>
                            </div>
                            <i class="fa fa-toggle-on on fa-2x" id="line-numbers-switcher"></i>
                            <br>
                            <i class="fa fa-toggle-off off fa-2x" id="dark-theme-switcher"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"> Close </button>
                </div>

            </div>
        </div>
    </div>
    <!-- Settings Modal End -->
    <!-- paste Modal -->
        <div class="modal fade-scale" id="pasteModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="fa fa-close"></i>
                        </button>
                        <h4 class="text-center bounce"><i class="fa fa-warning fa-2x" style="vertical-align: middle;"   ></i> plugin Error </h4>
                    </div>
                    <div class="modal-body">
                    <p class="text-center">your browser doesn't have the necessery plugin ! <strong>(security reasons)</strong>   </p>
                    </div>
                </div>
            </div>

        </div>
    <!-- paste Modal END -->



    <div class="autoComplete">
        <div class="selectedAutoComplete">p</div>
        <div data-toggle="tooltip" data-placement="right" title="Get a Paragraph">getp</div>
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




            <!-- to Download Modal -->

    <div class="modal fade-scale" id="toDownloadModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h3 class="text-center animated bounce"><i class="fa fa-image fa-2x" style="vertical-align: middle;"></i> add file to download </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <form class="form-inline">
                                <div class="form-group" >
                                    <select name="files" id="files"  class="selectpicker" style="display:inline;">
                                        <option value="default" selected="" disabled>selectionnez un fichier</option>
                                        <?php
                                        $fileSelectQuery = "SELECT * FROM fileToDownload";
                                        $selectionResult = mysqli_query($conn, $fileSelectQuery);
                                        while ($row = mysqli_fetch_assoc($selectionResult)) {
                                            echo '<option value="'.$row["name"].'">'.substr($row["name"], 0, strpos($row["name"], ".")).'</option>';
                                        }
                                        ?>

                                    </select>
                                     <span  style="margin-left:20px; ">
                                        ou <label class="btn btn-primary" for="fileBrowse">
                                                <input id="fileBrowse" type="file" style="display:none;" >
                                                parcourir...
                                            </label>
                                    </span><br><br>
                                    <div style="display: none;" id="Icon_Protection">
                                    <label for="fileProtection" > telechargement autorisé à tous:</label>
                                        <input name="fileProtection" id="fileProtection" type="checkbox" checked><br>
                                        <label for="iconSize">taille de l'icone:</label>
                                        <input name="iconSize" type="radio" value="true" checked id="iconSize"> grande ou
                                        <input name="iconSize" type="radio"   id="iconSize"> petite
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                           <!--Abser-->
                        <img src="../assets/images/notReconized.png" style="width: 50px;height: 50px;" id="fileTypeImage" onerror="this.src='../assets/images/notReconized.png'">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"> Cancel </button>
                    <button type="button" class="btn btn-success" id="addFileToDownload"> Add </button>
                </div>
            </div>
            <div class="alert alert-success" id="uploadFileSuccess" style="margin:2px 50px; text-align:center; display:none;">uploaded</div>
        <div class="alert alert-danger" id="uploadFileFailure" style="margin:2px 50px; text-align:center; display:none;">failure</div>
        <div class="alert alert-info" id="uploadFileLoading" style="margin:2px 50px; text-align:center; display:none;">loading...</div>
        </div>

    </div>




    <!-- to Download Modal End -->
    <!-- Insert Image Modal -->

    <div class="modal fade-scale" id="imageInsertionModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h3 class="text-center animated bounce"><i class="fa fa-image fa-2x" style="vertical-align: middle;"></i> Image Insertion </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <form class="form-inline">
                                <div class="form-group">
                                    <select name="images" id="images"  class="selectpicker" style="display:inline;">
                                        <option value="imageDefault.png" selected="" disabled>selectionnez une image</option>
                                        <?php
                                        $imgSelectQuery = "SELECT * FROM images";
                                        $selectionResult = mysqli_query($conn, $imgSelectQuery);
                                        while ($row = mysqli_fetch_assoc($selectionResult)) {
                                            echo '<option value="'.$row["name"].'">'.substr($row["name"], 0, strpos($row["name"], ".")).'</option>';
                                        }
                                        ?>

                                    </select>
                                     <span  style="margin-left:20px; ">
                                        ou <label class="btn btn-primary" for="imageBrowse">
                                                <input id="imageBrowse" type="file" name="files[]" style="display:none;" accept="image/*">
                                                parcourir...
                                            </label>
                                    </span><br><br>
                                    <div style="display: none;" id="ImageParameters">
                                        <span style="height:50px;"> <label for="widthImage">largeur :&nbsp;&nbsp;</label>   <input class="form-control" type="number" value="" placeholder="width in pixels" id="widthImage" ></span><br><br>
                                        <span style="margin-top:50px;"><label for="heightImage" >hauteur  :&nbsp;</label>  <input class="form-control" type="text" value="" placeholder="height in pixels" id="heightImage"> </span><br><br>
                                        <span> <label for="positionImage" > position :&nbsp;</label></span><select name="imagePosition" id="positionImage" class="selectpicker" >
                                            <option value="" selected disabled>positionnez l'image</option>
                                            <option value="d" >positioner à droite</option>
                                            <option value="g">positioner à gauche</option>
                                            <option value="c">positioner au centre</option>
                                         </select>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <h5 class="text-center">Image Thumbnail</h5>
                            <img src="../assets/images/imageDefault.png" alt="Preview Of Image" class="img-responsive thumbnail" id="previewImage">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"> Cancel </button>
                    <button type="button" class="btn btn-success" id="addImageToEditor"> Add </button>
                </div>
            </div>
                    <div class="alert alert-success" id="uploadImageSuccess" style="margin:2px 50px; text-align:center; display:none;">uploaded</div>
                    <div class="alert alert-danger" id="uploadImageFailure" style="margin:2px 50px; text-align:center; display:none;">failure</div>
                    <div class="alert alert-info" id="uploadImageLoading" style="margin:2px 50px; text-align:center; display:none;">loading...</div>
        </div>

    </div>
 <!-- Insert Image Modal End -->

  <!--rubbon modal begin-->
        <div class="modal fade" id="ribbonModal" role="dialog" style="left: -260px;" >
        <div class="modal-dialog modal-lg" style="text-align: center;">
            <div class="modal-content" style="text-align: center;width: 1200px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h3 class="text-center animated bounce"><i class="fa fa-image fa-2x" style="vertical-align: middle;"></i> Ribbon Select </h3>
                </div>
                <div class="modal-body">
                    <div style="text-align:center;height: 380px;overflow-y:scroll;" >
                    <a href="#"  class="drinkcard-cc" ><img  src="../uploads/images/rib0.PNG" class="ribbonImg2" id="ribb"></a>
                    <a href="#"  class="drinkcard-cc" ><img  src="../uploads/images/rib1.PNG" class="ribbonImg" id="ribb1" ></a>
                    <a href="#"  class="drinkcard-cc" ><img  src="../uploads/images/rib7.PNG" class="ribbonImg" id="ribb2"></a>
                    <a href="#" class="drinkcard-cc" ><img  src="../uploads/images/rib3.PNG" class="ribbonImg" id="ribb3"></a>
                    <a href="#" class="drinkcard-cc" ><img  src="../uploads/images/ribbongif.gif" class="ribbonImg" id="ribb4"></a>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"> Cancel </button>
                    <button type="button" class="btn btn-success" id="ribbonSelect" onclick="handleRibbon()" > Add </button>
                </div>
            </div>
        </div>
    </div>


    <!--rubbon modal end-->

        <!--Insert slide Modal begining-->
    <div class="modal fade-scale" id="slideInsertionModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="text-center animated bounce"><i class="fa fa-angle-left fa-2x " aria-hidden="true"></i>&nbsp;<i class="fa fa-picture-o fa-2x" aria-hidden="true"></i>&nbsp;<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>&nbsp;Inserer des slides</h4>
                </div>
                <div class="modal-body" >
                    <div class="slideInsertionContainer">
                    <table>
                        <tr>
                            <td style="text-align: center;">
                             <div style="float: left; background-color: #c3e8e8;" onclick="leftChevSlides();">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </div>
                                Selectionner les images
                                <div style="float: right; background-color: #c3e8e8;" onclick="rightChevSlides();">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>

                        <td id="tdssFatherInSlides">
                            <?php
                                 $selectImgQuery = "SELECT * FROM images ORDER BY date_uploaded ASC";
                                 $selectImgResult = mysqli_query($conn,$selectImgQuery);
                                 $resultNames = [];
                                 if ($selectImgResult) {
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($selectImgResult)) {
                                        $resultNames[$i] = $row['name'];
                                        $i += 1;
                                    }
                                 }
                                 $curs=0;
                                 $table="<table class='slideInsertion'><tr>";
                                 $numberInserted=0;
                                 while ($curs<sizeof($resultNames)){

                                    if ($numberInserted==8){
                                        $table.="</tr></table>";
                                        echo $table;
                                        $table="<table class='slideInsertion' style='display:none;'><tr>";;
                                        $numberInserted=0;
                                    }
                                        $numberInserted++;
                                        $table.="<td><img src='../uploads/images/".$resultNames[$curs]."'></td>";
                                    $curs++;
                                 }
                                    if ($numberInserted=!0){
                                        $table.="</tr></table>";
                                        echo $table;
                                    }

                            ?>

                         </td></tr>
                         <tr>
                             <td>
                                    ajouter des images depuis votre PC <label class="btn btn-primary" for="uploadImgInputSlide">
                                                <input id="uploadImgInputSlide" type="file" name="files[]" multiple style="display:none;" accept="image/*">
                                                <i class="fa fa-upload"></i> &nbsp;Upload Image
                                            </label>
                             </td>
                         </tr>
                    </table>
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-success pull-right" onclick="generateSlideCode()"><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Valider</button>
                   <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"> Cancel </button>
                </div>
            </div>
            <div class="alert alert-success" id="uploadSlideSuccess" style="margin:2px 50px; text-align:center; display:none;">uploaded</div>
                    <div class="alert alert-danger" id="uploadSlideFailure" style="margin:2px 50px; text-align:center; display:none;">failure</div>
                    <div class="alert alert-info" id="uploadSlideLoading" style="margin:2px 50px; text-align:center; display:none;">loading...</div>
        </div>
    </div>
    <!--Insert slide modal end-->

     <!-- Insert Panels Modal -->

    <div class="modal fade-scale" id="sectionSpecialesInsertionModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h3 class="text-center animated bounce"><i class="fa fa-info fa-2x" style="vertical-align: middle;"></i> Section Spéciale Insertion </h3>
                </div>
                <div class="modal-body" id="sSpecialesModalBody">


                          <img  onclick="handlePanel(event)" src="../assets/images/imgSectionS/Observation.png" id="observation" class="img__SectionS">

                          <img src="../assets/images/imgSectionS/note.png" id="note"class="img__SectionS" onclick="handlePanel(event)">

                          <img src="../assets/images/imgSectionS/alerte.png" id="alerte"class="img__SectionS" onclick="handlePanel(event)">

                          <img src="../assets/images/imgSectionS/regle.png" id="regle"class="img__SectionS"onclick="handlePanel(event)">

                          <img src="../assets/images/imgSectionS/definition.png" id="definition"class="img__SectionS"onclick="handlePanel(event)">

                        <img src="../assets/images/imgSectionS/sommaire.png" id="forme" class="img__SectionS"onclick="handlePanel(event)">

                        <img  onclick="handlePanel(event)" src="../assets/images/imgSectionS/Observation2.png" id="observation2" class="img__SectionS" style="margin:20px 76px">
                        <img src="../assets/images/imgSectionS/note2.png" id="note2"class="img__SectionS" onclick="handlePanel(event)" style="margin:20px 76px">
                        <img src="../assets/images/imgSectionS/alerte2.png" id="alerte2"class="img__SectionS" onclick="handlePanel(event)" style="margin:20px 76px">
                        <img src="../assets/images/imgSectionS/regle2.png" id="regle2"class="img__SectionS"onclick="handlePanel(event)" style="margin:20px 76px">
                        <img src="../assets/images/imgSectionS/definition2.png" id="definition2"class="img__SectionS"onclick="handlePanel(event)" style="margin:20px 76px">
                        <img src="../assets/images/imgSectionS/sommaire2.png" id="forme2" class="img__SectionS"onclick="handlePanel(event)" style="margin:20px 122px">




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"> Cancel </button>
                    <button type="button" class="btn btn-success" id="addImageToEditor"> Add </button>
                </div>
            </div>
        </div>
    </div>




    <!-- Insert Panels Modal End -->


    <!--Insert post Modal begining-->
    <div class="modal fade-scale" id="postInsertionModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="text-center animated bounce"><i class="fa fa-th fa-2x" style="vertical-align: middle;"></i>&nbsp;Inserer des postes</h4>
                </div>
                <div class="modal-body" >
                    <div class="postInsertionContainer">
                    <table>
                        <tr>
                            <td style="text-align: center;">
                             <div style="float: left;" onclick="leftChev();">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </div>
                                Selectionner les images
                                <div style="float: right;" onclick="rightChev();">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>

                        <td id="tdssFatherInPosts">
                            <?php
                                 $selectImgQuery = "SELECT * FROM images ORDER BY date_uploaded ASC";
                                 $selectImgResult = mysqli_query($conn,$selectImgQuery);
                                 $resultNames = [];
                                 if ($selectImgResult) {
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($selectImgResult)) {
                                        $resultNames[$i] = $row['name'];
                                        $i += 1;
                                    }
                                 }
                                 $curs=0;
                                 $table="<table class='postInsertion'><tr>";
                                 $numberInserted=0;
                                 while ($curs<sizeof($resultNames)){

                                    if ($numberInserted==8){
                                        $table.="</tr></table>";
                                        echo $table;
                                        $table="<table class='postInsertion' style='display:none;'><tr>";;
                                        $numberInserted=0;
                                    }
                                        $numberInserted++;
                                        $table.="<td><img src='../uploads/images/".$resultNames[$curs]."'></td>";
                                    $curs++;
                                 }
                                    if ($numberInserted=!0){
                                        $table.="</tr></table>";
                                        echo $table;
                                    }

                            ?>

                         </td></tr>
                         <tr>
                             <td>
                                 <input type="file" id="uploadImgInput" name="files[]" class="hide" multiple accept="image/*">
                                 <button class="btn btn-custom" type="button" id="uploadImgButton"> <i class="fa fa-cloud-upload"></i> &nbsp;Upload Image</button>
                                 <button class="btn btn-success" onclick="generatePostCode()"><i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Valider</button>
                             </td>
                         </tr>
                    </table>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
            <div class="alert alert-success" id="uploadPostSuccess" style="margin:2px 50px; text-align:center; display:none;">uploaded</div>
                    <div class="alert alert-danger" id="uploadPostFailure" style="margin:2px 50px; text-align:center; display:none;">failure</div>
                    <div class="alert alert-info" id="uploadPostLoading" style="margin:2px 50px; text-align:center; display:none;">loading...</div>
        </div>
    </div>
    <!--Insert post modal end-->
    <!--NADIR-->

    <!-- Insert Video Modal -->
         <div id="YoutubeVideo" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#e52d27 ; border-bottom:none;" >
                    <button type="button" class="close" id="videosDismiss" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h3 class="text-center animated bounce"><i class="fa fa-file-video-o fa-2x" style="vertical-align: middle;"></i> Video Insertion </h3>
                </div>

                <div class="modal-body" style="padding:0 20px 0 0;">
                    <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" id="youtubeTab" class="active" >
                            <a href="#youtubeTab2" aria-controls="youtubeTab2" role="tab" data-toggle="tab"  style="margin-right:0; padding-bottom:15px;"><img src="../assets/images/nadir.jpg" style="width :30px ;height: 20px; margin-right:3px;"/> Youtube</a>

                        </li>
                        <li  id="videoTab" role="presentation"  ><a href="#browseTab" aria-controls="browseTab" role="tab" data-toggle="tab" style="padding-bottom:15px;">Video</a>

                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content" style="padding-left:15px; padding-right:20px;">
                        <div role="tabpanel" class="tab-pane active" id="youtubeTab2">
                            <form  style="padding-top:10px;">
                                <div>
                                    <div>
                                        <div class="form-group form-inline" id="URLYoutube">
                                            <label for="inputYoutube"style="margin-right:20px;">
                                            You<span style="color:#e52d27; ">tube</span> URL</label>
                                            <input type="text" class="form-control" id="inputYoutube" placeholder="Le lien de la video..." style="width:400px;">
                                        </div>
                                        <div  class="form-group form-inline " >
                                            <label for="inputWidthYoutube">Width</label>
                                             <b>x</b>
                                            <label for="inputHeightYoutube"style="margin-right:20px;">Height</label>
                                            <input type="number" class="form-control"  id="inputWidthYoutube" rows="1" placeholder="La largeur de la video..." >
                                            <b>x</b>
                                            <input type="number" class="form-control"  id="inputHeightYoutube" rows="1" placeholder="La hauteur de la video...">
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="browseTab">
                              <div class="row"  style="padding-top:10px;">
                                <div class="col-md-7 col-sm-7 col-xs-7" style="padding-left:20px;">
                                    <form class="form-inline" style="padding-top:20px;">
                                        <div class="form-group">
                                            <select name="VidSel" id="videos" class="selectpicker" style="display:inline;">
                                                <option value="Default" selected="" disabled>selectionnez une video</option>
                                                    <?php
                                                        $vidSelectQuery = "SELECT * FROM videos";
                                                        $selectionResult = mysqli_query($conn, $vidSelectQuery);
                                                        while ($row = mysqli_fetch_assoc($selectionResult)) {
                                                        echo '<option value="'.$row["name"].'">'.substr($row["name"], 0, strpos($row["name"], ".")).'</option>';
                                                        }
                                                    ?>

                                            </select>
                                            <span  style="margin-left:20px; " >
                                                ou <label class="btn btn-primary" for="videoBrowse">
                                                    <input id="videoBrowse" type="file" name="files[]" style="display:none;" accept="video/*">
                                                parcourir...
                                                    </label>
                                            </span><br><br>
                                            <div style="display: none;" id="videoParameters">
                                                <span style="height:50px;"> <label for="inputWidthVideo">largeur :&nbsp;&nbsp;</label>   <input class="form-control" type="number" value="" placeholder="La largeur de la video..." id="inputWidthVideo" ></span><br><br>
                                                <span style="margin-top:50px;"><label for="inputHeightVideo" >hauteur  :&nbsp;</label>  <input class="form-control" type="text" value="" placeholder="La hauteur de la video..." id="inputHeightVideo"> </span><br><br>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    <h5 class="text-center">Video Thumbnail</h5>
                                    <video  controls id="previewVideo" style="width:300px; height:200px;" src="../uploads/videos/Default.mp4"> Your Brouwser Does not support HTML5 video  </video>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="videosCancel" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save"id="YoutubeVideoSave">Add</button>
                </div>
            </div>
                    <div class="alert alert-success" id="uploadVideoSuccess" style="margin:2px 50px; text-align:center; display:none;">uploaded</div>
                    <div class="alert alert-danger" id="uploadVideoFailure" style="margin:2px 50px; text-align:center; display:none;">failure</div>
                    <div class="alert alert-info" id="uploadVideoLoading" style="margin:2px 50px; text-align:center; display:none;">loading...</div>


        </div>
    </div>


     <!-- Insert Video Modal -->

    <!-- Insert puces Modal -->

    <div class="modal fade-scale" id="PucesModal" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="PucesDismiss" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h3 class="text-center animated bounce"><i class="fa fa-list fa-2x" style="vertical-align: middle;"></i> Insertion Puces </h3>
                </div>
                <div class="modal-body">

                    <table style="border:none;">
                        <tr style="border:none;">
                            <td style="border:none;"> Types de Puces: </td>
                            <td style="border:none;" id="ana">

                                <select class="selectpicker show-menu-arrow"  name="pucesSel" id="pucesSelectPicker" data-size="5"  >
                                    <option data-thumbnail="../assets/images/puces.png" value="0">
                                         &nbsp; DANYA-Default
                                    </option>
                                     <option data-icon="fa fa-check" value="1">
                                        &nbsp; Chek
                                    </option>
                                    <option data-icon="fa fa-check-square-o" value="2">
                                        &nbsp; Check-Square-o
                                    </option>
                                    <option data-icon="fa fa-check-square" value="3">
                                        &nbsp; Check-square
                                    </option>
                                    <option data-icon="fa fa-circle" value="4">
                                        &nbsp; Circle
                                    </option>
                                    <option data-icon="fa fa-certificate" value="5">
                                        &nbsp; Certificate
                                    </option>
                                    <option data-icon="fa fa-circle-o" value="6">
                                        &nbsp; Circle-o
                                    </option>
                                    <option data-icon="fa fa-close" value="7">
                                        &nbsp; close
                                    </option>
                                    <option data-icon="fa fa-circle-thin" value="8">
                                        &nbsp; circle-thin"
                                    </option>
                                    <option data-icon="fa fa-minus" value="9">
                                        &nbsp; Minus
                                    </option>
                                    <option data-icon="fa fa-pencil" value="10">
                                        &nbsp; Pencil
                                    </option>
                                    <option data-icon="fa fa-square" value="11">
                                        &nbsp; Square
                                    </option>
                                    <option data-icon="fa fa-square-o" value="12">
                                        &nbsp; Square-o
                                    </option>
                                    <option data-icon="fa fa-star" value="13">
                                        &nbsp; Star
                                    </option>
                                    <option data-icon="fa fa-star-o" value="14">
                                        &nbsp; Star-o
                                    </option>
                                    <option data-icon="fa fa-tag" value="15">
                                        &nbsp; Tag
                                    </option>
                                     <option data-icon="fa fa-hand-o-right" value="16">
                                       &nbsp; Hand-o-Right
                                    </option>
                                     <option data-icon="fa fa-long-arrow-right" value="17">
                                        &nbsp; Long-Arrow-Right
                                    </option>
                                     <option data-icon="fa fa-arrow-right" value="18">
                                        &nbsp; Arrow-Right
                                    </option>

                                </select>

                            </td>
                        </tr>
                        <tr style="border:none;">
                            <td style="border:none;">
                                Nombres de Puces:
                            </td>
                            <td style="border:none;">
                                <div class="input-group" >
                                    <input type="number" class="form-control" id="inputPuces" placeholder="Nombre d'elements" style="height:30px; margin-top:0px;margin-bottom:0px;">

                                </div>
                            </td>


                        </tr>

                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" id="PucesCancel" data-dismiss="modal"> Cancel </button>
                    <button type="button" class="btn btn-success" id="PucesAdd"> Add </button>
                </div>
            </div>
        </div>
    </div>




    <!-- Insert Puces Modal End -->
    <!-- END NADIR-->

    <!-- Full Screen Search -->
    <div id="fullSearch">
        <button type="button" class="closeSearch"><i class="fa fa-close"></i></button>
        <form action="../search/index.php" method="GET">
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
                            <input type="file" id="codeUploadBrowser" name="files[]" class="hide" accept=".txt">
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Abort</button>
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
                    <h4 class="text-center"><i class="fa fa-database"></i> Save Code To Database</h4>
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
                                    <select name="selectpicker" class="selectpicker" id="websiteCategory">
                                        <option value="Security">Security</option>
                                        <option value="Education">Education</option>
                                        <option value="Linux">Linux</option>
                                        <option value="PHP">PHP</option>
                                        <option value="Economy">Economy</option>
                                    </select>
                                </div>
                                <p id="websiteCategoryError" class="text-danger"></p>
                            </div>
                            <button type="button" class="btn btn-custom btn-block" id="addToDB">Add To Database</button>
                            <button type="button" class="btn btn-danger btn-block" id="downCode">Export Code</button>
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
    <div class="SnackBar snack-danger" id="canNotAddToDB">
        <i class="fa fa-exclamation-triangle"></i> Couldn't Save Website
    </div>
     <div id="colorPreview" style="position:absolute;z-index:9998;display:inline-block;width:60px;height:60px;">
        <div id="rotateColorPreview"></div>
        <div id="innerColorPreview"></div>
    </div>







    <script src="../assets/js/vendors/tether.min.js"></script>
    <script src="../assets/js/vendors/bootstrap.min.js"></script>
    <script src="../assets/js/vendors/bootstrap-select.min.js"></script>
    <script src="../assets/js/vendors/bootstrap-slider.min.js"></script>
    <script src="../assets/js/vendors/intro.min.js"></script>

    <script>


        /* Function to Start The Intro */
        function startIntro() {
            var intro = introJs();
            intro.setOptions({
                steps: [
                    {
                        element: '#toolbar',
                        intro: "This is the toolbar",
                        position: "bottom"
                    },
                    {
                        element: '#codeIcons',
                        intro: "Code Inserting, deleting and saving shortcuts !",
                        position: 'bottom'
                    },
                    {
                        element: '#formatIcons',
                        intro: 'format your text',
                        position: 'bottom'
                    },
                    {
                        element: '#insertionIcons',
                        intro: "Insert Images, videos and more",
                        position: 'bottom'
                    },
                    {
                        element: '#settingsStep',
                        intro: 'Customize Editor Settings'
                    },
                    {
                        element: '#themesStep',
                        intro: 'Choose your Themes'
                    },
                    {
                        element: '#Deditor',
                        intro: 'Write your code Here',
                        position: 'top'
                    },
                    {
                        element: '#visualisationArea',
                        intro: 'Visualize your code here',
                        position: 'top'
                    }
                ]
            });

            intro.start();
        };


        $("#real-time-on-off i").on("click", function() {
            if ($("#real-time-on-off i").hasClass("fa-toggle-off")) {
                $("#real-time-on-off i").addClass("fa-toggle-on on").removeClass("fa-toggle-off off");
                Omega.on("change", handleRunButton);
            } else {
                $("#real-time-on-off i").addClass("fa-toggle-off off").removeClass("fa-toggle-on on");
                Omega.off("change", handleRunButton);
            }
        });

        $("#line-numbers-switcher").on("click", function() {
            if ($("#line-numbers-switcher").hasClass("fa-toggle-on")) {
                $("#line-numbers-switcher").addClass("fa-toggle-off off").removeClass("fa-toggle-on on");
                Omega.setOption("lineNumbers", false);
                Omega.refresh();
            } else {
                $("#line-numbers-switcher").addClass("fa-toggle-on on").removeClass("fa-toggle-off off");
                Omega.setOption("lineNumbers", true);
                Omega.refresh();
            }
        });

        $("#dark-theme-switcher").on("click", function() {
            if ($("#dark-theme-switcher").hasClass("fa-toggle-on")) {
                $("#dark-theme-switcher").addClass("fa-toggle-off off").removeClass("fa-toggle-on on");
                setLightTheme();
            } else {
                $("#dark-theme-switcher").addClass("fa-toggle-on on").removeClass("fa-toggle-off off");
                setDarkTheme();
            }
        });



        $("#settingsStep").on("click", function() {
            $("#settingsModal").modal("show");

        })


        function handleTitleHoveringInHor()
        {
            $("#titleDivHor").css("display","block");

        }
        function handleTitleHoveringOutHor()
        {
            $("#titleDivHor").css("display","none");
        }
  /******************Cherief Yassine begin***********************************/


      $(window).bind("load", function() {

          "use strict";

          $(".spn_hol").fadeOut(1000);


           $(window).scroll(function() {
             if ($(this).scrollTop() > 650) {
                $('#upButton').fadeIn();
             } else {
                $('#upButton').fadeOut();
             }
          });

          $('#upButton').click(function() {
             $("html, body").animate({scrollTop: 0}, 800);
             return false;
          });

      });


        var myTextArea = document.querySelector("#codeArea");
        var Omega = CodeMirror.fromTextArea(myTextArea, {
        lineNumbers: true,
        mode: "dlang",
        theme: "mdn-like",
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
        startAutoComplete(Omega);


        var previewCode = document.querySelector("#uploadCodePreview");
        var Previewer = CodeMirror.fromTextArea(previewCode, {
        mode: "dlang",
        theme: "mdn-like",
        lineWrapping: true,
        readOnly: "nocursor"
        });



        $("#exportCode").on("click", function() {
            var n=Math.floor(Math.random()*11);
            var k = Math.floor(Math.random()* 1000000);
            var m = String.fromCharCode(n)+k;
            var blob = new Blob([Omega.getValue()], {type: "text/plain;charset=utf-8"});
            saveAs(blob, "id"+m+".txt");
        });


        function handleUndo(){
            Omega.execCommand("undo");
        }

        function handleRedo(){
            Omega.execCommand("redo");
        }

        function handleFullScreen(){
            Omega.focus();
            Omega.setOption("fullScreen", !Omega.getOption('fullScreen'));
            Omega.refresh();
        }

        function handleFullIntern(){
            var elem=document.getElementById("codeEditor");
            $(elem).toggle("display");
            var elem1 = document.getElementById('exp');
            var classelem = elem1.className;
            if (classelem == "fa fa-expand"){
                $("#exp").removeClass("fa fa-expand");
                $("#exp").addClass("fa fa-compress");
            }else{
                $("#exp").removeClass("fa fa-compress");
                $("#exp").addClass("fa fa-expand");
            }
         }

        function handleRunButton() {
            var view=document.getElementById('codeResult').contentWindow.document;
            var Dview=view.getElementById('display');
            Dview.innerHTML="";
            var Dcode=Omega.getValue();
            displayFunction(Dview,Dcode);
            var mydiv = $( "#codeResult" ).contents().find("body");
            var h     = mydiv.height();
            $("#codeResult").height(h);
        }

        function handleCopy(text) {
            if (text!=""){
            var textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            }   else {
                $("#nothingSelectedModal").modal("show");
                }
        }

        function handleCut(text) {
            var i;
            var replacements = [];
            handleCopy(text);
            for (i = 0;i < text.length;i++) {
                replacements.push("");
            }
            Omega.replaceSelections(replacements);
        }

        function handlePaste(){
            $("#pasteModal").modal("show");
        }

        function setDarkTheme() {
            $("nav").removeClass("light-theme").addClass("dark-theme");
            Omega.setOption("theme", "base16-dark");
            Omega.refresh();


        }


        function setLightTheme() {
            $("nav").removeClass("dark-theme").addClass("light-theme");
            Omega.setOption("theme", "mdn-like");
            Omega.refresh();
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


        var n=Math.floor(Math.random()*11);
        var k = Math.floor(Math.random()* 1000000);
        var m = String.fromCharCode(n)+k;


        $("#downCode").on("click", function() {
            var blob = new Blob([Omega.getValue()], {type: "text/plain;charset=utf-8"});
            saveAs(blob, "id"+m+".txt");
        });




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
                var uri = "../scripts/savecode.php";
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
                Omega.setValue(Previewer.getValue());
                $("#uploadCodeModal").modal("hide");
            });


        });
    }


// Bold Text Operation
    // Replace Selection or Selections


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



    $(document).ready(function () {

        $('[data-toggle="tooltip"]').tooltip();

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
/*********************************Cherief Yassine end ********************************/

/*********************************Mekhalfa Taki Eddine begin ********************************/
	 $("#pucesType").on("change",function(){
	 	_numStyle=this.selectedIndex;
	 });
     $("#pucesTypeHor").on("change",function(){
        _numStyle=this.selectedIndex;
     });

     $(".tableInserting").on("mouseover","td",function(event){
                var tds=$(".tableInserting td");
                tds.removeClass("hoveredSquare");
                var cellIndex=event.target.cellIndex;
                var rowIndex=event.target.parentElement.rowIndex;
                for(var i = 0; i<=rowIndex; i++){
                    for (var j = 0; j<=cellIndex; j++){
                        tds[i*10+j].className="hoveredSquare";
                    }
                }
                var spanElem=$(".tableInserting span")[0];
                spanElem.innerHTML=(rowIndex+1)+" x "+(cellIndex+1);
            });

     $(".tableInserting").on("click","td",function(event){
                var tds=$(".tableInserting td");
                tds.removeClass("hoveredSquare");
                tds[0].className="hoveredSquare";
                var cellIndex=event.target.cellIndex;
                var rowIndex=event.target.parentElement.rowIndex;
                document.getElementById("insertingTableDiv").style.display="none";
                $(".tableInserting span")[0].innerHTML="1 x 1";
                Omega.replaceRange(handleTableOp (rowIndex+1,cellIndex+1,true),Omega.getCursor());
            });
     $(".tableInsertinghorisontal").on("mouseover","td",function(event){
                var tds=$(".tableInsertinghorisontal td");
                tds.removeClass("hoveredSquare");
                var cellIndex=event.target.cellIndex;
                var rowIndex=event.target.parentElement.rowIndex;
                for(var i = 0; i<=rowIndex; i++){
                    for (var j = 0; j<=cellIndex; j++){
                        tds[i*10+j].className="hoveredSquare";
                    }
                }
                var spanElem=$(".tableInsertinghorisontal span")[0];
                spanElem.innerHTML=(rowIndex+1)+" x "+(cellIndex+1);
            });
      $(".tableInsertinghorisontal").on("click","td",function(event){
                var tds=$(".tableInsertinghorisontal td");
                tds.removeClass("hoveredSquare");
                tds[0].className="hoveredSquare";
                var cellIndex=event.target.cellIndex;
                var rowIndex=event.target.parentElement.rowIndex;
                document.getElementById("insertingTableDivHor").style.display="none";
                $(".tableInsertinghorisontal span")[0].innerHTML="1 x 1";
                Omega.replaceRange(handleTableOp (rowIndex+1,cellIndex+1,true),Omega.getCursor());
            });
        $(".tableInsertinghorisontal").on("mouseout","td",function(event){
                event.stopPropagation();
            });
      $(".numInserting").click(function(event){
        event.stopPropagation();

     });
     $("#numBtn").click(function(){
        var numberInput=document.getElementById("nbPuces");
        var warningSpan=document.getElementById("invalidNum");
        if (numberInput.value>0){
            warningSpan.style.display="none";
            Omega.replaceRange(handleNumOp(numberInput.value,""),Omega.getCursor());
            numberInput.value=1;
            $("#menuToClose").removeClass("open");
        }
        else{
            warningSpan.style.display="block";
        }
     });
      $("#numBtnHor").click(function(){
        var numberInput=document.getElementById("nbPucesHor");
        var warningSpan=document.getElementById("invalidNumHor");
        if (numberInput.value>0){
            warningSpan.style.display="none";
            Omega.replaceRange(handleNumOp(numberInput.value,""),Omega.getCursor());
            numberInput.value=1;}
        else{
            warningSpan.style.display="block";
        }
     });
     $(".linksDiv").click(function(event){
        event.stopPropagation();
        target=event.target;
        if (target.nodeName=="I"){
            $("i").removeClass("typeClicked");
            target.className+=" typeClicked";
        }
        else if (target.nodeName=="BUTTON"){
            var link=this.querySelector("[type='url']");
            var clickedI=this.querySelector(".typeClicked");
            Omega.replaceRange(handleLinkOp(link.value,clickedI.id),Omega.getCursor());
            link.value="";
            $("#menuToClose").removeClass("open");

        }
     });

     $(".linksDivHor").click(function(event){
//        event.stopPropagation();
        target=event.target;
        if (target.nodeName=="I"){
            $("i").removeClass("typeClicked");
            target.className+=" typeClicked";
        }
        else if (target.nodeName=="BUTTON"){
            var link=this.querySelector("[type='url']");
            var clickedI=this.querySelector(".typeClicked");
            Omega.replaceRange(handleLinkOp(link.value,clickedI.id),Omega.getCursor());
            link.value="";
            //$("#menuToClose").removeClass("open");

        }
     });

    function generatePostCode(){
        var modal=$("#postInsertionModal").modal("hide");
        var tds=$("#tdssFatherInPosts").find(".selectedImgInPost");
        var imagessrc=$.map(tds,function(element,_){
                    element.className="";
                    var imgElement=element.firstChild;
                    return imgElement.src.replace(/(?:.*\/images\/)(.*)/g,"$1");
        });
        if (imagessrc.length){
            Omega.replaceRange(handlePostOp(imagessrc),Omega.getCursor());
        }
    }

    $("#tdssFatherInPosts").on("click","td",function(event){
        var targetTd=$(this);
        targetTd.toggleClass("selectedImgInPost");
    });
    var currentSelectedpage=0;
    function leftChev(){
        var tables=$(".postInsertionContainer .postInsertion");
        tables[currentSelectedpage].style.display="none";
        if (currentSelectedpage>0) tables[--currentSelectedpage].style.display="table";
        else {
            currentSelectedpage=tables.length-1;
            tables[currentSelectedpage].style.display="table";
        }
    }
    function rightChev(){
        var tables=$(".postInsertionContainer .postInsertion");
        tables[currentSelectedpage].style.display="none";
        if (currentSelectedpage<tables.length-1) tables[++currentSelectedpage].style.display="table";
        else {
            currentSelectedpage=0;
            tables[currentSelectedpage].style.display="table";
        }
    }
    var uploadPostLoading=document.getElementById('uploadPostLoading');
var uploadPostFailure=document.getElementById('uploadPostFailure');
var uploadPostSuccess=document.getElementById('uploadPostSuccess');

        function handlePostInsertion(){
        $("#postInsertionModal").modal("show");
        $("#uploadImgButton").on("click", function() {
            
            $("#uploadImgInput").click();
        });
        $("#uploadImgInput").on("change", function () {

            var file = document.getElementById("uploadImgInput").files;
            var i=0;
                uploadPostFailure.innerHTML="";
                uploadPostSuccess.innerHTML="";
                while(i<file.length)
                {
                    uploadImageForPosts(file[i]);
                    i++;
                }
            });

            function uploadImageForPosts(file){
                var uri = "../scripts/upload_img.php";
                var xhr = new XMLHttpRequest();
                var fd = new FormData();


                xhr.open("POST", uri, true);
                //loading
                uploadPostLoading.style.display="block";
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if( xhr.status == 200){
                            // Success 200 OK
                             uploadPostLoading.style.display="none";
                            var json_result = JSON.parse(xhr.responseText);
                            if(json_result.status=="success"){
                                //uploaded
                                uploadPostSuccess.innerHTML+=json_result.path+" Uploaded \n";
                                uploadPostSuccess.style.display="block";
                                setTimeout(function(){
                                    uploadPostSuccess.style.display="none";
                                },2000)

                                addPostsImage(json_result);
                                //synchronise with image and slide insertion
                                addImagesImage(json_result);
                                addSlidesImage(json_result);
                            }
                            else if(json_result.status=="exist"){
                                //exist
                                uploadPostFailure.innerHTML+=json_result.path+" already exist \n";
                                uploadPostFailure.style.display="block";
                                setTimeout(function(){
                                    uploadPostFailure.style.display="none";
                                },3000)
                            }
                        }
                        else{
                            //failure
                                 uploadPostFailure.innerHTML="failure";
                            uploadPostFailure.style.display="block";
                            setTimeout(function(){
                                uploadPostFailure.style.display="none";
                            },2000)
                        }
                    }
                };

                fd.append("myFile", file);
                xhr.send(fd);
            }




    }
    function addPostsImage(json){
        var json_result=json;
        var theContainerTable=$("#tdssFatherInPosts");
                                var innerTables=theContainerTable.find(".postInsertion");
                                if (!innerTables.length){
                                     theContainerTable.append("<table class='postInsertion'><tr>"+
                                        "<td><img src='../uploads/images/"+json_result.path+"'></td>"+
                                        "</tr></table>");
                                }else{
                                        innerTables.css("display","none");
                                        var lastTable=innerTables[innerTables.length-1];
                                        var trElement=$(lastTable).find("tr");
                                        if (trElement[0].childElementCount<8){
                                            trElement.append("<td><img src='../uploads/images/"+json_result.path+"'></td>");
                                            lastTable.style.display="table";
                                        }
                                        else{
                                            theContainerTable.append("<table class='postInsertion'><tr>"+
                                            "<td><img src='../uploads/images/"+json_result.path+"'></td>"+
                                            "</tr></table>");
                                        }


                                }
    }

    //handlers
    //Tables handling--------------------------------------------------------------------------------
function handleTableOp (nlines,mColumns,printIt){
        var result="\n-entetetable[";
        for (var i=0;i<mColumns-1;i++) result+="/*Nom colonne "+(i+1)+"*/|";
        result+="/*Nom colonne "+(i+1)+"*/]";
        if (nlines>0){
            result+="\n";
            for (var i=0;i<nlines;i++){
                result+="-lignetable[";
                for (var j=0;j<mColumns-1;j++){
                    result+="/*C "+(j+1)+" line "+(i+1)+"*/";
                    result+='|';
                }
                result+="/*C "+(j+1)+" line "+(i+1)+"*/]\n";
            }
            if (printIt) result+="-affichertable\n";
        }
        return result;
}

function handleTableHoveringIn(){

  document.getElementById("insertingTableDiv").style.display="inline-block";
  document.getElementById("spacingDivTable").style.display="block";

}

function handleTableHoveringOut(){
     var tds=$(".tableInserting td");
        tds.removeClass("hoveredSquare");
        tds[0].className="hoveredSquare";
        document.getElementById("insertingTableDiv").style.display="none";
        document.getElementById("spacingDivTable").style.display="none";
        $(".tableInserting span")[0].innerHTML="1 x 1";
}

function handleTableHoveringInHor(){

  document.getElementById("insertingTableDivHor").style.display="inline-block";
  //document.getElementById("spacingDivTable").style.display="block";

}

function handleTableHoveringOutHor(){
     var tds=$(".tableInsertinghorisontal td");
        tds.removeClass("hoveredSquare");
        tds[0].className="hoveredSquare";
        document.getElementById("insertingTableDivHor").style.display="none";
       // document.getElementById("spacingDivTable").style.display="none";
        $(".tableInsertinghorisontal span")[0].innerHTML="1 x 1";
}


//Links Handling-----------------------------------------------------------------
  function handleLinkHoveringIn(){
     document.getElementById("linksDiv").style.display="block";
}
function handleLinkHoveringOut(){
     document.getElementById("linksDiv").style.display="none";
}
function handleLinkHoveringInHor(){
     document.getElementById("linksDivHor").style.display="block";
}
function handleLinkHoveringOutHor(){
     document.getElementById("linksDivHor").style.display="none";
}
 function handleLinkOp(link,type){
            var result=type=="extLink"?" -lvu[ /*Titre_Lien*/ | "+link+" ] ":
                type=="intLink"?" -lvm[ /*Titre_Lien*/ | "+link+" ] ":
                " -lvs[ /*Titre_Lien*/ |"+link+" ] ";
            return result;
}

//Num Handling-------------------------------------------------------------------
function handleNumHoveringIn(){
            document.getElementById("numDiv").style.display="inline-block";
}

function handleNumHoveringOut(){
     document.getElementById("numDiv").style.display="none";
}
function handleNumHoveringInHor(){
            document.getElementById("numDivHor").style.display="inline-block";
}

function handleNumHoveringOutHor(){
     document.getElementById("numDivHor").style.display="none";
}

function handleNumOp(nbNums,type){
            var result="\n-num[\n\t";
            for (var i = 0; i<nbNums-1 ;i++){
                result+="/* Item "+(i+1)+" */|\n\t";
            }
            result+="/*Item "+nbNums+" */\n]";
            return result;
}
//Posts handling------------------------------------------------------
function handlePostOp(imagesSrc){
    var result="\n";
    for (var i = 0;i<imagesSrc.length;i++){
        result+="-post[/*Le titre ici*/|/*Le lien ici*/|"+imagesSrc[i]+']\n';
    }
    result+="-afficherpost[/*Un titre ici*/]\n";
    return result;
}

/***********************************Mekhalfa Taki Eddine end**********************************************/

/*****************************************Gacem Abderaouf begin **********************************************/


             function displayFunction(displayElem,command){
        var cursor=[],parametersArray=[],nestedOp,tempoElem;


        cursor.push(0);
        while (cursor[0]<command.length){
            var txt=getText(command,cursor);
            var textNode=document.createTextNode(txt);
            displayElem.appendChild(textNode);
            if (cursor[0]<command.length){
                parametersArray=[];
                var nestedOp=getOperation(parametersArray,command,cursor);

                tempoElem=parseOperation(nestedOp,parametersArray);
                if (tempoElem!=null) displayElem.appendChild(tempoElem);
            }
        }



    }


    $('.runButton').on('click',function () {
        var view=document.getElementById('codeResult').contentWindow.document;
        var Dview=view.getElementById('display');
        $("#codeResult").height(493);
        Dview.innerHTML="";
        /*Dview.head.innerHTML+="<link rel=\"stylesheet\" href=\"../assets/css/vendors/bootstrap.min.css\"><link rel=\"stylesheet\" href=\"../assets/css/vendors/font-awesome.min.css\"><link rel=\"stylesheet\" href=\"../assets/css/resources/styleSheet.css\"><script src=\"../assets/js/vendors/jquery-3.1.1.min.js\"><\/script><script src=\"../assets/js/resources/libraryDanyaProject.js\"><\/script><script src=\"../assets/js/vendors/bootstrap.min.js\"><\/script>";*/

        var Dcode=Omega.getValue();
        displayFunction(Dview,Dcode);


        var mydiv = $( "#codeResult" ).contents().find("body");
        var h     = mydiv.height();
        
        $("#codeResult").height(h);
        



    });

//HTML selector
var selectImage=document.getElementById('images');
var addImageButton=document.getElementById('addImageToEditor');
var widthImage=document.getElementById('widthImage');
var heightImage=document.getElementById('heightImage');
var positionImage=document.getElementById('positionImage');
var imageParameters=document.getElementById('ImageParameters');
var imagePreview=document.getElementById('previewImage');
var imageBrowse=document.getElementById('imageBrowse');

var selectFile=document.getElementById('files');
var addFileButton=document.getElementById('addFileToDownload');
var fileProtection=document.getElementById('fileProtection');
var iconSize=document.getElementById('iconSize');
var fileBrowse=document.getElementById('fileBrowse');
var Icon_Protection=document.getElementById('Icon_Protection');
var fileTypeImage=document.getElementById("fileTypeImage");

var sizeBar=document.getElementById('sizeB');
var sizeIcon=document.getElementById('sizeIcon');
var sizeBarInList=document.getElementById('sizeBInList');
var sizeIconInList=document.getElementById('sizeIconInList');


var uploadImageLoading=document.getElementById('uploadImageLoading');
var uploadImageFailure=document.getElementById('uploadImageFailure');
var uploadImageSuccess=document.getElementById('uploadImageSuccess');

var uploadFileLoading=document.getElementById('uploadFileLoading');
var uploadFileFailure=document.getElementById('uploadFileFailure');
var uploadFileSuccess=document.getElementById('uploadFileSuccess');

var uploadSlideLoading=document.getElementById('uploadSlideLoading');
var uploadSlideFailure=document.getElementById('uploadSlideFailure');
var uploadSlideSuccess=document.getElementById('uploadSlideSuccess');

//functions
    $('.selectpicker').selectpicker({
        style: 'btn-custom',
        size: 4
    });

        function  hideImageModal() {
            $("#imageInsertionModal").modal("hide");
        }
        function handleImageOp (imageName,width,height,position){
            var w=parseInt(width);
            var h=parseInt(height);
            if((w+"")!=width) width="";
            if((h+"")!=height) height="";
            return "-image[\n  "+imageName+" |\n  /*legende*/ |\n  /*largeur*/ "+width+"|\n  /*hauteur*/ "+height+"|\n  /*position*/ "+position+"\n]";
        }
        function handleImage () {
            $("#imageInsertionModal").modal("show");
            selectImage.selectedIndex=0;
            $(selectImage).selectpicker("refresh");
            imageParameters.style.display="none";
            imagePreview.src="../assets/images/imageDefault.png";

        }

                function  hideToDownloadModal() {
            $("#toDownloadModal").modal("hide");
        }
        function handleDownloadOp (fileName,protection,iconSize){

            return "-telecharger[\n  "+fileName+" |\n  /*protection*/ "+protection+"|\n  /*titre du lien à la place de l'icone*/ |\n  /*taille de l'icone*/ "+iconSize+"\n]";
        }

        function handleDownload (){
             $("#toDownloadModal").modal("show");
            selectFile.selectedIndex=0;
            $(selectFile).selectpicker("refresh");
            Icon_Protection.style.display="none";
        }

            function generateSlideCode(){
            var modal=$("#slideInsertionModal").modal("hide");
            var tds=$("#tdssFatherInSlides").find(".selectedImgInSlide");
            var imagessrc=$.map(tds,function(element,_){
                        element.className="";
                        var imgElement=element.firstChild;
                        return imgElement.src.replace(/(?:.*\/images\/)(.*)/g,"$1");
            });
            if (imagessrc.length){
                Omega.replaceRange(handleSlideOp(imagessrc),Omega.getCursor());
            }
        }

        $("#tdssFatherInSlides").on("click","td",function(event){
            var targetTd=$(this);
            targetTd.toggleClass("selectedImgInSlide");
        });
        var currentSelectedpage=0;
        function leftChevSlides(){
            var tables=$(".slideInsertionContainer .slideInsertion");
            tables[currentSelectedpage].style.display="none";
            if (currentSelectedpage>0) tables[--currentSelectedpage].style.display="table";
            else {
                currentSelectedpage=tables.length-1;
                tables[currentSelectedpage].style.display="table";
            }
        }
        function rightChevSlides(){
            var tables=$(".slideInsertionContainer .slideInsertion");
            tables[currentSelectedpage].style.display="none";
            if (currentSelectedpage<tables.length-1) tables[++currentSelectedpage].style.display="table";
            else {
                currentSelectedpage=0;
                tables[currentSelectedpage].style.display="table";
            }
        }

            function handleSlideInsertion(){
            $("#slideInsertionModal").modal("show");

            $("#uploadImgInputSlide").on("change", function () {

                var file = document.getElementById("uploadImgInputSlide").files;
                var i=0;
                    uploadSlideFailure.innerHTML="";
                    uploadSlideSuccess.innerHTML="";
                    while(i<file.length)
                    {
                        uploadImageForSlides(file[i]);
                        i++;
                    }
                });

                function uploadImageForSlides(file){
                    var uri = "../scripts/upload_img.php";
                    var xhr = new XMLHttpRequest();
                    var fd = new FormData();


                    xhr.open("POST", uri, true);
                    //loading
                    uploadSlideLoading.style.display="block";
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            if( xhr.status == 200){
                                // Success 200 OK
                                 uploadSlideLoading.style.display="none";
                                var json_result = JSON.parse(xhr.responseText);
                                if(json_result.status=="success"){
                                    //uploaded
                                    uploadSlideSuccess.innerHTML+=json_result.path+" Uploaded \n";
                                    uploadSlideSuccess.style.display="block";
                                    setTimeout(function(){
                                        uploadSlideSuccess.style.display="none";
                                    },2000)

                                    addSlidesImage(json_result);
                                    //synchronise with image and post insertion
                                    addImagesImage(json_result);
                                    addPostsImage(json_result);
                                }
                                else if(json_result.status=="exist"){
                                    //exist
                                    uploadSlideFailure.innerHTML+=json_result.path+" already exist \n";
                                    uploadSlideFailure.style.display="block";
                                    setTimeout(function(){
                                        uploadSlideFailure.style.display="none";
                                    },3000)
                                }
                            }
                            else{
                                //failure
                                     uploadSlideFailure.innerHTML="failure";
                                uploadSlideFailure.style.display="block";
                                setTimeout(function(){
                                    uploadSlideFailure.style.display="none";
                                },2000)
                            }
                        }
                    };

                    fd.append("myFile", file);
                    xhr.send(fd);
                }




        }
        function addSlidesImage(json){
            var json_result=json;
            var theContainerTable=$("#tdssFatherInSlides");
                                    var innerTables=theContainerTable.find(".slideInsertion");
                                    if (!innerTables.length){
                                         theContainerTable.append("<table class='slideInsertion'><tr>"+
                                            "<td><img src='../uploads/images/"+json_result.path+"'></td>"+
                                            "</tr></table>");
                                    }else{
                                            innerTables.css("display","none");
                                            var lastTable=innerTables[innerTables.length-1];
                                            var trElement=$(lastTable).find("tr");
                                            if (trElement[0].childElementCount<8){
                                                trElement.append("<td><img src='../uploads/images/"+json_result.path+"'></td>");
                                                lastTable.style.display="table";
                                            }
                                            else{
                                                theContainerTable.append("<table class='slideInsertion'><tr>"+
                                                "<td><img src='../uploads/images/"+json_result.path+"'></td>"+
                                                "</tr></table>");
                                            }


                                    }
        }

        function handleSlideOp(imagesSrc){
        var result="\n";
        for (var i = 0;i<imagesSrc.length;i++){
            result+="-slide["+imagesSrc[i]+' | /*le lien correspondant*/]\n';
        }
        result+="-afficherslide\n";
        return result;
    }


        $("#sizeSetter").slider();
        $("#sizeSetterInList").slider();

//events

 //////////////////////////image/////////////////////////////////////////
        selectImage.addEventListener('change',function (){
            imageParameters.style.display="block";
            imagePreview.src="../uploads/images/"+this.value;

        },false)

        addImageButton.addEventListener('click',function(){

            Omega.replaceRange(handleImageOp(selectImage.value,widthImage.value,heightImage.value,positionImage.value),Omega.getCursor());
            hideImageModal();

        },false);

        imageBrowse.addEventListener('change',function(){

                var file = imageBrowse.files;

            var i = 0;
            while ( i < file.length) {
                uploadImage(file[i]);
                i++;

            }



        },false)

        function uploadImage(file){
            var uri = '../scripts/upload_img.php';
            var xhr = new XMLHttpRequest();
            var fd = new FormData();

            uploadImageLoading.style.display="block";


            xhr.open("POST", uri, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    uploadImageLoading.style.display="none";
                    if(xhr.status == 200) {
                        var json = JSON.parse(xhr.responseText);

                        if(json.status=="success"){
                            //uploaded!!!
                            uploadImageSuccess.innerHTML=json.path+"uploaded";
                            uploadImageSuccess.style.display="block";
                            setTimeout(function(){
                                uploadImageSuccess.style.display="none";
                            },2000)

                            addImagesImage(json);
                            //synchronise with post and slide insertion
                            addPostsImage(json);
                            addSlidesImage(json);
                        }
                        else if(json.status=="exist"){
                            uploadImageFailure.innerHTML=json.path+" already exist";
                        uploadImageFailure.style.display="block";
                        setTimeout(function(){
                            uploadImageFailure.style.display="none";
                        },3000)
                        }
                    }
                    else{
                        //failure!!!
                        uploadImageFailure.innerHTML="failure";
                        uploadImageFailure.style.display="block";
                        setTimeout(function(){
                            uploadImageFailure.style.display="none";
                        },2000)
                    }
                }

            };
            fd.append('myFile', file);
                xhr.send(fd);


        }
        function addImagesImage(json_result)
        {
            var json=json_result;
            var option=document.createElement("option");
            option.value=json.path;;/*YASSINEvar.name  //with extension */
            option.innerHTML=json.imageName;/*YASSINEvar.name  without extension*/
            option.setAttribute("selected","");
            selectImage.insertBefore(option,selectImage.firstChild.nextSibling.nextSibling);
            $(selectImage).selectpicker("refresh");
            imageParameters.style.display="block";
            imagePreview.src="../uploads/images/"+option.value;
        }



///////////////////////////telecharger///////////////////////////////////////
        iconSize.addEventListener('change',function() {
            if(this.value=="true") this.value="false";
            else this.value="true";
        },false)
        selectFile.addEventListener('change',function (){
            Icon_Protection.style.display="block";
            var extention=selectFile.value.match(/(?:\.)[a-z0-9]+$/gi)[0];
            fileTypeImage.src="../assets/images/"+extention+".png";

        },false)

        addFileButton.addEventListener('click',function(){

            Omega.replaceRange(handleDownloadOp(selectFile.value,fileProtection.checked,iconSize.value),Omega.getCursor());
            hideToDownloadModal();
        },false);

        fileBrowse.addEventListener('change',function(){


                var file = fileBrowse.files;

            var i = 0;
            while ( i < file.length) {
                uploadFile(file[i]);
                i++;

            }
        },false)



        function uploadFile(file){
            var uri = '../scripts/upload_file.php';
            var xhr = new XMLHttpRequest();
            var fd = new FormData();

            uploadFileLoading.style.display="block";


            xhr.open("POST", uri, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    uploadFileLoading.style.display="none";
                    if(xhr.status == 200) {
                        var json = JSON.parse(xhr.responseText);
                        //uploaded!!!
                        uploadFileSuccess.style.display="block";
                        setTimeout(function(){
                            uploadFileSuccess.style.display="none";
                        },2000)
                        if(json.status=="success"){
                            var option=document.createElement("option");
                            option.value=json.path;;/*YASSINEvar.name  //with extension */
                            var extention=option.value.match(/(?:\.)[a-z0-9]+$/gi)[0];
                            fileTypeImage.src="../assets/images/"+extention+".png";
                            option.innerHTML=json.fileName;/*YASSINEvar.name  without extension*/
                            option.setAttribute("selected","");
                            selectFile.insertBefore(option,selectFile.firstChild.nextSibling.nextSibling);
                            $(selectFile).selectpicker("refresh");
                            Icon_Protection.style.display="block";
                        }
                        else if(json.status=="exist"){
                            uploadFileFailure.innerHTML=json.path+" already exist";
                        uploadFileFailure.style.display="block";
                        setTimeout(function(){
                            uploadFileFailure.style.display="none";
                        },3000)
                        }
                    }
                    else{
                        //failure!!!
                        uploadFileFailure.innerHTML="failure";
                        uploadFileFailure.style.display="block";
                        setTimeout(function(){
                            uploadFileFailure.style.display="none";
                        },2000)
                    }
                }

            };
            fd.append('myFile', file);
                xhr.send(fd);


        }


//////////////////////////taille////////////////////////////////////////////////////
        sizeIcon.addEventListener('mouseover',function(){
            sizeBar.style.display="block";
            sizeBar.style.top="60px"; sizeBar.style.left="165px";
        },false);

        sizeIcon.addEventListener('mouseout',function(){

            sizeBar.style.display="none";
        },false);




       $('#sizeSet').on('click',function () {

        if (!Omega.somethingSelected()) {
            Omega.replaceRange(" -taille[/*content*/ | "+document.getElementById('sizeSetter').value+" ]",Omega.getCursor());
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push(" -taille["+Omega.getSelections()[i]+" | "+document.getElementById('sizeSetter').value+" ]");
            }
            Omega.replaceSelections(replacements);


        }
            sizeBar.style.display="none";
    })

            sizeIconInList.addEventListener('mouseover',function(){
            sizeBarInList.style.display="block";
            sizeBarInList.style.top="110px"; sizeBarInList.style.left="155px"; sizeBarInList.style.width="120px";
        },false);

        sizeIconInList.addEventListener('mouseout',function(){

            sizeBarInList.style.display="none";
        },false);




       $('#sizeSetInList').on('click',function () {

        if (!Omega.somethingSelected()) {
            Omega.replaceRange(" -taille[/*content*/ | "+document.getElementById('sizeSetterInList').value+" ]",Omega.getCursor());
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push(" -taille["+Omega.getSelections()[i]+" | "+document.getElementById('sizeSetterInList').value+" ]");
            }
            Omega.replaceSelections(replacements);


        }
            sizeBarInList.style.display="none";
    })

//////////////////////////////////text edition/////////////////////////////
       $('.textJustify').on('click',function () {

        if (!Omega.somethingSelected()) {
            Omega.replaceRange(" -p[/*content*/ | j ]",Omega.getCursor());
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push(" -p["+Omega.getSelections()[i]+" | j ]");
            }
            Omega.replaceSelections(replacements);


        }

    });
       $('.textCenter').on('click',function () {

        if (!Omega.somethingSelected()) {
            Omega.replaceRange(" -p[/*content*/ | c ]",Omega.getCursor());
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push(" -p["+Omega.getSelections()[i]+" | c ]");
            }
            Omega.replaceSelections(replacements);


        }

    });
     $('.alignRight').on('click',function () {

        if (!Omega.somethingSelected()) {
            Omega.replaceRange(" -p[/*content*/ | d ]",Omega.getCursor());
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push(" -p["+Omega.getSelections()[i]+" | d ]");
            }
            Omega.replaceSelections(replacements);


        }

    });
      $('.alignLeft').on('click',function () {

        if (!Omega.somethingSelected()) {
            Omega.replaceRange(" -p[/*content*/ | g ]",Omega.getCursor());
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push(" -p["+Omega.getSelections()[i]+" | g ]");
            }
            Omega.replaceSelections(replacements);


        }

    });


//////////////////////////////////fullScreenVisualisation///////////////////////////////
    document.getElementById('viewFullScreenButton').addEventListener('click',function () {
                var Dview=document.getElementById('codeResult').contentWindow.document;
                var html=Dview.body.innerHTML;
                document.getElementById('viewFullScreen').value=html;
                $("#fullScreenForm").submit();
            },false)


/***************************************************Gacem Abderaouf end******************************************************/


/***********************************Brahim yacine begin******************************************************/
 /* This is a function to handle Panel insertion */

        function handlePanel(event) {
        $("#sectionSpecialesInsertionModal").modal("show");
         var panelType=event.target.id;

            if(panelType.indexOf("2")!=-1)
                {
                    _panelStyle=2;
                    panelType=panelType.substring(0,panelType.indexOf("2"));
                }
            else{
                   _panelStyle=1;

            }

        if (!Omega.somethingSelected()) {
            //$("#nothingSelectedModal").modal("show");
            Omega.replaceRange("-"+panelType+"[ /*Contenu*/ ] ",Omega.getCursor());
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
            //$("#nothingSelectedModal").modal("show");
            Omega.replaceRange("-titre"+type+"[ /*Contenu*/ ] ",Omega.getCursor());
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

        function handleColor(color)
        {
            if (!Omega.somethingSelected()) {
            Omega.replaceRange(" -couleur[ "+"/*Contenu*/"+" | "+color+"]", Omega.getCursor());
            }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-couleur"+"["+Omega.getSelections()[i]+" | "+color+"]");
            }
            Omega.replaceSelections(replacements);
        }

                 //$(this).preventDefault();
            return false;
        }

        $("#colorPreview").hide();
        $("body").on("mouseover",".cm-hex",function(e){
            var pos=$(e.target).offset();
            pos.left+=1;
            pos.top+=25;
           // $(e.target).animate({background:"#2b2b2b"},function(){$(this).css("background-color","#191919")});
            $(e.target).css("background-color","#ccc");
            $("#colorPreview").css("position","absolute");
            $("#colorPreview").css("display","inline-block");
            $("#innerColorPreview").css("background-color",$(e.target).text());
            $("#colorPreview").offset(pos);

            $("#colorPreview").show(200);
            $(window).on("keydown",function(F){

                if(F.ctrlKey && F.keyCode==90)
                    {
                        $("#colorPreview").hide(200);
                    }
            });

        });

        $("body").on("mouseout",".cm-hex",function(e){
            $("#colorPreview").fadeOut(200).hide(200);
            $(e.target).css("background-color","#eee");

        });

     $("#titleInsertion").on('mouseover',function(){
        $(this).addClass("open");
    });
     $("#titleInsertion").on('mouseout',function(){
        $(this).removeClass("open");
    });
        $('.cpl').ColorPicker({
        color: '#d50000',
        onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            $(colpkr).fadeOut(500);
            return false;},
       onSubmit: function (hsb, hex, rgb) {
            var str="#"+hex;
		    handleColor(str);
	       }

        });
        $("body").on('click','.note_close',function() {
			  $(this).parent()
			  .animate({ opacity: 0 }, 250, function() {
				$(this)
				.animate({ marginBottom: 0 }, 250)
				.children()
				.animate({ padding: 0 }, 250)
				.wrapInner("<div />")
				.children()
				.slideUp(250, function() {
				  $(this).closest(".note").remove();

				});
			  });
            return false;
			});
/***************************************Brahim Yacine end********************************************/



/************************************KERRIS NADIR ISLAM *********************************************/


//***********************Handling Columns Insertion**************************//

    function handleColonneOp(){
        var String_col ;
        var nbColonne = $('#inputColumns').val();
        String_col = "\n-colonnes[\n\t" + nbColonne +"|";
         for (var i = 1; i < nbColonne ; i++){
             String_col += "\n\t/*contenu" + i + "*/|";
         }
        String_col += "\n\t/*contenu"+ nbColonne +"*/\n\t]";
        Omega.replaceRange(String_col, Omega.getCursor());
         $('#inputColumns').val('');

    }
//***********************Handling Columns Insertion ShortCut**************************//

        function handleColonneShortOp(){
        var String_col ;
        var nbColonne = $('#inputColumnsShort').val();
        String_col = "\n-colonnes[\n\t" + nbColonne +"|";
         for (var i = 1; i < nbColonne ; i++){
             String_col += "\n\t/*contenu" + i + "*/|";
         }
        String_col += "\n\t/*contenu"+ nbColonne +"*/\n\t]";
        Omega.replaceRange(String_col, Omega.getCursor());
        $('#inputColumnsShort').val('');

    }
//***********************Tabs ShortCut Event**************************//

     function handleColumnsHoveringInSho(){
        document.getElementById("ColumnsDiv").style.display="block";
     }
     function handleColumnsHoveringOutSho(){
        document.getElementById("ColumnsDiv").style.display="none";
     }

//***********************Handling Tabs Insertion**************************//

    function handleTabsOp(){
        var String_col ;
        var nbTabs = $('#inputTabs').val();
        for(var i=1 ; i<=nbTabs ; i++){
            String_col = "\n-tabs[\n\t/*titre"+ i +"*/|/*contenu"+ i +"*/\n\t]";
            Omega.replaceRange(String_col, Omega.getCursor());
        }
        var animation = document.getElementById('Animation');
        if (animation.checked){
            String_col = "\n-affichertabs2 /*Tabs avec animation*/"
        }else{
            String_col = "\n-affichertabs1 /*Tabs sans animation*/"
        }
        Omega.replaceRange(String_col, Omega.getCursor());
        $('#inputTabs').val('');
    }

    $('#divAnimation').click(function(e){
            e.stopPropagation();
            //document.getElementById('Animation').checked = true;
    })

//***********************Handling Tabs Insertion ShortCut**************************//

    function handleTabsShortOp(){
        var String_col ;
        var nbTabs = $('#inputTabsShort').val();
        for(var i=1 ; i<=nbTabs ; i++){
            String_col = "\n-tabs[\n\t/*titre"+ i +"*/|/*contenu"+ i +"*/\n\t]";
            Omega.replaceRange(String_col, Omega.getCursor());
        }
        var animation = document.getElementById('AnimationShort');
        if (animation.checked){
            String_col = "\n-affichertabs2 /*Tabs avec animation*/"
        }else{
            String_col = "\n-affichertabs1 /*Tabs sans animation*/"
        }
        Omega.replaceRange(String_col, Omega.getCursor());
        $('#inputTabsShort').val('');
    }

    $('#divAnimationShort').click(function(e){
         e.stopPropagation();
        //document.getElementById('Animation').checked = true;
    })

//***********************Tabs ShortCut Event**************************//

     function handleTabsHoveringInSho(){
        document.getElementById("TabsDiv").style.display="block";
     }
     function handleTabsHoveringOutSho(){
        document.getElementById("TabsDiv").style.display="none";
     }

//***********************Handling Video Insertion**************************//

            var selectVideo = document.getElementById('videos');
            var videoParameters=document.getElementById('videoParameters');
            var videoBrowse=document.getElementById('videoBrowse');

     selectVideo.addEventListener('change',function (){
     videoParameters.style.display="block";
     document.querySelector("#previewVideo").src = "../uploads/videos/" + this.value;

        },false)

     function handleVideoOp(){

         var link = null ;
         var width = 0 ;
         var height = 0 ;
         var string = null;
          $('#YoutubeVideo').modal('show');
          $('#youtubeTab').tab('show');
          document.getElementById('youtubeTab2').className = 'tab-pane active';
          document.getElementById('browseTab').className = 'tab-pane';
              $('#inputYoutube').val('');
              $('#inputHeightYoutube').val('');
              $('#inputWidthYoutube').val('');
              $('#inputWidthVideo').val('');
              $('#inputHeightVideo').val('');
              var videos=document.getElementById('videos');
              videos.selectedIndex = 0;
              $(videos).selectpicker("refresh");
              document.querySelector("#previewVideo").src = "../uploads/videos/Default.mp4";
              videoParameters.style.display="none";

          document.getElementById('YoutubeVideoSave').onclick = function (e) {
              if (document.getElementById('youtubeTab').className == 'active') {
                    link = $('#inputYoutube').val();
                    height = $('#inputHeightYoutube').val();
                    width = $('#inputWidthYoutube').val();

                        string = "\n-youtube[\n\t" + link + "|\n\t/*legende*/|\n\t/*largeur*/"+ width  + "|\n\t/*hauteur*/" + height + "\n\t]";

             } else if (document.getElementById('videoTab').className == 'active'){
                   link = selectVideo.value;
                   height = $('#inputHeightVideo').val();
                   width = $('#inputWidthVideo').val();

                        string = "\n-video[\n\t" + link + "|\n\t/*legende*/|\n\t/*largeur*/"+ width + "|\n\t/*hauteur*/"+ height + "\n\t]";
            }


          Omega.replaceRange(string, Omega.getCursor());
              $('#YoutubeVideo').modal('hide');

        }

     }

//***********************Handling Video Upload**************************//

        videoBrowse.addEventListener('change',function(){

                var file = videoBrowse.files;

            var i = 0;
            while ( i < file.length) {
                uploadVideo(file[i]);
                i++;

            }
        },false)

        var uploadVideoLoading=document.getElementById('uploadVideoLoading');
        var uploadVideoFailure=document.getElementById('uploadVideoFailure');
        var uploadVideoSuccess=document.getElementById('uploadVideoSuccess');

        function uploadVideo(file){
            var uri = '../scripts/upload_video.php';
            var xhr = new XMLHttpRequest();
            var fd = new FormData();

            uploadVideoLoading.style.display="block";


            xhr.open("POST", uri, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    uploadVideoLoading.style.display="none";
                    if(xhr.status == 200) {
                        var json = JSON.parse(xhr.responseText);

                        if(json.status=="success"){
                            //uploaded!!!
                            uploadVideoSuccess.innerHTML=json.path+"uploaded";
                            uploadVideoSuccess.style.display="block";
                            setTimeout(function(){
                                uploadVideoSuccess.style.display="none";
                            },2000)

                            var option=document.createElement("option");
                            option.value=json.path;;/*YASSINEvar.name  //with extension */
                            option.innerHTML=json.videoName;/*YASSINEvar.name  without extension*/
                            option.setAttribute("selected","");
                            selectVideo.insertBefore(option,selectVideo.firstChild.nextSibling.nextSibling);
                            $(selectVideo).selectpicker("refresh");
                            videoParameters.style.display="block";
                            document.querySelector("#previewVideo").src = "../uploads/videos/" + option.value;

                        }
                        else if(json.status=="exist"){
                            uploadVideoFailure.innerHTML=json.path+" already exist";
                        uploadVideoFailure.style.display="block";
                        setTimeout(function(){
                            uploadVideoFailure.style.display="none";
                        },3000)
                        }
                    }
                    else{
                        //failure!!!
                        uploadVideoFailure.innerHTML="failure";
                        uploadVideoFailure.style.display="block";
                        setTimeout(function(){
                            uploadVideoFailure.style.display="none";
                        },2000)
                    }
                }

            };
            fd.append('myFile', file);
                xhr.send(fd);


        }

/************************************tabs & columns*************/

      /* var ColumnsIcon = document.getElementById('ColumnsIcon');
        var ColumnsDiv = document.getElementById('ColumnsDiv');

          ColumnsIcon.addEventListener('mouseover',function(){
            ColumnsDiv.style.display="block";
        },false);

        ColumnsIcon.addEventListener('mouseout',function(){

            ColumnsDiv.style.display="none";
        },false);
    var TabsIcon = document.getElementById('TabsIcon');
        var TabsDiv = document.getElementById('TabsDiv');

          TabsIcon.addEventListener('mouseover',function(){
            TabsDiv.style.display="block";
        },false);

        TabsIcon.addEventListener('mouseout',function(){

            TabsDiv.style.display="none";
        },false);!!!*/




 /************************************KERRIS NADIR ISLAM EnD*********************************************/

var ribbon=document.getElementById('ribbonModelShow');
ribbon.addEventListener('click',function(){
    $("#ribbonModal").modal("show");
},false);

var ribbon1=document.getElementById('ribbonModelShow1');
ribbon1.addEventListener('click',function(){
    $("#ribbonModal").modal("show");
},false);



    $("#ribb").on("click",function(e){
        $("#ribb1.ribbonImg2").addClass("ribbonImg");
        $("#ribb1.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb2.ribbonImg2").addClass("ribbonImg");
        $("#ribb2.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb3.ribbonImg2").addClass("ribbonImg");
        $("#ribb3.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb4.ribbonImg2").addClass("ribbonImg");
        $("#ribb4.ribbonImg2").removeClass("ribbonImg2");
        _ribbonStyle=0;
        $(e.currentTarget).removeClass("ribbonImg");
        $(e.currentTarget).addClass("ribbonImg2");
        return false;
    })
    $("#ribb1").on("click",function(e){
        $("#ribb.ribbonImg2").addClass("ribbonImg");
        $("#ribb.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb2.ribbonImg2").addClass("ribbonImg");
        $("#ribb2.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb3.ribbonImg2").addClass("ribbonImg");
        $("#ribb3.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb4.ribbonImg2").addClass("ribbonImg");
        $("#ribb4.ribbonImg2").removeClass("ribbonImg2");
        _ribbonStyle=1;
        $(e.currentTarget).removeClass("ribbonImg");
        $(e.currentTarget).addClass("ribbonImg2");
        return false;
    })
    $("#ribb2").on("click",function(e){
        $("#ribb.ribbonImg2").addClass("ribbonImg");
        $("#ribb.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb1.ribbonImg2").addClass("ribbonImg");
        $("#ribb1.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb3.ribbonImg2").addClass("ribbonImg");
        $("#ribb3.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb4.ribbonImg2").addClass("ribbonImg");
        $("#ribb4.ribbonImg2").removeClass("ribbonImg2");
        _ribbonStyle=2;
        $(e.currentTarget).removeClass("ribbonImg");
        $(e.currentTarget).addClass("ribbonImg2");
        return false;
    })
   $("#ribb3").on("click",function(e){
        $("#ribb.ribbonImg2").addClass("ribbonImg");
        $("#ribb.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb1.ribbonImg2").addClass("ribbonImg");
        $("#ribb1.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb2.ribbonImg2").addClass("ribbonImg");
        $("#ribb2.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb4.ribbonImg2").addClass("ribbonImg");
        $("#ribb4.ribbonImg2").removeClass("ribbonImg2");
        _ribbonStyle=3;
        $(e.currentTarget).removeClass("ribbonImg");
        $(e.currentTarget).addClass("ribbonImg2");
        return false;
    })
    $("#ribb4").on("click",function(e){
        $("#ribb.ribbonImg2").addClass("ribbonImg");
        $("#ribb.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb1.ribbonImg2").addClass("ribbonImg");
        $("#ribb1.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb2.ribbonImg2").addClass("ribbonImg");
        $("#ribb2.ribbonImg2").removeClass("ribbonImg2");
        $("#ribb3.ribbonImg2").addClass("ribbonImg");
        $("#ribb3.ribbonImg2").removeClass("ribbonImg2");
        _ribbonStyle=4;
        $(e.currentTarget).removeClass("ribbonImg");
        $(e.currentTarget).addClass("ribbonImg2");
        return false;
    })
////////////////////////////////////////////////////////////////////////////////////
            $("#ribb").on("dblclick",function(e){
                _ribbonStyle=0;
                handleRibbon();
            })
            $("#ribb1").on("dblclick",function(e){
                _ribbonStyle=1;
                handleRibbon();
            })
            $("#ribb2").on("dblclick",function(e){
                _ribbonStyle=2;
                handleRibbon();
            })
            $("#ribb3").on("dblclick",function(e){
                _ribbonStyle=3;
                handleRibbon();
            })
            $("#ribb4").on("dblclick",function(e){
                _ribbonStyle=4;
                handleRibbon();
            })

            function handleRibbon (event){
                var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-ruban[/*put your text here*/]");
            }
            Omega.replaceSelections(replacements);
            $("#ribbonModal").modal("hide");
        }

        $("#iframFnct").on("click",function(e){
                handleIframe();
            })

         $("#iframFnct1").on("click",function(e){
                handleIframe();
            })

       function handleIframe (event){
        var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-iframe[/* url */|/* legend */|/* largeur */|/* hauteur */]");
            }
            Omega.replaceSelections(replacements);
       }

         //* here is the part where we test keypress by the user like ctrl+s *//

       $(window).bind('keydown', function(event) {
            if (event.ctrlKey || event.metaKey) {
            switch (String.fromCharCode(event.which).toLowerCase()) {
            case 's':
            event.preventDefault();
            //alert('ctrl-s');
            saveToDB();
            break;
            case 'o':
            event.preventDefault();
            //alert('ctrl-f');
            handleUpload();
            break;
        }

    }
    else if(event.keyCode=="120") document.querySelector(".runButton").click();
});





</script>
</body>
</html>
