Download the vendor directory and include in the file
Call the functions like this:-

include("AnalyticsFunc.php");
// Load the Google API PHP Client Library.
require_once __DIR__ . '/vendor/autoload.php';

$analytics = initializeAnalytics();
$response = getReport($analytics);
printResults($response);


