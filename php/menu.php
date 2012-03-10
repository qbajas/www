<?php
function print_menu() {

echo
'
<div class="mainmenu">
            <ul id="nav">
            <li > <a href="index.php"> <img src="images/home.png"  alt="homepage" />  Home </a>
                    <ul>
                    <li> <a href="index.php#me"> &#187; About me  </a> 			</li>
                    <li> <a href="index.php#motto"> &#187; Motto  </a> </li>
                    <li> <a href="index.php#contact"> &#187; Contact </a>	</li>
                    </ul>
            </li>
            <li> <a href="projects.php"> <img src="images/projects.png"  alt="projects" />  Projects </a>
                    <ul >
                    <li> <a href="projects.php#a">&#187; Akord website </a> </li>
                    <li> <a href="projects.php#c">&#187; Crossword - Java </a> </li>
                    <li> <a href="projects.php#t">&#187; Tetris - Pascal </a> </li>
                    <li> <a href="projects.php#m">&#187; More </a> </li>
                    </ul>
            </li>
            <li> <a href="achievements.php"> <img src="images/achievements.png"  alt="achievements" />  Achievements </a>
                    <ul >
                    <li> <a href="achievements.php#a">&#187; Achievements </a> </li>
                    <li> <a href="achievements.php#s">&#187; Skills </a> </li>
                    </ul>
            </li>
            </ul>
            </div>



            <div class="contents">
                    <ul>
                    <li> Contents:</li>
                    <li> <a href="#me"> &#187; About me  </a> 			</li>
                    <li> <a href="#motto"> &#187;  Motto  </a> </li>
                    <li> <a href="#contact"> &#187; Contact </a>	</li>
                    </ul>
            </div>
';
}