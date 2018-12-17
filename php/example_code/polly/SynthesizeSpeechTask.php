<?php
/**
 * Copyright 2010-2018 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * This file is licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License. A copy of
 * the License is located at
 *
 * http://aws.amazon.com/apache2.0/
 *
 * This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 *
 *
 *
 *
 */

require 'vendor/autoload.php';

use Aws\Polly\PollyClient;
use Aws\Exception\AwsException;

/**
 * This code expects that you have AWS credentials set up per:
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html
 */

//Create a PollyClient
$client = new Aws\Polly\PollyClient([
    'profile' => 'default',
    'version' => '2016-06-10',
    'region' => 'us-east-2'
]);

$text = 'This is a sample text to be synthesized.';
$format = 'mp3'; //json|mp3|ogg_vorbis|pcm
$S3Bucket = 'bucketName';
$voice = 'Joanna';

try {
    $result = $client->startSpeechSynthesisTask([
        'Text' => $text,
        'OutputFormat' => $format,
        'OutputS3BucketName' => $S3Bucket,
        'VoiceId' => $voice,
    ]);
    $taskId = $result['SynthesisTask']['TaskId'];
    print('<p>Task started: ' . $taskId . '</p>');
    var_dump($result);
} catch (AwsException $e) {
    // output error message if fails
    echo $e->getMessage();
    echo "\n";
}
//snippet-comment:[These are tags for the AWS doc team's sample catalog. Do not remove.]
//snippet-sourcedescription:[SynthesizeSpeechTask.php demonstrates how to synthesize a speech and send it to the specified S3 bucket.]
//snippet-keyword:[PHP]
//snippet-keyword:[AWS SDK for PHP v3]
//snippet-keyword:[Code Sample]
//snippet-keyword:[Amazon Polly]
//snippet-service:[polly]
//snippet-sourcetype:[full-example]
//snippet-sourcedate:[2018-12-16]
//snippet-sourceauthor:[jschwarzwalder (AWS)]

