<?php
function initializeAnalytics()
{

  // Use the developers console and download your service account
  // credentials in JSON format. Place them in this directory or
  // change the key file location if necessary.
  $KEY_FILE_LOCATION = __DIR__ . '/credentials.json';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("Hello Analytics Reporting");
  $client->setAuthConfig($KEY_FILE_LOCATION);
  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
  $analytics = new Google_Service_AnalyticsReporting($client);

  return $analytics;
}


/**
 * Queries the Analytics Reporting API V4.
 *
 * @param service An authorized Analytics Reporting API V4 service object.
 * @return The Analytics Reporting API V4 response.
 */
function getReport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "YourID";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
 $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.
  $sessions = new Google_Service_AnalyticsReporting_Metric();
  $sessions->setExpression("ga:sessions");
  $sessions->setAlias("sessions");

    $pageviews = new Google_Service_AnalyticsReporting_Metric();
  $pageviews->setExpression("ga:pageviews");
  $pageviews->setAlias("pageviews");

  $bounces =new Google_Service_AnalyticsReporting_Metric();
  $bounces->setExpression("ga:bounces");
  $bounces->setAlias("bounces");

//Create the Dimensions object.
$browser = new Google_Service_AnalyticsReporting_Dimension();
$browser->setName("ga:browser");

  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($browser));
  $request->setMetrics(array($sessions, $pageviews,$bounces));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}


function getUserReport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.
  $users = new Google_Service_AnalyticsReporting_Metric();
  $users->setExpression("ga:users");
  $users->setAlias("users");

    $newusers = new Google_Service_AnalyticsReporting_Metric();
  $newusers->setExpression("ga:newUsers");
  $newusers->setAlias("newusers");

  $newsessions =new Google_Service_AnalyticsReporting_Metric();
  $newsessions->setExpression("ga:percentNewSessions");
  $newsessions->setAlias("newsessions");


//Create the Dimensions object.
$usertype = new Google_Service_AnalyticsReporting_Dimension();
$usertype->setName("ga:userType");

  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($usertype));
  $request->setMetrics(array($users,$newusers,$newsessions));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}

function getsessionReport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  $sessions =new Google_Service_AnalyticsReporting_Metric();
  $sessions->setExpression("ga:sessions");
  $sessions->setAlias("sessions");

 $bounces =new Google_Service_AnalyticsReporting_Metric();
  $bounces->setExpression("ga:bounces");
  $bounces->setAlias("bounces");

 $bounceRate =new Google_Service_AnalyticsReporting_Metric();
  $bounceRate->setExpression("ga:bounceRate");
  $bounceRate->setAlias("bounceRate");

 $sessionDuration =new Google_Service_AnalyticsReporting_Metric();
  $sessionDuration->setExpression("ga:sessionDuration");
  $sessionDuration->setAlias("sessionDuration");

$avgSessionDuration =new Google_Service_AnalyticsReporting_Metric();
  $avgSessionDuration->setExpression("ga:avgSessionDuration");
  $avgSessionDuration->setAlias("avgSessionDuration");

$hits =new Google_Service_AnalyticsReporting_Metric();
  $hits->setExpression("ga:hits");
  $hits->setAlias("hits");



//Create the Dimensions object.
$sessionDurationBucket = new Google_Service_AnalyticsReporting_Dimension();
$sessionDurationBucket->setName("ga:sessionDurationBucket");

  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($sessionDurationBucket));
  $request->setMetrics(array($sessions,$bounces,$bounceRate,$sessionDuration,$avgSessionDuration,$hits));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}

