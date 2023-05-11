<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gafete {{ $profesor->nombre }}</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    font-family: "Montserrat", sans-serif;
}

body{
    background: #cfcfcf;
    font-size: 14px;
    line-height: 22px;
    color: #0c0c0c;
    width: 100%;
}

.container{
    /* width: 800px;
    height: 1100px; */
    display: flex;
    /* margin: 50px auto; */
    background: #fff;
}

.left_col{
    width: 280px;
    height: 1100px;
    background: #000000;
    float: left;
}

.left_col_1{
    position: relative;
    width: 100%;
    height: 300px;
    background: #327D9D;
}

.left_col_2{
    position: relative;
    width: 100%;
    height: 240px;
    background: #225565;
}

.left_col_3{
    position: relative;
    width: 100%;
    height: 426px;
    background: #225565;
    padding: 25px 0;
}

img{
    position: absolute;
    width: 200px;
    height: 200px;
    top: 25px;
    left: 35px;
    border-radius: 50%;
}

.br{
    width: 100%;
    height: 42px;
    background: #A99265;
}

.header{
    position: absolute;
    color: whitesmoke;
    top: 20px;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 16px;
}

.header2{
    left: 95px;
}

.header3{
    left: 110px;
}

.header4{
    left: 30px;
    color: #225565;
}

.header5{
  left: 30px;
  color: #225565;
}

.header6{
  left: 60px;
  color: #225565;
  font-size: 12px;
}

.below{
  top: 40px;
  left: 60px;
  color: #225565;
  font-size: 12px;
  font-weight: 500;
}

.name{
    position: absolute;
    color: whitesmoke;
    top: 240px;
    left: 50px;
    font-weight: 700;
    font-size: 20px;
}

.date{
    position: absolute;
    top: 265px;
    left: 80px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    color: #225565;
}

.address{
    position: absolute;
    color: #B9B9B9;
    top: 60px;
    left: 60px;
    font-size: 12px;
    text-align: center;
}

.address a{
  background-color: #327D9D;
  color: #fff;
  padding: 5px 10px;
  text-decoration: none;
  border-radius: 5px;
}

.address a:hover{
  background-color: #3E9403;
  color: #fff;
}


.container .left_col .left_col_3 ul li{
    display: flex;
    margin-bottom: 10px;
    align-items: center;
}

.skill{
    margin-bottom: 40px;
}

.progress_bar {
    width: 75%;
    left: 30px;
    margin: 0 5px;
    height: 25px;
    background: #ffffff;
    position: relative;
}

span{
    position: absolute;
    top: 3px;
    left: 3px;
    height: 75%;
    background: #327D9D;
    font-size: 10px;
}

.align{
    position: absolute;
    left: 10px;
    color: white;
}

.right_col{
  width: 520px;
  height: 1100px;
  background: #A99265;
  float: left;
}

.right_col_1{
  position: relative;
  width: 100%;
  height: 270px;
  background: #F0F0F0;
}

.right_col_2{
  position: relative;
  width: 100%;
  height: 350px;
  top: 10px;
  background: #F0F0F0;  
}

.right_col_3{
  position: relative;
  width: 100%;
  height: 280px;
  top: 20px;
  background: #F0F0F0;  
}

.right_col_4{
  position: relative;
  width: 100%;
  height: 170px;
  top: 30px;
  background: #F0F0F0;  
}

.profile{
  position: absolute;
  color: #757575;
  left: 30px;
  font-size: 12px;
  padding-right: 30px;
  text-indent: 30px;
}

.profile1{
  top: 60px;
}

.profile2{
  top: 200px;
}

.right_col_left1{
  position: absolute;
  top: 60px;
  width: 35%;
  height: 280px;
  background: #F0F0F0; 
}

.right_col_right1{
  position: absolute;
  top: 60px;
  left: 183px;
  width: 65%;
  height: 280px;
  background: #F0F0F0; 
}

.right_col_left2{
  position: absolute;
  top: 60px;
  width: 20%;
  height: 200px;
  background: #F0F0F0; 
}

.right_col_right2{
  position: absolute;
  top: 60px;
  left: 105px;
  width: 80%;
  height: 200px;
  background: #F0F0F0; 
}

.side{
  position: absolute;
  color: #757575;
  top: 20px;
  left: 60px;
  font-size: 12px;
}

.recent{
  position: absolute;
  top: 60px;
  left: 0px;
  width: 100%;
  height: 100px;
  background: #F0F0F0; 
}
    </style>
