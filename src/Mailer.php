<?php
/**
 * @copyright Yusup Hambali
 * @license MIT
 */
namespace yusham\resend;

use Yii;


class Mailer extends \yii\mail\BaseMailer
{
    public $messageClass = Message::class;

    private $_transport = null;

    public function setTransport($transport): void
    {
        $this->_transport = $transport;
    }

    /**
     * @param \yii\mail\MessageInterface $message
     */
    protected function sendMessage($message): bool
    {
        try {
            $resend = \Resend::client($this->_transport['apiKey']);

            $resend->emails->send([
                    'from' => $message->getFrom(),
                    'to' => implode(', ', $message->getTo()),
                    'subject' => $message->getSubject(),
                    'html' => $message->getHtmlBody(),
                    'attachments' => array_map(function($attachment) {
                        $content = $attachment['content'] ?? file_get_contents($attachment['file']);
                        $content = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content) ?: 'UTF-8');
                        $filename = $attachment['fileName'] ?? (isset($attachment['file']) ? basename($attachment['file']) : uniqid());
                        return compact('content', 'filename');
                    }, $message->getAttachments()),
            ]);


            return true;
        }
        catch(\Throwable $t) {
        }

        return false;
    }
}