function gettrafficsources($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  $organicSearches =new Google_Service_AnalyticsReporting_Metric();
  $organicSearches->setExpression("ga:organicSearches");
  $organicSearches->setAlias("organicSearches");



//Create the Dimensions object.
$referralPath = new Google_Service_AnalyticsReporting_Dimension();
$referralPath->setName("ga:referralPath");

$source = new Google_Service_AnalyticsReporting_Dimension();
$source->setName("ga:source");

$medium = new Google_Service_AnalyticsReporting_Dimension();
$medium->setName("ga:medium");

$sourceMedium = new Google_Service_AnalyticsReporting_Dimension();
$sourceMedium->setName("ga:sourceMedium");

$keyword = new Google_Service_AnalyticsReporting_Dimension();
$keyword->setName("ga:keyword");

$adContent = new Google_Service_AnalyticsReporting_Dimension();
$adContent->setName("ga:adContent");

$socialNetwork = new Google_Service_AnalyticsReporting_Dimension();
$socialNetwork->setName("ga:socialNetwork");

$hasSocialSourceReferral = new Google_Service_AnalyticsReporting_Dimension();
$hasSocialSourceReferral->setName("ga:hasSocialSourceReferral");



  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($referralPath,$source,$medium,$sourceMedium,$keyword,$adContent,$socialNetwork,$hasSocialSourceReferral));
  $request->setMetrics(array($organicSearches));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}



function getplatformreport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  // $organicSearches =new Google_Service_AnalyticsReporting_Metric();
  // $organicSearches->setExpression("ga:organicSearches");
  // $organicSearches->setAlias("organicSearches");



//Create the Dimensions object.
$browser = new Google_Service_AnalyticsReporting_Dimension();
$browser->setName("ga:browser");

$browserVersion = new Google_Service_AnalyticsReporting_Dimension();
$browserVersion->setName("ga:browserVersion");

$operatingSystem = new Google_Service_AnalyticsReporting_Dimension();
$operatingSystem->setName("ga:operatingSystem");

$operatingSystemVersion = new Google_Service_AnalyticsReporting_Dimension();
$operatingSystemVersion->setName("ga:operatingSystemVersion");

$mobileDeviceBranding = new Google_Service_AnalyticsReporting_Dimension();
$mobileDeviceBranding->setName("ga:mobileDeviceBranding");

$mobileDeviceModel = new Google_Service_AnalyticsReporting_Dimension();
$mobileDeviceModel->setName("ga:mobileDeviceModel");


$mobileDeviceInfo = new Google_Service_AnalyticsReporting_Dimension();
$mobileDeviceInfo->setName("ga:mobileDeviceInfo");


$deviceCategory = new Google_Service_AnalyticsReporting_Dimension();
$deviceCategory->setName("ga:deviceCategory");


$dataSource = new Google_Service_AnalyticsReporting_Dimension();
$dataSource->setName("ga:dataSource");


  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($browser,$browserVersion,$operatingSystem,$operatingSystemVersion,$mobileDeviceBranding,$mobileDeviceModel,$mobileDeviceInfo,$deviceCategory,$dataSource));
 // $request->setMetrics(array($organicSearches));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}


function getgeonetworkreport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  // $organicSearches =new Google_Service_AnalyticsReporting_Metric();
  // $organicSearches->setExpression("ga:organicSearches");
  // $organicSearches->setAlias("organicSearches");



//Create the Dimensions object.
$continent = new Google_Service_AnalyticsReporting_Dimension();
$continent->setName("ga:continent");

$subContinent = new Google_Service_AnalyticsReporting_Dimension();
$subContinent->setName("ga:subContinent");

$country = new Google_Service_AnalyticsReporting_Dimension();
$country->setName("ga:country");

$region = new Google_Service_AnalyticsReporting_Dimension();
$region->setName("ga:region");

$metro = new Google_Service_AnalyticsReporting_Dimension();
$metro->setName("ga:metro");

$city = new Google_Service_AnalyticsReporting_Dimension();
$city->setName("ga:city");

$networkDomain = new Google_Service_AnalyticsReporting_Dimension();
$networkDomain->setName("ga:networkDomain");

$networkLocation = new Google_Service_AnalyticsReporting_Dimension();
$networkLocation->setName("ga:networkLocation");




  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($continent,$subContinent,$country,$region,$metro,$city,$networkDomain,$networkLocation));
 // $request->setMetrics(array($organicSearches));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}


function getsocialreport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  // $organicSearches =new Google_Service_AnalyticsReporting_Metric();
  // $organicSearches->setExpression("ga:organicSearches");
  // $organicSearches->setAlias("organicSearches");



