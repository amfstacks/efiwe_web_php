<?php
$encodedData = '';


$page_title = ' My Mock Exam';
$questionCount = 0;
require_once __DIR__ . '/../templates/loggedInc.php';
if (isset($_SESSION['activeWeek'] )) {
    $encodedData = $_SESSION['activeWeek'] ;
    $activeInstruction = $_SESSION['activeInstruction'] ;
    $activeDuration = $_SESSION['activeDuration'] ;
    $activeTotalQuestions = $_SESSION['activeTotalQuestions'] ;
    $questionCount = $_SESSION['questionCount'] ;
//   exit;
}
if(empty($encodedData)){
    exit('an error occurred');
}

$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
$userData = isset($_SESSION['userData']) ? $_SESSION['userData'] : [];
$uid = isset($user['localId']) ? $user['localId'] : '';
$refreshToken = isset($user['refreshToken']) ? $user['refreshToken'] : '';
$accessToken = isset($user['idToken']) ? $user['idToken'] : '';


$profileData = [
    "mockWeek" => $encodedData,
    "uid" => $uid,
    "status" => 'started',
    "refreshtoken" => $refreshToken
];
$score = 0;
$showScore =true;

$apiResponse = api_request_post('processMockTaken', $profileData, 'POST', $accessToken,$refreshToken);
//var_dump($apiResponse);
//exit;
if($apiResponse['success']) {
    $score = $apiResponse['data'];
    $showScore =true;
}
else{
    $score = 0;
    $showScore =false;

}
$feedback ='';
if($questionCount <1){
    $questionCount = 180;
}
$formattedRatioPercentage = 0.0;
$originalScore = 0;
if($questionCount >0){
$ratio = $score / $questionCount;
    $originalScore = $score/10; //get no of questions gotten correctly since one score is 10 points
    $ratioPercentage = $ratio * 100;
    $formattedRatioPercentage = number_format($ratioPercentage, 2);

    $excellentFeedback = [
        'Excellent work! You have mastered the material, keep it up!',
        'Amazing! You have a strong understanding of the material!',
        'Top marks! Your effort really shows in this test!',
        'Fantastic! You are truly excelling, keep this momentum going!',
    ];

    $goodFeedback = [
        'Good job! You are doing well, but there are still some areas to improve.',
        'Well done! Solid understanding, just a bit more practice needed.',
        'Great effort! Focus on the areas where you are slightly weaker.',
        'Nice work! You’re almost there, a little more work will get you to the top.',
    ];

    $averageFeedback = [
        'Average performance. With more focus and study, you can improve significantly.',
        'You did okay. Spend some time revisiting the areas you missed.',
        'Not bad! However, there’s room for improvement. Keep practicing.',
        'Good attempt! With more study and effort, your performance will improve.',
    ];

    $needsImprovementFeedback = [
        'Needs improvement. Consider revising the material and focusing more on practice.',
        'Don’t be discouraged. More effort and practice will help you improve.',
        'You have a lot of potential. Keep studying and don’t give up!',
        'It’s time to refocus. With consistent effort, you can do much better.',
    ];

    if ($ratio >= 0.90) {
        $randomKey = array_rand($excellentFeedback); // Get random key for Excellent feedback
        $feedback = $excellentFeedback[$randomKey];
    } elseif ($ratio >= 0.70) {
        $randomKey = array_rand($goodFeedback); // Get random key for Good feedback
        $feedback = $goodFeedback[$randomKey];
    } elseif ($ratio >= 0.50) {
        $randomKey = array_rand($averageFeedback); // Get random key for Average feedback
        $feedback = $averageFeedback[$randomKey];
    } else {
        $randomKey = array_rand($needsImprovementFeedback); // Get random key for Needs Improvement feedback
        $feedback = $needsImprovementFeedback[$randomKey];
    }
}

if($showScore == false){
    $feedback = 'An error occurred';
}

?>

<div class="col-12 col-md-6 col-lg-6 mx-auto">
<div class="card">
    <div class="card-header">
        <h4></h4>
        <h1><span class="badge badge-secondary">JAMB MOCK TEST <?php echo $encodedData?> SCORE</span></h1>
    </div>
    <div class="card-body">
        <?php
        if($showScore){
        ?>
<h2><?php echo $formattedRatioPercentage . "%"?></h2>
            <hr>
<h4><?php echo "got ". $originalScore ." out of " . $questionCount?></h4>


        <div class="alert alert-info alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                <?php echo $feedback?>
            </div>
        </div>
        <?php

        }
        else{
        ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    <?php echo $feedback?>
                </div>
            </div>
            <?php

        }
        ?>
    </div>
    <div class="card-footer text-right">
        <a href="index" class="btn btn-primary">Go Home</a>
    </div>
</div>
</div>