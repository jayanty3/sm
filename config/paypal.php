<?php
/** set your paypal credential **/

$config['client_id'] = 'ARfwvjw3jbYWjbmA9_uiGhO3fCK6hU5Z27AExb1A1bz-IJZz1mxCK4MJ3qao0kNSQ_WezRUPnW2puqs1';
$config['secret'] = 'EBNCj3iHcPW2X8JPChaqdm7VvBp3SBonF9OPjK8XbHA_r_aMAoH90e3tLzhOm0ZHHlYKx4K3rOq1sptq';

/**
 * SDK configuration
 */
/**
 * Available option 'sandbox' or 'live'
 */
$config['settings'] = array(

    'mode' => 'sandbox',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 1000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => 'application/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
);