//Create the Dimensions object.
$socialActivityContentUrl = new Google_Service_AnalyticsReporting_Dimension();
$socialActivityContentUrl->setName("ga:socialActivityContentUrl");




  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($socialActivityContentUrl));
 // $request->setMetrics(array($organicSearches));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}


function getpagetrackingReport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  $pageValue =new Google_Service_AnalyticsReporting_Metric();
  $pageValue->setExpression("ga:pageValue");
  $pageValue->setAlias("pageValue");

 $entrances =new Google_Service_AnalyticsReporting_Metric();
  $entrances->setExpression("ga:entrances");
  $entrances->setAlias("entrances");

 $entranceRate =new Google_Service_AnalyticsReporting_Metric();
  $entranceRate->setExpression("ga:entranceRate");
  $entranceRate->setAlias("entranceRate");

 $pageviews =new Google_Service_AnalyticsReporting_Metric();
  $pageviews->setExpression("ga:pageviews");
  $pageviews->setAlias("pageviews");

$pageviewsPerSession =new Google_Service_AnalyticsReporting_Metric();
  $pageviewsPerSession->setExpression("ga:pageviewsPerSession");
  $pageviewsPerSession->setAlias("avgSessionDuration");

$uniquePageviews =new Google_Service_AnalyticsReporting_Metric();
  $uniquePageviews->setExpression("ga:uniquePageviews");
  $uniquePageviews->setAlias("uniquePageviews");

$timeOnPage =new Google_Service_AnalyticsReporting_Metric();
  $timeOnPage->setExpression("ga:timeOnPage");
  $timeOnPage->setAlias("timeOnPage");

  $avgTimeOnPage =new Google_Service_AnalyticsReporting_Metric();
  $avgTimeOnPage->setExpression("ga:avgTimeOnPage");
  $avgTimeOnPage->setAlias("avgTimeOnPage");

  $exits =new Google_Service_AnalyticsReporting_Metric();
  $exits->setExpression("ga:exits");
  $exits->setAlias("exits");

  $exitRate =new Google_Service_AnalyticsReporting_Metric();
  $exitRate->setExpression("ga:exitRate");
  $exitRate->setAlias("exitRate");

//Create the Dimensions object.
$hostname = new Google_Service_AnalyticsReporting_Dimension();
$hostname->setName("ga:hostname");

$pagePath = new Google_Service_AnalyticsReporting_Dimension();
$pagePath->setName("ga:pagePath");

  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($hostname,$pagePath));
  $request->setMetrics(array($pageValue,$entrances,$entranceRate,$pageviews,$pageviewsPerSession,$uniquePageviews,$timeOnPage,$avgTimeOnPage,$exits,$exitRate));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}


function getinternalsearchReport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  $searchResultViews =new Google_Service_AnalyticsReporting_Metric();
  $searchResultViews->setExpression("ga:searchResultViews");
  $searchResultViews->setAlias("searchResultViews");

 $searchUniques =new Google_Service_AnalyticsReporting_Metric();
  $searchUniques->setExpression("ga:searchUniques");
  $searchUniques->setAlias("searchUniques");

 $avgSearchResultViews =new Google_Service_AnalyticsReporting_Metric();
  $avgSearchResultViews->setExpression("ga:avgSearchResultViews");
  $avgSearchResultViews->setAlias("avgSearchResultViews");

 $searchSessions =new Google_Service_AnalyticsReporting_Metric();
  $searchSessions->setExpression("ga:searchSessions");
  $searchSessions->setAlias("searchSessions");

$percentSessionsWithSearch =new Google_Service_AnalyticsReporting_Metric();
  $percentSessionsWithSearch->setExpression("ga:percentSessionsWithSearch");
  $percentSessionsWithSearch->setAlias("percentSessionsWithSearch");

$searchDuration =new Google_Service_AnalyticsReporting_Metric();
  $searchDuration->setExpression("ga:searchDuration");
  $searchDuration->setAlias("searchDuration");