</head>
<body>
    <div class="container">
        <!--left column starts-->
        <div class="left_col">
            <div class="left_col_1">
                <img src="https://i.imgur.com/bmZAxnX.jpg" alt="profile_picture">
                <p class="name">{{ $profesor->titulo }} {{ $profesor->nombre }}</p>
                <p class="date">{{ $profesor->paterno }} {{ $profesor->materno }}</p>
            </div>
            <div class="br"></div>
            <div class="left_col_2">
                <p class="header header2">Contact</p>
                <p class="address">Bashundhara R/A Block C<br>
                    Dhaka Bangladesh<br>
                    {{ $profesor->telefono }}<br><br>
                    iftikharrasha@gmail.com<br><br>
                    <a href="https://www.fiverr.com/iftikharrasha" target="_blank">My Fiverr Account</a></p>
                </div>
                <div class="br"></div>
                
                <div class="left_col_3">
                    
                    <div class="skill">
                        <p class="header header3">Skills</p>
                    </div>
                    <ul>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 88%;">
                                    <p class="align">HTML5
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 88%;">
                                    <p class="align">CSS3
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 76%;">
                                    <p class="align">BOOTSTRAP
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 73%;">
                                    <p class="align">PHP
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 81%;">
                                    <p class="align">MYSQL
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 85%;">
                                    <p class="align">WORDPRESS
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 88%;">
                                    <p class="align">UI/UX
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 58%;">
                                    <p class="align">JAVASCRIPT
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 71%;">
                                    <p class="align">JQUERY
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 80%;">
                                    <p class="align">GIT-GITHUB
                                    </p>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="progress_bar">
                                <span style="width: 88%;">
                                    <p class="align">DATA ANALYSIS WITH EXCEL
                                    </p>
                                </span>
                            </div>
                        </li>
                    </ul>              
                </div>
            </div>
            
            <!--right column starts-->
            <div class="right_col">
                <div class="right_col_1">
                    <p class="header header4">PROFILE
                    </p>
                    <p class="profile profile1">Being a computer science student involves identifying a      problem and coming up with a technological solution to address it. I love to try to catch the ability to solve complex problems in a logical way. Since coming up with a solution of a problem is never a straightforward process, out of the box thinking is often required in order to ensure delivering the most innovative and effective solutions.
                    </p>
                    <p class="profile profile2"> My Interest in Web development is what keeps my passion alive in my study of Computer Science and Engineering.
                    </p>
                </div>
                <div class="right_col_2">
                    <p class="header header5">EDUCATION
                    </p>
                    <div class="right_col_left1">
                        <p class="header header6">University
                        </p>
                        <p class="header below">2016 - PRESENT
                        </p>
                        <p class="header header6" style="top: 110px;">College
                        </p>
                        <p class="header below" style="top: 130px;">2013 - 2014
                        </p>
                        <p class="header header6" style="top: 202px;">School
                        </p>
                        <p class="header below" style="top: 220px;">2011 - 2012
                        </p>
                    </div>
                    <div class="right_col_right1">
                        <p class="side" >North South University
                            <br>
                            Computer Science and Engineering
                            <br>
                            Dhaka, Bangladesh
                        </p>
                        <p class="side" style="top: 106px;">
                            Noapara Degree College
                            <br>
                            Subject: Science
                            <br>
                            Abhoynagar, Jashore
                        </p>
                        <p class="side" style="top: 198px;">
                            Little Jewel’s School
                            <br>
                            Subject: Science
                            <br>
                            Abhoynagar, Jashore
                        </p>
                    </div>
                </div>
                <div class="right_col_3">
                    <p class="header header5">CO-CURRICULAR
                    </p>
                    <div class="right_col_left2">
                        <p class="header header6">2008
                        </p>
                        <p class="header header6" style="top: 50px;">2009
                        </p>
                        <p class="header header6" style="top: 80px;">2010
                        </p>
                        <p class="header header6" style="top: 110px;">2017
                        </p>
                        <p class="header header6" style="top: 140px;">2018
                        </p>
                    </div>
                    <div class="right_col_right2">
                        <p class="side">First prize in Inter School Oil Painting Competition
                        </p>
                        <p class="side" style="top: 50px;">Intra School, Jewel of The Year Award
                        </p>      
                        <p class="side" style="top: 80px;">Inter School Under 14 Badminton Champion
                        </p>
                        <p class="side" style="top: 110px;">Team Leader of Sputnik-1 (Mars Rover Summit)
                        </p>         
                        <p class="side" style="top: 140px; padding-right: 30px;">Bot Controller of Team AUX-Alpha<br>
                            Robo Fight: Bit-Arena & Cybernauts
                        </p>
                    </div>
                </div>
                <div class="right_col_4">
                    <p class="header header5">RECENT
                    </p>
                    <div class="recent">
                        <p class="side">Certified in Introduction to Data Analysis Using Excel
                        </p>
                        <p class="side" style="top: 50px;">Rice University
                        </p>
                        <p class="side" style="top: 50px; left: 260px;">Credential ID G5HCEHP2DQYN
                        </p>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    </html>