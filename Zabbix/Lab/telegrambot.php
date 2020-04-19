#!/usr/bin/php

# Reference: https://www.saschapapini.it/2019/10/30/zabbix-4-4-notifiche-telegram.html

<?php

$telegrambot='<inserire qui il bot token>';

function telegram($msg) {
        global $telegrambot,$argv;
        $url='https://api.telegram.org/bot'.$telegrambot.'/sendMessage';
        $data=array(
                'chat_id'=>$argv[1],
                'text'=>$msg,
                'parse_mode'=>'html'
        );
        $options=array('http'=>array('method'=>'POST','header'=>"Content-Type:application/x-www-form-urlencoded\r\n",'content'=>http_build_query($data),),);
        $context=stream_context_create($options);
        $result=file_get_contents($url,false,$context);
        return $result;
}

$MEX = '';
$EMOJI = array(
        'problem' => "\xF0\x9F\x9A\xA8",
        'ok' => "\xE2\x9C\x85",
        'ack' => "\xF0\x9F\x93\xA2"
);

if (isset($argv[2]) && strlen($argv[2])>0) {

        if ( strpos($argv[2], 'Resolved') !== false ) {
                $MEX .= $EMOJI['ok'];
        } else if ( strpos($argv[2], 'Updated problem') !== false ) {
                $MEX .= $EMOJI['ack'];
        } else {
                $MEX .= $EMOJI['problem'];
        }

        $SUBJECT = $argv[2];
        $MEX .= ' <b>'.$SUBJECT.'</b>';
}
$MEX .= isset($argv[3]) && strlen($argv[3])>0 ? "\n\n<i>".$argv[3].'</i>' : '';


telegram($MEX);

?>