$avgSearchDuration =new Google_Service_AnalyticsReporting_Metric();
  $avgSearchDuration->setExpression("ga:avgSearchDuration");
  $avgSearchDuration->setAlias("avgSearchDuration");

  $searchExits =new Google_Service_AnalyticsReporting_Metric();
  $searchExits->setExpression("ga:searchExits");
  $searchExits->setAlias("searchExits");

  $searchExitRate =new Google_Service_AnalyticsReporting_Metric();
  $searchExitRate->setExpression("ga:searchExitRate");
  $searchExitRate->setAlias("searchExitRate");

  $goalValueAllPerSearch =new Google_Service_AnalyticsReporting_Metric();
  $goalValueAllPerSearch->setExpression("ga:goalValueAllPerSearch");
  $goalValueAllPerSearch->setAlias("goalValueAllPerSearch");

//Create the Dimensions object.
$searchUsed = new Google_Service_AnalyticsReporting_Dimension();
$searchUsed->setName("ga:searchUsed");
$searchKeyword = new Google_Service_AnalyticsReporting_Dimension();
$searchKeyword->setName("ga:searchKeyword");
$searchKeywordRefinement = new Google_Service_AnalyticsReporting_Dimension();
$searchKeywordRefinement->setName("ga:searchKeywordRefinement");
$searchCategory = new Google_Service_AnalyticsReporting_Dimension();
$searchCategory->setName("ga:searchCategory");
$searchStartPage = new Google_Service_AnalyticsReporting_Dimension();
$searchStartPage->setName("ga:searchStartPage");
$searchDestinationPage = new Google_Service_AnalyticsReporting_Dimension();
$searchDestinationPage->setName("ga:searchDestinationPage");
$searchAfterDestinationPage = new Google_Service_AnalyticsReporting_Dimension();
$searchAfterDestinationPage->setName("ga:searchAfterDestinationPage");

  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($searchUsed,$searchKeyword,$searchKeywordRefinement,$searchCategory,$searchStartPage,$searchDestinationPage,$searchAfterDestinationPage));
  $request->setMetrics(array($searchResultViews,$searchUniques,$avgSearchResultViews,$searchSessions,$percentSessionsWithSearch,$searchDuration,$avgSearchDuration,$searchExits,$searchExitRate,$goalValueAllPerSearch));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}

function getinternalsearchReport1($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  $searchResultViews =new Google_Service_AnalyticsReporting_Metric();
  $searchResultViews->setExpression("ga:searchResultViews");
  $searchResultViews->setAlias("searchResultViews");

 $searchUniques =new Google_Service_AnalyticsReporting_Metric();
  $searchUniques->setExpression("ga:searchUniques");
  $searchUniques->setAlias("searchUniques");

 $avgSearchResultViews =new Google_Service_AnalyticsReporting_Metric();
  $avgSearchResultViews->setExpression("ga:avgSearchResultViews");
  $avgSearchResultViews->setAlias("avgSearchResultViews");

 $searchSessions =new Google_Service_AnalyticsReporting_Metric();
  $searchSessions->setExpression("ga:searchSessions");
  $searchSessions->setAlias("searchSessions");

$percentSessionsWithSearch =new Google_Service_AnalyticsReporting_Metric();
  $percentSessionsWithSearch->setExpression("ga:percentSessionsWithSearch");
  $percentSessionsWithSearch->setAlias("percentSessionsWithSearch");

$searchDuration =new Google_Service_AnalyticsReporting_Metric();
  $searchDuration->setExpression("ga:searchDuration");
  $searchDuration->setAlias("searchDuration");

$avgSearchDuration =new Google_Service_AnalyticsReporting_Metric();
  $avgSearchDuration->setExpression("ga:avgSearchDuration");
  $avgSearchDuration->setAlias("avgSearchDuration");

  $searchExits =new Google_Service_AnalyticsReporting_Metric();
  $searchExits->setExpression("ga:searchExits");
  $searchExits->setAlias("searchExits");

  $searchExitRate =new Google_Service_AnalyticsReporting_Metric();
  $searchExitRate->setExpression("ga:searchExitRate");
  $searchExitRate->setAlias("searchExitRate");

  $goalValueAllPerSearch =new Google_Service_AnalyticsReporting_Metric();
  $goalValueAllPerSearch->setExpression("ga:goalValueAllPerSearch");
  $goalValueAllPerSearch->setAlias("goalValueAllPerSearch");

//Create the Dimensions object.
$searchKeyword = new Google_Service_AnalyticsReporting_Dimension();
$searchKeyword->setName("ga:searchKeyword");

  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($searchKeyword));
  $request->setMetrics(array($searchResultViews,$searchUniques,$avgSearchResultViews,$searchSessions,$percentSessionsWithSearch,$searchDuration,$avgSearchDuration,$searchExits,$searchExitRate,$goalValueAllPerSearch));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}



