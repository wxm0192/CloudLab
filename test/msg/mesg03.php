<?php error_reporting(E_ALL);
/**
* Example for sending and receiving Messages via the System V Message Queue
*
* To try this script run it synchron/asynchron twice times. One time with ?typ=send and one time with ?typ=receive
*
* @author          Thomas Eimers - Mehrkanal GmbH
*
* This document is distributed in the hope that it will be useful, but without any warranty;
* without even the implied warranty of merchantability or fitness for a particular purpose.
*/
header('Content-Type: text/plain; charset=ISO-8859-1');
echo "Start...n";

// Create System V Message Queue. Integer value is the number of the Queue
$queue = msg_get_queue(100379);

// Sendoptions
$message='nachricht';     // Transfering Data
$serialize_needed=false;  // Must the transfer data be serialized ?
$block_send=false;        // Block if Message could not be send (Queue full...) (true/false)
$msgtype_send=1;          // Any Integer above 0. It signeds every Message. So you could handle multible message
                          // type in one Queue.

// Receiveoptions
$msgtype_receive=1;       // Whiche type of Message we want to receive ? (Here, the type is the same as the type we send,
                          // but if you set this to 0 you receive the next Message in the Queue with any type.
$maxsize=100;             // How long is the maximal data you like to receive.
$option_receive=MSG_IPC_NOWAIT; // If there are no messages of the wanted type in the Queue continue without wating.
                          // If is set to NULL wait for a Message.

// Send or receive 20 Messages
for ($i=0;$i<20;$i++) {
  sleep(1);
  // This one sends
  if ($_GET['typ']=='send') {
    if(msg_send($queue,$msgtype_send, $message,$serialize_needed, $block_send,$err)===true) {
      echo "Message sendet.n";
    } else {
      var_dump($err);
    }
  // This one received
  } else {
    $queue_status=msg_stat_queue($queue);
    echo 'Messages in the queue: '.$queue_status['msg_qnum']."n";

    // WARNUNG: nur weil vor einer Zeile Code noch Nachrichten in der Queue waren, muss das jetzt nciht mehr der Fall sein!
    if ($queue_status['msg_qnum']>0) {
      if (msg_receive($queue,$msgtype_receive ,$msgtype_erhalten,$maxsize,$daten,$serialize_needed, $option_receive, $err)===true) {
              echo "Received data".$daten."n";
      } else {
              var_dump($err);
      }
    }
  }
}
