<?php 
    require 'includes/server.php';
    require 'includes/handlers/signup-handler.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Minisize </title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="assets/styles/main.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <style>

        #bg {
            position: fixed;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background-color: #F7E6CA; 
        }

        .carousel-item {
            height: 430px;
        }

        .carousel-indicators {
            bottom: -50px;
        }

        .carousel .carousel-indicators li {
            width: 10px;
            height: 10px;
            border-radius: 100%;
        }

        .carousel-control-prev,
        .carousel-control-next{
            display: flex;
            align-items: end;
            width:50px;
        }
    </style>

</head>

<body>
    
    <div id="bg"></div>

    <header class="d-flex flex-wrap align-items-center justify-content-between p-3">
        <div class="d-flex align-items-center">
            <img src="assets/images/website/logo/logo-placeholder.png" alt="Minisize Logo" width="50">
            <h4 class="mx-2">Minisize</h4>
        </div>
    </header>

    <section class="mx-5 my-3" style="width:50%;">
        <div id="carousel" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel"
            data-bs-interval="false">

            <form action="registration.php" method="POST" class="sign-up-form">
                <div class="carousel-inner w-100">
                    <div class="carousel-item active">

                        <h1>Let’s learn more about your skin!</h1>

                        <div class="first-question">
                            <h5>Does your skin near the nose and eyebrows feel oily?</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_oil"
                                    id="surveyQueryOilYes" value="Yes">
                                <label class="form-check-label" for="surveyQueryOilYes">
                                    Yes, it feels oily.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_oil"
                                    id="surveyQueryOilNo" value="No" checked>
                                <label class="form-check-label" for="surveyQueryOilNo">
                                    No, it doesn’t feel oily.
                                </label>
                            </div>
                        </div>

                        <div class="second-question">
                            <h5>Do you feel dryness or flakiness on your cheeks?</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_dry"
                                    id="surveyQueryDryYes" value="Yes">
                                <label class="form-check-label" for="surveyQueryDryYes">
                                    Yes, it feels dry and/or flaky.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_dry"
                                    id="surveyQueryDryNo" value="No" checked>
                                <label class="form-check-label" for="surveyQueryDryNo">
                                    No, it doesn’t feel dry and/or flaky.
                                </label>
                            </div>
                        </div>

                        <div class="third-question">
                            <h5>Does your skin develop red spots when rubbed, or do you have many allergies?</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_sensitive"
                                    id="surveyQuerySensitiveYes" value="Yes">
                                <label class="form-check-label" for="surveyQuerySensitiveYes">
                                    Yes, my skin reacts sensitively.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_sensitive"
                                    id="surveyQuerySensitiveNo" value="No" checked>
                                <label class="form-check-label" for="surveyQuerySensitiveNo">
                                    No, it doesn’t develop bad reactions.
                                </label>
                            </div>
                        </div>

                        <button class="carousel-control-next" type="button" data-bs-target="#carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="carousel-item">
                        <h1>Let’s learn more about your skin!</h1>

                        <div class="fourth-question">
                            <h5>Which of the following are you <strong>most</strong> concerned about in your skin?</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_concern"
                                    id="concernHydration" value="Hydration">
                                <label class="form-check-label" for="concernHydration">
                                    Hydration
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_concern"
                                    id="concernPoreSolutions" value="Pore Solutions" checked>
                                <label class="form-check-label" for="concernPoreSolutions">
                                    Pore Solutions
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_concern"
                                    id="concernTroubledSkin" value="Troubled Skin">
                                <label class="form-check-label" for="concernTroubledSkin">
                                    Troubled Skin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_concern"
                                    id="concernDullnessUneven" value="Dullness & Uneven Skin Tone">
                                <label class="form-check-label" for="concernDullnessUneven">
                                    Dullness & Uneven Skin Tone
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_concern"
                                    id="concernSensitive" value="Sensitive Skin">
                                <label class="form-check-label" for="concernSensitive">
                                    Sensitive Skin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_concern"
                                    id="concernAgePrevention" value="Age Prevention">
                                <label class="form-check-label" for="concernAgePrevention">
                                    Age Prevention
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="survey_query_concern"
                                    id="concernLiftFirm" value="Lifting & Firming">
                                <label class="form-check-label" for="concernLiftFirm">
                                    Lifting & Firming
                                </label>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="carousel-item">
                        <h3>Lastly, set up your account and start your skincare journey here with Minisize!</h3>

                        <section class="px-1">
                            <div class="row mb-1">
                                <div class="col">
                                    <label for="signUpFname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="sign_up_fname" id="signUpFname"
                                        placeholder="First Name" required>
                                </div>

                                <div class="col">
                                    <label for="signUpLname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="sign_up_lname" id="signUpLname"
                                        placeholder="Last Name" required>
                                </div>
                            </div>

                            <label for="signUpEmail" class="form-label">Email</label>
                            <input type="email" class="form-control mb-1" name="sign_up_email" id="signUpEmail"
                                placeholder="Email" required>

                            <label for="signUpPass" class="form-label">Password</label>
                            <input type="password" class="form-control mb-1" name="sign_up_pass" id="signUpPass"
                                placeholder="Password" required>

                            <label for="signUpCPass" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control mb-4" name="sign_up_cpass" id="signUpCPass"
                                placeholder="Password" required>

                            <input type="submit" class="btn btn-primary form-control" name="sign_up_btn" value="Create an account">
                        </section>
                    </div>

                </div>
            </form>

            <ol class="carousel-indicators">
                <li data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></li>
                <li data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></li>
                <li data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></li>
            </ol>

        </div>
    </section>


</body>

</html>