function getspeedReport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  $avgPageLoadTime =new Google_Service_AnalyticsReporting_Metric();
  $avgPageLoadTime->setExpression("ga:avgPageLoadTime");
  $avgPageLoadTime->setAlias("avgPageLoadTime");

  $avgDomainLookupTime =new Google_Service_AnalyticsReporting_Metric();
  $avgDomainLookupTime->setExpression("ga:avgDomainLookupTime");
  $avgDomainLookupTime->setAlias("avgDomainLookupTime");

  $avgPageDownloadTime =new Google_Service_AnalyticsReporting_Metric();
  $avgPageDownloadTime->setExpression("ga:avgPageDownloadTime");
  $avgPageDownloadTime->setAlias("avgPageDownloadTime");

  $avgRedirectionTime =new Google_Service_AnalyticsReporting_Metric();
  $avgRedirectionTime->setExpression("ga:avgRedirectionTime");
  $avgRedirectionTime->setAlias("avgRedirectionTime");

  $avgServerConnectionTime =new Google_Service_AnalyticsReporting_Metric();
  $avgServerConnectionTime->setExpression("ga:avgServerConnectionTime");
  $avgServerConnectionTime->setAlias("avgServerConnectionTime");

  $avgServerResponseTime =new Google_Service_AnalyticsReporting_Metric();
  $avgServerResponseTime->setExpression("ga:avgServerResponseTime");
  $avgServerResponseTime->setAlias("avgServerResponseTime");

 $avgDomInteractiveTime =new Google_Service_AnalyticsReporting_Metric();
 $avgDomInteractiveTime->setExpression("ga:avgDomInteractiveTime");
 $avgDomInteractiveTime->setAlias("avgDomInteractiveTime");


 $avgDomContentLoadedTime =new Google_Service_AnalyticsReporting_Metric();
 $avgDomContentLoadedTime->setExpression("ga:avgDomContentLoadedTime");
 $avgDomContentLoadedTime->setAlias("avgDomContentLoadedTime");


  $pageLoadTime =new Google_Service_AnalyticsReporting_Metric();
 $pageLoadTime->setExpression("ga:pageLoadTime");
 $pageLoadTime->setAlias("pageLoadTime");

//Create the Dimensions object.

  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  // $request->setDimensions(array($avgPageLoadTime,$avgDomainLookupTime,$avgPageDownloadTime,$avgRedirectionTime,$avgServerConnectionTime,$avgServerResponseTime,$avgDomInteractiveTime,$avgDomContentLoadedTime,$pageLoadTime));
 $request->setMetrics(array($avgPageLoadTime,$avgDomainLookupTime,$avgPageDownloadTime,$avgRedirectionTime,$avgServerConnectionTime,$avgServerResponseTime,$avgDomInteractiveTime,$avgDomContentLoadedTime,$pageLoadTime));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}

