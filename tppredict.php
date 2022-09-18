<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/card.css">
    
</head>
<body>
<div class="maincontainer">
            <div class="back">
                <h2>Copywriting</h2>
                <p>Introduction to Copywriting’ workshop focuses on the theory and processes of professional copywriting as applied to persuasion, reasoning, and rhetoric. This workshop is best-suited to learning how to write and think about consumer-driven functions.</p>
            </div>
            <div class="front">
                <div class="image">
                <img id="myPicture0" src="https://i.postimg.cc/nhG8H3X6/copywriting.jpg">
                <h2>Copywriting</h2>
                </div>
            </div>
        </div>
        <div class="maincontainer">
            <div class="back">
                <h2>Content Marketing</h2>
                <p>Introduction to Content Marketing workshop focuses on building content frameworks that are designed for and directed at communication engagement. This interdisciplinary workshop is best-suited to learning visual and written communication strategies.</p>
            </div>
            <div class="front">
                <div class="image">
                <img id="myPicture1" src="https://i.postimg.cc/ydrv1ZXq/contentmarketing.jpg">
                <h2>Content Marketing</h2>
                </div>
            </div>
        </div>
        <div class="maincontainer">
            <div class="back">
                <h2>Web Writing</h2>
                <p>Introduction to Web-Writing workshop focuses on building creative and systemic digital content through online user experiences that benefit people and robots. This workshop is best-suited to creating content for digital platforms and devices — websites, mobile, game consoles, and virtual reality engines.</p>
            </div>
            <div class="front">
                <div class="image">
                <img id="myPicture2" src="https://i.postimg.cc/ZqbG0630/webwriting.jpg">
                <h2>Web Writing</h2>
                </div>
            </div>
        </div> 

    <!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

        <script type="text/javascript">
        window.onload = choosepic;
        var mypix = new Array("book5.png","book1.jpg","book3.jpg");
        var ids=$('[id^=myPicture]');
        // console.log(ids);
        
        function choosepic(){
            var randomnum= Math.floor(Math.random()*ids.length);
            console.log(randomnum);
            var i=0;
            for(i=0;i<ids.length;i++){
                console.log(ids[i].src);
                ids[i].src=mypix[(randomnum+i)%ids.length];
                console.log((randomnum+i)%ids.length)
            }
            
            // console.log(ids.length);
        }
    </script>
</body>
</html>