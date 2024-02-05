<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss | Online Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
    .main {
        /* background-image: url(image/background.jpg);
        background-repeat: no-repeat;
        background-size: cover; */
        /* filter: blur(2px);
            -webkit-filter: blur(2px); */
    }

    .img_profile {
        border-radius: 50%;
        height: 60px;
        width: 60px;
    }
    </style>
</head>

<body>

    <?php include 'utils/_dbconn.php' ?>
    <?php include 'utils/_header.php' ?>
    <div style="min-height :100vh;" class="maiin container-fluid mh-2 m-0 p-0">

        <div class="container py-3 ">
            <div class="card mb-3 p-5" style="min-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://source.unsplash.com/500x400/?person,man" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">WHO WE ARE...</h5>
                            <p class="card-text">"We're an independently owned, strategic creative agency- forever
                                curious and
                                ready to transform the way business is done.Our team of 8000+ professionals includes the
                                world’s leading public health experts, including doctors, epidemiologists, scientists
                                and managers. Together, we coordinate the world’s response to health emergencies,
                                promote well-being, prevent disease and expand access to health care. By connecting
                                nations, people and partners to scientific evidence they can rely on, we strive to give
                                everyone an equal chance at a safe and healthy life."</p>
                            <p class="card-text"><small class="text-body-secondary">Recently updated</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card mb-3">
                <img src="https://source.unsplash.com/1200x1000/?programming,languages" class="card-img-top img-fluid"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title">All Coding Cources <span class="text text-success fw-bold">Available</span>
                    </h5>
                    <p class="card-text">Training and development involve improving the effectiveness of organizations
                        and the individuals and teams within them.[1] Training may be viewed as related to immediate
                        changes in organizational effectiveness via organized instruction, while development is related
                        to the progress of longer-term organizational and employee goals. While training and development
                        technically have differing definitions, the two are oftentimes used interchangeably and/or
                        together. Training and development have historically been topics within adult education and
                        applied psychology but have within the last two decades become closely associated with human
                        resources management, talent management, human resources development, instructional design,
                        human factors, and knowledge management.[1]</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

        <div class="container my-3">
            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><span><img class="img_profile" src="image/profile.jpg"
                                        alt="Ayush Varma"></span><strong class="mx-4">Ayush
                                    Varma</strong>
                            </h5>
                            <p class="card-text">I am an expert on the ground of <STRONG>WEB-DEVELOPER</STRONG> and can
                                do many things
                                related to the job. I am quite adept in coding and markup languages and in creating
                                applications using client server model including
                            </p>
                            <a href="#" class="btn btn-outline-info"><span class="mx-2 text ">CEO OF
                                    'iDiscuss'</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><span><img class="img_profile" src="image/piyush profile.jpg"
                                        alt="Ayush Varma"></span><strong class="mx-4">Piyush
                                    Varma</strong>
                            </h5>
                            <p class="card-text">I am an expert on the ground of <STRONG>APP-DEVELOPER</STRONG> and can
                                do many things
                                related to the job. I am quite adept in coding and markup languages and in creating
                                applications using client server model including
                            </p>
                            <a href="#" class="btn btn-outline-info"><span class="mx-2 text ">Know More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include 'utils/_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>