function getsocialinteractionReport($analytics) {

  // Replace with your view ID, for example XXXX.
  $VIEW_ID = "207950363";

  // Create the DateRange object.
  $dateRange = new Google_Service_AnalyticsReporting_DateRange();
   $dateRange->setStartDate("2019-07-01");
  $dateRange->setEndDate("today");

  // Create the Metrics object.

  $socialInteractions =new Google_Service_AnalyticsReporting_Metric();
  $socialInteractions->setExpression("ga:socialInteractions");
  $socialInteractions->setAlias("socialInteractions");

  $uniqueSocialInteractions =new Google_Service_AnalyticsReporting_Metric();
  $uniqueSocialInteractions->setExpression("ga:uniqueSocialInteractions");
  $uniqueSocialInteractions->setAlias("uniqueSocialInteractions");

  $socialInteractionsPerSession =new Google_Service_AnalyticsReporting_Metric();
  $socialInteractionsPerSession->setExpression("ga:socialInteractionsPerSession");
  $socialInteractionsPerSession->setAlias("socialInteractionsPerSession");

//Create the Dimensions object.

$socialInteractionNetwork = new Google_Service_AnalyticsReporting_Dimension();
$socialInteractionNetwork->setName("ga:socialInteractionNetwork");

$socialInteractionAction = new Google_Service_AnalyticsReporting_Dimension();
$socialInteractionAction->setName("ga:socialInteractionAction");

$socialInteractionNetworkAction = new Google_Service_AnalyticsReporting_Dimension();
$socialInteractionNetworkAction->setName("ga:socialInteractionNetworkAction");

$socialInteractionTarget = new Google_Service_AnalyticsReporting_Dimension();
$socialInteractionTarget->setName("ga:socialInteractionTarget");

$socialEngagementType = new Google_Service_AnalyticsReporting_Dimension();
$socialEngagementType->setName("ga:socialEngagementType");

  // Create the ReportRequest object.
  $request = new Google_Service_AnalyticsReporting_ReportRequest();
  $request->setViewId($VIEW_ID);
  $request->setDateRanges($dateRange);
  $request->setDimensions(array($socialInteractionNetwork,$socialInteractionAction,$socialInteractionNetworkAction,$socialInteractionTarget,$socialEngagementType));
 $request->setMetrics(array($socialInteractions,$uniqueSocialInteractions,$socialInteractionsPerSession));

  $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
  $body->setReportRequests( array( $request) );
  return $analytics->reports->batchGet( $body );
}


/**
 * Parses and prints the Analytics Reporting API V4 response.
 *
 * @param An Analytics Reporting API V4 response.
 */
function printResults($reports) {
  for ( $reportIndex = 0; $reportIndex < count( $reports ); $reportIndex++ ) {
    $report = $reports[ $reportIndex ];
    $header = $report->getColumnHeader();
    $dimensionHeaders = $header->getDimensions();
    $metricHeaders = $header->getMetricHeader()->getMetricHeaderEntries();
    $rows = $report->getData()->getRows();

    for ( $rowIndex = 0; $rowIndex < count($rows); $rowIndex++) {
      $row = $rows[ $rowIndex ];
      $dimensions = $row->getDimensions();
      $metrics = $row->getMetrics();

      for ($i = 0; $i < count($dimensionHeaders) && $i < count($dimensions); $i++) {
        print($dimensionHeaders[$i] . ": " . $dimensions[$i] . "\n");
      }

      for ($j = 0; $j < count($metrics); $j++) {
        $values = $metrics[$j]->getValues();
        for ($k = 0; $k < count($values); $k++) {
          $entry = $metricHeaders[$k];
          print($entry->getName() . ": " . $values[$k] . "\n");
        }
      }
    }
  }
}


function fetchResults($reports) {
       $result=array(); 
      $f=0; 
  for ( $reportIndex = 0; $reportIndex < count( $reports ); $reportIndex++ ) {
    $report = $reports[ $reportIndex ];
    $header = $report->getColumnHeader();
    $dimensionHeaders = $header->getDimensions();
    $metricHeaders = $header->getMetricHeader()->getMetricHeaderEntries();
    $rows = $report->getData()->getRows();
   
    for ( $rowIndex = 0; $rowIndex < count($rows); $rowIndex++) {
      $row = $rows[ $rowIndex ];
      $dimensions = $row->getDimensions();
      $metrics = $row->getMetrics();    
      for ($i = 0; $i < count($dimensionHeaders) && $i < count($dimensions); $i++) {
        //print($dimensionHeaders[$i] . ": " . $dimensions[$i] . "\n");
        $result[$f][$dimensionHeaders[$i]]=$dimensions[$i];
      }

      for ($j = 0; $j < count($metrics); $j++) {
        $values = $metrics[$j]->getValues();
        for ($k = 0; $k < count($values); $k++) {
          $entry = $metricHeaders[$k];
          //print($entry->getName() . ": " . $values[$k] . "\n");
          $nam=$entry->getName();
       $result[$f][$nam]=$values[$k];

        }
      }
$f++;

    }
  }

  return $result;
}

?>
